<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolictudTramite\SolicitudTramiteRequest;

use App\Models\DVPais;
use App\Models\DVPersona;
use App\Models\DVReo;
use App\Models\RecaudoDiseno;
use App\Models\RecaudoMotivo;
use App\Models\RecaudoTramite;
use App\Mail\CorreoSolicitudAntecedente;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;

class SolicitudController extends Controller
{
    public function index(): View
    {

        $id_persona = Auth::user()->id_persona;

        $data = DVPersona::select(['id_persona', 'nombres', 'primer_apellido', 'segundo_apellido', 'letra_cedula', 'numero_cedula', 'fecha_nacimiento'])
            ->where('id_persona', $id_persona)
            ->first();

        # Persistencia de datos session
        session(['persona_validada' =>  $data]);

        $antecedente = $this->get_estatus_antecedente($id_persona);

        if ($antecedente) {
            return $this->solicitud_rechazada($id_persona);
        }

        $motivos = RecaudoMotivo::where('activo', true)->get();

        $paises = DVPais::select('id', 'nombre_oficial')
            ->where('id', '!=', 'VEN')
            ->get();

        return view('site.solicitud_certificacion.crear', compact('paises', 'data', 'motivos'));
    }

    private function get_estatus_antecedente(string $idPersona): bool
    {
        return DVReo::where('id_reo', $idPersona)->exists();
    }

    private function solicitud_rechazada(string $id_persona)
    {
        $data = session('persona_validada');

        $tramiteExistente = $this->get_existencia_tramite_rechazado($id_persona);

        if (!$tramiteExistente) {

            $tramite = new RecaudoTramite();
            $diseno = RecaudoDiseno::where('estado', true)->first();

            $tramite->cedula_titular   = $data['numero_cedula'];
            $tramite->nacionalidad     = Str::lower($data['letra_cedula']);
            $tramite->nombres          = Str::lower($data['nombres']);
            $tramite->primer_apellido  = Str::lower($data['primer_apellido']);
            $tramite->segundo_apellido = Str::lower($data['segundo_apellido']);
            $tramite->tipo_solicitante = 1; // Obligatorio web

            $titular = ($data['letra_cedula'] == 'v') ? 'CIUDADANO MAYOR DE EDAD' : 'CIUDADANO EXTRANJERO';

            $tramite->tipo_titular        = $titular;
            $tramite->id_motivo           = 7; # 9 para produccion
            $tramite->id_descargas        = null;
            $tramite->id_diseno_tramite   = $diseno->id;
            $tramite->id_persona          = $id_persona;
            $tramite->correo              = Auth::user()->email;
            $tramite->pais_nombre_oficial = 'Asignación rechazada';
            $tramite->id_estatus          = 3;
            $tramite->apostilla           = false;
            $tramite->save();

            // 4. LÓGICA DE STORE: Generación del número de trámite oficial (Doble guardado)
            $tramite->refresh();
            $anio = date('Y');
            $tramite->num_tramite = "102{$anio}{$tramite->id_correlativo}";
            $tramite->save();
        }

        return view('site.solicitud_certificacion.rechazo');
    }

    private function get_existencia_tramite_rechazado(string $idPersona): bool
    {
        return RecaudoTramite::where('id_persona', $idPersona)
            ->where('id_estatus', 3)
            ->whereDate('created_at', now()->toDateString())
            ->exists();
    }

    public function solicitud_store(SolicitudTramiteRequest $request)
    {
        $persona = session('persona_validada');

        if (!$persona) {
            return back()->withInput()->withErrors(['error' => 'No se encontró la información de la persona. Vuelva a iniciar el proceso.']);
        }

        // ==========================================
        // VALIDACIÓN DE MAYORÍA DE EDAD (18 AÑOS)
        // ==========================================
        $fechaNacimiento = Carbon::parse($persona['fecha_nacimiento']);

        if ($fechaNacimiento->age < 18) {
            return back()->withInput()->withErrors(['error' => 'Lo sentimos, este trámite solo está disponible para personas mayores de edad (18 años o más).']);
        }

        $idPersona = $persona['id_persona'];
        $ahora = Carbon::now();

        // ==========================================
        // VALIDACIÓN DE LÍMITES DE TRÁMITES
        // ==========================================
        // Validar 1 por día, 3 por mes, 10 por año.

        $tramitesHoy = RecaudoTramite::where('id_persona', $idPersona)
            ->whereDate('created_at', $ahora->toDateString())
            ->count();

        if ($tramitesHoy >= 1) {
            return back()->withInput()->withErrors(['error' => 'Ya has realizado un trámite el día de hoy. Solo se permite un (1) trámite por día.']);
        }

        $tramitesMes = RecaudoTramite::where('id_persona', $idPersona)
            ->whereYear('created_at', $ahora->year)
            ->whereMonth('created_at', $ahora->month)
            ->count();

        if ($tramitesMes >= 3) {
            return back()->withInput()->withErrors(['error' => 'Has alcanzado el límite máximo de 3 trámites para este mes.']);
        }

        $tramitesAnio = RecaudoTramite::where('id_persona', $idPersona)
            ->whereYear('created_at', $ahora->year)
            ->count();

        if ($tramitesAnio >= 10) {
            return back()->withInput()->withErrors(['error' => 'Has alcanzado el límite máximo de 10 trámites para este año.']);
        }

        // ==========================================
        // PROCESAMIENTO DEL TRÁMITE
        // ==========================================

        $diseno = RecaudoDiseno::where('estado', true)->first();
        $pais_validado = DVPais::where('id', $request->pais)->firstOrFail();
        $titular = ($persona['letra_cedula'] == 'v') ? 'CIUDADANO MAYOR DE EDAD' : 'CIUDADANO EXTRANJERO';

        // Verificamos antecedentes penales usando el número de cédula
        $tieneAntecedentes = DVReo::where('id_reo', $persona['numero_cedula'])->exists();

        DB::beginTransaction();

        try {
            $tramite = new RecaudoTramite();

            $tramite->cedula_titular   = $persona['numero_cedula'];
            $tramite->nacionalidad     = Str::lower($persona['letra_cedula']);
            $tramite->nombres          = Str::lower($persona['nombres']);
            $tramite->primer_apellido  = Str::lower($persona['primer_apellido']);
            $tramite->segundo_apellido = Str::lower($persona['segundo_apellido']);
            $tramite->tipo_solicitante = 1; // Obligatorio web
            $tramite->tipo_titular     = $titular;
            $tramite->id_motivo        = $request['motivo'];
            $tramite->id_descargas     = null;
            $tramite->id_diseno_tramite = $diseno->id;
            $tramite->id_persona       = $idPersona;
            $tramite->correo           = Auth::user()->email;
            $tramite->apostilla        = filter_var($request->desea_apostillar, FILTER_VALIDATE_BOOLEAN);

            # En espera de repuesta...
            if ($tieneAntecedentes) {
                $tramite->pais_nombre_oficial = '*';
                $tramite->id_estatus          = 3; // Rechazado
                $tramite->apostilla           = false;
            } else {
                $tramite->pais_nombre_oficial = Str::lower($pais_validado->nombre_oficial);
                $tramite->id_estatus          = 2; // Aprobado
            }

            // Guardado inicial
            $tramite->save();

            // Generación del número de trámite oficial (Doble guardado)
            $tramite->refresh();
            $anio = date('Y');
            $tramite->num_tramite = "102{$anio}{$tramite->id_correlativo}";
            $tramite->save();

            DB::commit();


            $data = [
                'nombre_completo' => $persona['nombres'] . ' ' . $persona['primer_apellido'] . ' ' . $persona['segundo_apellido'],
                'num_tramite' => $tramite->num_tramite,
                'pais_nombre_oficial' => $tramite->pais_nombre_oficial,
            ];

            Mail::to(Auth::user()->email)->send(new CorreoSolicitudAntecedente($data['num_tramite'], $data['pais_nombre_oficial'], $data['nombre_completo']));

            session()->forget('persona_validada');

            if ($tieneAntecedentes) {
                return back()->withInput()->withErrors(['error' => 'Su solicitud ha sido procesada, pero fue rechazada debido a inconsistencias en la validación.']);
            }

            return back()->withInput()->with('success', 'Se ha generado la solicitud con éxito. Número de trámite: ' . $tramite->num_tramite);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error("Error al crear solicitud: " . $e->getMessage());

            return back()->withInput()->withErrors(['error' => 'Lo sentimos, ocurrió un problema técnico al procesar su solicitud.']);
        }
    }

    public function listado_tramites(): View
    {
        $userId = Auth::user()->id_persona;
        $ahora = Carbon::now();

        $listado_tramites = RecaudoTramite::where('id_persona', $userId)
            ->whereYear('created_at', $ahora->year)
            ->latest()
            ->limit(10)
            ->paginate(10);

        return view('site.solicitud_certificacion.listado', compact('listado_tramites'));
    }

    public function get_certificado_seleccionado(int $num_tramite) # PDF
    {
        $tramite = RecaudoTramite::where('num_tramite', $num_tramite)
            ->where('id_persona', Auth::user()->id_persona)
            ->firstOrFail();

        if ($tramite->id_estatus === 3) {
            abort(403, 'El certificado no está disponible para trámites rechazados.');
        }

        if (!$tramite->created_at->addMonths(3)->isFuture()) {
            abort(403, 'El certificado ha caducado (venció el plazo de 3 meses).');
        }

        $diseno = $tramite->diseno;

        // Procesar imágenes
        $imagenes = ['logo_encabezado', 'logo_fondo', 'sello', 'firma', 'banner_footer'];
        $procesadas = [];

        foreach ($imagenes as $campo) {
            $valor = $diseno->$campo ?? null;

            if (is_resource($valor)) {
                $valor = stream_get_contents($valor);
            }

            if ($valor && !str_starts_with($valor, 'data:image')) {
                $procesadas[$campo] = 'data:image/png;base64,' . base64_encode($valor);
            } else {
                $procesadas[$campo] = $valor;
            }
        }

        // Configuración de QR
        $renderer = new ImageRenderer(new RendererStyle(150), new SvgImageBackEnd());
        $writer = new Writer($renderer);

        $nro_tramite = $tramite->num_tramite;
        $datos_identidad = $tramite->nacionalidad . '-' . $tramite->cedula_titular;
        $nombre_completo = $tramite->nombres . ' ' . $tramite->primer_apellido . ' ' . $tramite->segundo_apellido;

        $url_validacion = $diseno->web_consulta . $nro_tramite;

        $qr_tramite = 'data:image/svg+xml;base64,' . base64_encode($writer->writeString("Tramite: " . $nro_tramite));
        $qr_cedula = 'data:image/svg+xml;base64,' . base64_encode($writer->writeString("Cedula: " . $datos_identidad));
        $qr_web = 'data:image/svg+xml;base64,' . base64_encode($writer->writeString($url_validacion));

        // Fechas
        $fecha_actual = Carbon::now()->locale('es')->isoFormat('D [de] MMMM [de] YYYY');
        $fecha_gaceta = $diseno->fecha_gaceta ? Carbon::parse($diseno->fecha_gaceta)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') : '';
        $fecha_decreto = $diseno->fecha_decreto ? Carbon::parse($diseno->fecha_decreto)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') : '';

        // Datos para la vista
        $data = [
            'tramite' => $tramite,

            // QR
            'qr_pag_redirect' => $qr_web,
            'qr_tramite' => $qr_tramite,
            'qr_cedula' => $qr_cedula,

            // Imágenes procesadas
            'logo_ministerial' => $procesadas['logo_encabezado'],
            'sello_direccion' => $procesadas['sello'],
            'firma_viceministro' => $procesadas['firma'],
            'banner_footer' => $procesadas['banner_footer'],
            'logo_ministerial_fondo' => $procesadas['logo_fondo'],

            // Datos de autoridad
            'nombre_direccion' => $diseno->nombre_direccion,
            'gaceta_cambio_pais' => $diseno->nro_gaceta,
            'fecha_cambio_gaceta_pais' => $fecha_gaceta,
            'nombre_viceministro' => $diseno->nombre_viceministro,
            'nro_decreto_desgnacion' => $diseno->nro_designacion,
            'fecha_decreto_desgnacion' => $fecha_decreto,
            'fecha_decreto_extraordinario' => $diseno->fecha_extraordinaria ? Carbon::parse($diseno->fecha_extraordinaria)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') : '',
            'viceministro_nombre_direccion' => $diseno->cargo_viceministro,
            'nro_decreto_extraordinario' => $diseno->nro_extraordinaria,

            // Localización
            'telefono_ministerio' => $diseno->telefono,
            'piso' => $diseno->piso,

            // Datos del trámite
            'fecha' => $tramite->created_at->format('d/m/Y'),
            'nombre_solicitante' => strtoupper($nombre_completo),
            'datos' => $datos_identidad,
            'pais_solicitud' => strtoupper($tramite->pais_nombre_oficial),
            'fecha_actual' => $fecha_actual,
            'nro_tramite' => $nro_tramite,
            'web' =>  Str::before($diseno->web_consulta, 'solicitud') ?? '',

        ];

        $pdf = Pdf::loadView('site.pdf.certificado', $data);

        return $pdf->stream('Certificado nro-' . $tramite->num_tramite . '.pdf');
    }

    public function get_comprobante_seleccionado(int $num_tramite)
    {
        $tramite = RecaudoTramite::where('num_tramite', $num_tramite)
            ->where('id_persona', Auth::user()->id_persona)
            ->firstOrFail();

        if ($tramite->id_persona != Auth::user()->id_persona) {
            abort(403, 'No tienes permiso para acceder a este comprobante.');
        }

        $diseno = $tramite->diseno;

        // Procesar imágenes
        $imagenes = ['logo_encabezado', 'logo_fondo', 'sello', 'firma', 'banner_footer'];
        $procesadas = [];

        foreach ($imagenes as $campo) {
            $valor = $diseno->$campo ?? null;

            if (is_resource($valor)) {
                $valor = stream_get_contents($valor);
            }

            if ($valor && !str_starts_with($valor, 'data:image')) {
                $procesadas[$campo] = 'data:image/png;base64,' . base64_encode($valor);
            } else {
                $procesadas[$campo] = $valor;
            }
        }


        $data = [
            'tramite' => $tramite,
            'telefono_ministerio' => $diseno->telefono,
            'piso' => $diseno->piso,
            'logo_ministerial' => $procesadas['logo_encabezado'],
            'logo_ministerial_fondo' => $procesadas['logo_fondo'],
            'sello_direccion' => $procesadas['sello'],
            'firma_viceministro' => $procesadas['firma'],
            'banner_footer' => $procesadas['banner_footer'],

            # Datos persona:
            'nombres' => $tramite->nombres,
            'nacionalidad' => $tramite->nacionalidad,
            'cedula_titular' => $tramite->cedula_titular,
            'primer_apellido' => $tramite->primer_apellido,
            'segundo_apellido' => $tramite->segundo_apellido,
            'pais_nombre_oficial' => $tramite->pais_nombre_oficial,
            'rechazado' => $tramite->id_estatus === 3 ? 'Rechazado' : '',
            'created_at' => $tramite->created_at,
        ];

        $pdf = Pdf::loadView('site.pdf.comprobante', $data);

        return $pdf->stream('Comprobante nro-' . $tramite->num_tramite . '.pdf');
    }

    public function informacion()
    {
        return view('site.solicitud_certificacion.informacion');
    }
}

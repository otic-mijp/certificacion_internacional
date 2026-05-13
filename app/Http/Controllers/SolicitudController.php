<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolictudTramite\SolicitudTramiteRequest;
use App\Models\DVPais;
use App\Models\DVPersona;
use App\Models\RecaudoDiseno;
use App\Models\RecaudoMotivo;
use App\Models\RecaudoTramite;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    public function index(): View
    {
        $paises = DVPais::select('id', 'nombre_oficial')
            ->where('id', '!=', 'VEN')
            ->get();

        $id_persona = Auth::user()->id_persona;
        $data = DVPersona::select(['id_persona', 'nombres', 'primer_apellido', 'segundo_apellido', 'letra_cedula', 'numero_cedula'])
            ->where('id_persona', $id_persona)
            ->first();

        $motivos = RecaudoMotivo::where('activo', true)->get();

        session(['persona_validada' =>  $data]); # Persistencia de datos sess

        return view('site.solicitud_certificacion.crear', compact('paises', 'data', 'motivos'));
    }

    public function solicitud_store(SolicitudTramiteRequest $request)
    {

        $persona = session('persona_validada');

        if (!$persona) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'No se encontró la información de la persona. Vuelva a iniciar el proceso.']);
        }

        $idPersona = $persona['id_persona'];
        $ahora = Carbon::now();

        // 1. Contar trámites del mes actual
        $tramitesMes = RecaudoTramite::where('id_persona', $idPersona)
            ->whereYear('created_at', $ahora->year)
            ->whereMonth('created_at', $ahora->month)
            ->count();

        if ($tramitesMes >= 3) {
            return back()->withErrors(['error' => 'Has alcanzado el límite máximo de 3 trámites para este mes.']);
        }

        $tramitesAnio = RecaudoTramite::where('id_persona', $idPersona)
            ->whereYear('created_at', $ahora->year)
            ->count();

        if ($tramitesAnio >= 10) {
            return back()->withErrors(['error' => 'Has alcanzado el límite máximo de 10 trámites para este año.']);
        }

        $diseno = RecaudoDiseno::where('estado', true)->first();

        $pais_validado = DVPais::where('id', $request->pais)->firstOrFail();

        DB::beginTransaction();

        try {
            RecaudoTramite::create([
                'id_correlativo' => 1,
                'cedula_titular' => $persona['numero_cedula'],
                'nacionalidad' => Str::upper($persona['letra_cedula']),
                'nombres' => Str::lower($persona['nombres']),
                'primer_apellido' => Str::lower($persona['primer_apellido']),
                'segundo_apellido' => Str::lower($persona['segundo_apellido']),
                'pais_nombre_oficial' => Str::lower($pais_validado->nombre_oficial) ,
                'tipo_solicitante' => 999999,
                'tipo_titular' => 1, # Obligatorio
                'apostilla' => filter_var($request->desea_apostillar, FILTER_VALIDATE_BOOLEAN),
                'id_motivo' => $request['motivo'],
                'id_estatus' => 1, 
                'id_descargas' => null,
                'id_diseno_tramite' => $diseno->id,
                'num_tramite' => 1111,
                'id_persona' => $idPersona,
                'created_at' => now(), 
                'updated_at' => now(),
            ]);

            DB::commit();

            session()->forget('persona_validada');

            return back()->with('success', 'Se ha generado la solicitud con éxito.');

        } catch (Exception $e) {

            DB::rollBack();
            Log::error("Error al crear solicitud: " . $e->getMessage());

            return back()
                ->withInput()
                ->withErrors(['error' => 'Lo sentimos, ocurrió un problema técnico al procesar su solicitud.']);
                
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
            ->get();

        return view('site.solicitud_certificacion.listado', compact('listado_tramites'));
    }

    public function get_certificado_seleccionado(int $num_tramite)
    {
        $tramite = RecaudoTramite::where('num_tramite', $num_tramite)
            ->where('id_persona', Auth::user()->id_persona)
            ->firstOrFail();

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
            'viceministro_nombre_direccion' => $diseno->cargo_viceministro,
            'nro_decreto_extraordinario' => $diseno->nro_extraordinaria,

            // Localización
            'telefono_ministerio' => $diseno->tlf,
            'piso' => $diseno->piso,

            // Datos del trámite
            'fecha' => $tramite->created_at->format('d/m/Y'),
            'nombre_solicitante' => strtoupper($nombre_completo),
            'datos' => $datos_identidad,
            'pais_solicitud' => strtoupper($tramite->pais_nombre_oficial),
            'fecha_actual' => $fecha_actual,
            'nro_tramite' => $nro_tramite,
            'web' => $diseno->web_consulta ?? '',
        ];

        $pdf = Pdf::loadView('site.pdf.certificado', $data);

        return $pdf->stream('Certificado nro-' . $tramite->num_tramite . '.pdf');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolictudTramite\SolicitudTramiteRequest;

use App\Models\DVPais;
use App\Models\DVPersona;
use App\Models\DVReo;
use App\Models\RecaudoDiseno;
use App\Models\RecaudoMotivo;
use App\Models\RecaudoTramite;
use App\Events\TramiteProcesado;
use App\Services\SolicitudTramiteService;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;

use Barryvdh\DomPDF\Facade\Pdf;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;

class SolicitudController extends Controller
{

    private SolicitudTramiteService $tramiteService;

    public function __construct(SolicitudTramiteService $tramiteService)
    {
        $this->tramiteService = $tramiteService;
    }

    public function index(): View
    {
        $idPersona = auth()->user()->id_persona;

        $persona = DVPersona::select(['id_persona', 'nombres', 'primer_apellido', 'segundo_apellido', 'letra_cedula', 'numero_cedula', 'fecha_nacimiento'])
            ->where('id_persona', $idPersona)
            ->firstOrFail();

        session(['persona_validada' => $persona->toArray()]);

        $motivos =  RecaudoMotivo::where('activo', true)->get();
        $paises =  DVPais::select('id', 'nombre_oficial')->where('id', '!=', 'VEN')->get();

        return view('site.solicitud_certificacion.crear', [
            'data' => $persona,
            'motivos' => $motivos,
            'paises' => $paises
        ]);
    }

    public function solicitud_store(SolicitudTramiteRequest $request): RedirectResponse
    {
        $persona = session('persona_validada');

        if (!$persona) {
            return back()->withInput()->withErrors(['error' => 'No se encontró la información de la persona. Vuelva a iniciar el proceso.']);
        }

        try {

            $tramite = $this->tramiteService->procesarSolicitud($persona, $request->validated());

            session()->forget('persona_validada');

            if ($tramite->id_estatus === 3) {
                return redirect()->route('site.solicitud_certificacion.rechazo');
            }

            return back()->withInput()->with('success', "Se ha generado la solicitud con éxito. Número de trámite: {$tramite->num_tramite}");
        } catch (\Illuminate\Validation\ValidationException $e) {

            return back()->withInput()->withErrors($e->errors());
        } catch (\Exception $e) {

            Log::error('Error crítico en procesamiento de trámite HTTP', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => auth()->id()
            ]);

            return back()->withInput()->withErrors(['error' => 'Lo sentimos, ocurrió un problema técnico interno al procesar su solicitud.']);
        }
    }

    private function validarMayoriaEdad(?string $fechaNacimiento): void
    {
        if (!$fechaNacimiento || Carbon::parse($fechaNacimiento)->age < 18) {
            throw ValidationException::withMessages([
                'error' => 'Lo sentimos, este trámite solo está disponible para personas mayores de edad (18 años o más).'
            ]);
        }
    }

    private function validarLimitesTramites(string $idPersona): void
    {
        $ahora = Carbon::now();

        $conteos = RecaudoTramite::where('id_persona', $idPersona)
            ->selectRaw("
                COUNT(CASE WHEN DATE(created_at) = ? THEN 1 END) as hoy,
                COUNT(CASE WHEN YEAR(created_at) = ? AND MONTH(created_at) = ? THEN 1 END) as mes,
                COUNT(CASE WHEN YEAR(created_at) = ? THEN 1 END) as anio
            ", [$ahora->toDateString(), $ahora->year, $ahora->month, $ahora->year])
            ->first();

        if (($conteos->hoy ?? 0) >= 1) {
            throw ValidationException::withMessages(['error' => 'Ya has realizado un trámite el día de hoy. Solo se permite un (1) trámite por día.']);
        }
        if (($conteos->mes ?? 0) >= 3) {
            throw ValidationException::withMessages(['error' => 'Has alcanzado el límite máximo de 3 trámites para este mes.']);
        }
        if (($conteos->anio ?? 0) >= 10) {
            throw ValidationException::withMessages(['error' => 'Has alcanzado el límite máximo de 10 trámites para este año.']);
        }
    }

    private function solicitud_rechazada(string $id_persona, string $pais_rechazado = 'Asignación rechazada')
    {
        $data = session('persona_validada');

        $tramiteExistente = $this->get_existencia_tramite_rechazado($id_persona);

        if (!$tramiteExistente) {

            $tramite = new RecaudoTramite();
            $diseno = RecaudoDiseno::where('estado', true)->first();

            $tramite->cedula_titular   = $data['numero_cedula'];
            $tramite->nacionalidad     = Str::upper($data['letra_cedula']);
            $tramite->nombres          = Str::lower($data['nombres']);
            $tramite->primer_apellido  = Str::lower($data['primer_apellido']);
            $tramite->segundo_apellido = Str::lower($data['segundo_apellido']);
            $tramite->tipo_solicitante = 1; // Obligatorio web

            $titular = ($data['letra_cedula'] == 'v') ? 'CIUDADANO MAYOR DE EDAD' : 'CIUDADANO EXTRANJERO';

            $tramite->tipo_titular        = $titular;
            $tramite->id_motivo           = 9; # 9 para produccion
            $tramite->usuario             = 'Web';
            $tramite->id_diseno_tramite   = $diseno->id;
            $tramite->id_persona          = $id_persona;
            $tramite->correo              = Auth::user()->email;
            $tramite->pais_nombre_oficial = $pais_rechazado;
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

    public function listado_tramites(): View
    {
        $userId = auth()->user()->id_persona;
        $anioActual = Carbon::now()->year;

        $listado_tramites = RecaudoTramite::with('diseno')
            ->where('id_persona', $userId)
            ->whereYear('created_at', $anioActual)
            ->latest()
            ->paginate(10);

        return view('site.solicitud_certificacion.listado', compact('listado_tramites'));
    }

    public function get_certificado_seleccionado(int $num_tramite): Response
    {
        try {

            $tramite = RecaudoTramite::with('diseno')
                ->where('num_tramite', $num_tramite)
                ->where('id_persona', auth()->user()->id_persona)
                ->firstOrFail();

            if ($tramite->id_estatus === 3) {
                abort(403, 'El certificado no está disponible para trámites rechazados.');
            }

            if ($tramite->created_at->addMonths(3)->isPast()) {
                abort(403, 'El certificado ha caducado (venció el plazo de 3 meses).');
            }

            $diseno = $tramite->diseno;

            // Procesamiento de imágenes binarias (BLOB) almacenadas en DB a formato Base64 Inline
            $imagenes = ['logo_encabezado', 'logo_fondo', 'sello', 'firma', 'banner_footer'];
            $procesadas = [];

            foreach ($imagenes as $campo) {
                $valor = $diseno->$campo ?? null;

                if (is_resource($valor)) {
                    $valor = stream_get_contents($valor);
                }

                if ($valor && !Str::startsWith((string)$valor, 'data:image')) {
                    $procesadas[$campo] = 'data:image/png;base64,' . base64_encode((string)$valor);
                } else {
                    $procesadas[$campo] = $valor;
                }
            }

            $renderer = new ImageRenderer(new RendererStyle(150), new SvgImageBackEnd());
            $writer = new Writer($renderer);

            $datosIdentidad = Str::upper($tramite->nacionalidad . '-' . $tramite->cedula_titular);
            $nombreCompleto = "{$tramite->nombres} {$tramite->primer_apellido} {$tramite->segundo_apellido}";
            $urlValidacion = $diseno->web_consulta . $tramite->num_tramite;

            // Construcción de los tres códigos QR requeridos por la vista HTML
            $qrWeb =     'data:image/svg+xml;base64,' . base64_encode($writer->writeString($urlValidacion));
            $qrTramite = 'data:image/svg+xml;base64,' . base64_encode($writer->writeString("Tramite: " . $tramite->num_tramite));
            $qrCedula =  'data:image/svg+xml;base64,' . base64_encode($writer->writeString("Cedula: " . $datosIdentidad));

            // Formateo de fechas con localización en español ('es') acorde al estándar legal del documento
            $fechaActual = Carbon::now()->locale('es')->isoFormat('D [de] MMMM [de] YYYY');
            $fechaGaceta = $diseno->fecha_gaceta ? Carbon::parse($diseno->fecha_gaceta)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') : '';
            $fechaDecreto = $diseno->fecha_decreto ? Carbon::parse($diseno->fecha_decreto)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') : '';
            $fechaExtraordinaria = $diseno->fecha_extraordinaria ? Carbon::parse($diseno->fecha_extraordinaria)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') : 'N/A';

            // Mapeo unívoco de variables requeridas estrictamente por el motor Blade de la plantilla
            $dataPayload = [
                'logo_ministerial_fondo'       => $procesadas['logo_fondo'],
                'logo_ministerial'             => $procesadas['logo_encabezado'],
                'qr_pag_redirect'              => $qrWeb,
                'nombre_direccion'             => $diseno->nombre_direccion,
                'gaceta_cambio_pais'           => $diseno->nro_gaceta,
                'fecha_cambio_gaceta_pais'     => $fechaGaceta,
                'nombre_solicitante'           => Str::upper($nombreCompleto),
                'datos'                        => $datosIdentidad,
                'pais_solicitud'               => Str::upper($tramite->pais_nombre_oficial),
                'fecha_actual'                 => $fechaActual,
                'sello_direccion'              => $procesadas['sello'],
                'firma_viceministro'           => $procesadas['firma'],
                'nombre_viceministro'          => $diseno->nombre_viceministro,
                'viceministro_nombre_direccion' => $diseno->cargo_viceministro,
                'nro_decreto_desgnacion'       => $diseno->nro_designacion,
                'fecha_decreto_desgnacion'     => $fechaDecreto,
                'nro_decreto_extraordinario'   => $diseno->nro_extraordinaria,
                'fecha_decreto_extraordinario' => $fechaExtraordinaria,
                'web'                          => Str::before($diseno->web_consulta, 'solicitud') ?: '',
                'nro_tramite'                  => $tramite->num_tramite,
                'qr_cedula'                    => $qrCedula,
                'qr_tramite'                   => $qrTramite,
                'banner_footer'                => $procesadas['banner_footer'],
                'piso'                         => $diseno->piso,
                'telefono_ministerio'          => $diseno->telefono,
            ];

            // Renderizado del PDF utilizando la fachada de DomPDF sin alterar el CSS interno
            $pdf = Pdf::loadView('site.pdf.certificado', $dataPayload);

            // Transmisión en stream inline para su visualización en navegadores web de alta disponibilidad
            return $pdf->stream("Certificado_nro-{$tramite->num_tramite}.pdf");
        } catch (\Exception $e) {

            Log::error('Error crítico en la compilación y renderizado del PDF del certificado', [
                'num_tramite' => $num_tramite,
                'exception'   => $e->getMessage(),
                'trace'       => $e->getTraceAsString()
            ]);

            abort(500, 'Ocurrió un error interno al generar el documento digital de certificación.');
        }
    }

    public function get_comprobante_seleccionado(int $num_tramite): Response
    {
        try {
            // Eager loading de la relación diseno para optimizar el rendimiento en PostgreSQL
            $tramite = RecaudoTramite::with('diseno')
                ->where('num_tramite', $num_tramite)
                ->where('id_persona', auth()->user()->id_persona)
                ->firstOrFail();

            $diseno = $tramite->diseno;

            // Procesamiento seguro de elementos gráficos binarios (BLOB) de la DB a Base64 Inline
            $imagenes = ['logo_encabezado', 'logo_fondo', 'sello', 'firma', 'banner_footer'];
            $procesadas = [];

            foreach ($imagenes as $campo) {
                $valor = $diseno->$campo ?? null;

                if (is_resource($valor)) {
                    $valor = stream_get_contents($valor);
                }

                // CORRECCIÓN PSR-12: Uso de startsWith en lugar del deprecado starts_with
                if ($valor && !Str::startsWith((string)$valor, 'data:image')) {
                    $procesadas[$campo] = 'data:image/png;base64,' . base64_encode((string)$valor);
                } else {
                    $procesadas[$campo] = $valor;
                }
            }

            // Determinación lógica del estatus de rechazo (id_estatus = 3 es el estándar de rechazados)
            $esRechazado = ((int)$tramite->id_estatus === 3);
            $textoRechazado = $esRechazado ? 'RECHAZADO' : 'EN PROCESO';

            // Construcción y Mapeo Exacto del Payload para la Vista Blade
            $dataPayload = [
                // Instancia del objeto completo requerido por el Blade
                'tramite'                => $tramite,

                // Control de estatus de rechazo
                'rechazado'              => $esRechazado ? $textoRechazado : null,

                // Mapeo explícito de campos de texto individuales usados en la vista
                'nombres'                => Str::upper($tramite->nombres ?? ''),
                'primer_apellido'        => Str::upper($tramite->primer_apellido ?? ''),
                'segundo_apellido'       => Str::upper($tramite->segundo_apellido ?? ''),
                'pais_nombre_oficial'    => Str::upper($tramite->pais_nombre_oficial ?? 'REPÚBLICA BOLIVARIANA DE VENEZUELA'),

                // Inyección de elementos institucionales gráficos procesados
                'logo_ministerial_fondo' => $procesadas['logo_fondo'],
                'logo_ministerial'       => $procesadas['logo_encabezado'],
                'banner_footer'          => $procesadas['banner_footer'],

                // Variables de ubicación y contacto dinámicos extraídos del diseño institucional
                'piso'                   => $diseno->piso ?? 'N/A',
                'telefono_ministerio'    => $diseno->telefono ?? 'N/A',
            ];

            // Forzar localización al español para asegurar que translatedFormat('d \d\e F \d\e Y') compile correctamente
            Carbon::setLocale('es');

            // Compilación del HTML mediante el wrapper de DomPDF
            $pdf = Pdf::loadView('site.pdf.comprobante', $dataPayload);

            // Transmisión inline al visualizador del navegador del cliente
            return $pdf->stream("Comprobante_Tramite-{$tramite->num_tramite}.pdf");
        } catch (\Exception $e) {
            Log::error('Error crítico en la compilación y renderizado del PDF del comprobante', [
                'num_tramite' => $num_tramite,
                'exception'   => $e->getMessage(),
                'trace'       => $e->getTraceAsString()
            ]);

            abort(500, 'Ocurrió un error interno al compilar el documento digital del comprobante.');
        }
    }



    public function informacion()
    {
        return view('site.solicitud_certificacion.informacion');
    }
}

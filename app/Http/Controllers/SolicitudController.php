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

use Exception;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    public function index(): View
    {
        $paises = DVPais::all();

        $id_persona = auth()->user()->id_persona;
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

        DB::beginTransaction();

        try {
            RecaudoTramite::create([
                'id_correlativo' => 2,
                'num_tramite' => 7777,
                'id_persona' => $idPersona,
                'created_at' => now(), // Nota: corregido de 'create_at' a 'created_at' si usas convenciones Laravel
                'updated_at' => now(),
                'cedula_titular' => $persona['numero_cedula'],
                'nacionalidad' => Str::upper($persona['letra_cedula']),
                'nombres' => Str::lower($persona['nombres']),
                'primer_apellido' => Str::lower($persona['primer_apellido']),
                'segundo_apellido' => Str::lower($persona['segundo_apellido']),
                'pais' => Str::lower($request['pais']),
                'tipo_solicitante' => 999999,
                'tipo_titular' => 1,
                'apostilla' => filter_var($request->desea_apostillar, FILTER_VALIDATE_BOOLEAN),
                'id_motivo' => $request['motivo'],
                'id_estatus' => 1,
                'id_descargas' => null,
                'id_diseno_tramite' => $diseno->id,
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

        $userId = auth()->user()->id_persona;
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


        $pdf = Pdf::loadView('site.pdf.certificado', compact('tramite'));

        return $pdf->stream('Certificado nro-' . $tramite->num_tramite . '.pdf');
    }

}

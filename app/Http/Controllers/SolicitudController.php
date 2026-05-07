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
use Exception;
use Illuminate\Http\Request;

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

        $diseno = RecaudoDiseno::where('estado', true)->first();

        // Iniciamos una transacción por seguridad
        DB::beginTransaction();

        try {
            RecaudoTramite::create([
                'id_dato' => 2,
                'create_at' => now(),
                'cedula_titular' => $persona['numero_cedula'],
                'nacionalidad' => Str::upper($persona['letra_cedula']),
                'nombres' => Str::lower($persona['nombres']),
                'primer_apellido' => Str::lower($persona['primer_apellido']),
                'segundo_apellido' => Str::lower($persona['segundo_apellido']),
                'pais' => Str::lower($request['pais']),
                'tipo_solicitante' => 999999,
                'tipo_titular' => 1,
                'apostilla' => Str::lower($request->desea_apostillar) === 'si',
                'id_motivo' => $request['motivo'],
                'id_estatus' => 1,
                'id_descargas' => null,
                'id_diseno_tramite' =>  $diseno->id,
            ]);

            DB::commit();

            session()->forget('persona_validada');

            return back()->with('status', 'Se ha generado la solicitud con éxito.');
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
        return view('site.solicitud_certificacion.listado');
    }
}

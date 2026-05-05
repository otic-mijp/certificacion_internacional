<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

use App\Models\DVPersona;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Profesion;
use App\Models\Parroquia;
use App\Models\Usuario;

use App\Mail\RegistroBienvenidaMail;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\Auth\ConsultaCedulaRegistroRequest;
use App\Http\Requests\Auth\RegistroUsuarioRequest;

class RegistroController extends Controller
{
    public function index(): View
    {
        return view('auth.register.buscar_cedula');
    }

    public function get_cedula(ConsultaCedulaRegistroRequest $request): RedirectResponse
    {
        $cedula = $request->input('numero_cedula');
        $letra = $request->input('letra_cedula');

        $persona = DVPersona::where('numero_cedula', $cedula)
            ->where('letra_cedula', $letra)
            ->first();

        if (!$persona) {
            return redirect()->back()->withErrors(['numero_cedula' => 'No se encontraron registros.']);
        }

        session(['persona_validada' => $persona]); # Persistencia de datos

        return redirect()->route('registro.final');
    }

    public function get_datos_encontrados(): View|RedirectResponse
    {

        $persona = session('persona_validada');

        if (!$persona) {
            return redirect()->route('consulta.cedula');
        }

        $estados = Estado::all();
        $profesiones = Profesion::all();

        // Variables para selects dependientes
        $estadoSeleccionado = old('estado_id') ? Estado::find(old('estado_id')) : null;
        $municipioSeleccionado = old('municipio_id') ? Municipio::find(old('municipio_id')) : null;
        $parroquiaSeleccionada = old('parroquia_id') ? Parroquia::find(old('parroquia_id')) : null;

        $municipios = $estadoSeleccionado
            ? Municipio::where('estado_id', $estadoSeleccionado->id)
            ->orderBy('nombre', 'asc')
            ->get()
            : collect();

        $parroquias = $municipioSeleccionado
            ? Parroquia::where('municipio_id', $municipioSeleccionado->id)
            ->orderBy('nombre', 'asc')
            ->get()
            : collect();

        return view('auth.register.datos_encontrados', compact(
            'persona',
            'estados',
            'profesiones',
            'municipios',
            'parroquias',
            'estadoSeleccionado',
            'municipioSeleccionado',
            'parroquiaSeleccionada'
        ));
    }

    public function store(RegistroUsuarioRequest $request)
    {
        $persona = session('persona_validada');

        if (!$persona) {
            return redirect()->route('consulta.cedula');
        }

        // Convertimos a array y mapeamos en una sola línea (datos a minusculas)
        $personaProcesada = array_map(function ($v) {
            return is_string($v) ? mb_strtolower($v) : $v;
        }, (array) $persona);

        Usuario::create([
            'letra_cedula'     => $personaProcesada['letra_cedula'],
            'cedula'           => $personaProcesada['numero_cedula'],
            'nombres'          => $personaProcesada['nombres'],
            'primer_apellido'  => $personaProcesada['primer_apellido'],
            'segundo_apellido' => $personaProcesada['segundo_apellido'] ?? null,
            'fecha_nacimiento' => $personaProcesada['fecha_nacimiento'],
            'sexo'             => $personaProcesada['sexo'],

            # Datos del request (también en minúsculas)
            'email' => mb_strtolower($request->input('email')),
            'telefono_celular'   => $request->input('telefono_celular'),
            'telefono_local'     => $request->input('telefono_local'),
            'profesion_id'       => $request->input('profesion_id'),
            'estado_id'          => $request->input('estado_id'),
            'municipio_id'       => $request->input('municipio_id'),
            'parroquia_id'       => $request->input('parroquia_id'),
            'direccion'          => mb_strtolower($request->input('direccion')),
            'contrasena'         => $request->input('contrasena'),
            'estatus_contrasena_reiniciada' => false,
        ]);

        session()->forget('persona_validada');

        Mail::to($request->input('email'))->send(new RegistroBienvenidaMail());

        return $this->get_vista_exitosa();
    }

    private function get_vista_exitosa(): View
    {
        return view('auth.register.usuario_registrado');
    }

    public function getMunicipios(int $estado_id): JsonResponse
    {
        $municipios = Municipio::where('estado_id', $estado_id)
            ->orderBy('nombre', 'asc')
            ->get(['id', 'nombre']);

        return response()->json($municipios);
    }

    public function getParroquias(int $municipio_id): JsonResponse
    {
        $parroquias = Parroquia::where('municipio_id', $municipio_id)
            ->orderBy('nombre', 'asc')
            ->get(['id', 'nombre']);

        return response()->json($parroquias);
    }
}

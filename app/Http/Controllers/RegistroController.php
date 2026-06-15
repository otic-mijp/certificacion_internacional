<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

use App\Models\DVPersona;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Profesion;
use App\Models\Usuario;

use Exception;

use Illuminate\Auth\Events\Registered;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;

use App\Http\Requests\Auth\ConsultaCedulaRegistroRequest;
use App\Http\Requests\Auth\RegistroUsuarioRequest;
use App\Jobs\EnviarCorreoBienvenida;
use App\Mail\RegistroBienvenidaMail;

class RegistroController extends Controller
{
    public function index(): View
    {
        return view('auth.register.buscar_cedula');
    }

    public function get_cedula(ConsultaCedulaRegistroRequest $request): RedirectResponse
    {
        $data =  trim($request->input('letra_cedula') . $request->input('numero_cedula'));

        $persona = DVPersona::where('id_persona', $data)
            ->first();

        if (!$persona) {
            return redirect()->back()->withErrors(['numero_cedula' => 'Atención: No se encontraron registros. Debe dirigirse a la coordinación de antecedentes penales para actualizar su información.']);
        }

        if ($persona->fecha_nacimiento) {
            $fechaNacimiento = \Carbon\Carbon::parse($persona->fecha_nacimiento);
            $edad = $fechaNacimiento->age;
            if ($edad < 18) {
                return redirect()->back()->withErrors(['numero_cedula' => 'Atención: No se permiten registros de personas menores de edad.']);
            }
        }

        $usuario = Usuario::where('id_persona', $data)->first();

        if ($usuario) {
            return redirect()
                ->back()
                ->withErrors(
                    [
                        'numero_cedula' =>
                        'Este número de cédula ya se encuentra en proceso de registro. Por favor, revise su correo electrónico para confirmar la cuenta. Nota: Si el correo ingresado es incorrecto, el sistema liberará su cédula automáticamente en 24 horas para que pueda intentarlo de nuevo..'
                    ]
                );
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

        $fechaFormulario = Carbon::parse($request->input('fecha_nacimiento'))->format('Y-m-d');
        $fechaSesion     = Carbon::parse($persona['fecha_nacimiento'])->format('Y-m-d');

        if ($fechaFormulario !== $fechaSesion) {
            throw ValidationException::withMessages([
                'fecha_nacimiento' => 'La fecha de nacimiento no coincide con nuestros registros oficiales.'
            ]);
        }

        try {
           
            DB::beginTransaction();

            $usuario = Usuario::create([
                'id_persona'         => Str::upper($persona['id_persona']),
                'email'              => mb_strtolower($request->input('email')),
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

            Mail::to($usuario->email)->send(new RegistroBienvenidaMail());

            DB::commit();

            session()->forget('persona_validada');

            event(new Registered($usuario));

            Auth::login($usuario);

            return to_route('usuario.bienvenida');

        } catch (Exception $e) {

            DB::rollBack();

            Log::error('Error en el registro de usuario (Correo no enviado): ' . $e->getMessage());

            return back()->withInput()->withErrors([
                'email' => 'No se pudo procesar tu registro debido a un problema enviando el correo de bienvenida. Por favor, inténtalo más tarde.'
            ]);
        }
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilUsuario\CambioClaveRequest;
use App\Models\DVPersona;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

use App\Models\PreguntaSeguridad;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {

        $id_persona = Auth::user()->id_persona;
        $data = DVPersona::select('nombres', 'primer_apellido', 'segundo_apellido')
            ->find($id_persona);

        $usuario = Auth::user()->estatus_contrasena_reiniciada;

        if ($usuario === true) {

            return view('site.perfil.contrasena_obligatoria');
        } else {
            return view('site.bienvenida', compact('data'));
        }
    }

    public function perfil(): View
    {
        $user = Auth::user();
        return view('site.perfil.perfil', compact('user'));
    }

    public function preguntas_seguridad(): View
    {
        $user = Auth::user()->load('respuestasSeguridad.pregunta');
        $preguntas_disponibles = PreguntaSeguridad::all();

        return view('site.perfil.cambiar_preguntas_seguridad', compact('user', 'preguntas_disponibles'));
    }

    public function preguntas_update(Request $request)
    {

        $request->validate([
            'pregunta_1_id' => 'required|exists:preguntas_seguridad,id',
            'respuesta_1'   => 'required|string|min:3|max:255',
            'pregunta_2_id' => 'required|exists:preguntas_seguridad,id|different:pregunta_1_id',
            'respuesta_2'   => 'required|string|min:3|max:255',
        ]);

        try {

            DB::transaction(function () use ($request) {

                $user = auth()->user();

                $user->respuestasSeguridad()->delete();

                $user->respuestasSeguridad()->create([
                    'pregunta_seguridad_id' => $request->pregunta_1_id,
                    'respuesta' => Hash::make(strtolower($request->respuesta_1)),
                ]);

                $user->respuestasSeguridad()->create([
                    'pregunta_seguridad_id' => $request->pregunta_2_id,
                    'respuesta' => Hash::make(strtolower($request->respuesta_2)),
                ]);
            });

            return back()->with('success', 'Tus preguntas de seguridad han sido configuradas con éxito.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un problema al guardar los datos. Inténtalo de nuevo.']);
        }
    }

    public function email_nuevo(): View
    {
        $email = Auth::user()->email;
        return view('site.perfil.cambiar_correo', compact('email'));
    }

    public function email_update(Request $request)
    {

        $request->merge([
            'email' => Str::lower($request->email),
            'email_confirmation' => Str::lower($request->email_confirmation),
        ]);

        $request->validate([
            'email' => 'required|email|unique:usuarios,email|confirmed',
        ], [
            'email.required' => 'El nuevo correo es obligatorio.',
            'email.email' => 'Por favor, ingresa un formato de correo válido.',
            'email.unique' => 'Este correo ya está registrado por otro usuario.',
            'email.confirmed' => 'La confirmación del correo no coincide.',
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return back()->with('success', '¡Tu correo ha sido actualizado con éxito!');
    }

    public function clave_nueva(): View
    {
        return view('site.perfil.reiniciar_password');
    }

    public function clave_update(Request $request)
    {

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->contrasena)) {
            return back()->withErrors([
                'current_password' => 'La clave actual es incorrecta.'
            ]);
        }

        $user->update([
            'contrasena' => Hash::make($request->password),
        ]);

        return back()->with('status', '¡Contraseña actualizada correctamente!');
    }

    public function cambio_clave_obligatorio_update(CambioClaveRequest $request)
    {

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->contrasena)) {
            return back()->withErrors(['current_password' => 'La clave actual es incorrecta.']);
        }

        $user->update([
            'estatus_contrasena_reiniciada' => false,
            'contrasena' => Hash::make($request->password)
        ]);

        return to_route('usuario.bienvenida');
    }
}

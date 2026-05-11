<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\DVPersona;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

use App\Mail\RecuperarPasswordMail;
use App\Http\Requests\Auth\ConsultaCedulaRegistroRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function requisitos(): View
    {
        return view('layouts.requisitos_normas');
    }

    public function recuperar_clave(): View
    {
        return view('auth.reset_password');
    }

    public function recuperar_clave_update(Request $request)
    {
        $request->merge([
            'email' => strtolower(trim($request->email))
        ]);

        $request->validate([
            'email' => 'required|email|exists:usuarios,email'
        ], [
            'email.exists' => 'No hemos encontrado un usuario con ese correo electrónico.'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();
        $clave = Str::random(10);

        $usuario->contrasena = Hash::make($clave);
        $usuario->estatus_contrasena_reiniciada = true;
        $usuario->save();

        Mail::to($usuario->email)->send(new RecuperarPasswordMail($clave, $usuario));

        return back()->with('status', '¡Proceso exitoso! Se ha enviado una clave temporal a: ' . $usuario->email);
    }


    public function recuperar_usuario(): View
    {
        return view('auth.info_user');
    }

    public function consultar_usuario(ConsultaCedulaRegistroRequest $request)
    {
        $cedula = trim($request->input('numero_cedula'));
        $letra = trim($request->input('letra_cedula'));

        $persona = DVPersona::where('numero_cedula', $cedula)
            ->where('letra_cedula', $letra)
            ->first();

        if (!$persona) {
            return redirect()->back()->withErrors(['numero_cedula' => 'No se encontraron registros.']);
        }

        $auth_user = Usuario::where('id_persona', $persona->id_persona)
            ->with('respuestasSeguridad.pregunta')
            ->first();

        if (!$auth_user) {
            return redirect()->back()->withErrors(['status' => 'No se encuentra ningún usuario registrado en este sistema.']);
        }

        session(['recuperar_usuario_id' => $auth_user->id]);

        return redirect()->route('recuperar.usuario.preguntas');
    }

    public function preguntas_seguridad()
    {
        $userId = session('recuperar_usuario_id');

        if (!$userId) {
            return redirect()->route('recuperar.usuario')
                ->withErrors(['status' => 'La sesión expiró. Por favor, vuelve a intentar.']);
        }

        $user = Usuario::with('respuestasSeguridad.pregunta')->find($userId);

        if (!$user) {
            return redirect()->route('recuperar.usuario')
                ->withErrors(['status' => 'Usuario no encontrado.']);
        }

        return view('auth.security_questions', [
            'user' => $user,
        ]);
    }

    public function recuperar_correo(Request $request)
    {
        $userId = $request->session()->get('recuperar_usuario_id');

        if (!$userId) {
            return redirect()->route('recuperar.usuario')
                ->withErrors(['status' => 'La sesión expiró. Por favor, vuelve a intentar.']);
        }

        $user = Usuario::with('respuestasSeguridad.pregunta')->find($userId);

        if (!$user) {
            return redirect()->route('recuperar.usuario')
                ->withErrors(['status' => 'Usuario no encontrado.']);
        }

        foreach ($user->respuestasSeguridad as $respuesta) {
            $inputName = 'respuesta_' . $respuesta->id;
            $valor = strtolower(trim($request->input($inputName, '')));

            if ($valor === '' || ! Hash::check($valor, $respuesta->respuesta)) {
                return back()
                    ->withErrors(['respuestas' => 'Una o más respuestas son incorrectas.'])
                    ->withInput();
            }
        }

        $request->session()->forget('recuperar_usuario_id');

        return view('auth.vista_correo_existente', [
            'email' => $user->email,
        ]);
    }

    public function buscar_cedula(ConsultaCedulaRegistroRequest $request): RedirectResponse
    {
        $cedula = $request->input('numero_cedula');
        $letra = $request->input('letra_cedula');

        $persona = DVPersona::where('numero_cedula', $cedula)
            ->where('letra_cedula', $letra)
            ->first();

        if (!$persona) {
            return redirect()->back()->withErrors(['numero_cedula' => 'No se encontraron registros.']);
        }

        return redirect()->route('registro.final');
    }
}

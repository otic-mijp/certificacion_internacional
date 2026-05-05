<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\DVPersona;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

use App\Mail\RecuperarPasswordMail;
use App\Http\Requests\Auth\ConsultaCedulaRegistroRequest;

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

        $clave = \Illuminate\Support\Str::random(10);

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

    protected function preguntas_seguridad($data): View
    {

        $data = [
            'correo' => 'ejemplo@ejemplo.com',
            'password_temporal' => '123456789',
        ];

        return view('auth.security_questions', compact('data'));
    }
}

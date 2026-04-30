<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Muestra la página de login.
     */
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

    public function recuperar_usuario(): View
    {
        return view('auth.info_user');
    }

    public function buscar_cedula(Request $request)
    {
        $cedula = $request->input('cedula');

        if ($cedula) {
            // Aquí iría tu lógica de base de datos
            $usuario = true; 
            
            // Retornamos el resultado del método interno
            return $this->preguntas_seguridad($usuario);

        } else {
           
            return back()->with('error', 'La cédula no se ha encontrado. Por favor, inténtelo de nuevo.');
        }
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
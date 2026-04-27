<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Muestra la pantalla de bienvenida o dashboard inicial.
     */
    public function index()
    {
        return view('site.bienvenida');
    }

    /**
     * Muestra el perfil completo del usuario.
     */
    public function perfil(): View
    {
        $user = Auth::user();
        return view('site.perfil.perfil', compact('user'));
    }

    /**
     * Muestra el formulario para actualizar las preguntas de seguridad.
     */
    public function preguntas_seguridad(): View
    {
        $user = Auth::user();
        // Aquí podrías cargar las preguntas actuales si las tienes en otra tabla
        return view('site.perfil.cambiar_preguntas_seguridad', compact('user'));
    }

    /**
     * Muestra el formulario para el cambio de correo electrónico.
     */
    public function correo_electronico_nuevo(): View
    {
        $user = Auth::user();
        return view('site.perfil.cambiar_correo', compact('user'));
    }

    /**
     * Muestra el formulario para el cambio de contraseña.
     */
    public function clave_nueva(): View
    {
        return view('site.perfil.reiniciar_password');
    }
}

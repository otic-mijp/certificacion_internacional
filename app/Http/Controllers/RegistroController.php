<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ConsultaCedulaRegistroRequest;
use App\Models\DVPersona;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistroController extends Controller
{
    public function buscar_cedula(ConsultaCedulaRegistroRequest $request): View
    {
        $cedula = $request->input('numero_cedula');
        $persona = DVPersona::where('numero_cedula', $cedula)->first();

        if (!$persona) {
            return view('auth.register.sin_coincidencias');
        }

        return view('auth.register.datos_encontrados', compact('persona'));
    }

    public function registrar_usuario(Request $request)
    {
        // Lógica para registrar al usuario utilizando los datos de DVPersona
        // ...
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\DVPais;
use App\Models\DVPersona;

use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Profesion;
use App\Models\Parroquia;

use App\Http\Requests\Auth\ConsultaCedulaRegistroRequest;

class RegistroController extends Controller
{
    public function buscar_cedula(ConsultaCedulaRegistroRequest $request): View
    {
        $cedula = $request->input('numero_cedula');
        $persona = DVPersona::where('numero_cedula', $cedula)->first();

        if (!$persona) {
            return view('auth.register.sin_coincidencias');
        }

        $paises = DVPais::orderByRaw("CASE WHEN UPPER(nombre) = 'VENEZUELA' THEN 0 ELSE 1 END")
            ->orderBy('nombre', 'asc')
            ->get();

        $estados = Estado::all();
        $profesiones = Profesion::all();

        return view('auth.register.datos_encontrados', compact('persona', 'paises', 'estados', 'profesiones'));
    }

    public function registrar_usuario(Request $request)
    {
        // Lógica para registrar al usuario utilizando los datos de DVPersona
        // ...
    }

    # Logica para los selects anidados:

    public function getMunicipios(int $estado_id)
    {
        $municipios = Municipio::where('estado_id', $estado_id)
            ->orderBy('nombre', 'asc')
            ->get(['id', 'nombre']); // Solo traemos lo necesario

        return response()->json($municipios);
    }

    public function getParroquias(int $municipio_id)
    {
        $parroquias = Parroquia::where('municipio_id', $municipio_id)
            ->orderBy('nombre', 'asc')
            ->get(['id', 'nombre']);

        return response()->json($parroquias);
    }
}

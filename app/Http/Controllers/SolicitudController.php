<?php

namespace App\Http\Controllers;

use App\Models\DVPais;
use App\Models\DVPersona;
use App\Models\RecaudoMotivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SolicitudController extends Controller
{
    public function index(): View
    {
        $paises = DVPais::all();
        $id_persona = auth()->user()->id_persona;
        $data = DVPersona::where('id_persona', $id_persona)->first();
        $motivos = RecaudoMotivo::where('activo', true)->get();

        return view('site.solicitud_certificacion.index', compact('paises', 'data', 'motivos'));
    }

    public function solicitud_store()
    {

        return session()->flash('La solicitud ha sido creada exitosamente.');
    }

    public function listado_tramites(): View
    {
        return view('site.solicitud_certificacion.listado_tramites');
    }
}

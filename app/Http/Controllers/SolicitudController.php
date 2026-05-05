<?php

namespace App\Http\Controllers;

use App\Models\DVPais;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SolicitudController extends Controller
{
    public function index(): View
    {
        $paises = DVPais::all();
        return view('site.solicitud_certificacion.index', compact('paises'));
    }

    public function listado_tramites(): View
    {
        return view('site.solicitud_certificacion.listado_tramites');
    }
}

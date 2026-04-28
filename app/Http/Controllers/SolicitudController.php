<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SolicitudController extends Controller
{
    public function index(): View
    {
        return view('site.solicitud_certificacion.index');
    }

    public function listado_tramites(): View
    {
        return view('site.solicitud_certificacion.listado_tramites');
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UsuarioController;

// Rutas públicas:

Route::get('/', function () {
    return redirect()->route('login');
});

# Registro de personas:
Route::post('/cedula', [RegistroController::class, 'buscar_cedula'])->name('consulta.cedula');
Route::prefix('ubicacion')->group(function () {
    Route::get('/municipios/{estado_id}', [RegistroController::class, 'getMunicipios']);
    Route::get('/parroquias/{municipio_id}', [RegistroController::class, 'getParroquias']);
});


Route::get('/requisitos', [LoginController::class, 'requisitos'])->name('requisitos');

Route::group(['prefix' => 'recuperar', 'controller' => LoginController::class], function () {
    Route::get('/clave', 'recuperar_clave')->name('recuperar.clave');
    Route::get('/usuario', 'recuperar_usuario')->name('recuperar.usuario');
});





// Rutas protegidas por autenticación.

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [UsuarioController::class, 'index'])->name('usuario.bienvenida');

    Route::controller(UsuarioController::class)->prefix('usuario')->name('usuario.')->group(function () {
        Route::get('/perfil', 'perfil')->name('perfil');
        Route::get('/cambio_preguntas', 'preguntas_seguridad')->name('preguntas');
        Route::get('/cambio_correo', 'correo_electronico_nuevo')->name('correo');
        Route::get('/cambio_clave', 'clave_nueva')->name('clave');
    });

    Route::controller(SolicitudController::class)->prefix('solicitud')->name('solicitud.')->group(function () {
        Route::get('/certificado', 'index')->name('certificado');
        Route::get('/tramites', 'listado_tramites')->name('listado');
    });
});

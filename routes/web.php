<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SolicitudController;


Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/requisitos', [LoginController::class, 'requisitos'])->name('requisitos');


// Vista inicial (donde el usuario escribe la cédula)
Route::get('/buscar_cedula', [RegistroController::class, 'index'])->name('consulta.cedula');
Route::post('/cedula_usuario', [RegistroController::class, 'get_cedula'])->name('buscar.cedula');
Route::get('/datos/registro', [RegistroController::class, 'get_datos_encontrados'])->name('registro.final');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.usuario.store');

# Selects anidados
Route::prefix('ubicacion')->group(function () {
    Route::get('/municipios/{estado_id}', [RegistroController::class, 'getMunicipios'])
        ->name('ubicacion.municipios');
    Route::get('/parroquias/{municipio_id}', [RegistroController::class, 'getParroquias'])
        ->name('ubicacion.parroquias');
});

Route::group(['prefix' => 'recuperar', 'controller' => LoginController::class], function () {
    Route::get('/clave', 'recuperar_clave')->name('recuperar.clave');
    Route::get('/usuario', 'recuperar_usuario')->name('recuperar.usuario');
});

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

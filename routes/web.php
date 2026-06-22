<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SolicitudController;

# Para el banco:
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login',      [LoginController::class, 'index'])->name('login');
Route::get('/requisitos', [LoginController::class, 'requisitos'])->name('requisitos');

// Vista inicial (donde el usuario escribe la cédula):
Route::get('/buscar_cedula',   [RegistroController::class, 'index'])->name('consulta.cedula');
Route::post('/cedula_usuario', [RegistroController::class, 'get_cedula'])->name('buscar.cedula');
Route::get('/datos/registro',  [RegistroController::class, 'get_datos_encontrados'])->name('registro.final');
Route::post('/registro',       [RegistroController::class, 'store'])->name('registro.usuario.store');

# Selects anidados:
Route::prefix('ubicacion')->group(function () {
    Route::get('/municipios/{estado_id}',    [RegistroController::class, 'getMunicipios'])->name('ubicacion.municipios');
    Route::get('/parroquias/{municipio_id}', [RegistroController::class, 'getParroquias'])->name('ubicacion.parroquias');
});

Route::group(['prefix' => 'recuperar', 'controller' => LoginController::class], function () {

    Route::get('/clave', 'recuperar_clave')->name('recuperar.clave');
    Route::put('/clave/recuperar', 'recuperar_clave_update')->name('recuperar.clave.update');

    Route::get('/usuario', 'recuperar_usuario')->name('recuperar.usuario');
    Route::get('/usuario/preguntas', 'preguntas_seguridad')->name('recuperar.usuario.preguntas');
    Route::get('/usuario/info', function () {
        return redirect()->route('recuperar.usuario');
    });
    Route::post('/usuario/info', 'consultar_usuario')->name('busqueda.usuario');
    Route::post('/usuario/correo', 'recuperar_correo')->name('recuperar.correo.usuario');
});

Route::middleware(['auth', 'verified', \App\Http\Middleware\EnsurePasswordResetCompleted::class])->group(function () {

    Route::get('/dashboard', [UsuarioController::class, 'index'])->name('usuario.bienvenida');

    Route::controller(UsuarioController::class)->prefix('perfil')->name('usuario.')->group(function () {

        Route::get('/indice', 'perfil')->name('perfil');

        Route::get('/cambio_preguntas', 'preguntas_seguridad')->name('preguntas');
        Route::post('/preguntas/update', 'preguntas_update')->name('preguntas.update');

        Route::get('/cambio_correo', 'email_nuevo')->name('email');
        Route::put('/correo/update', 'email_update')->name('email.update');

        Route::get('/cambio_clave', 'clave_nueva')->name('clave');
        Route::put('/clave/update', 'clave_update')->name('clave.update');

        Route::get('/cambio_clave_obligatorio', 'clave_obligatoria')->name('clave.obligatoria');
        Route::put('/cambio_clave_obligatorio_update', 'cambio_clave_obligatorio_update')->name('clave.obligatoria.update');
    });

    Route::controller(SolicitudController::class)->prefix('solicitud')->name('solicitud.')->group(function () {

        Route::get('/nueva_solicitud', 'index')->name('crear')->middleware(\App\Http\Middleware\EnsureHasSecurityQuestions::class);
        Route::post('/nueva_solicitud/registro', 'solicitud_store')->name('store')->middleware(\App\Http\Middleware\EnsureHasSecurityQuestions::class);

        Route::get('/tramites', 'listado_tramites')->name('listado');
        Route::get('/tramite/certificado/{num_tramite}', 'get_certificado_seleccionado')->name('pdf');
        Route::get('/tramite/comprobante/{num_tramite}', 'get_comprobante_seleccionado')->name('pdf.comprobante');

        Route::get('/tramite/informacion', 'informacion')->name('informacion');
    });
});

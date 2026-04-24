<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

// Rutas públicas

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/requisitos', [LoginController::class, 'requisitos'])->name('requisitos');

Route::group(['prefix' => 'recuperar', 'controller' => LoginController::class], function () {
    Route::get('/clave', 'recuperar_clave')->name('recuperar.clave');
    Route::get('/usuario', 'recuperar_usuario')->name('recuperar.usuario');
});

// Rutas protegidas por autenticación.

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('usuario.bienvenida');
    Route::get('/perfil', [UserController::class, 'perfil'])->name('usuario.perfil');
});

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabla de Usuarios
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre');
            $table->string('correo_electronico')->unique();
            $table->timestamp('verificacion_correo_en')->nullable();
            $table->string('contrasena');
            $table->rememberToken(); 
            $table->timestamps(); 
        });

        // Tabla de Tokens para restablecer contraseña
        Schema::create('tokens_restablecimiento_contrasena', function (Blueprint $table) {
            $table->string('correo_electronico')->primary();
            $table->string('token');
            $table->timestamp('creado_at')->nullable();
        });

        // Tabla de Sesiones de usuario
        Schema::create('sesiones', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('usuario_id')->nullable()->index(); // Relación con la tabla usuarios
            $table->string('direccion_ip', 45)->nullable();
            $table->text('agente_usuario')->nullable();
            $table->longText('carga_util'); // El contenido de la sesión
            $table->integer('ultima_actividad')->index();
        });
    }

    /**
     * Revierte las migraciones (Elimina las tablas).
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('tokens_restablecimiento_contrasena');
        Schema::dropIfExists('sesiones');
    }
};

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
            $table->foreignId('user_id')->nullable()->index(); // Laravel busca 'user_id'
            $table->string('ip_address', 45)->nullable();     // Laravel busca 'ip_address'
            $table->text('user_agent')->nullable();           // Laravel busca 'user_agent'
            $table->longText('payload');                      // Laravel busca 'payload'
            $table->integer('last_activity')->index();        // Laravel busca 'last_activity'
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

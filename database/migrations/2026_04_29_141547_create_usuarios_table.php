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
            $table->string('email', 255)->unique();
             $table->string('id_persona', 35);

            // String es mejor para manejar formatos de teléfono
            $table->string('telefono_celular', 35);
            $table->string('telefono_local', 35);

            // Relaciones geograficas
            $table->foreignId('estado_id')->constrained('estados');
            $table->foreignId('municipio_id')->constrained('municipios');
            $table->foreignId('parroquia_id')->constrained('parroquias');
            $table->foreignId('profesion_id')->constrained('profesiones');

            $table->string('direccion', 500);
            $table->string('contrasena');

            $table->boolean('estatus_contrasena_reiniciada')->default(false);
            $table->timestamp('verificacion_correo_en')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Tabla de Tokens para restablecer contraseña
        Schema::create('tokens_restablecimiento_contrasena', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('creado_at')->nullable();
        });

        // Tabla de Sesiones de usuario
        Schema::create('sesiones', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index()->constrained('usuarios')->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesiones');
        Schema::dropIfExists('tokens_restablecimiento_contrasena');
        Schema::dropIfExists('usuarios');
    }
};

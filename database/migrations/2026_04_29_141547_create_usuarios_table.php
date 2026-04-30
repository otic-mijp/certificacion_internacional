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
            $table->char('letra_cedula', 1);
            $table->unsignedInteger('cedula')->unique();
            $table->string('correo_electronico', 255)->unique()->index();
            $table->string('nombres', 50);
            $table->string('primer_apellido', 100);
            $table->string('segundo_apellido', 100)->nullable();
            $table->date('fecha_nacimiento');
            $table->char('sexo', 1);
            
            // Ajuste: Cambiado de integer a string para evitar errores de longitud y ceros a la izquierda
            $table->string('telefono_celular', 15); 
            $table->string('telefono_local', 15); 

            // Relaciones
            $table->foreignId('estado_id')->constrained('estados');
            $table->foreignId('municipio_id')->constrained('municipios');
            $table->foreignId('parroquia_id')->constrained('parroquias');
            $table->foreignId('profesion_id')->constrained('profesiones');
            
            $table->string('direccion', 500);
            $table->string('contrasena');
            $table->timestamp('verificacion_correo_en')->nullable();
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
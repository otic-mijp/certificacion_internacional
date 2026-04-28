<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        // Accedemos a la tabla 'usuarios' que creamos anteriormente
        Schema::table('usuarios', function (Blueprint $table) {
            $table->text('secreto_doble_factor')
                ->after('contrasena') // Se coloca justo después de la contraseña
                ->nullable();

            $table->text('codigos_recuperacion_doble_factor')
                ->after('secreto_doble_factor')
                ->nullable();

            $table->timestamp('confirmacion_doble_factor_en')
                ->after('codigos_recuperacion_doble_factor')
                ->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn([
                'secreto_doble_factor',
                'codigos_recuperacion_doble_factor',
                'confirmacion_doble_factor_en',
            ]);
        });
    }
};
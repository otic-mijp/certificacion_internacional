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
        Schema::create('solicitud_especial', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cedula');
            $table->char('nacionalidad', 1);
            $table->string('nombres', 100);
            $table->string('primer_apellido', 100);
            $table->string('segundo_apellido', 100);
            $table->string('pais', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_especial');
    }
};

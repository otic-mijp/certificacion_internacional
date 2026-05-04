<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PreguntaSeguridad;

class PreguntasSeguridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preguntas = [
            ['pregunta' => '¿Cuál es el nombre de la calle donde vivías a los 10 años?'],
            ['pregunta' => '¿Cuál fue el primer libro que leíste de principio a fin?'],
            ['pregunta' => '¿Cuál es el nombre del hospital donde naciste?'],
            ['pregunta' => '¿Cuál era el apellido de tu profesor favorito en la secundaria?'],
            ['pregunta' => '¿Cuál fue el destino de tu primer viaje en avión?'],
            ['pregunta' => '¿Cuál es el nombre de la empresa de tu primer trabajo?'],
            ['pregunta' => '¿Qué marca era el primer celular que tuviste?'],
        ];

        foreach ($preguntas as $p) {
            PreguntaSeguridad::updateOrCreate(
                ['pregunta' => $p['pregunta']],
                $p
            );
        }
    }
}

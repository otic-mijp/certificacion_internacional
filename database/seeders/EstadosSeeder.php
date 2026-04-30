<?php

namespace Database\Seeders;

use App\Models\Estado; // Asegúrate de tener el modelo
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    public function run(): void
    {
        $estados = [
            'amazonas',
            'anzoátegui',
            'apure',
            'aragua',
            'barinas',
            'bolívar',
            'carabobo',
            'cojedes',
            'delta amacuro',
            'distrito capital',
            'falcón',
            'guárico',
            'la guaira',
            'lara',
            'mérida',
            'miranda',
            'monagas',
            'nueva esparta',
            'portuguesa',
            'sucre',
            'táchira',
            'trujillo',
            'yaracuy',
            'zulia'
        ];

        foreach ($estados as $nombre) {
            Estado::firstOrCreate(['nombre' => $nombre]);
        }
    }
}

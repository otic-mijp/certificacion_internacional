<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            ['nombre' => 'amazonas'],
            ['nombre' => 'anzoátegui'],
            ['nombre' => 'apure'],
            ['nombre' => 'aragua'],
            ['nombre' => 'barinas'],
            ['nombre' => 'bolívar'],
            ['nombre' => 'carabobo'],
            ['nombre' => 'cojedes'],
            ['nombre' => 'delta amacuro'],
            ['nombre' => 'distrito capital'],
            ['nombre' => 'falcón'],
            ['nombre' => 'guárico'],
            ['nombre' => 'la guaira'],
            ['nombre' => 'lara'],
            ['nombre' => 'mérida'],
            ['nombre' => 'miranda'],
            ['nombre' => 'monagas'],
            ['nombre' => 'nueva esparta'],
            ['nombre' => 'portuguesa'],
            ['nombre' => 'sucre'],
            ['nombre' => 'táchira'],
            ['nombre' => 'trujillo'],
            ['nombre' => 'yaracuy'],
            ['nombre' => 'zulia'],
        ];

        DB::table('estados')->insert($estados);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Crear un usuario administrador o de prueba fijo
        User::create([
            'name' => 'Admin Usuario',
            'email' => 'admin@correo.gob.ve',
            'password' => 'CCbb03**',
            'email_verified_at' => now(),
        ]);

        // 2. Crear 50 usuarios aleatorios usando el Factory
        // User::factory(50)->create();
    }
}

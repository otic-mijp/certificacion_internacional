<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Asegurarnos de que exista un país, una parroquia y una profesión
        // Usamos firstOrCreate para no duplicar si ya existen
        $pais = DB::table('paises')->updateOrInsert(['id' => 1], ['nombre' => 'Venezuela']);
        $profesion = DB::table('profesiones')->updateOrInsert(['id' => 1], ['nombre' => 'Ingeniero']);
        // Nota: Si parroquias depende de estados/municipios, esto podría ser más complejo.
        // Por ahora, si es nullable en la migración, mejor envíalo como null.

        Usuario::create([
            'nombres'           => 'Pedro José',
            'primer_apellido'   => 'Castillo',
            'segundo_apellido'  => 'Rivas',
            'cedula'            => 12345678,
            'fecha_nacimiento'  => '1985-10-20',
            'sexo'              => 'M',
            'pais_id'           => 1, // Ahora estamos seguros de que existe el ID 1
            'parroquia_id'      => null, // Ponlo en null si no tienes el seeder de parroquias listo
            'profesion_id'      => 1,
            'correo_electronico' => 'admin@certificacion.com',
            'contrasena'        => Hash::make('admin1234'),
            'verificacion_correo_en' => now(),
        ]);
    }
}

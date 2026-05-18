<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PopupSetting;
use Illuminate\Support\Facades\File;

class PopupSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $rutaImagen1 = public_path('img/informacion.jpg');
        PopupSetting::create([
            'titulo' => '¡Promoción de Temporada y Avisos PC!',
            'popup_principal' => true,
            // Usamos fopen para abrirlo como binario puro
            'imagen_data' => File::exists($rutaImagen1) ? fopen($rutaImagen1, 'r') : null,
        ]);

        // 2. Imagen Secundaria (Fila 2)
        $rutaImagen2 = public_path('img/informacion.jpg');
        PopupSetting::create([
            'titulo' => 'Aviso Importante para Versión Móvil',
            'popup_principal' => false,
            // Usamos fopen para abrirlo como binario puro
            'imagen_data' => File::exists($rutaImagen2) ? fopen($rutaImagen2, 'r') : null,
        ]);
    }
}

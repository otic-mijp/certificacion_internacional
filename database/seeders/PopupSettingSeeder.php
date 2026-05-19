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
            'titulo' => 'Popup para mostrarse en el login',
            'popup_principal' => true,
            'imagen_data' => File::exists($rutaImagen1) ? fopen($rutaImagen1, 'r') : null,
        ]);

        // 2. Imagen Secundaria (Fila 2)
        $rutaImagen2 = public_path('img/informacion.jpg');
        PopupSetting::create([
            'titulo' => 'Popup para mostrarse adentro de la web (informativo).',
            'popup_principal' => false,
            'imagen_data' => File::exists($rutaImagen2) ? fopen($rutaImagen2, 'r') : null,
        ]);
    }
}

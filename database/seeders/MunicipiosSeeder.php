<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            'amazonas' => ['alto orinoco', 'atabapo', 'atures', 'autana', 'manapiare', 'maroa', 'río negro'],
            'anzoátegui' => ['anaco', 'aragua', 'diego bautista urbaneja', 'fernando de peñalver', 'francisco de carmen carvajal', 'francisco de miranda', 'guanta', 'independencia', 'josé gregorio monagas', 'juan antonio sotillo', 'juan manuel cajigal', 'libertad', 'manuel ezequiel bruzual', 'pedro maría freites', 'píritu', 'san josé de guanipa', 'san juan de capistrano', 'santa ana', 'simón bolívar', 'simón rodríguez', 'sir arthur mcgregor'],
            'apure' => ['achaguas', 'biruaca', 'muñoz', 'páez', 'pedro camejo', 'rómulo gallegos', 'san fernando'],
            'aragua' => ['bolívar', 'camatagua', 'francisco linares alcántara', 'girardot', 'josé ángel lamas', 'josé félix ribas', 'josé rafael revenga', 'libertador', 'mario briceño iragorry', 'ocumare de la costa de oro', 'san casimiro', 'san sebastián', 'santiago mariño', 'santos michelena', 'sucre', 'tovar', 'urdaneta', 'zamora'],
            'barinas' => ['alberto arvelo torrealba', 'andrés eloy blanco', 'antonio josé de sucre', 'arismendi', 'barinas', 'bolívar', 'cruz paredes', 'ezequiel zamora', 'obispos', 'pedraza', 'rojas', 'sosa'],
            'bolívar' => ['angostura', 'caroní', 'cedeño', 'el callao', 'gran sabana', 'heres', 'padre pedro chien', 'piar', 'rososcio', 'sifontes', 'sucre'],
            'carabobo' => ['bejuma', 'carlos arvelo', 'diego ibarra', 'guacara', 'juan josé mora', 'libertador', 'los guayos', 'miranda', 'montalbán', 'naguanagua', 'puerto cabello', 'san diego', 'san joaquín', 'valencia'],
            'cojedes' => ['anzoátegui', 'falcón', 'girardot', 'lima blanco', 'pao de san juan bautista', 'ricaurte', 'rómulo gallegos', 'san carlos', 'tinaco'],
            'delta amacuro' => ['antonio díaz', 'casacoima', 'pedernales', 'tucupita'],
            'distrito capital' => ['libertador'],
            'falcón' => ['acosta', 'bolívar', 'buchivacoa', 'cacique manaure', 'carirubana', 'colina', 'dabajuro', 'democracia', 'falcón', 'federación', 'jacura', 'los taques', 'mauroa', 'miranda', 'monseñor iturriza', 'palmasola', 'petit', 'píritu', 'san francisco', 'sucre', 'silva', 'tocópero', 'unión', 'urumaco', 'zamora'],
            'guárico' => ['camaguán', 'chaguaramas', 'el socorro', 'francisco de miranda', 'josé félix ribas', 'josé tadeo monagas', 'juan germán roscio', 'julián mellado', 'las mercedes', 'leonardo infante', 'ortiz', 'pedro zaraza', 'san gerónimo de guayabal', 'san josé de guaribe', 'santa maría de ipire'],
            'la guaira' => ['vargas'],
            'lara' => ['andrés eloy blanco', 'crespo', 'iribarren', 'jiménez', 'morán', 'palavecino', 'simón planas', 'torres', 'urdaneta'],
            'mérida' => ['alberto adriani', 'andrés bello', 'antonio pinto salinas', 'aricagua', 'arzobispo chacón', 'campo elías', 'caracciolo parra olmedo', 'cardenal quintero', 'guaraque', 'julio césar salas', 'justo briceño', 'libertador', 'miranda', 'obispo ramos de lora', 'padre noguera', 'pueblo llano', 'rangel', 'rivas dávila', 'santos marquina', 'sucre', 'tovar', 'tulio febres cordero', 'zea'],
            'miranda' => ['acevedo', 'andrés bello', 'baruta', 'brión', 'buroz', 'carrizal', 'chacao', 'cristóbal rojas', 'el hatillo', 'guaicaipuro', 'independencia', 'lander', 'los salias', 'páez', 'paz castillo', 'pedro gual', 'plaza', 'simón bolívar', 'sucre', 'urdaneta', 'zamora'],
            'monagas' => ['acosta', 'aguasay', 'bolívar', 'caripe', 'cedeño', 'ezequiel zamora', 'libertador', 'maturín', 'piar', 'punceres', 'santa bárbara', 'sotillo', 'uracoa'],
            'nueva esparta' => ['antolín del campo', 'arismendi', 'díaz', 'garcía', 'gómez', 'maneiro', 'marcano', 'mariño', 'península de macanao', 'tubores', 'villalba'],
            'portuguesa' => ['agua blanca', 'araure', 'esteller', 'guanare', 'guanarito', 'monseñor josé vicente de unda', 'ospino', 'páez', 'papelón', 'san genaro de boconoíto', 'san rafael de onoto', 'santa rosalía', 'sucre', 'turén'],
            'sucre' => ['andrés eloy blanco', 'andrés mata', 'arismendi', 'benítez', 'bermúdez', 'bolívar', 'cajigal', 'cruz salmerón acosta', 'libertador', 'mariño', 'mejía', 'montes', 'ribero', 'sucre', 'valdez'],
            'táchira' => ['andrés bello', 'antonio rómulo costa', 'ayacucho', 'bolívar', 'cárdenas', 'córdoba', 'fernández feo', 'francisco de miranda', 'garcía de hevia', 'guásimos', 'independencia', 'jáuregui', 'josé maría vargas', 'junín', 'libertad', 'libertador', 'lobatera', 'michelena', 'panamericano', 'pedro maría ureña', 'rafael urdaneta', 'samuel darío maldonado', 'san cristóbal', 'san judas tadeo', 'seboruco', 'simón rodríguez', 'sucre', 'torbes', 'uribante'],
            'trujillo' => ['andrés bello', 'boconó', 'bolívar', 'candelaria', 'carache', 'escuque', 'josé felipe márquez cañizales', 'juan vicente campos elías', 'la ceiba', 'miranda', 'monte carmelo', 'motatán', 'pampán', 'pampanito', 'rafael rangel', 'san rafael de carvajal', 'sucre', 'trujillo', 'urdaneta', 'valera'],
            'yaracuy' => ['arístides bastidas', 'bolívar', 'bruzual', 'cocorote', 'independencia', 'josé antonio páez', 'la trinidad', 'manuel monge', 'nirgua', 'peña', 'san felipe', 'sucre', 'urachiche', 'veroes'],
            'zulia' => ['almirante padilla', 'baralt', 'cabimas', 'catatumbo', 'colón', 'francisco javier pulgar', 'jesús enrique lossada', 'jesús maría semprún', 'la cañada de urdaneta', 'lagunillas', 'machiques de perijá', 'mara', 'maracaibo', 'miranda', 'páez', 'rosario de perijá', 'san francisco', 'santa rita', 'simón bolívar', 'sucre', 'valmore rodríguez'],
        ];

        // Obtenemos todos los estados registrados para mapear nombres -> IDs
        // lowercase para asegurar coincidencia sin importar mayúsculas
        $estadosMap = DB::table('estados')->get()->mapWithKeys(function ($item) {
            return [strtolower($item->nombre) => $item->id];
        });

        $now = now();

        foreach ($data as $nombreEstado => $municipios) {
            $estadoId = $estadosMap[$nombreEstado] ?? null;

            if ($estadoId) {
                $insertData = [];
                foreach ($municipios as $municipio) {
                    $insertData[] = [
                        'nombre'    => mb_convert_case($municipio, MB_CASE_TITLE, "UTF-8"),
                        'estado_id' => $estadoId,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
                // Insertamos en lotes por estado para máxima eficiencia
                DB::table('municipios')->insert($insertData);
            }
        }
    }
}

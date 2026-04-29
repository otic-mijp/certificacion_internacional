<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParroquiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        // --- amazonas ---
        $amazonas = [
            'alto orinoco' => ['la esmeralda', 'huachamacare', 'marawaka', 'mavaca', 'sierra parima'],
            'atabapo' => ['san fernando de atabapo', 'ucata', 'yapacana', 'caname'],
            'atures' => ['fernando girón tovar', 'luis alberto gómez', 'pahueña', 'platanillal'],
            'autana' => ['isla ratón', 'samariapo', 'sipapo', 'munduapo', 'guayapo'],
            'manapiare' => ['san juan de manapiare', 'alto ventuari', 'medio ventuari', 'bajo ventuari'],
            'maroa' => ['maroa', 'victorino', 'comunidad'],
            'río negro' => ['san carlos de río negro', 'solano', 'casiquiare', 'cocuy'],
        ];

        foreach ($amazonas as $municipio => $parroquias) {

            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');

            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- anzoátegui ---
        $anzoategui = [
            'anaco' => ['anaco', 'san joaquín'],
            'aragua' => ['aragua de barcelona', 'cachipo'],
            'diego bautista urbaneja' => ['lechería', 'el morro'],
            'fernando de peñalver' => ['puerto píritu', 'san miguel', 'sucre'],
            'francisco de carmen carvajal' => ['valle de guanape', 'santa bárbara'],
            'francisco de miranda' => ['atapirire', 'boca del pao', 'el pao', 'pariaguán'],
            'guanta' => ['guanta', 'chorrerón'],
            'independencia' => ['mamo', 'soledad'],
            'josé gregorio monagas' => ['mapire', 'piar', 'santa clara', 'san diego de cabrutica', 'uverito', 'zuata'],
            'juan antonio sotillo' => ['puerto la cruz', 'pozuelos'],
            'juan manuel cajigal' => ['onoto', 'san pablo'],
            'libertad' => ['san mateo', 'el carito', 'santa inés', 'la romereña'],
            'manuel ezequiel bruzual' => ['clarines', 'guanape', 'sabana de uchire'],
            'pedro maría freites' => ['cantaura', 'libertador', 'santa rosa', 'urica'],
            'píritu' => ['píritu', 'san francisco'],
            'san josé de guanipa' => ['san josé de guanipa'],
            'san juan de capistrano' => ['boca de uchire', 'boca de chávez'],
            'santa ana' => ['santa ana', 'pueblo nuevo'],
            'simón bolívar' => ['bergatín', 'caigua', 'el carmen', 'el pilar', 'naricual', 'san cristóbal'],
            'simón rodríguez' => ['edmundo barrios', 'miguel otero silva'],
            'sir arthur mcgregor' => ['el chaparro', 'tomás alfaro calatrava'],
        ];

        foreach ($anzoategui as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- apure ---
        $apure = [
            'achaguas' => ['achaguas', 'apurito', 'el yagual', 'guachara', 'mucuritas', 'pachaco'],
            'biruaca' => ['biruaca'],
            'muñoz' => ['bruzual', 'mantecal', 'quintero', 'rincón hondo', 'san vicente'],
            'páez' => ['guasdualito', 'aramendi', 'el amparo', 'san camilo', 'urdaneta'],
            'pedro camejo' => ['san juan de payara', 'codazzi', 'cunaviche'],
            'rómulo gallegos' => ['elorza', 'la trinidad de orichuna'],
            'san fernando' => ['san fernando', 'peñalver', 'san rafael de atamaica', 'brunzual'],
        ];

        foreach ($apure as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- aragua ---
        $aragua = [
            'bolívar' => ['san mateo'],
            'camatagua' => ['camatagua', 'carmen de cura'],
            'francisco linares alcántara' => ['santa rita', 'francisco de miranda', 'monseñor feliciano gonzález'],
            'girardot' => ['choroní', 'las delicias', 'madre maría de san josé', 'joaquín crespo', 'pedro josé ovalles', 'josé casanova godoy', 'andrés eloy blanco', 'los tacarigua'],
            'josé ángel lamas' => ['santa cruz'],
            'josé félix ribas' => ['la victoria', 'castor nieves ríos', 'las guacamayas', 'pao de zárate', 'zuata'],
            'josé rafael revenga' => ['el consejo'],
            'libertador' => ['palo negro', 'san martín de porres'],
            'mario briceño iragorry' => ['el limón', 'caña de azúcar'],
            'ocumare de la costa de oro' => ['ocumare de la costa'],
            'san casimiro' => ['san casimiro', 'güiripa', 'ollas de caramacate', 'valle morín'],
            'san sebastián' => ['san sebastián de los reyes'],
            'santiago mariño' => ['turmero', 'arevalo aponte', 'chuao', 'samán de güere', 'alfredo pacheco miranda'],
            'santos michelena' => ['las tejerías', 'tiara'],
            'sucre' => ['cagua', 'bella vista'],
            'tovar' => ['colonia tovar'],
            'urdaneta' => ['barbacoas', 'san francisco de cara', 'taguay', 'las peñitas'],
            'zamora' => ['villa de cura', 'magdaleno', 'san francisco de asís', 'valles de tucutunemo', 'augusto mijares'],
        ];

        foreach ($aragua as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- barinas ---
        $barinas = [
            'alberto arvelo torrealba' => ['sabaneta', 'rodríguez domínguez'],
            'andrés eloy blanco' => ['el cantón', 'santa cruz de guacas', 'puerto vivas'],
            'antonio josé de sucre' => ['bum bum', 'ticoporo', 'andrés bello'],
            'arismendi' => ['arismendi', 'guadarrama', 'la unión', 'san antonio'],
            'barinas' => ['barinas', 'alfredo arvelo larriva', 'san silvestre', 'santa inés', 'santa lucía', 'torumos', 'el carmen', 'rómulo betancourt', 'corazón de jesús', 'ramón ignacio méndez', 'alto barinas', 'manuel palacio fajardo', 'juan antonio rodríguez domínguez', 'domitila flores'],
            'bolívar' => ['barinitas', 'altamira de cáceres', 'calderas'],
            'cruz paredes' => ['barrancas', 'el socorro', 'masparrito'],
            'ezequiel zamora' => ['santa bárbara', 'pedro briceño méndez', 'ramón ignacio méndez', 'josé ignacio del pumar'],
            'obispos' => ['obispos', 'guasimitos', 'el real', 'la luz'],
            'pedraza' => ['ciudad bolivia', 'josé ignacio del pumar', 'páez', 'reyes cueto'],
            'rojas' => ['libertad', 'dolores', 'palacio fajardo', 'santa rosa'],
            'sosa' => ['ciudad de nutrias', 'el regalo', 'puerto de nutrias', 'santa catalina'],
        ];

        foreach ($barinas as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- bolívar ---
        $bolivar = [
            'angostura' => ['ciudad piar', 'san francisco', 'santa bárbara', 'barceloneta'],
            'caroní' => ['cachamay', 'chirica', 'dalla costa', 'once de abril', 'simón bolívar', 'unare', 'universidad', 'vista al sol', 'pozo verde', 'yocoima'],
            'cedeño' => ['caicara del orinoco', 'ascensión ennsenada', 'altagracia', 'la urbana', 'pijiguaos', 'quiribana'],
            'el callao' => ['el callao'],
            'gran sabana' => ['santa elena de uairén', 'ikabarú'],
            'heres' => ['catedral', 'agua salada', 'amaparo', 'casco histórico', 'la sabanita', 'marhuanta', 'josé antonio páez', 'orinoco', 'panapana', 'zea'],
            'padre pedro chien' => ['el palmar'],
            'piar' => ['upata', 'andrés eloy blanco', 'pedro cova'],
            'rososcio' => ['guasipati', 'salóm'],
            'sifontes' => ['tumeremo', 'dalla costa', 'san isidro'],
            'sucre' => ['maturín', 'aripao', 'guarataro', 'las majadas', 'moitaco'],
        ];

        foreach ($bolivar as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- carabobo ---
        $carabobo = [
            'bejuma' => ['bejuma', 'canoabo', 'simón bolívar'],
            'carlos arvelo' => ['güigüe', 'belén', 'tacarigua'],
            'diego ibarra' => ['mariara', 'aguas calientes'],
            'guacara' => ['guacara', 'ciudad alianza', 'yagua'],
            'juan josé mora' => ['morón', 'yagua'],
            'libertador' => ['tocuyito', 'independencia'],
            'los guayos' => ['los guayos'],
            'miranda' => ['miranda'],
            'montalbán' => ['montalbán'],
            'naguanagua' => ['naguanagua'],
            'puerto cabello' => ['bartolomé salóm', 'democracia', 'fraternidad', 'goaigoaza', 'juan josé flores', 'unión', 'borburata', 'patanemo'],
            'san diego' => ['san diego'],
            'san joaquín' => ['san joaquín'],
            'valencia' => ['candelaria', 'catedral', 'el socorro', 'miguel peña', 'rafael urdaneta', 'san blas', 'san josé', 'santa rosa', 'negro primero'],
        ];

        foreach ($carabobo as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- cojedes ---
        $cojedes = [
            'anzoátegui' => ['cojedes', 'juan de mata suárez'],
            'falcón' => ['tinaquillo'],
            'girardot' => ['el baúl', 'sucre'],
            'lima blanco' => ['macapo', 'la aguadita'],
            'pao de san juan bautista' => ['el pao'],
            'ricaurte' => ['libertad', 'el amparo'],
            'rómulo gallegos' => ['las vegas'],
            'san carlos' => ['san carlos de austria', 'juan ángel bravo', 'manuel manrique'],
            'tinaco' => ['general en jefe josé laurencio silva'],
        ];

        foreach ($cojedes as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- delta amacuro ---
        $delta_amacuro = [
            'antonio díaz' => ['curiapo', 'almirante luis brión', 'padre barral', 'santos de abelgas'],
            'casacoima' => ['sierra imataca', 'juan bautista arismendi', 'manuel piar', 'rómulo gallegos'],
            'pedernales' => ['pedernales', 'luis beltrán prieto figueroa'],
            'tucupita' => ['san josé', 'josé vidal marcano', 'juan millán', 'leonardo ruiz pineda', 'mariscal antonio josé de sucre', 'monseñor argimiro garcía', 'san rafael', 'virgen del valle'],
        ];

        foreach ($delta_amacuro as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- distrito capital ---
        $distrito_capital = [
            'libertador' => [
                'santa rosalía',
                'el recreo',
                'el valle',
                'coche',
                'caricuao',
                'macarao',
                'antímano',
                'la vega',
                'el paraíso',
                'san juan',
                'santa teresa',
                '23 de enero',
                'la pastora',
                'altagracia',
                'san josé',
                'san bernardino',
                'catedral',
                'la candelaria',
                'el junquito',
                'sucre',
                'san agustín',
                'santa mónica'
            ],
        ];

        foreach ($distrito_capital as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- falcón ---
        $falcon = [
            'acosta' => ['san juan de los cayos', 'capadare', 'la pastora', 'libertador'],
            'bolívar' => ['san luis', 'aracua', 'la peña'],
            'buchivacoa' => ['capatárida', 'borojó', 'seque', 'zazárida', 'bariro'],
            'cacique manaure' => ['yaracal'],
            'carirubana' => ['carirubana', 'punta cardón', 'santa ana', 'viento suave'],
            'colina' => ['la vela de coro', 'acurigua', 'guaibacoa', 'las calderas', 'macoruca'],
            'dabajuro' => ['dabajuro'],
            'democracia' => ['pedregal', 'agua clara', 'avaria', 'pedregal', 'piedra grande', 'purureche'],
            'falcón' => ['pueblo nuevo', 'adícora', 'baraived', 'buena vista', 'jadacaquiva', 'moruy', 'adaure', 'el vínculo', 'el hato'],
            'federación' => ['churuguara', 'agua larga', 'mapararí', 'el pao', 'paují'],
            'jacura' => ['jacura', 'agua linda', 'araurima'],
            'los taques' => ['los taques', 'judibana'],
            'mauroa' => ['mene de mauroa', 'san félix', 'casigua'],
            'miranda' => ['santa ana de coro', 'guzmán guillermo', 'mitare', 'río seco', 'sabaneta', 'san antonio', 'san gabriel'],
            'monseñor iturriza' => ['chichiriviche', 'boca de tocuyo', 'tocuyo de la costa'],
            'palmasola' => ['palmasola'],
            'petit' => ['cabure', 'colina', 'curimagua'],
            'píritu' => ['píritu', 'san josé de la costa'],
            'san francisco' => ['mirimire'],
            'sucre' => ['la cruz de taratara', 'sucre'],
            'silva' => ['tucacas', 'boca de aroa'],
            'tocópero' => ['tocópero'],
            'unión' => ['santa cruz de bucaral', 'el charal', 'las vegas del tuy'],
            'urumaco' => ['urumaco', 'bruzual'],
            'zamora' => ['puerto cumarebo', 'la ciénaga', 'la soledad', 'pueblo cumarebo', 'zazárida'],
        ];

        foreach ($falcon as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- guárico ---
        $guarico = [
            'camaguán' => ['camaguán', 'puerto miranda', 'uverito'],
            'chaguaramas' => ['chaguaramas'],
            'el socorro' => ['el socorro'],
            'francisco de miranda' => ['calabozo', 'el calvario', 'el rastro', 'guardatinajas'],
            'josé félix ribas' => ['tucupido', 'san rafael de laya'],
            'josé tadeo monagas' => ['altagracia de orituco', 'lezama', 'libertad de orituco', 'san francisco de macaira', 'san rafael de orituco', 'soublette', 'paso real de macaira'],
            'juan germán roscio' => ['san juan de los morros', 'cantagallo', 'parapara'],
            'julián mellado' => ['el sombrero', 'sosa'],
            'las mercedes' => ['las mercedes', 'cabruta', 'santa rita de manapire'],
            'leonardo infante' => ['valle de la pascua', 'espino'],
            'ortiz' => ['ortiz', 'san francisco de tiznados', 'san josé de tiznados', 'san lorenzo de tiznados'],
            'pedro zaraza' => ['zaraza', 'san josé de unare'],
            'san gerónimo de guayabal' => ['guayabal', 'cazorla'],
            'san josé de guaribe' => ['san josé de guaribe'],
            'santa maría de ipire' => ['santa maría de ipire', 'altamira'],
        ];

        foreach ($guarico as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- la guaira ---
        $la_guaira = [
            'vargas' => [
                'caraballeda',
                'carayaca',
                'carlos soublette',
                'caruao',
                'catia la mar',
                'el junko',
                'la guaira',
                'macuto',
                'maiquetía',
                'naiguatá',
                'urimare'
            ],
        ];

        foreach ($la_guaira as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- lara ---
        $lara = [
            'andrés eloy blanco' => ['sanaire', 'pío tamayo', 'yacambú'],
            'crespo' => ['freitez', 'josé maría blanco'],
            'iribarren' => ['catedral', 'concepción', 'el cují', 'juan de villegas', 'santa rosa', 'tamaca', 'unión', 'aguedo felipe alvarado', 'buena vista', 'juárez'],
            'jiménez' => ['juan bautista rodríguez', 'cuara', 'diego de lozada', 'paraíso de san josé', 'san miguel', 'tintorero', 'josé bernardo dorante'],
            'morán' => ['el tocuyo', 'anzoátegui', 'guarico', 'humocaro alto', 'humocaro bajo', 'morán', 'hilario luna y luna', 'la concordia'],
            'palavecino' => ['cabudare', 'josé gregorio bastidas', 'agua viva'],
            'simón planas' => ['sarare', 'buría', 'gustavo vega'],
            'torres' => ['trinidad samuel', 'antonio díaz', 'camacaro', 'castañeda', 'chiquinquirá', 'espinoza de los monteros', 'lara', 'las mercedes', 'manuel morillo', 'montaña verde', 'montes de oca', 'torres', 'heriberto arroyo', 'reyes vargas', 'altagracia', 'cecilio zubillaga'],
            'urdaneta' => ['siquisique', 'san miguel', 'xaguas', 'moroturo'],
        ];

        foreach ($lara as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- mérida ---
        $merida = [
            'alberto adriani' => ['presidente páez', 'presidente rómulo gallegos', 'presidente betancourt', 'héctor amable mora', 'josé nucete sardi', 'pulido méndez', 'gabriel picón gonzález'],
            'andrés bello' => ['la azulita'],
            'antonio pinto salinas' => ['santa cruz de mora', 'mesa bolívar', 'mesa de las palmas'],
            'aricagua' => ['aricagua', 'san antonio'],
            'arzobispo chacón' => ['canagua', 'capurí', 'chacantá', 'el molino', 'guaimaral', 'mucutuy', 'mucuchachí'],
            'campo elías' => ['fernández peña', 'matriz', 'montalbán', 'acequias', 'jají', 'la mesa', 'san josé'],
            'caracciolo parra olmedo' => ['tucaní', 'florencio ramírez'],
            'cardenal quintero' => ['santo domingo', 'las piedras'],
            'guaraque' => ['guaraque', 'mesa de quintero', 'río negro'],
            'julio césar salas' => ['arapuey', 'palmira'],
            'justo briceño' => ['torondoy', 'san cristóbal de torondoy'],
            'libertador' => ['antonio spinetti dini', 'arias', 'caracciolo parra pérez', 'domingo peña', 'el llano', 'gonzalo picón febres', 'jacinto plaza', 'juan rodríguez suárez', 'lasso de la vega', 'milla', 'osuna rodríguez', 'sagrario', 'santa ana', 'el morro', 'los nevados'],
            'miranda' => ['andrés eloy blanco', 'la venta', 'piñango', 'timotes'],
            'obispo ramos de lora' => ['santa elena de arenales', 'eloy paredes', 'san rafael de alcázar'],
            'padre noguera' => ['santa maría de caparo'],
            'pueblo llano' => ['pueblo llano'],
            'rangel' => ['mucuchíes', 'cacute', 'la toma', 'mucurubá', 'san rafael'],
            'rivas dávila' => ['bailadores', 'gerónimo maldonado'],
            'santos marquina' => ['tabay'],
            'sucre' => ['lagunillas', 'chiguará', 'estánquez', 'la trampa', 'pueblo nuevo del sur', 'san juan'],
            'tovar' => ['tovar', 'el llano', 'san francisco', 'el amparo'],
            'tulio febres cordero' => ['nueva bolivia', 'independencia', 'maría de la concepción palacios blanco', 'santa apolonia'],
            'zea' => ['zea', 'caño el tigre'],
        ];

        foreach ($merida as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- miranda ---
        $miranda = [
            'acevedo' => ['caucagua', 'araguita', 'arévalo gonzález', 'capaya', 'panaquire', 'ribas', 'el café', 'marizapa'],
            'andrés bello' => ['san josé de barlovento', 'cumbo'],
            'baruta' => ['baruta', 'el cafetal', 'las minas de baruta'],
            'brión' => ['higuerote', 'curiepe', 'tacarigua de brión'],
            'buroz' => ['mamporal'],
            'carrizal' => ['carrizal'],
            'chacao' => ['chacao'],
            'cristóbal rojas' => ['charallave', 'las brisas'],
            'el hatillo' => ['santa rosalía de palermo'],
            'guaicaipuro' => ['los teques', 'cecilio acosta', 'el jarillo', 'san pedro', 'tácata', 'paracotos', 'altagracia de la montaña'],
            'independencia' => ['santa teresa del tuy', 'el cartanal'],
            'lander' => ['ocumare del tuy', 'la democracia', 'santa bárbara'],
            'los salias' => ['san antonio de los altos'],
            'páez' => ['río chico', 'el guapo', 'tacarigua de la laguna', 'paparo', 'san fernando del guapo'],
            'paz castillo' => ['santa lucía del tuy'],
            'pedro gual' => ['cúpira', 'machurucuto'],
            'plaza' => ['guarenas'],
            'simón bolívar' => ['san francisco de yare', 'san antonio de yare'],
            'sucre' => ['petare', 'leoncio martínez', 'caucagüita', 'fila de mariches', 'la dolorita'],
            'urdaneta' => ['cúa', 'nueva cúa'],
            'zamora' => ['guatire', 'bolívar'],
        ];

        foreach ($miranda as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- monagas ---
        $monagas = [
            'acosta' => ['san antonio de maturín', 'san francisco de maturín'],
            'aguasay' => ['aguasay'],
            'bolívar' => ['caripito'],
            'caripe' => ['caripe', 'el guácharo', 'la guanota', 'sabana de piedra', 'san agustín', 'teresén'],
            'cedeño' => ['caicara de maturín', 'areo', 'ascensión de la cascade', 'san félix de cantalicio'],
            'ezequiel zamora' => ['punta de mata', 'el tejero'],
            'libertador' => ['temblador', 'tabasca', 'las alhuacas', 'chaguaramas'],
            'maturín' => ['alto de los godos', 'boquerón', 'las cocuizas', 'la pica', 'san simón', 'santa cruz', 'san vicente', 'el corozo', 'el furrial', 'jusepín'],
            'piar' => ['aragua de maturín', 'aparicio', 'chaguaramal', 'el pinto', 'guanaguana', 'la toscana', 'taguaya'],
            'punceres' => ['quiriquire', 'cachipo'],
            'santa bárbara' => ['santa bárbara'],
            'sotillo' => ['barrancas del orinoco', 'los barrancos de fajardo'],
            'uracoa' => ['uracoa'],
        ];

        foreach ($monagas as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- nueva esparta ---
        $nueva_esparta = [
            'antolín del campo' => ['antolín del campo'],
            'arismendi' => ['arismendi'],
            'díaz' => ['zabala', 'san juan bautista'],
            'garcía' => ['francisco fajardo', 'concepción'],
            'gómez' => ['santa ana', 'bolívar', 'matasiete', 'guevara', 'sucre'],
            'maneiro' => ['aguirre', 'pampatar'],
            'marcano' => ['adrián', 'juan griego'],
            'mariño' => ['porlamar'],
            'península de macanao' => ['san francisco', 'boca del río'],
            'tubores' => ['punta de piedras', 'los baleales'],
            'villalba' => ['san pedro de coche', 'vicente fuentes'],
        ];

        foreach ($nueva_esparta as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- portuguesa ---
        $portuguesa = [
            'agua blanca' => ['agua blanca'],
            'araure' => ['araure', 'río acarigua'],
            'esteller' => ['píritu', 'uveral'],
            'guanare' => ['guanare', 'córdoba', 'san josé de la montaña', 'san juan de guanaguanare', 'virgen de coromoto'],
            'guanarito' => ['guanarito', 'trinidad de la capilla', 'divina pastora'],
            'monseñor josé vicente de unda' => ['chabasquén'],
            'ospino' => ['ospino', 'aparición', 'la estación'],
            'páez' => ['acarigua', 'payara', 'pimpinela', 'ramón peraza'],
            'papelón' => ['papelón', 'caño delgadito'],
            'san genaro de boconoíto' => ['boconoíto', 'antolín tovar'],
            'san rafael de onoto' => ['san rafael de onoto', 'santa fe', 'thermo morales'],
            'santa rosalía' => ['el playón', 'florida'],
            'sucre' => ['biscucuy', 'concepción', 'san rafael de palo alzado', 'uvencio antonio velásquez', 'san josé de saguaz', 'villa rosa'],
            'turén' => ['villa bruzual', 'canelones', 'santa cruz', 'san isidro labrador'],
        ];

        foreach ($portuguesa as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- sucre ---
        $sucre = [
            'andrés eloy blanco' => ['casanay', 'mariño'],
            'andrés mata' => ['san josé de aerocuar', 'tavera acosta'],
            'arismendi' => ['río caribe', 'antonio josé de sucre', 'el morro de puerto santo', 'puerto santo', 'san juan de las galdonas'],
            'benítez' => ['el pilar', 'el rincón', 'general francisco antonio váquez', 'guaraúnos', 'tunapuicito', 'unión'],
            'bermúdez' => ['carúpano', 'santa catalina', 'santa rosa', 'santa teresa', 'bolívar'],
            'bolívar' => ['marigüitar'],
            'cajigal' => ['yaguaraparo', 'el paujil', 'libertad'],
            'cruz salmerón acosta' => ['araya', 'chacopata', 'manicuare'],
            'libertador' => ['tunapuy', 'campo elías'],
            'mariño' => ['irapa', 'campo claro', 'maraval', 'san antonio de irapa', 'soro'],
            'mejía' => ['san antonio del golfo'],
            'montes' => ['cumanacoa', 'arenas', 'aricagua', 'cocollar', 'san fernando', 'san lorenzo'],
            'ribero' => ['cariaco', 'catuaro', 'rendón', 'santa cruz', 'santa maría'],
            'sucre' => ['cumaná', 'altagracia', 'ayacucho', 'santa inés', 'valentín valiente', 'san juan', 'gran mariscal', 'raúl leoni'],
            'valdez' => ['güiria', 'cristóbal colón', 'bideau', 'punta de piedras'],
        ];

        foreach ($sucre as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- táchira ---
        $tachira = [
            'andrés bello' => ['cordero'],
            'antonio rómulo costa' => ['las mesas'],
            'ayacucho' => ['san juan de colón', 'san pedro del río', 'rivas berti'],
            'bolívar' => ['san antonio del táchira', 'palotal', 'juan vicente gómez', 'isaías medina angarita'],
            'cárdenas' => ['tariiba', 'amenodoro rangel lamús', 'la florida'],
            'córdoba' => ['santa ana del táchira'],
            'fernández feo' => ['san rafael del piñal', 'alberto adriani', 'santo domingo'],
            'francisco de miranda' => ['san josé de bolívar'],
            'garcía de hevia' => ['la fría', 'boca de grita', 'josé antonio páez'],
            'guásimos' => ['palmira'],
            'independencia' => ['capacho nuevo', 'juan germán roscio', 'román cárdenas'],
            'jáuregui' => ['la grita', 'emilio constantino guerrero', 'monseñor miguel antonio salas'],
            'josé maría vargas' => ['el cobre'],
            'junín' => ['rubio', 'bramón', 'la petrolea', 'quinimarí'],
            'libertad' => ['capacho viejo', 'cipriano castro', 'manuel felipe rugeles'],
            'libertador' => ['abejales', 'emeterio ochoa', 'doradas', 'san joaquín de navay'],
            'lobatera' => ['lobatera', 'constitución'],
            'michelena' => ['michelena'],
            'panamericano' => ['coloncito', 'la palmita'],
            'pedro maría ureña' => ['ureña', 'nueva arcadia'],
            'rafael urdaneta' => ['delicias'],
            'samuel darío maldonado' => ['la tendida', 'boconó', 'hernández'],
            'san cristóbal' => ['la concordia', 'san juan bautista', 'pedro maría morantes', 'san sebastián', 'francisco romero lobo'],
            'san judas tadeo' => ['umuquena'],
            'seboruco' => ['seboruco'],
            'simón rodríguez' => ['san simón'],
            'sucre' => ['queniquea', 'eleazar lópez contreras', 'san pablo'],
            'torbes' => ['san josecito'],
            'uribante' => ['pregonero', 'cárdenas', 'potosí', 'juan pablo peñalosa'],
        ];

        foreach ($tachira as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- trujillo ---
        $trujillo = [
            'andrés bello' => ['santa isabel'],
            'boconó' => ['boconó', 'el carmen', 'mosquey', 'ayacucho', 'burbusay', 'general rivas', 'guaramacal', 'vega de guaramacal', 'monseñor jáuregui', 'rafael rangel', 'san josé', 'san miguel'],
            'bolívar' => ['sabana de mendoza', 'junín', 'valmore rodríguez'],
            'candelaria' => ['chejendé', 'arnoldos gabaldón', 'bolivia', 'carrillo', 'cegarra', 'manuel salvador ulloa', 'san josé'],
            'carache' => ['carache', 'la concepción', 'cuicas', 'panamericana', 'santa cruz'],
            'escuque' => ['escuque', 'la unión', 'santa rita', 'sabana libre'],
            'josé felipe márquez cañizalez' => ['el paradero', 'los caprichos', 'ricardo vivas'],
            'juan vicente campos elías' => ['campo elías', 'arnoldos gabaldón'],
            'la ceiba' => ['la ceiba', 'el progreso'],
            'miranda' => ['el dividive', 'agua santa', 'agua caliente', 'el cenizo', 'valerita'],
            'monte carmelo' => ['monte carmelo', 'buena vista', 'santa maría del horcón'],
            'motatán' => ['motatán', 'el baño', 'jalisco'],
            'pampán' => ['pampán', 'flor de patria', 'la paz', 'santa ana'],
            'pampanito' => ['pampanito', 'la concepción', 'pampanito ii'],
            'rafael rangel' => ['betijoque', 'la pueblita', 'los cedros', 'josé gregorio hernández'],
            'san rafael de carvajal' => ['carvajal', 'campo alegre', 'antonio nicolás briceño', 'josé leonardo suárez'],
            'sucre' => ['sabana de mare', 'cheregüé', 'granados'],
            'trujillo' => ['cristóbal mendoza', 'chiquinquirá', 'matriz', 'monseñor carrillo', 'cruz carrillo', 'andrés linares', 'tres esquinas'],
            'urdaneta' => ['la quebrada', 'cabimbú', 'jajó', 'la mesa de esnujaque', 'santiago', 'tuñame', 'tuñame'],
            'valera' => ['juan ignacio montilla', 'la beatriz', 'la puerta', 'mendoza del valle de momboy', 'mercedes díaz', 'san luis'],
        ];

        foreach ($trujillo as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }

        // --- zulia ---
        $zulia = [
            'almirante padilla' => ['isla de guasare', 'monagas'],
            'baralt' => ['san timoteo', 'general urdaneta', 'libertador', 'marcelino briceño', 'pueblo nuevo', 'manuel guanipa matos'],
            'cabimas' => ['ambrosio', 'carmen herrera', 'la rosa', 'germán ríos linares', 'san benito', 'rómulo betancourt', 'jorge hernández', 'arístides calvani', 'punta gorda'],
            'catatumbo' => ['encontrados', 'udón pérez'],
            'colón' => ['moralito', 'san carlos del zulia', 'santa cruz del zulia', 'santa bárbara', 'urribarrí'],
            'francisco javier pulgar' => ['simón rodríguez', 'carlos quevedo', 'francisco javier pulgar', 'agustín codazzi'],
            'jesús enrique lossada' => ['la concepción', 'san josé', 'mariano parra león', 'josé ramón yépez'],
            'jesús maría semprún' => ['jesús maría semprún', 'barí'],
            'la cañada de urdaneta' => ['concepción', 'andrés bello', 'chiquinquirá', 'el carmelo', 'potreritos'],
            'lagunillas' => ['alonso de ojeda', 'libertad', 'campo lara', 'eleazar lópez contreras', 'venezuela'],
            'machiques de perijá' => ['machiques', 'libertad', 'río negro', 'san josé de perijá'],
            'mara' => ['san rafael', 'la sierrita', 'las parcelas', 'luis de vicente', 'monseñor marcos sergio godoy', 'ricaurte', 'tamare'],
            'maracaibo' => ['antonio borjas romero', 'bolívar', 'cacique mara', 'caracciolo parra pérez', 'cecilio acosta', 'cristo de aranza', 'coquivacoa', 'chiquinquirá', 'francisco eugenio bustamante', 'idelfonso vásquez', 'juana de ávila', 'luis hurtado higuera', 'manuel dagnino', 'olegario villalobos', 'santa lucía', 'venancio pulgar', 'san isidro'],
            'miranda' => ['altagracia', 'faria', 'ana maría campos', 'san antonio', 'san josé'],
            'guajira' => ['alta guajira', 'elias sánchez rubio', 'guajira', 'sinamaica'],
            'rosario de perijá' => ['rosario', 'donaldo garcía', 'sixto zambrano'],
            'san francisco' => ['san francisco', 'el bajo', 'domitila flores', 'francisco ochoa', 'los cortijos', 'marcial hernández', 'josé domingo rus'],
            'santa rita' => ['santa rita', 'el mene', 'pedro lucas urribarrí', 'josé cenobio urribarrí'],
            'simón bolívar' => ['rafael maria baralt', 'manuel manrique', 'rafael urdaneta'],
            'sucre' => ['bobures', 'gibraltar', 'heriberto arroyo', 'valmore rodríguez', 'rómulo gallegos', 'el batey'],
            'valmore rodríguez' => ['rafael urdaneta', 'la victoria', 'raúl cuenca'],
        ];

        foreach ($zulia as $municipio => $parroquias) {
            $municipioid = db::table('municipios')->where('nombre', $municipio)->value('id');
            if ($municipioid) {
                foreach ($parroquias as $parroquia) {
                    db::table('parroquias')->insert([
                        'nombre' => $parroquia,
                        'municipio_id' => $municipioid,
                    ]);
                }
            }
        }
    }
}

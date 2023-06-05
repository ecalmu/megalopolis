<?
header("Content-type: application/json");

include "conexion.php";

// $resultado = [
//     "0" => [
//         "0" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "1" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "2" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "3" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "4" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "5" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "6" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "7" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "8" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "9" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "10" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "11" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ]
//     ],
//     "1" => [
//         "0" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "1" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "2" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "3" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "4" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "5" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "6" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "7" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "8" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "9" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "10" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "11" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ] 
//     ],
//     "2" => [
//         "0" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "1" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "2" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "3" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "4" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "5" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "6" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "7" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "8" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "9" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ] ,
//         "10" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "11" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ] 
//     ],
//     "3" => [
//         "0" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "1" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "2" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "3" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "4" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "5" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "6" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "7" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "8" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "9" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "10" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "11" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ] 
//     ],
//     "4" => [
//         "0" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "1" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "2" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "3" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "4" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "5" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "6" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "7" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "8" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "9" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "10" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "11" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ]
//     ],
//     "5" => [
//         "0" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "1" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "2" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "3" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "4" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "5" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "6" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "7" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "8" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "9" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "10" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "11" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ]  
//     ],
//     "6" => [
//         "0" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "1" => [
//             "ocupacion" => 2,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "2" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "3" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ],
//         "4" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "5" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "6" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "7" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "8" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "dinero",
//                 "cantidad" => "10"
//             ]
//         ],
//         "9" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ] ,
//         "10" => [
//             "ocupacion" => 1,
//             "recurso" => [
//                 "tipo" => "alimentos",
//                 "cantidad" => "10"
//             ]
//         ],
//         "11" => [
//             "ocupacion" => 0,
//             "recurso" => [
//                 "tipo" => "energia",
//                 "cantidad" => "10"
//             ]
//         ]
//     ]
// ];

$recursos = array('Dinero', 'Comida', 'Energia');
$resultado = array ();

for ($i = 0; $i < 12; $i++) {
    $datos = array();
    for ($j = 0; $j < 7; $j++) {
        $ocupacion = obtener_ocupacion($i, $j);
        $recurso = array(
            'tipo' => $recursos[array_rand($recursos)],
            'cantidad' => calcular_recursos($i, $j)
        );
        $datos[$j] = array(
            'ocupacion' => $ocupacion,
            'recurso' => $recurso
        );  
    }
    $resultado[$i] = $datos;
}

// Convierto el resultado a formato json
$json_resultado = json_encode($resultado);

// Devuelvo el json
echo $json_resultado;

function obtener_ocupacion($x, $y) {
    //Obtengo el valor de la base de datos
    $consulta = "SELECT * FROM ubicacion WHERE x = '$x' AND y = '$y'";
    $resultado = mysqli_query($c, $consulta);
    $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    //Si la consulta devuelve resultados
    if (mysqli_num_rows($resultado) > 0) {
        return $resultado[0]['tipo'];
    }
    //Si en esa ubicacion no hay nada guardado en la base de datos
    return "0";
    
}

function calcular_recurso($x,$y) {
    srand(SEED.'1'. $x. $y);
    $cantidad_original = rand(0,1000);
    
    $dia_actual = floor(time()/86400);
    
    $periodo = obtener_periodo_en_curso();

    srand(SEED.'2'. $periodo['dia_inicial']);
    $cantidad_cambio_inicio = rand(0,6000);

    srand(SEED.'2'. $periodo['dia_final']);
    $cantidad_cambio_final = rand(0,6000);
    $diferencia = $cantidad_cambio_inicio - $cantidad_cambio_final;

    $cambio = (floor($diferencia/($periodo['dia_final'] - $periodo['dia_inicial']))) * ($dia_actual - $periodo['dia_inicial']);
    return $cantidad_original + $cantidad_cambio_inicio - $cambio;
}

//recibes el día actual, no hace falta pasarle parámetro
function obtener_periodo_en_curso() {
    //coge los días que han pasado desde la fecha unix
    $dia_actual = floor(time()/86400);

    //Obtengo las variables de la base de datos. Si no trae nada devuelve 1
    $dia_inicial = get_value('dia_inicial',1);
    $dia_final = get_value('dia_final', 1);
    //Si el periodo que tengo en las variables es un período pasado
    //actualiza las variables
    if ($dia_final <= $dia_actual) {
        //Serie 6: por poner una
        //SEED es una variable global
        srand(SEED.'6'. $dia_inicial);
        $duracion = rand(3,20);
        $nuevo_dia_final = $dia_final + $duracion;

        $dia_inicial = $dia_final;
        $dia_final = $nuevo_dia_final;
        set_value('dia_inicial',$dia_inicial);
        set_value('dia_final',$dia_final);
    }
    return ['dia_inicial' => $dia_inicial, 'dia_final' => $dia_final];
}

function get_value($clave) {
    //Obtengo el valor de la base de datos
    $consulta = "SELECT dia_inicial, dia_final FROM datos";
    $resultado = mysqli_query($c, $consulta);
    $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    switch ($clave) {
        case 'dia_inicial':
            return $resultado[0][$dia_inicial];
            break;
        case 'dia_final':
            return $resultado[0][$dia_final];
            break;
    }
}

function set_value($clave, $valor) {
    switch ($clave) {
        case 'dia_inicial':
            mysqli_query($c, "UPDATE datos SET dia_inicial = '$valor'");
            break;
        case 'dia_final':
            mysqli_query($c, "UPDATE datos SET dia_final = '$valor'");
            break;
    }
}
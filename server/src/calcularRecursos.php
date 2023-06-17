<?
function calcular_recurso($x,$y) {
    srand(SEED.'1'. $x. $y);
    $cantidad_original = rand(0,300);
    
    $dia_actual = floor(time()/86400);
    
    $periodo = obtener_periodo_en_curso();

    srand(SEED.'2'. $periodo['dia_inicial']);
    $cantidad_cambio_inicio = rand(0,200);

    srand(SEED.'2'. $periodo['dia_final']);
    $cantidad_cambio_final = rand(0,200);
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
    include "conexion.php";
    //Obtengo el valor de la base de datos
    $consulta = "SELECT * FROM datos";
    $resultado = mysqli_query($c, $consulta);
    $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    switch ($clave) {
        case 'dia_inicial':
            return $resultado[1]['valor'];
            break;
        case 'dia_final':
            return $resultado[0]['valor'];
            break;
    }
}

function set_value($clave, $valor) {
    include "conexion.php";
    switch ($clave) {
        case 'dia_inicial':
            mysqli_query($c, "UPDATE datos SET valor = '$valor' WHERE clave = '$clave'");
            break;
        case 'dia_final':
            mysqli_query($c, "UPDATE datos SET valor = '$valor' WHERE clave = '$clave'");
            break;
    }
}
?>
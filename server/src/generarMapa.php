<?
header("Content-type: application/json");

include "obtenerOcupacion.php";
include "calcularRecursos.php";

$recursos = array('Dinero', 'Comida', 'Energia');
$resultado = array ();

for ($i = 0; $i < 7; $i++) {
    $datos = array();
    for ($j = 0; $j < 12; $j++) {
        $datosUbicacion = obtener_ocupacion($i, $j);
        if($datosUbicacion == "0") {
            $ocupacion = 0;
            $usuario = 0;
            $id = 0;
        } else {
            $datosUbicacion = explode(', ', $datosUbicacion);
            $ocupacion = $datosUbicacion[0];
            $usuario = $datosUbicacion[1];
            $id = $datosUbicacion[2];
        }
        
        srand(SEED.'3'.$i.$j);
        $recurso = array(
            'tipo' => $recursos[array_rand($recursos)],
            'cantidad' => calcular_recurso($i, $j)
        );
        $datos[$j] = array(
            'ocupacion' => $ocupacion,
            'usuario' => $usuario,
            'id' => $id,
            'id_actual' => $id_usuario,
            'recurso' => $recurso
        );  
    }
    $resultado[$i] = $datos;
}

// Convierto el resultado a formato json
$json_resultado = json_encode($resultado);

// Devuelvo el json
echo $json_resultado;
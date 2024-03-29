<?
    $consulta = "SELECT edificio.*, tipo.tiempo FROM edificio INNER JOIN tipo ON edificio.id_tipo = tipo.id_tipo WHERE id_usuario = $id_usuario";
    $resultado = mysqli_query($c, $consulta);
    $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    for ($i = 0; $i < count($resultado) ; $i++) {

        $inicioConstruccion = strtotime($resultado[$i]['construccion']);
        $fechaActual = time();
        $costeTiempo = strtotime($resultado[$i]['tiempo']) - strtotime('00:00:00');
        $finConstruccion = $inicioConstruccion + $costeTiempo;

        if (time() >= $finConstruccion) {
            $id_edificio = $resultado[$i]['id_edificio'];
            mysqli_query($c, "UPDATE edificio SET disponibilidad = 1 WHERE id_edificio = $id_edificio");
        }
    }
?>
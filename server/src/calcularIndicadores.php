<?
    header("Content-type: application/json");

    //Obtengo los datos de los indicadores guardados en la base de datos
    $consulta = "SELECT poblacion, felicidad, comida, dinero, energia, fechaMod FROM usuario WHERE id_usuario = $id_usuario";
    $rtdoInd = mysqli_query($c, $consulta);
    $rtdoInd = mysqli_fetch_all($rtdoInd, MYSQLI_ASSOC);

    $comida = $rtdoInd[0]['comida'];
    $dinero = $rtdoInd[0]['dinero'];
    $felicidad = $rtdoInd[0]['felicidad'];    
    $poblacion = $rtdoInd[0]['poblacion'];

    $fechaMod = $rtdoInd[0]['fechaMod'];
    $fechaActual = time();
    $minutos = ($fechaActual - $fechaMod) / 60;
    $dias = (int)($minutos / 60 * 24);

    //Obtengo los efectos de los edificios sobre los indicadores
    $consulta = "SELECT edificio.estado, tipo.* FROM edificio INNER JOIN tipo ON edificio.id_tipo = tipo.id_tipo WHERE edificio.id_usuario =  $id_usuario AND edificio.disponibilidad = 1 AND edificio.estado = 'Activado'";
    $rtdoEfecto = mysqli_query($c, $consulta);
    $rtdoEfecto = mysqli_fetch_all($rtdoEfecto, MYSQLI_ASSOC);

    $incrementoComida = 0;
    $incrementoDinero = 0;
    $energia = 0;

    for ($i = 0; $i < count($rtdoEfecto); $i++) {
        $incrementoComida += $rtdoEfecto[$i]['efecto_comida'];
        $incrementoDinero += $rtdoEfecto[$i]['efecto_dinero'];
        $energia += $rtdoEfecto[$i]['efecto_energia'];
    }

    $comida += (int)($incrementoComida * $minutos);
    $dinero += (int)($incrementoDinero * $minutos);

    //La felicidad decrece por cada día no jugado y sube por cantidad de edificios
    $felicidad = $rtdoInd[0]['felicidad'] - ($dias * 2) + count($rtdoEfecto);

    //El rango del indicador felicidad va de 0 a 100.
    if($felicidad < 0) {
        $felicidad = 0;
    } else if ($felicidad > 100) {
        $felicidad = 100;
    }

    // La población crece o decrece en función del indicado felicidad
    if($felicidad > 80) {
        $poblacion += 100 * $dias;
        $incrementoPob = 100;
    } else if( $felicidad > 60) {
        $poblacion += 80 * $dias;
        $incrementoPob = 80;
    } else if ($felicidad > 50) {
        $poblacion += 60 * $dias;
        $incrementoPob = 60;
    } else if ($felicidad < 20) {
        $poblacion -= 80 * $dias;
        $incrementoPob = -80;
    } else if ($felicidad < 40) {
        $poblacion -= 60 * $dias;
        $incrementoPob = -60;
    } else if ($felicidad < 50) {
        $poblacion -= 40 * $dias;
        $incrementoPob = -40;
    }

    // Actualizo la base de datos con los indicadores calculados
    mysqli_query($c, "UPDATE usuario SET energia = '$energia', comida = '$comida', dinero = '$dinero', felicidad = '$felicidad', poblacion = '$poblacion', fechaMod = '$fechaActual' WHERE id_usuario = $id_usuario");
    
    $indicadores = array(
        'comida' => $incrementoComida,
        'dinero' => $incrementoDinero,
        'poblacion' => $incrementoPob
    );
    $resultado = array ();
    $resultado[0] = $indicadores;
    // Convierto el resultado a formato json
    $json_resultado = json_encode($resultado);

    // Devuelvo el json
    echo $json_resultado;
?>
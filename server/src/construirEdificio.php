<?

$tipo = $_POST['id_tipo'];
if (isset($tipo)){
    //obtengo el los datos del tipo de edificio
    $consulta = "SELECT * FROM tipo WHERE id_tipo = $tipo";
    $rtdoTipo = mysqli_query($c, $consulta);
    $rtdoTipo = mysqli_fetch_all($rtdoTipo, MYSQLI_ASSOC);

    //Obtengo los recursos del usuario
    $consulta = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
    $rtdoUsuario = mysqli_query($c, $consulta);
    $rtdoUsuario = mysqli_fetch_all($rtdoUsuario, MYSQLI_ASSOC);

    $energia = $rtdoUsuario[0]['energia'] - $rtdoTipo[0]['coste_energia'];
    $comida = $rtdoUsuario[0]['comida'] - $rtdoTipo[0]['coste_comida'];
    $dinero = $rtdoUsuario[0]['dinero'] - $rtdoTipo[0]['coste_dinero'];
 
    //Si se cumplen los requisitos para su construcción
    if ($energia >= 0 && $comida >= 0 && $dinero >= 0 && $rtdoUsuario[0]['poblacion'] >= $rtdoTipo[0]['pob_requerida']) {
        mysqli_query($c, "UPDATE usuario SET energia = '$energia', comida = '$comida', dinero = '$dinero' WHERE id_usuario = $id_usuario");
        $ahora = date('Y-m-d H:i:s');
        mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado, disponibilidad, construccion) VALUES ('$tipo', 1, 'Activado',0, '$ahora')");
    }
}
?>
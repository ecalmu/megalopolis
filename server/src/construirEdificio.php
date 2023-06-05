<?
include "conexion.php";

$tipo = $_POST['id_tipo'];
if (isset($edificio)){
    $consulta = "SELECT * FROM tipo WHERE id_tipo = $edificio";
    $rtdoTipo = mysqli_query($c, $consulta);
    //Guardo todos los resultados en un array asociativo
    $rtdoTipo = mysqli_fetch_all($rtdoTipo, MYSQLI_ASSOC);

    $consulta = "SELECT * FROM usuario WHERE id_usuario = 1";
    $rtdoUsuario = mysqli_query($c, $consulta);
    //Guardo todos los resultados en un array asociativo
    $rtdoUsuario = mysqli_fetch_all($rtdoUsuario, MYSQLI_ASSOC);

    $energia = $rtdoUsuario[0]['energia'] - $rtdoTipo[0]['coste_energia'];
    $comida = $rtdoUsuario[0]['comida'] - $rtdoTipo[0]['coste_comida'];
    $dinero = $rtdoUsuario[0]['dinero'] - $rtdoTipo[0]['coste_dinero'];
    // mysqli_query($c, "INSERT INTO edificio VALUES (4,2, 1, 'Activado')");
    if ($energia >= 0 && $comida >= 0 && $dinero >= 0 && $rtdoUsuario[0]['poblacion'] > $rtdoTipo[0]['pob_requerida']) {
        mysqli_query($c, "UPDATE usuario SET energia = '$energia', comida = '$comida', dinero = '$dinero' WHERE id_usuario = 1");
        mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES ('$tipo', 1, 'Activado')");
    }
}
?>
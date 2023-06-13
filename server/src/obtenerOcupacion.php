<?
function obtener_ocupacion($x, $y) {
    include "conexion.php";
    //Obtengo el valor de la base de datos
    $consulta = "SELECT * FROM ubicacion WHERE x = '$x' AND y = '$y'";
    $resultado = mysqli_query($c, $consulta);
    
    
    //Si la consulta devuelve resultados
    if (mysqli_num_rows($resultado) > 0) {
        $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        $id = $resultado[0]['id_usuario'];

        //Obtengo el nombre de usuario de la base de datos
        $consultaNombre = "SELECT nombre FROM usuario WHERE id_usuario = '$id'";
        $rtdoNombre = mysqli_query($c, $consultaNombre);
        $rtdoNombre = mysqli_fetch_all($rtdoNombre, MYSQLI_ASSOC);

        $usuario = $rtdoNombre[0]['nombre'];
        if($resultado[0]['tipo'] == 'Ciudad') {
            return "1, $usuario, $id";
        }
        return "2, $usuario, $id";
    }
    //Si en esa ubicacion no hay nada guardado en la base de datos
    return "0";
    
}
?>
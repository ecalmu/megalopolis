<?
function obtener_ocupacion($x, $y) {
    include "conexion.php";
    //Obtengo el valor de la base de datos
    $consulta = "SELECT * FROM ubicacion WHERE x = '$x' AND y = '$y'";
    $resultado = mysqli_query($c, $consulta);
    

    //Si la consulta devuelve resultados
    if (mysqli_num_rows($resultado) > 0) {
        $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        if($resultado[0]['tipo'] == 'Ciudad') {
            return "1";
        }
        return "2";
    }
    //Si en esa ubicacion no hay nada guardado en la base de datos
    return "0";
    
}
?>
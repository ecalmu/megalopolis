<?
    //Propago sesión
    include "sesion.php";
    include "obtenerOcupacion.php";
    include "conexion.php";

    $posicion = $_POST['posicion'];
    // $posicion= 5 . ";" . 10;
    $posiciones = explode( ';', $posicion );

    $x = (int)$posiciones[0];
    $y = (int)$posiciones[1];
    $ocupacion = obtener_ocupacion($x, $y);
    if ($ocupacion == "0") {
        $consulta = "SELECT * FROM ubicacion WHERE id_usuario = '$id_usuario'";
        $resultado = mysqli_query($c, $consulta);
        
        //Si la consulta devuelve resultados
        if (mysqli_num_rows($resultado) > 0) {
            mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES ('$x', '$y', 'Puesto_comercial', $id_usuario)");
        } else {
            mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES ('$x', '$y', 'Ciudad', $id_usuario)");
        }
        
    }
?>
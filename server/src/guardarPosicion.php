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

            $consulta = "SELECT dinero FROM usuario WHERE id_usuario = $id_usuario";
            $rtdoUsuario = mysqli_query($c, $consulta);
            $rtdoUsuario = mysqli_fetch_all($rtdoUsuario, MYSQLI_ASSOC);

            if($rtdoUsuario[0]['dinero'] > 10000) {
                mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES ('$x', '$y', 'Puesto_comercial', $id_usuario)");
                $dinero = $rtdoUsuario[0]['dinero'] - 10000;
                mysqli_query($c, "UPDATE usuario SET dinero = '$dinero' WHERE id_usuario = $id_usuario");
            } 
        } else {
            mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES ('$x', '$y', 'Ciudad', $id_usuario)");
        }
        
    }
?>
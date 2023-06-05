<?
include "conexion.php";

ini_set("session.use_cookies","1");
ini_set("session.use_only_cookies","0");
ini_set("session.use_trans_sid","1");

session_name("Megalopolis");
//Inicio o propago la sesión:
session_start();

if (isset($_POST['login'])) {
  
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];

    if ($nombre != "" && $pass != "") {

        $consulta = "SELECT * FROM usuario WHERE nombre = '$nombre'";
        //Recuperacion de filas
        $resultado = mysqli_query($c, $consulta); //Devuelve un objeto de la clase mysqli_result

        if (mysqli_num_rows($resultado) > 0) { //Si la consulta devuelve resultados
            //Guardo todos los resultados en un array asociativo
            $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

            if (password_verify($pass, $resultado[0]['pass'])) {
                $_SESSION['id_usuario'] = $resultado[0]['id_usuario'];
                header('Location: /');
            }
        }
    }
}
?>
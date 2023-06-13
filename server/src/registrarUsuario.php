<?
    include 'conexion.php';

    //Obtengo los datos del formulario de registro
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $privacidad = $_POST['privacidad'];

    if (isset($usuario) && $usuario != '' && isset($email) && $email != ''  ){
        $consulta = "SELECT * FROM usuario WHERE email = '$email' or nombre = '$usuario'";
        
        //Recuperacion de filas
        $resultado = mysqli_query($c, $consulta);

        if (mysqli_num_rows($resultado) > 0) { //Si la consulta devuelve resultados
            $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            if ($resultado[0]['nombre'] == $usuario && $resultado[0]['email'] == $email){
                $data = [['usuario' => 1], ['email' => 1]]; //El usuario y el email ya existen en la base de datos
            } else if ($resultado[0]['email'] == $email) {
                $data = [['email' => 1]]; //El email ya existe en la base de datos
            } else {
                $data = [['usuario' => 1]]; //El nombre de usuario ya existe en la base de datos
            }
        } else { //Si no hay registros con esos datos en la base de datos
            $fecha = time();
            //Inserto en la tabla usuario los valores introducidos
            $stmt = mysqli_prepare($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion, fechaMod) 
                VALUES (?, ?, ?, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, ?)");
            
            $passEncriptada = password_hash($pass, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, 'sssi', $email, $usuario, $passEncriptada, $fecha);
            // mysqli_stmt_execute($stmt);

            //Si la inserción se realizó correctamente
            if (mysqli_stmt_execute($stmt)) {
                $data = [['registro' => 1]];

                //Obtengo el id_usuario asociado al nuevo registro
                $consulta = "SELECT usuario.id_usuario FROM usuario WHERE nombre = '$usuario'";
                $rtdId = mysqli_query($c, $consulta);
                $rtdId = mysqli_fetch_all($rtdId, MYSQLI_ASSOC);


                ini_set("session.use_cookies","1");
                ini_set("session.use_only_cookies","0");
                ini_set("session.use_trans_sid","1");

                session_name("Megalopolis");
                //Inicio o propago la sesión:
                session_start();

                $_SESSION['id_usuario'] = $rtdId[0]['id_usuario'];
                header("Location:/enviarEmail");
            } else { //Si se produjo algún error
                $data = [['registro' => 0]];
                header("Location:/registro");
                //echo "Error al ejecutar la sentencia preparada: " . mysqli_stmt_error($stmt);
            } 
        }
    }

    //Devuelvo el json
    echo json_encode($data);
?>
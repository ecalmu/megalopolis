<?
    $host = "mariadb";
    $usuario = getenv('MARIADB_USER');
    $password = getenv('MARIADB_PASSWORD');
    $database = getenv('MARIADB_DATABASE');

    //Conexión a la base de datos.
    $c = new mysqli($host, $usuario, $password);

    if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        exit();
    }

    //Selecciono la Base de Datos que voy a usar
    mysqli_query($c, "use megalopolis");
?>
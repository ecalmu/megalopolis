<?
    ini_set("session.use_cookies","1");
    ini_set("session.use_only_cookies","0");
    ini_set("session.use_trans_sid","1");

    session_name("Megalopolis");
    //Inicio o propago la sesión:
    session_start();

    //Si no está iniciada la sesión, es decir, si es False, salir
    if (!isset($_SESSION['id_usuario'])) {
        header('Location: /login');
        return;
    }
    $id_usuario = $_SESSION['id_usuario'];
?>
<?
    mysqli_query($c, "DELETE FROM edificio WHERE id_usuario = '" . $id_usuario . "'");
    mysqli_query($c, "DELETE FROM propuesta_comercial WHERE id_usuario = '" . $id_usuario . "'");
    mysqli_query($c, "DELETE FROM ubicacion WHERE id_usuario = '" . $id_usuario . "'");
    mysqli_query($c, "DELETE FROM usuario WHERE id_usuario = '" . $id_usuario . "'");

    header('Location: /login');
?>
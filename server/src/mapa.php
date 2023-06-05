<!DOCTYPE html>
<html lang="en">

<head>
    <?
    //Head
    include "../public/head.html";
    ?>
    <script type="text/javascript" src="js/mapa.js"></script>
</head>
<body>
    <?
    // Cabecera
    include "../public/cabecera.html";
    // Conexión a la base de datos
    include "conexion.php";
    ?>

    <!-- Inicio Mapa -->
    <div class="container-fluid" id="mapaContenedor">
        <div class="text-center">
            <h2 class="section-title px-5"><span class="px-2">Mapa</span></h2>
        </div>
        <div class="container" id="mapa" style="background: url(./img/mapa.jpg);"></div>
    </div>
    <!-- Fin Mapa -->
</body>
</html>
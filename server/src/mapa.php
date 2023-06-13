<!DOCTYPE html>
<html lang="es">

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
    include "cabecera.php";
    ?>

    <!-- Inicio Mapa -->
    <div class="container-fluid" id="mapaContenedor">
        <div class="row d-flex">
            <div class="col-7 text-right pr-5">
                <h2 class="section-title px-5"><span class="px-2">Mapa</span></h2>
            </div>
            <div class="col-5 text-center pl-5">
                <small><strong>Puesto comercial</strong><br>Coste: 10.000<i class="fas fa-coins pl-2 pr-2"></i></small>
            </div>
        </div>
        <div class="container" id="mapa" style="background: url(./img/mapa.jpg);"></div>
    </div>
    <!-- Fin Mapa -->
</body>
</html>
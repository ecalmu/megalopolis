<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Megalopolis</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body>
  <?php
    include "../public/cabecera.html";

    // $consulta = "SELECT * FROM usuario";
    $consulta = "SELECT u.*, COUNT(e.id_edificio) AS edificios 
                 FROM usuario u 
                 LEFT JOIN edificio e ON u.id_usuario = e.id_usuario 
                 GROUP BY u.id_usuario";
    
    $resultado = mysqli_query($c, $consulta);
    //Guardo todos los resultados en un array asociativo
    $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    // var_dump($resultado);
    ?>
    <!-- Rankings Start -->
    <div class="container-fluid">
        <div class="text-center">
            <h2 class="section-title px-5"><span class="px-2">Rankings</span></h2>
        </div>
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">

            <?
            for ($i = 0; $i < 5; $i++) {
            $array = array('comida', 'dinero', 'energia', 'poblacion','edificios');
            $iconos= array('fa fa-carrot', 'fas fa-coins','fa fa-bolt','fa fa-users', 'fas fa-building');
            ?>
                <div class="col-lg-4 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <div class="d-flex justify-content-center pb-3">
                                <i class="fas fa-crown fa-2x pl-2 pr-2"></i>
                                <i class="<?= $iconos[$i]?> fa-2x pl-2 pr-2"></i>
                            </div>
                            <tr>
                                <th>Posición</th>
                                <th><?= ucfirst($array[$i])?></th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?
                            for ($j = 0; $j < count($resultado); $j++) {
                                usort($resultado, ordenar($array[$i]));
                            ?>
                            <tr>
                                <td class="align-middle"><?=$j + 1?></td>
                                <td class="align-middle"><?=$resultado[$j][$array[$i]]?></td>
                            </tr>
                            <?
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?
            }
            ?>
            <?
            $consulta = "SELECT u.*, COUNT(*) AS puestos_comerciales 
            FROM usuario u 
            INNER JOIN ubicacion ub ON u.id_usuario = ub.id_usuario
            WHERE ub.tipo = 'puesto comercial' 
            GROUP BY u.id_usuario";

            $resultado = mysqli_query($c, $consulta);
            //Guardo todos los resultados en un array asociativo
            $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            ?>
                <div class="col-lg-4 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <div class="d-flex justify-content-center pb-3">
                                <i class="fas fa-crown fa-2x pl-2 pr-2"></i>
                                <i class="fas fa-campground fa-2x pl-2 pr-2"></i>
                            </div>
                            <tr>
                                <th>Posición</th>
                                <th>Puestos comerciales</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?
                            for ($i = 0; $i < count($resultado); $i++) {
                            ?>
                            <tr>
                                <td class="align-middle"><?=$i + 1?></td>
                                <td class="align-middle"><?=$resultado[$i]['puestos_comerciales']?></td>
                            </tr>
                            <?
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Rankings End -->
    <?
    include "../public/footer.html";
    ?>
 </body>
</html>
<?
function ordenar($clave) {
    return function ($a, $b) use ($clave) {
        if ($a[$clave] < $b[$clave]) {
            return 1;
        } else if ($a[$clave] > $b[$clave]) {
            return -1;
        } else {
            return 0;
        }
    };
}

// function ordenar($campo) {
//     if ($a[$campo] == $b[$campo]) {
//         return 0;
//     } else if ($a[$campo] < $b[$campo]) {
//         return -1;
//     } else {
//         return 1;
//     }
// }
function compararPorFelicidad($a, $b) {
    if ($a['felicidad'] == $b['felicidad']) {
        return 0;
    }
    return ($a['felicidad'] < $b['felicidad']) ? -1 : 1;
}
?>
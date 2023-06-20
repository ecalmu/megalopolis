<!DOCTYPE html>
<html lang="es">
  <head>
    <?
    //Head
    include "../public/head.html";
    ?>
    <script type="text/javascript" src="js/inicio.js"></script>
  </head>
  <body>
  <?php
    // Cabecera
    include "cabecera.php";
    
    $consulta = "SELECT poblacion, felicidad, comida, dinero, energia FROM usuario WHERE id_usuario = $id_usuario";
    $rtdoUsuario = mysqli_query($c, $consulta);
    //Guardo todos los resultados en un array asociativo
    $rtdoUsuario = mysqli_fetch_all($rtdoUsuario, MYSQLI_ASSOC);

    if (isset($_POST['estado'])) { 
        if ($rtdoUsuario[0]['energia'] >= $_POST['coste_energia'] ) {
            $estado = $_POST['estado'];
            $tipo = $_POST['id_tipo'];
            mysqli_query($c, "UPDATE edificio SET estado = '$estado' WHERE id_tipo = '$tipo'");
            //Vuelvo a obtener los datos de la base de datos actualizados
            $rtdoUsuario = mysqli_query($c, $consulta);
            $rtdoUsuario = mysqli_fetch_all($rtdoUsuario, MYSQLI_ASSOC);
        } else {
            echo "No tienes suficiente energia";
        }
    } 

    ?>
    <!-- Indicadores Start -->
    <div class="container-fluid .gray-dark">
        <div class="container">
            <div class="text-center">
                <h1>¡Haz crecer tu ciudad!</h1>
            </div>
            <div class="mt-4">
                <p class="text-center">Gestiona los recursos estratégicamente, construye edificios impresionantes, comercia con otros jugadores, haz nuevos asentamientos comerciales y conviértete en el gobernante supremo de la región. ¿Estás listo para mostrar tus habilidades de gestión en este apasionante juego de estrategia y expansión urbana? El destino de tu ciudad y el legado de tu imperio dependen de ti.</p>
            </div>
        </div>
        <div class="row px-xl-5 pb-3 pt-3">
            <?
            for ($i = 0; $i < 5; $i++) {
                $array = array('poblacion', 'felicidad', 'comida', 'dinero', 'energia');
                $iconos= array('fa fa-users', 'fa fa-star', 'fa fa-carrot', 'fas fa-coins','fa fa-bolt')
            ?>
            <div class="col-lg col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="<?= $iconos[$i]?> text-primary m-0 mr-2 pr-4"></h1>
                    <h5 class="font-weight-semi-bold m-0"><?= ucfirst($array[$i])?><br><br><small class="cantidad"><?=$rtdoUsuario[0][$array[$i]]?></small></h5>
                </div>
            </div>
            <?
            }
            ?>
        </div>
    </div>
    <!-- Indicadores End -->

    <!-- Edificios Start -->
    <?
    $consulta = "SELECT edificio.estado, tipo.* FROM edificio INNER JOIN tipo ON edificio.id_tipo = tipo.id_tipo WHERE edificio.id_usuario =  $id_usuario AND edificio.disponibilidad = 1";
    $resultado = mysqli_query($c, $consulta);
    //Guardo todos los resultados en un array asociativo
    $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    ?>
    <div class="container-fluid pb-5">
        <div class="text-center mb-4">
            <h4 class="section-title px-5"><span class="px-2">Edificios construidos</span></h4>
        </div>
        <div class="row pb-3">
            <?
            for ($i = 0; $i < count($resultado); $i++) {
            ?>
            <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/<?=str_replace(' ', '-', strtolower($resultado[$i]['nombre']))?>.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h5 class="text-truncate mb-3"><?=ucfirst($resultado[$i]['nombre'])?></h5>
                        <div>
                            <?
                            if($resultado[$i]['efecto_dinero'] != 0){
                                ?><i class="fas fa-coins pl-2 pr-2"></i><?=$resultado[$i]['efecto_dinero'];
                            }
                            if($resultado[$i]['efecto_comida'] != 0){
                                ?><i class="fas fa-carrot pl-2 pr-2"></i><?=$resultado[$i]['efecto_comida'];
                            }
                            if($resultado[$i]['efecto_energia'] != 0){
                                ?><i class="fas fa-bolt pl-2 pr-2"></i><?=$resultado[$i]['efecto_energia'] ;
                            }
                            ?>
                        </div>
                        <hr width="75%"/>
                        <div class="pb-3">
                            <i class="fas fa-bolt pr-2"></i><?=$resultado[$i]['coste_energia']?>
                        </div>
                    </div>
                    <form method="post" class="text-center">
                        <?
                        if ($resultado[$i]['estado'] == "Activado") {
                            if ($resultado[$i]['efecto_energia'] > $rtdoUsuario[0]['energia']) {
                                ?><button class="btn btn-primary px-3 estado text-center" name="estado" value="Desactivado" disabled="disabled">Desactivar</button><?php
                            } else {
                                ?><button class="btn btn-primary px-3 estado text-center" name="estado" value="Desactivado">Desactivar</button><?php
                            }
                        } else {
                            if ($resultado[$i]['coste_energia'] <= $rtdoUsuario[0]['energia']) {
                                ?><button class="btn btn-primary px-3 estado text-center" name="estado" value="Activado">Activar</button><?php
                            } else {
                                ?><button class="btn btn-primary px-3 estado text-center" name="estado" value="Activado" disabled="disabled">Activar</button><?php
                            }
                        }
                        ?>
                        <input type="hidden" name="id_tipo" value="<?=$resultado[$i]['id_tipo']?>">
                        <input type="hidden" name="coste_energia" value="<?=$resultado[$i]['coste_energia']?>">
                    </form>
                </div>
            </div>
            <?
            }
            ?>
        </div>
    </div>
    <!-- Edificios End -->
    <?
    include "../public/footer.html";
  ?>
 </body>
</html>
<?

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?
    //Head
    include "../public/head.html";
    ?>
    <script type="text/javascript" src="js/edificios.js"></script>
  </head>
  <body>
  <?php
    // Cabecera
    include "cabecera.php";

    $consulta1 = "SELECT tipo.* FROM tipo WHERE id_tipo NOT IN (SELECT id_tipo FROM edificio WHERE id_usuario = $id_usuario)";
    $sinConstruir = mysqli_query($c, $consulta1);
    $sinConstruir = mysqli_fetch_all($sinConstruir, MYSQLI_ASSOC);

    $consulta2 = "SELECT tipo.*, edificio.* FROM edificio INNER JOIN tipo ON edificio.id_tipo = tipo.id_tipo WHERE edificio.id_usuario = $id_usuario AND edificio.disponibilidad = 0";
    $enConstruccion = mysqli_query($c, $consulta2);
    $enConstruccion = mysqli_fetch_all($enConstruccion, MYSQLI_ASSOC);
    
    $resultado = array_merge($sinConstruir, $enConstruccion);

    $consulta3 = "SELECT poblacion, comida, dinero, energia FROM usuario WHERE id_usuario = $id_usuario";
    $rtdoUsuario = mysqli_query($c, $consulta3);
    $rtdoUsuario = mysqli_fetch_all($rtdoUsuario, MYSQLI_ASSOC);

    ?>
    <!-- Edificios Start -->
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Edificios</span></h2>
        </div>
        <div class="row px-xl-5">
            <?
            for ($i = 0; $i < count($resultado); $i++) {
                $tiempo = $resultado[$i]['tiempo'];
                $tiempo_cadena = substr($tiempo , 0, 2) ."h ". substr($tiempo , 3, 2) ."min " . substr($tiempo , 6, 2). "seg";
            ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
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
                                <hr width="75%" />
                                <div class="pb-3">
                                <?
                                    if($resultado[$i]['coste_dinero'] != 0){
                                        ?><i class="fas fa-coins pl-2 pr-2"></i><?=$resultado[$i]['coste_dinero'];
                                    }
                                    if($resultado[$i]['coste_comida'] != 0){
                                        ?><i class="fas fa-carrot pl-2 pr-2"></i><?=$resultado[$i]['coste_comida'];
                                    }
                                    if($resultado[$i]['coste_energia'] != 0){
                                        ?><i class="fas fa-bolt pl-2 pr-2"></i><?=$resultado[$i]['coste_energia'] ;
                                    }
                                    if($resultado[$i]['pob_requerida'] != 0){
                                        ?><i class="fa fa-users pl-2 pr-2"></i><?=$resultado[$i]['pob_requerida'] ;
                                    }
                                    ?>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-clock pr-2"></i>
                                    <!-- <h6><?=$tiempo_cadena?></h6>
                                </div>
                            </div> -->
                            <?
                            if (array_key_exists("disponibilidad",  $resultado[$i])) {
                                $a = $resultado[$i]['construccion'];
                                $inicioConstruccion = strtotime($a);
                                $fechaActual = time();
                                $tiempo = $resultado[$i]['tiempo'];
                                $segundos = strtotime($tiempo) - strtotime('00:00:00');
                                $diferencia = $segundos + $inicioConstruccion - $fechaActual;
                                
                                // Formatear tiempo restante
                                $h = floor($diferencia / 3600);
                                $min = floor(($diferencia % 3600)/60);
                                $seg = $diferencia % 60;
                                if($h < 10) {
                                    $h = "0" . $h;
                                }
                                if($min < 10) {
                                    $min = "0" . $min;
                                }
                                if($seg < 10) {
                                    $seg = "0" . $seg;
                                }
                                $tiempoFormato = $h ."h ". $min ."min " . $seg. "seg";
                                // Calcular la diferencia en segundos
                                $width = 100 - $diferencia * 100 / $segundos;

                                ?>
                                <h6><?=$tiempoFormato?></h6>
                                </div>
                            </div>
                                <div class="progress progreso"><div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?=$width?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>
                                <?
                            } else {
                                ?>
                                <h6><?=$tiempo_cadena?></h6>
                                </div>
                            </div>
                            <?
                                if ($rtdoUsuario[0]['comida'] < $resultado[$i]['coste_comida'] ||
                                $rtdoUsuario[0]['dinero'] < $resultado[$i]['coste_dinero'] ||
                                $rtdoUsuario[0]['energia'] < $resultado[$i]['coste_energia'] ||
                                $rtdoUsuario[0]['poblacion'] < $resultado[$i]['pob_requerida']) {
                                    ?>
                                    <button class="btn btn-primary px-3 construir" alt="<?=$resultado[$i]['id_tipo']?>" disabled="disabled">
                                        <i class="fas fa-arrow-alt-circle-right mr-1"></i>Construir
                                    </button>
                                    <?
                                } else {
                                    ?>
                                    <button class="btn btn-primary px-3 construir" alt="<?=$resultado[$i]['id_tipo']?>">
                                        <i class="fas fa-arrow-alt-circle-right mr-1"></i>Construir
                                    </button>
                                    <?
                                }
                            }
                            ?>
                            
                            <input type="hidden" name="id_tipo" value="<?=$resultado[$i]['id_tipo']?>">
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
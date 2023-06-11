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
    include "../public/cabecera.html";

    $consulta1 = "SELECT tipo.* FROM tipo WHERE id_tipo NOT IN (SELECT id_tipo FROM edificio WHERE id_usuario = $id_usuario)";
    $sinConstruir = mysqli_query($c, $consulta1);
    //Guardo todos los resultados en un array asociativo
    $sinConstruir = mysqli_fetch_all($sinConstruir, MYSQLI_ASSOC);

    $consulta2 = "SELECT tipo.*, edificio.* FROM edificio INNER JOIN tipo ON edificio.id_tipo = tipo.id_tipo WHERE edificio.id_usuario = $id_usuario AND edificio.disponibilidad = 0";
    $enConstruccion = mysqli_query($c, $consulta2);
    //Guardo todos los resultados en un array asociativo
    $enConstruccion = mysqli_fetch_all($enConstruccion, MYSQLI_ASSOC);
    
    $resultado = array_merge($sinConstruir, $enConstruccion);

    // $consulta = "SELECT tipo.*, edificio.* 
    //          FROM tipo 
    //          LEFT JOIN edificio ON tipo.id_tipo = edificio.id_tipo AND edificio.disponibilidad = 0 AND edificio.id_usuario = $id_usuario 
    //          WHERE edificio.id_tipo IS NULL OR edificio.disponibilidad = 0";
    // $resultado = mysqli_query($c, $consulta);
    // $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

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
                                        ?><i class="fas fa-money-bill pl-2 pr-2"></i><?=$resultado[$i]['efecto_dinero'];
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
                                        ?><i class="fas fa-money-bill pl-2 pr-2"></i><?=$resultado[$i]['coste_dinero'];
                                    }
                                    if($resultado[$i]['coste_comida'] != 0){
                                        ?><i class="fas fa-carrot pl-2 pr-2"></i><?=$resultado[$i]['coste_comida'];
                                    }
                                    if($resultado[$i]['coste_energia'] != 0){
                                        ?><i class="fas fa-bolt pl-2 pr-2"></i><?=$resultado[$i]['coste_energia'] ;
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
                                <button class="btn btn-primary px-3 construir" alt="<?=$resultado[$i]['id_tipo']?>">
                                    <i class="fas fa-arrow-alt-circle-right mr-1"></i>Construir
                                </button>
                                <?
                            }
                            ?>
                            
                            <input type="hidden" name="id_tipo" value="<?=$resultado[$i]['id_tipo']?>">
                        </div>
                    </div>
            <?
            }
            ?>
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
        </div>
    </div>
    <!-- Edificios End -->
    <?
    include "../public/footer.html";
    ?>
 </body>
</html>
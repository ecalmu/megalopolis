<!DOCTYPE html>
<html lang="es">
  <head>
    <?
    //Head
    include "../public/head.html";
    ?>
    <script type="text/javascript" src="js/comercio.js"></script>
  </head>
  <body>
  <?php
    // Cabecera
    include "cabecera.php";

    //Obtengo los recursos disponibles del usuario
    $consulta = "SELECT dinero, comida, energia FROM usuario WHERE id_usuario = $id_usuario";
    $rtdRecursos = mysqli_query($c, $consulta);
    $rtdRecursos = mysqli_fetch_all($rtdRecursos, MYSQLI_ASSOC);

    //Si se pulsa el botón Enviar oferta
    if(isset($_POST['enviarOferta'])){
        // Obtengo los datos del formulario
        $demandaEnergia = $_POST['DemandaEnergia'];
        $demandaDinero = $_POST['DemandaDinero'];
        $demandaComida = $_POST['DemandaComida'];
        $ofertaEnergia = $_POST['OfertaEnergia'];
        $ofertaDinero = $_POST['OfertaDinero'];
        $ofertaComida = $_POST['OfertaComida'];

        //Guardo la propuesta comercial en la base de datos
        mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES ('$demandaEnergia', '$demandaDinero', '$demandaComida', '$ofertaEnergia','$ofertaDinero','$ofertaComida','$id_usuario')");
    }
    //Si se pulsa el botón Borrar o Aceptar
    if(isset($_POST['borrar']) || isset($_POST['aceptar'])){
        //Si es el botón Aceptar...
        if(isset($_POST['aceptar'])){
            //Obtengo los datos de la propuesta comercial aceptada de la base de datos
            $consulta = "SELECT * FROM propuesta_comercial WHERE id_propuesta = '" . $_POST["id_propuesta"] . "'";
            $rtdPropuesta = mysqli_query($c, $consulta);
            $rtdPropuesta = mysqli_fetch_all($rtdPropuesta, MYSQLI_ASSOC);

            //Calculo los recursos disponibles después de aceptar la oferta
            $energia = $rtdRecursos[0]['energia'] - $rtdPropuesta[0]['demanda_energia'] +  $rtdPropuesta[0]['oferta_energia'];
            $comida = $rtdRecursos[0]['comida'] - $rtdPropuesta[0]['demanda_comida'] +  $rtdPropuesta[0]['oferta_comida'];
            $dinero =$rtdRecursos[0]['dinero'] - $rtdPropuesta[0]['demanda_dinero'] +  $rtdPropuesta[0]['oferta_dinero'];

            //Actualizo la base de datos con los nuevos recursos
            mysqli_query($c, "UPDATE usuario SET energia = '$energia', comida = '$comida', dinero = '$dinero' WHERE id_usuario = $id_usuario");

            //Obtengo los recursos disponibles del usuario que realizó la propuesta
            $usuarioOferta = $rtdPropuesta[0]['id_usuario'];
            $consulta = "SELECT dinero, comida, energia FROM usuario WHERE id_usuario = $usuarioOferta";
            $rtdUsuarioProp = mysqli_query($c, $consulta);
            $rtdUsuarioProp = mysqli_fetch_all($rtdUsuarioProp, MYSQLI_ASSOC);

            //Calculo los recursos disponibles después de aceptar la oferta
            $energia = $rtdUsuarioProp[0]['energia'] + $rtdPropuesta[0]['demanda_energia'] -  $rtdPropuesta[0]['oferta_energia'];
            $comida = $rtdUsuarioProp[0]['comida'] + $rtdPropuesta[0]['demanda_comida'] -  $rtdPropuesta[0]['oferta_comida'];
            $dinero = $rtdUsuarioProp[0]['dinero'] + $rtdPropuesta[0]['demanda_dinero'] -  $rtdPropuesta[0]['oferta_dinero'];

            //Actualizo la base de datos con los nuevos recursos
            mysqli_query($c, "UPDATE usuario SET energia = '$energia', comida = '$comida', dinero = '$dinero' WHERE id_usuario = $usuarioOferta");
            
        }
        //Borro la propuesta comercial de la base de datos
        mysqli_query($c, "DELETE FROM propuesta_comercial WHERE id_propuesta = '" . $_POST["id_propuesta"] . "'");
    }
    
    //Obtengo todas las propuestas comerciales y el usuario que las ha realizado
    $consulta = "SELECT usuario.nombre, propuesta_comercial.* FROM propuesta_comercial INNER JOIN usuario ON usuario.id_usuario = propuesta_comercial.id_usuario";
    $resultado = mysqli_query($c, $consulta);
    $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    ?>
    <!-- Inicio Comercio -->
    <div class="container-fluid">
        <!-- Título -->
        <div class="text-center">
            <h2 class="section-title px-5"><span class="px-2">Comercio</span></h2>
        </div>
        <!-- Tabla de propuestas comerciales -->
        <div class="container-fluid pt-4">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Usuario</th>
                                <th>Oferta</th>
                                <th>Demanda</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?
                            for ($i = 0; $i < count($resultado); $i++) {
                            ?>
                            <tr>
                                <!-- Usuario -->
                                <td class="align-middle"><?=$resultado[$i]['nombre']?></td>
                                <!-- Oferta -->
                                <td class="align-middle">
                                    <?
                                    if($resultado[$i]['oferta_dinero'] != 0){
                                        ?><i class="fas fa-money-bill pl-2 pr-2"></i><?=$resultado[$i]['oferta_dinero'];
                                    }
                                    if($resultado[$i]['oferta_comida'] != 0){
                                        ?><i class="fas fa-carrot pl-2 pr-2"></i><?=$resultado[$i]['oferta_comida'];
                                    }
                                    if($resultado[$i]['oferta_energia'] != 0){
                                        ?><i class="fas fa-bolt pl-2 pr-2"></i><?=$resultado[$i]['oferta_energia'] ;
                                    }
                                    ?>
                                </td>
                                <!-- Demanda -->
                                <td class="align-middle">
                                    <?
                                    $demandaDinero = $resultado[$i]['demanda_dinero'];
                                    $demandaComida = $resultado[$i]['demanda_comida'];
                                    $demandaEnergia = $resultado[$i]['demanda_energia'];

                                    if($resultado[$i]['demanda_dinero'] != 0){
                                        ?><i class="fas fa-money-bill pl-2 pr-2"></i><?=$demandaDinero;
                                    }
                                    if($resultado[$i]['demanda_comida'] != 0){
                                        ?><i class="fas fa-carrot pl-2 pr-2"></i><?=$demandaComida;
                                    }
                                    if($resultado[$i]['demanda_energia'] != 0){
                                        ?><i class="fas fa-bolt pl-2 pr-2"></i><?=$demandaEnergia;
                                    }
                                    ?>
                                </td>
                                <!-- Opciones -->
                                <td class="align-middle">
                                    <form method="post">
                                    <?
                                    if ($resultado[$i]['id_usuario'] == $id_usuario){
                                        ?>
                                        <button class="btn btn-sm btn-primary" name="borrar"><i class="fas fa-times"></i></button>
                                        <?
                                    } else if ($demandaDinero <= $rtdRecursos[0]['dinero'] && $demandaComida <= $rtdRecursos[0]['comida'] && $demandaEnergia <= $rtdRecursos[0]['energia'] ) {
                                        ?>
                                        <button class="btn btn-sm btn-primary" name="aceptar"><i class="fa fa-check"></i></button>
                                        <?
                                    } else {
                                        ?>
                                        <button class="btn btn-sm"><i class="fas fa-unlock-alt"></i></button>
                                        <?
                                    }
                                    ?> 
                                        <input type="hidden" name="id_propuesta" value="<?=$resultado[$i]['id_propuesta']?>">
                                    </form> 
                                </td>
                            </tr>
                            <?
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Tabla para enviar una propuesta -->
                <div class="col-lg-4">
                    <div class="card border-secondary">
                        <form method="post">
                            <?
                            $comercio = array("Oferta", "Demanda");
                            $recursos = array("Comida", "Dinero", "Energia");
                            for ($i = 0; $i < 2; $i++) {
                            ?>
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0"><?=$comercio[$i]?></h4>
                            </div>
                            <div class="card-body">
                                <?
                                for ($j = 0; $j < 3; $j++) {
                                    if($comercio[$i] == "Oferta") {
                                        //El máximo que se puede ofrecer de un recurso es el total disponible
                                        $maximo = $rtdRecursos[0][lcfirst($recursos[$j])];
                                    } else {
                                        //El máximo que se puede demanda es 999.999
                                        $maximo = 999999;
                                    }   
                                ?>
                                <div class="d-flex mb-1 pt-1">
                                    <p class="ml-5" style="width: 100px;"><?=$recursos[$j]?></p>
                                    <div class="input-group quantity mx-auto" style="width: 150px;">
                                        <div class="input-group-btn">
                                            <a class="btn btn-sm btn-primary btn-minus menos">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </div>
                                        <input type="number" class="form-control form-control-sm bg-secondary text-center"
                                            name = <?=$comercio[$i].$recursos[$j]?> value="0" min="0" max=<?=$maximo?>>
                                        <div class="input-group-btn">
                                            <a class="btn btn-sm btn-primary btn-plus mas">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?
                                }
                                ?>
                            </div>
                            <?
                            }
                            ?>
                            <button class="btn btn-block btn-primary my-3 py-3" name="enviarOferta">Enviar propuesta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Final Comercio -->
    <?
    // Pie de página
    include "../public/footer.html";
    ?>
 </body>
</html>
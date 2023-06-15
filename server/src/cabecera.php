<?
$consulta = "SELECT nombre FROM usuario WHERE id_usuario = $id_usuario";
$rtdoUsuario = mysqli_query($c, $consulta);
$rtdoUsuario = mysqli_fetch_all($rtdoUsuario, MYSQLI_ASSOC);
?>
<!-- Inicio Menú -->
<div class="container-fluid">
    <div class="row border-bottom align-items-center mb-5 py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <!-- <h1 class="m-0 display-5 font-weight-semi-bold">Megalopolis</h1> -->
                <!-- <img class="circulo" src="img/logo.png" alt="logo de megalopolis"> -->
                <img class="img-fluid mx-auto" src="img/logo.png" alt="logo de megalopolis">
            </a>
        </div>

        <div class="col-lg-6">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">M</span>egalopolis</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/" class="nav-item nav-link">Inicio</a>
                        <a href="/edificios" class="nav-item nav-link">Edificios</a>
                        <a href="/comercio" class="nav-item nav-link">Comercio</a>
                        <a href="/rankings" class="nav-item nav-link">Rankings</a>
                        <a href="/mapa" class="nav-item nav-link">Mapa</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-lg-3 col-6 text-right">
            <a href="" class="pl-4">
                <img class="circulo" src="img/profile-header.jpg" alt="imagen de perfil">
            </a>
            <a class="dropdown-toggle text texto" href="#" role="button" data-toggle="dropdown">
                <?=$rtdoUsuario[0]['nombre']?>
            </a>
            <ul class="dropdown-menu preview-list">
                <li>
                    <a class="dropdown-item" href="/borrarUsuario"  data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt color"></i> Borrar Usuario</a>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                    <a class="dropdown-item" href="/cerrarSesion"><i class="fas fa-sign-out-alt color"></i> Cerrar
                        sesión</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Borrar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas borrar tu usuario? Toda la información asociada a tu cuenta será borrada permanentemente.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="/borrarUsuario" class="btn btn-primary">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Final Menú -->
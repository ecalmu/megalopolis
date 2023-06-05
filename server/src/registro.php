<!DOCTYPE html>
<html lang="es">

<head>
<?
    //Head
    include "../public/head.html";
    ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>

    <!-- Inicio Registro -->
    <div class="container-fluid login">
        <div class="row py-2 px-xl-5 justify-content-center" style="min-height: 100vh;">
            <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-xs-12 mb-5 mt-5"  style="max-width: 550px;">
                <div class="card-login p-5">
                    <div class="card border-0 mb-1" id="colorFondo">
                        <div class="card-header border-0 mb-0 text-center">
                            <h3 class="m-0">Registro</h3>
                        </div>
                        <form name="sentMessage" id="contactForm" class="pl-xl-5 pr-xl-5" action="/registrarUsuario" method="POST">

                            <label for="nombre">Usuario</label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="usuario" placeholder="Usuario">
                            </div>
                            <label for="email">Correo electrónico *</label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Correo" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                            </div>
                            <label for="email">Contraseña * <span class="small">(mínimo 8 caracteres)</span></label>
                            <div class="input-group form-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
                            </div>
                            
                            <div class="row align-items-center remember mb-4">
                                <input type="checkbox" name="privacidad" required>Acepto la <a href="/politicaPrivacidad" class="ml-2 mr-1"> política de
                                    privacidad </a> *
                            </div>
                            <!-- <form action="?" method="POST"> -->
                                <div class="g-recaptcha" data-sitekey="6Ldcsj0kAAAAANY-gikM_crs23baOJyHYYMAAA00"></div>
                                <input type="submit" value="Registrarse" class="btn float-right login_btn">
                            <!-- </form> -->
                        </form>
                        <div class="card-footer mt-0 mb-2">
                            <div class="d-flex justify-content-center links">
                                ¿Ya tienes una cuenta?<a href="/login">Inicia sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Final Registro -->
</body>

</html>
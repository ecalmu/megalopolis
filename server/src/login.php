<!DOCTYPE html>
<html>
<head>
	<?
    //Head
    include "../public/head.html";
    ?>
	<script type="text/javascript" src="js/login.js"></script>
</head>

<body class="login">
	
<div class="container content">
	<div class="d-flex justify-content-center h-100 m-5 p-5">
		<div class="card-login content">
			<div class="card-header text-center">
				<h3>Iniciar sesión</h3>
			</div>
			<div class="card-body">
				<form action="/inicioSesion" method="post" id="formulario">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Usuario" name="nombre" id="nombre" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" id="recuerdame">Recuérdame
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿No tienes una cuenta?<a href="/registro">Regístrate</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="/recuperarPass">¿Olvidaste tu contraseña?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
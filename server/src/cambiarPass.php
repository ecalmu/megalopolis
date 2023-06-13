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
<?
include('../src/conexion.php');

if(isset($_POST['aceptar'])){
	$token = $_POST['codigo'];
	$consulta = "SELECT token FROM usuario WHERE token = '$token'";
	$rtdoUsuario = mysqli_query($c, $consulta);
	
	
	if(mysqli_num_rows($rtdoUsuario) > 0){
		$rtdoUsuario = mysqli_fetch_all($rtdoUsuario, MYSQLI_ASSOC);
		$pass1 = $_POST['pass1'];
		
		if($pass1 == $_POST['pass2']) {
			$pass1 = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
			mysqli_query($c, "UPDATE usuario SET pass = '$pass1' WHERE token = '$token'");
		}
	}
?>
<div class="container content">
	<div class="d-flex justify-content-center h-100 m-5 p-5">
		<div class="card-login content">
			<div class="card-header text-center pt-5">
				<h3>¡Contraseña cambiada con éxito!</h3>
			</div>
			<div class="card-body">
				<form action="/login" method="post" id="formulario">
					<div class="form-group text-center">
						<input type="submit" name="inicioSesion" value="Inicia sesión" class="btn login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?
} else{
?>
<div class="container content">
	<div class="d-flex justify-content-center h-100 m-5 p-5">
		<div class="card-login content">
			<div class="card-header text-center">
				<h3>Cambia tu contraseña</h3>
			</div>
			<div class="card-body">
				<form action="#" method="post" id="formulario">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Código" name="codigo" id="codigo" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Contraseña" name="pass1" id="pass1" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Repite la contraseña" name="pass2" id="pass2" required>
					</div>
					<div class="form-group pb-5">
						<input type="submit" name="aceptar" value="Aceptar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?
}
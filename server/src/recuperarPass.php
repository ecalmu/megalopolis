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
				<h3>Reestablecer contraseña</h3>
			</div>
			<div class="card-body">
				<form action="/enviarEmail" method="post" id="formulario">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Email" name="email" id="email" required>
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
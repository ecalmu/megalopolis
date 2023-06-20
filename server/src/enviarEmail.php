<!-- Con la clase PHPMailer -->
<?
include('../src/conexion.php');

//Incluimos la clase phpmailer para poder instanciar
//un objeto de la misma
	//include "includes/class.phpmailer.php";
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
	
	//Creamos un objeto de la clase, es decir, hacemos una instancia de la clase
	$email = new PHPMailer();

    //Indico que voy a usar un servidor smtp
	$email->Mailer = "smtp";

//Asignamos a Host el nombre de nuestro servidor smtp
//estableciendo protocolo y puerto
	$email->SMTPSecure = "tls";
	$email->Host = "smtp.gmail.com";
	$email->Port = 587;

//Le indicamos que el servidor smtp requiere autenticación
	$email->SMTPAuth = true;

//Le decimos cual es nuestro nombre de usuario y password
	$email->Username = "almu.e.c@gmail.com";
	$email->Password = "npeifnaatvhbtfkb";

//Indicamos cual es nuestra dirección de correo y el nombre que
//queremos que vea el usuario que lee nuestro correo
	$email->From = "almu.e.c@gmail.com";
	$email->FromName = "Megaloplis";

//Siguiendo recomendaciones del servidor lo establezco a 5 minutos
	$email->Timeout=300;

//Indicamos cual es la dirección de destino del correo
	$correo = $_POST['email'];
	$email->AddAddress($correo);

//Asignamos asunto y cuerpo del mensaje
//El cuerpo del mensaje lo ponemos en formato html, haciendo
//que se vea en negrita
	$email->Subject = "Restablecer acceso";

	$token = uniqid();
	
	mysqli_query($c, "UPDATE usuario SET token = '$token' WHERE email = '$correo'");
	// $email->Body = '<p>¿Has olvidado tu contraseña? No te preocupes, puedes cambiarla utilizando este código:</p>';
	// $email->Body .= '<p><strong>' . $token . '</strong></p>';
	// $email->Body .= '<p><a href="http://localhost:8080/cambiarPass" style="background-color: #5fe7db; color: black; padding: 10px 20px; text-decoration: none;">Restablecer contraseña</a></p>';
// //Definimos AltBody por si el destinatario del correo no admite email con formato html
// 	$email->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";
	
$email->Body = '
    <div style="font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px; text-align: center;">
        <h2 style="color: #333333;">¿Has olvidado tu contraseña?</h2>
        <p style="color: #555555;">No te preocupes, puedes cambiarla utilizando este código:</p>
        <p style="background-color: #ffffff; color: #333333; padding: 10px; font-size: 18px;"><strong>' . $token . '</strong></p>
        <p style="color: #555555;">Desde nuestra web:</p>
        <p><a href="https://megalopolis.defcomsoftware.com/cambiarPass" style="background-color: #5fe7db; color: black; padding: 10px 20px; text-decoration: none; border-radius: 4px;">Restablecer contraseña</a></p>
    </div>
';

	$email->IsHTML(true);
//Enviamos el mensaje
	$exito = $email->Send();

//Si el mensaje no ha podido ser enviado muestra el error recibido del servidor
   if(!$exito){
		echo "Problemas enviando correo electrónico";
		echo "<br/>".$email->ErrorInfo;
   }
   else {
	?>
	<div class="container">
		<div class="row justify-content-center align-items-center" style="height: 100vh;">
		<div class="col-4">
			<div class="text-center">
			<i class="fa fa-envelope fa-5x"></i>
			<h1>Revisa tu email</h1>
			</div>
		</div>
		</div>
	</div>
	<?

   }
   
?>
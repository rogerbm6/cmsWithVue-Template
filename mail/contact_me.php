<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'julymiraclean@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Está siendo contactada por:  $name";
$email_body = "Usted ha recibido un nuevo mensaje de su página web.\n\n"."Estos son los detalles:\n\nNombre: $name\n\nCorreo electronico: $email_address\n\nMensaje:\n$message";
$headers = "De: noResponder@julyMira.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

//prueba
//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "De: Limpiezas JulyMira <julymiraclean@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: $email_address \r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: julymiraclean@gmail.com\r\n"; 

mail($to,$email_subject,$email_body,$headers);
return true;			
?>
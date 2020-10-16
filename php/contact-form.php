<?php
if(isset($_POST["action"])) {
	$name = $_POST['name'];                 // Sender's name
	$email = $_POST['email'];     // Sender's email address
	$phone  = $_POST['phone'];     // Sender's email address
// 	$website  = $_POST['website'];     // Sender's website
	$message = $_POST['message'];    // Sender's message
	$from = 'Formulario de contacto';    
	$to = 'proyectos@iqbrainy.co';     // Recipient's email address
	$subject = 'Mensaje de contacto Iqbrainy.co';

	//$body = " From: $name \n E-Mail: $email \n Phone : $phone \n Message : $message"  ;
	$body = "From: $name \n";   
  	$body.= "E-Mail: $email \n";
	$body.= "Phone : $phone \n";  
// 	$body.= "Website : $website \n";  
	$body.= "Message : $message \n";
	
	// init error message 
	$errmsg='';
	// Check if name has been entered
	if (!$_POST['name']) {
		$errmsg .= 'por favor, escriba su nombre'."<br>";
	}

	
	/* Check required field not blank */
	
	// Check if email has been entered and is valid
	if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errmsg .= 'Por favor, introduce una dirección de correo electrónico válida'."<br>";
	}	

	//Check if message has been entered
	if (!$_POST['message']) {
		$errmsg .= 'Por favor ingrese su mensaje'."<br>";
	}
 
	$result='';
	// If there are no errors, send the email
	if (!$errmsg) {
		if (mail ($to, $subject, $body, $from)) {
			$result='<div class="alert alert-success">Gracias por contactarnos. Su mensaje ha sido enviado con éxito. Nos pondremos en contacto con usted muy pronto!</div>'; 
		} 
		else {
		  $result='<div class="alert alert-danger">Lo siento, hubo un error al enviar tu mensaje. Por favor, inténtelo de nuevo más tarde.</div>';
		}
	}
	else{
		$result='<div class="alert alert-danger">'.$errmsg.'</div>';
	}
		echo $result;
	}
?>

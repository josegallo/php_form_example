<?php 
//form with validation and sanitization of name, email and message
$error = '';
$sent = '';
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	if (!empty($name)) {
		$name = trim($name);
		$name = filter_var($name, FILTER_SANITIZE_STRING);
	} else  {
		$error .= 'Please, add a name. <br><br> ';
	}

	if (!empty($email)) {
		//return false if not email after sanitize
		$email = filter_var($email, FILTER_SANITIZE_EMAIL); 
		if (!$email) {
			$error.= 'Plese, add a valid email. <br><br> ';
		}
	} else  {
		$error .= 'Please, add an email. <br><br>';
	}

	if (!empty($message)) {
		$message = htmlspecialchars($message);
		$message = trim($message);
		$message = stripslashes($message);
	} else  {
		$error .= 'Please, write a message. <br><br> ';
	}

	if (!$error) {
		$sent_to = 'jose@gmail.com';
		$subject = 'Form Message';
		$messageToSend = "From: $name \n";
		$messageToSend .= "Email: $email\n";
		$messageToSend .= "Mensaje: ".$message;
		mail($sent_to, $subject , $messageToSend);
		$sent = true;
	}
}
require 'view.index.php';

?>
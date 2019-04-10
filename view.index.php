<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact form</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel = "stylesheet" href = "style.css">
</head>
	<div class = "wrap">
	<form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> method="post">

	  	<input type="text" class = "form-control" placeholder = "name" 
	  		name="name" value = "<?php if (!$sent && isset($name)) echo $name;?>" id = "name">
		<input type ="email" class = "form-control" placeholder = "email" 
			name = "email" value = "<?php if (!$sent && isset($email)) echo $email;?>" id = "email">	
	 	<textarea name = "message" class = "form-control" placeholder = "Type your message" 
	 		id = "message" ><?php if (!$sent && isset($message)) echo $message;?> </textarea>
	 		<?php if (!empty($error)) : ?>
	 		<div class = "alert error"> <?php echo $error;?> </div>
	 		<?php elseif(!empty($sent)) : ?>
	 		<div class = "alert success">
	 			<p>The message was sent, thanks.</p>
	 		</div>
	 		<?php endif ?>
		<input type="submit" name = "submit" class = "btn btn-primary" value = "Send Message"> 
	</form> 
	</div>


</body>
</html>


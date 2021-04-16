<!DOCTYPE html>
<html>
<head>
	<?php 
		include "functions.php";
		print_meta("Contacto");
	?>

</head>
<body>
	<?php 
		print_nav();
	?>


	<h2>Información de contacto</h2>
	<form method="post"  action="#" class="contact" >
		<input type="text" name="subject"	placeholder="Asunto del mensaje">
		<textarea name="message" placeholder="Escriba su mensaje aquí..."></textarea>
		<input type="text" name="name"	 	placeholder="Nombre y apellido">
		<input type="text" name="pip"		placeholder="PIP">		
		<input type="text" name="email"		placeholder="Correo">

		
		

		<input type="submit" name="btn_contact" value="Enviar">
	</form>

	<?php 
		require "mail_config.php";
	?>
</body>
</html>
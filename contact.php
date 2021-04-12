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

	<form method="post"  action="functions.php" >
		<input type="text" name="subject"	placeholder="Asunto del mensaje">
		<input type="text" name="name"	 	placeholder="Nombre y apellido">
		<input type="text" name="email"		placeholder="Correo">
		
		<textarea name="message" placeholder="Escriba su mensaje aquí..."></textarea>

		<input type="submit" name="btn_contact" value="Enviar">
	</form>
</body>
</html>
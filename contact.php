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

	<form method="post" action=" email_control() ">
		<input type="text" name="" placeholder="Asunto del mensaje">
		<textarea placeholder="Escriba su mensaje aquí..."></textarea>
		<input type="text" name="" placeholder="Nombre y apellido">
		<input type="text" name="" placeholder="Correo">
		<input type="submit" name="" value="Enviar">
	</form>
</body>
</html>
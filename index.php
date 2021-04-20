<!DOCTYPE html>
<html>
<head>
	<?php 
		include "functions.php";
		print_meta("Comisión de Trabajos de Grado");
	?>
</head>
<body>

	<nav>	
		<?php 
			print_nav();
		?>	
	</nav>

	<div class="logos">
		<img class="img" src="img/udo.png">
			<h1>Comisión de Trabajos de Grado</h1>
		<img class="img" src="img/petroleo.png">
	</div>
	
	<h2>Departamento de Petróleo</h2>
	
	<form class="form" action="connection.php" method="post">
		<input required type="number" name="ci" placeholder="Número de cédula">
		<input required type="number" name="pip" placeholder="PIP">		
		<input type="submit" name="index_btn" value="Enviar">
	</form>

	<?php 
		
		
		if (isset($_COOKIE['message'])) {
			echo $_COOKIE['message'];
		}
		
	?>
	<h2>AVISO: La comisión atenderá los días Miércoles de 8:00 AM a 10:00 AM en el departamento...</h2>
	<h3>Última actualización: 15 de Enero de 2021, 9:29 PM</h3>
</body>
</html>
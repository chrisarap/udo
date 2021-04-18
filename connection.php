<!DOCTYPE html>
<html>
<head>
	<?php 
		include	"functions.php";
		print_meta("Datos del estudiante");
	?>
</head>
<body>

<?php 
	print_nav();

	$pip = 	htmlentities($_POST["pip"]);
	$ci = 	htmlentities($_POST["ci"]);
	include "pass.php";
	
	$mysqli = new mysqli($host, $user, $pass, $db);
	$query = "SELECT * FROM " . $table .  " WHERE " . $pip . " = PIP AND " . $ci . " = CI";
	$result = $mysqli->query($query); 
	$row = $result->fetch_assoc();
	
	include "arrays.php";

	$test = array(
		$student_data, 
		$project_data,
		$corrections,
		$juries,
		$approval
	);

	$session_name = array(
		"Datos del estudiante",
		"Datos del proyecto",
		"Correciones",
		"Jurado",
		"Aprobación"
	);

	// print arrays
	for ($i=0; $i < count($test); $i++) {		
		echo '<div class="box">';
			if (check($test[$i]) > 0) {
				echo "<h2>" . $session_name[$i] .  "</h2><br>";
			}
			
			foreach ($test[$i] as $key => $value) {
				if (strlen($value) >= 1 ) {
					echo  
					'<div class="mini-box">
						<p class="left">' . $key . '</p> 
						<p class="right">' . $value .'</p>
					</div>';
				}			
			}
		echo '</div>';
	}

	

?>

</body>
</html>
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
	
$row = check_connection($pip, $ci);

	include "pass.php";
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


	if ($row) {
		setcookie("message", "");
		print_oil_message($row);
		print_arrays($test, $session_name);
	} else {
		setcookie("message", "<h3 class='err_message'>Datos incorrectos</h3>", time() + 1);
		header("location: index.php");
	}


?>

</body>
</html>
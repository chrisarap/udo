<?php
	function print_nav(){

		//<a href="../portfolio/index.html" target="_blank"><li>Sobre la página 	</li></a>

		echo 
		'<ul class="nav">
			<a href="index.php"><li>Principal 				</li></a>
			<a href="formats.php"><li>Formatos 				</li></a>
			<a href="degree.php"><li>Grado 					</li></a>
			<a href="https://chrisarap.github.io/portfolio/"><li>Contacto 					</li></a>
		</ul>';
	}

	function print_meta($title = "standard title"){
		echo 
		'<title>' . $title . '</title>
		<meta charset="utf-8">
		<link rel="icon" href="projects/udo/img/udo.png">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt>';
	}

	function formats(){		
		$formats =array(
			'CTGIP - 01'		=>'https://drive.google.com/open?id=1tmKuvIqw_XhP-X-5PwKZS68ZEYhe6F8o',
			'CTGIP - 02C'		=>'https://drive.google.com/open?id=17PP7YievUSpVjiW4ggOSZVy8sXA_5h4d',
			'CTGIP - 02T'		=>'https://drive.google.com/open?id=1SPayaqkfXU2KrRP5SMuY3Vhsj1Ry9_x-',
			'CTGIP - 03'		=>'https://drive.google.com/open?id=1N5Me20cynVBSqq7bbOUaz7qPpcWxH-q1',
			'CTGIP - 04'		=>'https://drive.google.com/open?id=1DshVZSczmDMIyuL3Sud54Q0SNme63fNe',
			'CTGIP - 05'		=>'https://drive.google.com/open?id=1UwVA25Nsv7VsXcUXC8mEX-2xFIs4mnxL',
			'CTGIP - 07'		=>'https://drive.google.com/open?id=1n8CKHQHSIUYWTjVH6srHEKeNZRD9MoOQ',
			'CTGIP - 08'		=>'https://drive.google.com/open?id=1R78OVUNZlrtUfhjasv14BoMlruf1VDyA',
			'CTGIP - 10'		=>'https://drive.google.com/open?id=15RTsjLV4mR8mv80kau8TmE-ubfqcd2l8',
			'CTGIP - 12'		=>'https://drive.google.com/open?id=1IMYu1snMB8p-cjSUDQw4rmp4X4GUHxEA',
			'CTGIP - 13'		=>'https://drive.google.com/open?id=17z2QkE-sQvv0fkkjINFSroTxySlKQI-V',
			'CTGIP - 14'		=>'https://drive.google.com/open?id=1dSDcDDleOwdlAyfpEKItRjAiaokeoBuS',
			'CTGIP - 20'		=>'https://drive.google.com/open?id=1ulLER4_vQTOJhi-vfc71NiokOhtO06dp',
			'CTGIP - 21'		=>'https://drive.google.com/open?id=1RTC9eOf0WzGmM1HFvohplejz0YGx8xv-',
			'CTGIP - 22'		=>'https://drive.google.com/open?id=122DP6EEQN3P8AyGS-zv8zHNX7IvSl2RR',
			'CTGIP - 23'		=>'https://drive.google.com/open?id=1688bNrEW7NM2El0IUT4gEi9xkc7BQyiY',
			'CTGIP - Prorrogas'	=>'https://drive.google.com/open?id=1n852jEbPKo2pdOh1kjHqKRTEnuQm2Drp'
		);
		return $formats;
	}

	function check($arr){
		$count = 0;
		foreach ($arr as $key => $value) {
			if (strlen($value) > 0) {
				$count++;
			}
		}
		return $count;
	}

	function print_arrays($test, $session_name ){
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
	}

	function check_connection($pip, $ci){
		include "pass.php";

		$mysqli = new mysqli($host, $user, $pass, $db);
		$query = "SELECT * FROM " . $table .  " WHERE " . $pip . " = PIP AND " . $ci . " = CI";
		$result = $mysqli->query($query); 
		$row = $result->fetch_assoc();
		return $row;
	}

	function print_oil_message($row){
		
		$message = "";

		if ($row['FECHA_DE_ENTREGA']) {
			$message = "Su anteproyecto está en revisión...";
		}

		if ($row["RECIBIDA_DEL_DOCENTE_2"]) {
			$message = "Las correciones de su proyecto fueron recibidas por esta Comision el día " . $row["RECIBIDA_DEL_DOCENTE_2"] . " Por favor, pase retirando su proyecto en el horario de atención.";
		}

		if ($row["CORRECCION_ENTREGADA_AL_ESTUDIANTE"]) {
			$message = "Su proyecto fue retirado por usted el día " . $row["CORRECCION_ENTREGADA_AL_ESTUDIANTE"] . ". Devolver a la Comisión de Petróleo, en el horario de atención, cuando haya realizado las correciones requeridas";
		}

		if ($row["CORRECCION_RECIBIDA_DEL_ESTUDIANTE"]) {
			$message = "Su anteproyecto está en revisión...";
		}

		if ($row["APROBADO_CTG"]) {
			$message = "Su proyecto fue aprobado por la Comisión de Petróleo el día " . $row["APROBADO_CTG"] . ". Se enviará a la Comisión Central lo más pronto posible";
		}

		if ($row["ENVIADO_A_COMISION_CENTRAL"]) {
			$message = "Su proyecto fue enviado a Comisión Central el día " . $row["ENVIADO_A_COMISION_CENTRAL"];
		}

		if ($row["RECIBIDO_DE_COMISION_CENTRAL"]) {
			$message = "El formato CTGIP-06 fue firmado por esta Comisión el día " . $row["RECIBIDO_DE_COMISION_CENTRAL"] . ". Retire este formato en la Comisión Central.";
		}

		echo "<h2 class='err_message'>" . $message . "</h2>";
	}

	 
?>
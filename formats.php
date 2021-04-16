<!DOCTYPE html>
<html>
<head>
	<?php 
		include "functions.php";
		print_meta("Formatos");
	?>
</head>
<body>
<nav>
	<?php 
		print_nav();
	 ?>
</nav>

<ul class="formats">
	<?php 
		foreach (formats() as $key => $value) {
			echo '<a href="' . $value .'" target="_blank"><li>' . $key . '</li></a>';
		}
	?>	
</ul>

</body>
</html>
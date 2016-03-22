<?php 
	session_start();
	$player = $_POST["player"];	
	include ('../rsc/connection.php');
	$sql = "SELECT * FROM users WHERE username = '".$_POST["player"]."'";
	$result = mysqli_query($conexion,$sql);
	if (mysqli_num_rows($result) == 1) {
		$_SESSION["logged"] = true;
		$_SESSION["player"] = $_POST["player"];
		$_SESSION["start"] = time();
		$_SESSION["expire"] = $_SESSION["start"]+ (60 * 60);
		$sql = "TRUNCATE TABLE ".$player."";
		$ejecutar_consulta = mysqli_query($conexion,$sql);
		for ($i=0; $i < 10; $i++) { 
			for ($j=0; $j < 10; $j++) {
				$sql = 'INSERT INTO '.$player.'(ID,value,hit) '.VALUES .'("'.$i.$j.'","'.$_POST[$i.$j."_txt"].'","0");';
				$ejecutar_consulta = mysqli_query($conexion,$sql);
			}
		}

		$sql = "UPDATE users SET turn='1' WHERE username='player1'";
		$consulta = mysqli_query($conexion,$sql);
	}
	echo '<script type="text/javascript">window.location.assign("validate.php");</script>';
		// header('Location: validate.php'); //redirección mediante php que no funcionaba por tener codigo HTML
?>
<?php 
	session_start();
	include ('rsc/connection.php');
	$player = $_SESSION["player"];
	if ($player == "player1") {
		$oponent = "player2";
	} else{
		$oponent = "player1";
	}
	$target = $_POST["target_txt"];


	$sql= "SELECT turn FROM users WHERE username = '".$player."'";
	$result = mysqli_query($conexion,$sql);
	$turno = mysqli_fetch_array($result)["0"];
	if ($turno) {
		$sql = "SELECT * FROM ".$oponent." WHERE ID = '".$target."'";
		$result = mysqli_query($conexion,$sql);
		$tg = mysqli_fetch_array($result)["hit"];
		if ($tg==0) {
			echo "coordenada no atacada, atacando";
			$sql = "UPDATE ".$oponent." SET hit='1' WHERE ID='".$target."'";
			$consulta = mysqli_query($conexion,$sql);
			$sql = "UPDATE users SET turn='0' WHERE username='".$player."'";
			$consulta = mysqli_query($conexion,$sql);
			$sql = "UPDATE users SET turn='1' WHERE username='".$oponent."'";
			$consulta = mysqli_query($conexion,$sql);
			echo '<script type="text/javascript">window.location.assign("validate.php");</script>';
		} else {
			echo "Please, select a no-fired coordinate<p>redirigiendo</p>";
			echo '<script type="text/javascript">window.location.assign("validate.php");</script>';
	}
	}else{
		echo '<script type="text/javascript">window.location.assign("'+$player+'.php");</script>';
	}



	

 ?>
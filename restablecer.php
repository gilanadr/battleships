<?php
	if($_GET["borrar"]=="true"){
		echo "borrando todo";
		include ('rsc/connection.php');
		$sql = 'UPDATE player1 SET hit="",value=""';
		mysqli_query($conexion,$sql);
		$sql = 'UPDATE player2 SET hit="",value=""';
		mysqli_query($conexion,$sql);
		$sql = 'UPDATE users SET turn="0" WHERE username="player2"';
		mysqli_query($conexion,$sql);
	} 
 ?>
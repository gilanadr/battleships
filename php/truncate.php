<?php
	session_start();
	$player = $_SESSION["player"];
	echo $player;
	include ('rsc/connection.php');
	$sql = 'TRUNCATE TABLE '.$player.'';
	mysqli_query($conexion,$sql);
	echo "correcto";
?>
<?php 
session_start();
	if ($_SESSION["logged"]) {
		header("Location: ../".$_SESSION["player"].".php");
	}else {
		echo "hola";
	}

 ?>
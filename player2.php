<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Barcos MisCo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta charset="utf-8" />
	<meta http-equiv="refresh" content="5" />
	<script type="text/javascript" src="js/jquery-2.2.1.min.js"></script>
	<script type="text/javascript">
		function salir(){
			window.location="logout.php";
		}
		function validation(){
			var val = document.getElementById('target_txt').value;
			if ( isNaN(val) ){
				return false;
			} else{
				return true;
			};
		}
	</script>
	<!--<script>setTimeout('document.location.reload()',5000); </script> sirve para actualizar la pagina (si no funciona el meta refresh-->
</head>
	<?php
		include ('rsc/connection.php');
		$player = $_SESSION["player"];
		if ($player == "player1") {
			$oponent = "player2";
		} else{
			$oponent = "player1";
		}
		$sql= "SELECT turn FROM users WHERE username = '".$player."'";
		$result = mysqli_query($conexion,$sql);
		$turno = mysqli_fetch_array($result)["0"];
		$retVal = ($turno) ? "#00FF00" : "#FF0000" ;
		echo '<body style="background-color:'.$retVal.'">';
	 ?>

	<div class="container-fluid">
		<div class="row" style="text-align: center;">
			<div id="1">
			<div id="tabla1" class="col-md-6 col-xs-12" style="overflow: hidden;">
				<h1>TABLA DEL RIVAL</h1>
				<?php
					echo 'Hora actual: '.date('H:i:s');
					$url = explode("/", $_SERVER['REQUEST_URI']);
					$url_final = $url[(count($url) - 1)];
					if($player.".php" == $url_final){
						$sql = "SELECT * FROM ".$oponent;
						$result = mysqli_query($conexion,$sql);
						echo '<div class="row">';
						echo '<div class="col-md-1 col-xs-1"></div>';
						for ($j=0; $j < 10 ; $j++) { 
							echo '<div class="col-md-1 col-xs-1">'.$j.'</div>';
						}
						echo '</div><div class="row" style="text-align:right;">';
						echo '<div class="col-md-1 col-xs-1">0</div>';
						$j = 1;
						while($row = mysqli_fetch_array($result) ){

							$ID = $row["ID"];
							$value = $row["value"];
							$hit = $row["hit"];
							if($hit=="1"){
								if($value=="X"){
									$num1 = $num1 + 1;
									echo '<div class="'.'col-md-1 col-xs-1">'.'<input type="'.'text" id="'.$ID.'" value="X" readonly class="form-control" />'.'</div>'."\n";
								}else{
									echo '<div class="'.'col-md-1 col-xs-1">'.'<input type="'.'text" id="'.$ID.'" value="0" readonly class="form-control" />'.'</div>'."\n";
								}
							}else{
								echo '<div class="'.'col-md-1 col-xs-1">'.'<input type="'.'text" id="'.$ID.'" value="" readonly class="form-control"  />'.'</div>'."\n";
							}
							if ($i==9) {
								echo '</div>';
								if($j<10){
									echo '<div class="row" style="text-align:right;">';
									echo '<div class="'.'col-md-1 col-xs-1">'.$j.'</div>';
									$j++;
								}
								$i=0;
							} else {
								$i++;
							}
						}
					 }else{
					 	echo "Por favor, selecciona jugador";
					 	sleep(3);
		 				echo '<script type="text/javascript">window.location.assign("index.php");</script>';
					 }
					if ($num1 == 20) {
						echo '<script type="text/javascript">alert("YOU WIN");</script>';
					}
				?>
			</div><!--tabla jugador 1-->
 			<div class="col-md-6 col-xs-12">
				<h1>TABLA DEL JUGADOR</h1>
				<?php
					echo 'Hora actual: '.date('H:i:s');
						$sql = "SELECT * FROM ".$player;
						$result = mysqli_query($conexion,$sql);
						echo '<div class="row">';
						echo '<div class="col-md-1 col-xs-1"></div>';
						for ($j=0; $j < 10 ; $j++) { 
							echo '<div class="col-md-1 col-xs-1">'.$j.'</div>';
						}
						echo '</div><div class="row" style="text-align:right;">';
						echo '<div class="col-md-1 col-xs-1">0</div>';
						$j = 1;
						while($row = mysqli_fetch_array($result) ){

							$ID = $row["ID"];
							$value = $row["value"];
							$hit = $row["hit"];
							if($hit=="1"){
								if($value=="X"){
									$num2 = $num2 + 1;
									echo '<div class="'.'col-md-1 col-xs-1">'.'<input type="'.'text" id="'.$ID.'" value="X" readonly class="form-control" />'.'</div>'."\n";
								}else{
									echo '<div class="'.'col-md-1 col-xs-1">'.'<input type="'.'text" id="'.$ID.'" value="0" readonly class="form-control" />'.'</div>'."\n";
								}
							}else{
								if ($value=="X") {
								echo '<div class="'.'col-md-1 col-xs-1">'.'<input type="'.'text" id="'.$ID.'" value="<->" readonly class="form-control" />'.'</div>'."\n";
								}else{
									echo '<div class="'.'col-md-1 col-xs-1">'.'<input type="'.'text" id="'.$ID.'" value="" readonly class="form-control" />'.'</div>'."\n";
								}

							}
							if ($i==9) {
								echo '</div>';
								if($j<10){
									echo '<div class="row" style="text-align:right;">';
									echo '<div class="'.'col-md-1 col-xs-1">'.$j.'</div>';
									$j++;
								}
								$i=0;
							} else {
								$i++;
							}
						}
						if ($num2 == 20) {
							echo '<script type="text/javascript">alert("YOU LOSE");</script>';
						}
						echo '</div>';
				?>
			</div><!--tabla jugador 2--> 
		</div>
		<script type="text/javascript">
		/*function refresh(){
			$( "#1" ).load( "prueba.html" );
		}
		setTimeout(refresh,4000);*/
		</script>
		<br/><br/><br/>
		<div class="row">
			<form onSubmit="return validation()" action="php/disparar.php" name="fire" method="post" enctype="application/www-x-form-urlencoded">
				<div class="col-md-1"></div>
				<div class="col-md-1"><input id="target_txt" name="target_txt" type="text" size="8" maxlength="2"/></div>
				<div class="col-md-1"><input name="fire_btn" type="submit" class="btn btn-success" value="FIRE"/></div>
				<div class="col-md-7"></div>
				<div class="col-md-1"><input type="button" onClick="salir()" class="btn btn-danger" value="EXIT"></div>
			</form>
		</div>
	</div><!--PRUEBA-->
	</div>
</body>
</html>

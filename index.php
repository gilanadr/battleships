<!DOCTYPE html>
<html>
<head>
	<title>Barcos MisCo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/battleships.css">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="http://www.algadir.es/favicon.ico" >
</head>
<body>
	<div id="main" class="container-fluid row" style="margin-right:0px; margin-left:-10px;" >
		<div class="col-md-1  col-xs-1"></div>
		<div id="main-div" class="col-md-9 col-xs-12" >
			<form name="jugador" action="php/registrarTabla.php" method="post" enctype="application/x-www-form-urlencoded">
				<div class="row"><!--FIRST ROW-->
					<h1>Poner 20 barcos de tamaño 1, con una 'X' mayúscula</h1>
					<br /><br />
					<div class="col-md-3 hidden-xs"></div>
					<div class="col-md-6 col-xs-12">
						<?php
						echo '<div class="row" style="text-align:center;">';
						echo '<div class="col-md-1 col-xs-1"></div>';
							for ($j=0; $j < 10 ; $j++) { 
								echo '<div class="col-md-1 col-xs-1">'.$j.'</div>';
							}
							echo '</div>';
							for ($i=0; $i < 10; $i++) { 
								echo '<div class="row">'."\n";
								echo '<div class="col-md-1 col-xs-1" style="text-align:center;">'.$i.'</div>';
								for ($j=0; $j < 10; $j++) { 
									echo '<div class="col-md-1 col-xs-1 tab" id="'.$i.$j.'" ><input type="text" class="form-control" pattern="[X]" name="'.$i.$j.'_txt" /></div>'."\n";
								}
								echo '</div>';
							}
						?>
					</div>
				</div><!--FIRST ROW-->
				<div class="row"><!--SECOND ROW-->
					<br /><br />
					<div class="col-md-3 hidden-xs"></div>
					<div class="col-md-3 col-xs-8" >
						Choose your player number
					</div>
					<div class="col-md-2 col-xs-4">
						<select name="player">
							<option value="player1">player 1</option>
							<option value="player2">player 2</option>
						</select>
					</div>
					<div class="col-xs-12 visible-xs">&nbsp;</div>
					<div class="col-md-2 col-xs-12"><input type="submit" value="PLAY" class="btn btn-primary" name="submit"></div>
					<div class="col-md-2 hidden-xs"></div>
				</div><!--SECOND ROW-->
			</form>
		</div><!--Columna principal (IZQUIERDA)-->
		<div id="columnaLinea" class="col-md-1 hidden-sm hidden-xs linea-vertical-derecha">
        </div>
		<div class="visible-xs col-xs-12"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><hr /><p>&nbsp;</p><p>&nbsp;</p></div>
		<div id="login-div" class="col-md-1 col-xs-12" >
			<form name="login" action="php/login.php" method="post" enctype="application/x-www-form-urlencoded">
				<div class="row">
					<div class="col-xs-3 visible-xs"></div>
					<div class="col-xs-6 col-md-12"><p>LOGIN</p></div>
					<div class="col-xs-3 visible-xs"></div>
				</div>
				<br />
				<div class="row">
					<div class="col-xs-3 visible-xs"></div>
					<div class="col-xs-6 col-md-12"><input type="text" name="passwd_txt" placeholder="Username" class="form-control" /></div>
					<div class="col-xs-3 visible-xs"></div>
				</div>
				<div class="row">
					<div class="col-xs-3 visible-xs"></div>
					<div class="col-xs-6 col-md-12"><input type="password" name="passwd_txt" placeholder="Password (if applies)" class="form-control" /></div>
					<div class="col-xs-3 visible-xs"></div>
				</div>
				<br />
				<div class="row">
					<div class="col-xs-3 visible-xs"></div>
					<div class="col-xs-6 col-md-12"><input type="submit" value="LOGIN" class="btn btn-primary" name="login"/></div>
					<div class="col-xs-3 visible-xs"></div>
				</div>
			</form>
		</div><!--columna de login (DERECHA)-->
	</div><!--CONTAINER-->
	<script type="text/javascript">
		window.addEventListener("resize", red);

		function red(){
			var a = document.getElementById('main-div').scrollHeight;
			var b = window.innerHeight;
			var c = document.getElementById('columnaLinea');
			if (a>b){
				c.style.height = a+"px";
			}else{
				c.style.height = b+"px";
			};
		}
		function redimensionar(elemento,con){
			/*
			var a = document.getElementById('main').scrollHeight;
			var b = window.innerHeight;
			var c = document.getElementById('columnaLinea');

			ESTO SERVIA PARA LO MISMO, PERO ASI SE UTILIZA LA FUNCION DE FORMA QUE PUEDO REDIMENSIONAR MAS OBJETOS
			*/
			var a = document.getElementById(con).scrollHeight;
			var b = window.innerHeight;
			var c = document.getElementById(elemento);
			if (a>b){
				c.style.height = a+"px";
			}else{
				c.style.height = b+"px";
			};
		}
		redimensionar("columnaLinea","main");
	</script>
</body>
</html>
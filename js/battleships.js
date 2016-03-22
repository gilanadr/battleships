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
		document.onLoad = redimensionar("columnaLinea","main");
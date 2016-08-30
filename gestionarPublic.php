<!DOCTYPE html>
<html lang="es" >
	<head>
		 <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
	<!-- Esta parte es de nuestro codigo- -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesGrupo.js" type="text/javascript"></script>
		
		<script>	
			function actualizarS(div,dir){
					$(div).load(dir,"pag="+getNombreActual());
				}
			$(document).ready(function(){
				function actualizando(){ 
					actualizarS("#publicaciones","php/sincronizarPublicaciones.php");
				}
				setInterval(actualizando,45000);
			});
				
		</script>
	</head>
	<body>
		<section>
			<div id="panel">
				<div id="izquierda">
					<div class="titulo id="saludo">
						<h1> Solicitudes</h1>
					</div>
					<div id="sol">		
						<script type="text/javascript">
							listSolicitudes("#sol");
						</script>
					</div>
				</div>
			</div>
			<div id="sincr"align="left"  >
					<button onclick='actualizarS("#panel","php/sincronizarSolicitudes.php");'  type="button"  class="btn btn-primary">Actualizar Solicitudes</button>
			</div>
		</section>
	</body>
</html>
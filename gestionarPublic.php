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
	
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesGrupo.js" type="text/javascript"></script>
		
		<script>
			$(document).ready(function(){
				function actualizarS(){ 
					actualizar("#publicaciones","php/sincronizarPublicaciones.php");
				}
				setInterval(actualizarS,45000);
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
		</section>
	</body>
</html>
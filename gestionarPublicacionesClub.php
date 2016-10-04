<!DOCTYPE html>
<html lang="es" >
	<head>
		<title>FanMusic</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery.js"></script>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<!-- Esta parte es de nuestro codigo- -->
		<script src="js/funcionesClub.js" type="text/javascript"></script>
		<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css"><!--NECESARIA PARA EL DIALOG/IMAGEN-->
		<script src="js/jquery.dialog.js" type="text/javascript"></script><!--NECESARIA PARA EL DIALOG/IMAGEN-->	
		<script>
			$(document).ready(function(){
				function actualizandoS(){ 
					actualizar("#sol","gestionarSolicitudesPublic.php");
				}
				setInterval(actualizandoS,45000);
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
							listSolicitudesPublicaciones("#sol");
						</script>
					</div>
				</div>
			</div>
		</section>
	</body>
	 <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
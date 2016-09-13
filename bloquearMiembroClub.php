<!DOCTYPE html>
<html lang="es">
	<head>
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
		
	</head>
	<body>
		<div id="bloquear" class="panel panel-default" align="center">
			<div class="panel-heading">Bloquear Miembro</div>
			<div class="panel-body">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon3">Correo</span> 
					<input type="text" class="form-control" id="correoMC" aria-describedby="basic-addon3">
					<script type="text/javascript">
						$('#correoMC').tooltip({'trigger':'focus', 'title': 'Ingrese el correo del miembro que desea bloquear.'});
					</script>
				</div><br>
				<button type="button" onclick="bloquearMiembroClub();" class="btn btn-danger"  >Bloquear</button><br>
			</div>
		</div>
	</body>
	 <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
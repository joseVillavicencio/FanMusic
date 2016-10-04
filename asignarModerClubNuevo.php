<!DOCTYPE html>
<html lang="en">
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
	<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.dialog.js" type="text/javascript"></script>	
	
</head>
<body>
	<section id="p">
		<div id="designar" class="panel panel-default" align="center">
			<div class="panel-heading">Asignar Moderador</div>
			<div class="panel-body">
				<div class="input-group">
						<span class="input-group-addon" id="basic-addon3">Correo</span> 
						<input type="text" class="form-control" id="mailMod" aria-describedby="basic-addon3">
						<script type="text/javascript">
							$('#mailMod').tooltip({'trigger':'focus', 'title': 'Ingrese el correo del moderador que desea asignar.'});
						</script>
				</div><br>
				<button type="button" onclick="asignarModerador();" class="btn btn-primary">Asignar</button><br>
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
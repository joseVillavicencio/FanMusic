<!DOCTYPE html>
<html lang="es">
	<head>
		<title>FanMusic</title>		
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
		<!-- Para que funcione el toolbar, ojo puede que se acople con algo..- -->
		<script src="js/bootstrap.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="designar" class="panel panel-default" align="center">
			<div class="panel-heading">Designar Moderador</div>
			<div class="panel-body">
				<div class="input-group">
						<span class="input-group-addon" id="basic-addon3">Correo</span> 
						<input type="text" class="form-control" id="n2" aria-describedby="basic-addon3">
						<script type="text/javascript">
							$('#n2').tooltip({'trigger':'focus', 'title': 'Ingrese el correo del miembro que desea asignar como moderador.'});
						</script>
				</div><br>
				<button type="button" onclick="designarModerador();" class="btn btn-primary">Designar</button><br>
			</div>	
		</div>
	</body>
</html>
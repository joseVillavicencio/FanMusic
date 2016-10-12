<!DOCTYPE html>
<html lang="es">
	<head>
		<title>FanMusic</title>
		<meta charset="utf-8">
		<!-- Esta parte es de nuestro codigo- -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesClub.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
	</head>
	<body>
		<div id="solicitar" class="col-lg-12 col-sm-12">		
			<div id="solicitarP" class="panel panel-default">
				<div class="panel-heading" align="center" >Solicitar</div>
				<div class="panel-body" align="center">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3">Título</span> 
						<input type="text" class="form-control" id="tit" aria-describedby="basic-addon5">
						<script type="text/javascript">
							$('#tit').tooltip({'trigger':'focus', 'title': 'Debes ingresar un título (máx 50 carateres)'});
						</script>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3">Subtítulo</span> 
						<input type="text" class="form-control" id="sub" aria-describedby="basic-addon5">
						<script type="text/javascript">
							$('#sub').tooltip({'trigger':'focus', 'title': 'Debes ingresar subtítulo para su publicación(máx 50 carateres)'});
						</script>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3">Contenido</span> 
						<script type="text/javascript">
							$('#cont').tooltip({'trigger':'focus', 'title': 'Ingrese el contenido de la publicación que desee solicitar(máx 800 carateres)'});
						</script>
					</div><br>
					<textarea rows="5" style="width:100%; resize: none;"id="cont"></textarea><br>
					<button  type="button" onclick="solicitarPClub();" class="btn btn-success"  >Solicitar</button><br>
				</div>
				</div>
			</div>
			
		</div>
	</body>
</html>
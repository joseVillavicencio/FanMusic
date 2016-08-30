<!DOCTYPE html>
<html lang="es">
	<head>
		 <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="js/jquery.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<!-- Esta parte es de nuestro codigo- -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesGrupo.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="solicitar">		
			<div id="solicitarP" class="panel panel-default">
				<div class="panel-heading" align="center" >Solicitar</div>
				<div class="panel-body" align="center">Título : <input type="text"  id="tit" name="tit"><br><br>
					Subtitulo : <input type="text"  id="sub" name="sub"><br><br>
					Contenido: <input type="text"  id="cont" name="cont"><br><br>
					<button  type="button" onclick="solic();" class="btn btn-success"  >Solicitar</button><br>
				</div>
			</div>
		</div>
	</body>
</html>
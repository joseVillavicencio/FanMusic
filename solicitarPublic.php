<!DOCTYPE html>
<html lang="es">
	<head>
		<title>FanMusic</title>
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
				<div class="panel-body" align="center">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3">Título</span> 
						<input type="text" class="form-control" id="tit" aria-describedby="basic-addon5">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3">Subtítulo</span> 
						<input type="text" class="form-control" id="sub" aria-describedby="basic-addon5">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3">Contenido</span> 
					</div><br>
					<textarea rows="5" cols="30" id="cont"></textarea><br>
					<button  type="button" onclick="solic();" class="btn btn-success"  >Solicitar</button><br>
				</div>
			</div>
		</div>
	</body>
</html>
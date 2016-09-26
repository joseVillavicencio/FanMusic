<?php
	header('Content-Type: charset=utf-8');
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Clubs</title>
		<meta charset="utf-8"/>
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/funcionesClub.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/> 
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
	</head>
	<body>
		<script type="text/javascript">
			function cargarClub(div, desde){
				$(div).load(desde);
			}
			$(document).ready(function(){
				cargar_paises();
				$("#pais").change(function(){dependencia_estado();});
				$("#region").change(function(){dependencia_ciudad();});
				$("#region").attr("disabled",true);
				$("#ciudad").attr("disabled",true);
			});
		</script>
		
		<section>
			<div id="espacio">
				<div id="crear" class="panel panel-default" style="text-align:center;">
					<div class="panel-heading">Crear Club</div>
						<div class="panel-body">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Nombre del Club: </span>
								<input type="text" class="form-control" id="nombreC" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#nombreC').tooltip({'trigger':'focus', 'title': 'No debe superar los 50 caracteres'});
								</script>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Descripción: </span>
								<input type="text" class="form-control" id="descripcion" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#descripcion').tooltip({'trigger':'focus', 'title': 'No debe superar los 150 caracteres'});
								</script>
							</div>
							<br>
							<div class="input-group ">
								<span class="input-group-addon" id="basic-addon3">País:</span>
								<select id="pais" name="pais" style="color:black;"><option value="0">Selecciona País</option></select>
							</div>
							<br>
							<div class="input-group ">
								<span class="input-group-addon" id="basic-addon3">Región:</span>
								<select id="region" name="region"style="color:black;"><option value="0">Selecciona Región</option></select>
							</div>
							<br>
							<div class="input-group ">
								<span class="input-group-addon" id="basic-addon3">Ciudad:</span>
								<select id="ciudad" name="ciudad"style="color:black;"><option value="0">Selecciona Ciudad</option></select>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Alias: </span>
								<input type="text" class="form-control" id="alias" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#alias').tooltip({'trigger':'focus', 'title': '¿A qué Artista o Banda seguirán? (No más de 20 caracteres)'});
								</script>
							</div>
							<br>
							<hr>
							<button  type="button" onclick="clubCrear();" class="btn btn-primary">Crear</button><br>
						</div>
				</div>
			</div> 
			
			</section>
		
	</body>
</html>

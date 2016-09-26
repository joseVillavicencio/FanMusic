<!DOCTYPE html>
<html lang="es" >
	<head>
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/funcionesGrupo.js" type="text/javascript"></script>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
	</head>
	<body>
		<script type="text/javascript">
			$(document).ready(function(){
				cargar_paises();
				$("#pais").change(function(){dependencia_estado();});
				$("#region").change(function(){dependencia_ciudad();});
				$("#region").attr("disabled",true);
				$("#ciudad").attr("disabled",true);
			});
		</script>
		<section>
			<div id="derecha" style="margin-left:5%;margin-right:5%; text-align:center;">
				<div id="crear" class="panel panel-default" style="">
					<div class="panel-heading">Crear Grupo</div>
							<div class="panel-body">
								<!-- Falta subir la foto, pero nose si lo hace jose o yo ....-->
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Nombre del Grupo: </span>
									<input type="text" class="form-control" id="nombre" aria-describedby="basic-addon3">
									<script type="text/javascript">
										$('#nombre').tooltip({'trigger':'focus', 'title': 'No debe superar los 50 caracteres'});
								</script>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Alias: </span>
									<input type="text" class="form-control" id="al" aria-describedby="basic-addon3">
									<script type="text/javascript">
										$('#al').tooltip({'trigger':'focus', 'title': '¿Qué Artista en especifico seguirán? (No debe superar los 20 caracteres)'});
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
									<span class="input-group-addon" id="basic-addon3">Descripción: </span>
									<input type="text" class="form-control" id="descripcion" aria-describedby="basic-addon3">
									<script type="text/javascript">
										$('#descripcion').tooltip({'trigger':'focus', 'title': 'No debe superar los 150 caracteres'});
								</script>
								</div>
								<br>
								<hr>
								<button  type="button" onclick="crearGrupo2();" class="btn btn-primary">Crear Grupo</button>
							</div>
				</div>
			</div>
		</section>
	</body>
</html>
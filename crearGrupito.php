<!DOCTYPE html>
<html lang="es" >
	<head>
		<title>FanMusic</title>
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
			<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Crear Grupo</button>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						  <div class="modal-header"  style="color:black;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Crear Grupo</h4>
						  </div>
						  <div class="modal-body">
							<div id="crear" class="panel panel-default" style="">
								
								<div class="panel-body"  align="center">
									<!-- Falta subir la foto, pero nose si lo hace jose o yo ....-->
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon3">Nombre del Grupo: </span>
										<input type="text" class="form-control" id="nombreG" aria-describedby="basic-addon3">
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
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon3">Descripción: </span>
										<input type="text" class="form-control" id="descripcion" aria-describedby="basic-addon3">
										<script type="text/javascript">
											$('#descripcion').tooltip({'trigger':'focus', 'title': 'No debe superar los 150 caracteres'});
										</script>
									</div>
									<br>
									<div class="input-group ">
										<select id="pais" name="pais" style="color:black;"><option value="0">Selecciona País</option></select>
									</div>
									<br>
									<div class="input-group ">
										<select id="region" name="region"style="color:black;"><option value="0">Selecciona Región</option></select>
									</div>
									<br>
									<div class="input-group ">
										<select id="ciudad" name="ciudad"style="color:black;"><option value="0">Selecciona Ciudad</option></select>
									</div>
								</div>
		
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Cerrar</button>
							<button  type="button" onclick="crearGrupo2();" class="btn btn-info">Crear</button><br>
						 </div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
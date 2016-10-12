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
				<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal2">Crear Club</button>
				<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							  <div class="modal-header"  style="color:black;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Crear Club</h4>
							  </div>
							  <div class="modal-body">
									<div id="crear" class="panel panel-default" style="">
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
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon3">Artista: </span>
											<input type="text" class="form-control" id="alias" aria-describedby="basic-addon3">
											<script type="text/javascript">
													$('#alias').tooltip({'trigger':'focus', 'title': '¿A qué Artista o Banda seguirán? (No más de 20 caracteres)'});
											</script>
										</div>
										<br>
										<div class="input-group"  >
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
							  <div class="modal-footer">
								<button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Cerrar</button>
								<button  type="button" onclick="clubCrear();" class="btn btn-info">Crear</button><br>
							 </div>
						</div>
					</div>
				</div>
			</div> 
		</section>
	</body>
</html>

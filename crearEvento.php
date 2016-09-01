<!DOCTYPE html>
<html lang="es" >
	<head>
		<title>Eventos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/jquery.js" type="text/javascript"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<!--<link href="css/bootstrap.css" rel="stylesheet">-->
		<link href="css/jquery.datetimepicker.css" rel="stylesheet" type="text/css">	<!--Para el datetimepicker-->	
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/funcionesEvento.js" type="text/javascript"></script>
		<script src="js/jquery.datetimepicker.full.min.js" type="text/javascript"></script>		<!--Para el datetimepicker-->
		<meta charset="utf-8"/>
	</head>
	<body>
		<section id="explore">
			<div id="derecha">
				<div id="crear" class="panel panel-default">
					<div class="panel-heading">Crear Evento</div>
					<div class="panel-body">
						<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Nombre:</span>
								<input type="text" class="form-control" placeholder="Ingrese Nombre" id="nombreE" aria-describedby="basic-addon3">
								<script type="text/javascript">
									$('#nombreE').tooltip({'trigger':'focus', 'title': 'Titulo del Evento'});
								</script>
						</div>
						<br>
						<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Motivo:</span>
								<input type="text" class="form-control" placeholder="Ingrese Motivo" id="motivoE" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#motivoE').tooltip({'trigger':'focus', 'title': 'A que se deberá el evento'});
									</script>
						</div>
						<br>
						<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Descripcion:</span>
								<input type="text" class="form-control" placeholder="Ingrese Descripción"  id="desE" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#desE').tooltip({'trigger':'focus', 'title': 'En que consiste el evento'});
									</script>
						</div>
						<br>
						<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">País:</span>
								<input type="text" class="form-control" id="paE" aria-describedby="basic-addon3">
						</div>
						<br>
						<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Región:</span>
								<input type="text" class="form-control" id="regE" aria-describedby="basic-addon3">
						</div>
						<br>
						<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Ciudad:</span>
								<input type="text" class="form-control" id="ciE" aria-describedby="basic-addon3">
						</div>
						<br>
						<div class="row">
							<div class="col-lg-9 col-sm-7">
								<p><big>A continuación, ingrese tres propuestas de fechas, indicando la hora para realizar su  evento: </big></p>
								<br>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Opción 1:</span>
									<input id="datetimepicker" type="text" name="fecha" class="form-control" aria-describedby="basic-addon3">
									<script>jQuery('#datetimepicker').datetimepicker({minDate:'-1970/01/02'});</script>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Opción 2:</span>
									<input id="datetimepicker1" type="text" name="fecha" class="form-control" aria-describedby="basic-addon3">
									<script>jQuery('#datetimepicker1').datetimepicker({minDate:'-1970/01/02'});</script>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Opción 3:</span>
									<input id="datetimepicker2" type="text" name="fecha" class="form-control" aria-describedby="basic-addon3">
									<script>jQuery('#datetimepicker2').datetimepicker({minDate:'-1970/01/02'});</script>
								</div>
								<br>
							</div>
							<div class="col-lg-3 col-sm-5" style="text-align:center;">
								<p><em> Seleccione el tipo de evento que desea realizar, FanMusic notificará a todos los miembros del: </em></p>
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" id="invitar" value="Pais"  name="invitar" >
										&nbsp;&nbsp;País
									</span>
								</div>
								&nbsp;
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" id="invitar" value="Region"  name="invitar" >
										&nbsp;&nbsp;Región
									</span>
								</div>
								&nbsp;
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" value="Ciudad"   id="invitar" name="invitar" >
										&nbsp;&nbsp;Ciudad
									</span>
								</div>
								&nbsp;
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" value="Todos"   id="invitar" name="invitar" >
										&nbsp;&nbsp;Todos
									</span>
								</div>
							</div>
						</div>
						<br>
						<button  type="button" onclick="crearEvento2();" class="btn btn-primary">Crear Evento</button><br>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
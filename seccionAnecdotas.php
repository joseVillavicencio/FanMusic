<!DOCTYPE html>
<html lang="en">
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/funcionesClub.js" type="text/javascript"></script>
		<meta charset="utf-8"/>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/jquery.goup.min.js" type="text/javascript"></script><!--NUEVO-->
</head>
<body>
	<section id="perfil2">
		<div class="row">
			<div id="listasAnecdota2" > <!--class="col-lg-4 col-sm-4"-->
				<div class="panel panel-default" style="text-align:center;">
					<div class="panel panel-heading">
						<div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span>
							<input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3">
						</div>
						<script type="text/javascript">
							$('#tituloNuevo').tooltip({'trigger':'focus', 'title': 'Ingrese un título adecuado para tu anécdota'});
						</script>
					</div>
					<div class="panel panel-body"><div class="input-group"></div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">Contenido</span> 
							<input type="text" class="form-control" id="contenidoNuevo" aria-describedby="basic-addon5">
							<script type="text/javascript">
								$('#contenidoNuevo').tooltip({'trigger':'focus', 'title': 'Cuéntanos tu anécdota'});
							</script>
						</div><br>';
						<span class="input-group-addon" id="basic-addon3">¿Deseas Compartirlo con alguno de tus Clubs?</span><br>
						<div id="pegar">
							<script type="text/javascript">
								listarClubs("#pegar");
							</script>
						</div>
						<div class="panel panel-footer"><button class="btn btn-primary" onclick="publicarAnecdota();">Compartir</button></div>
					</div>
				</div>
			</div>
			<div id="listasAnecdota" >
				<script type="text/javascript">
					mostrarAnecdota("#listasAnecdota");
				</script>
			</div>
		</div>
	</section><!--/#explore-->
</body>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>FanMusic</title>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesEvento.js" type="text/javascript"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<!-- Esta parte es de nuestro codigo- -->
		<script src="Highcharts-4.1.5/js/highcharts.js"></script>
		<!--<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css">NECESARIA PARA EL DIALOG/IMAGEN-->
	<!--<script src="js/jquery.dialog.js" type="text/javascript"></script>NECESARIA PARA EL DIALOG/IMAGEN-->	
		<style type="text/css">
			.back-to-top {
				cursor: pointer;
				position: fixed;
				bottom: 0;
				right: 20px;
				display:none;
				background-color: #1B7B98;
				color: #fff;
			}
		</style>
	</head>

	<body>
		<script type="text/javascript">
			if(notLogged()){
				location.href= '/FanMusic/indexNuevo.php';
			}
		</script>
		<header id="header" role="navigation">		
		<div class="main-nav">
			<div class="container-fluid">
				<div class="row">
					
						<div class="navbar-header" style="background-color: #1B7B98;">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Desplegar navegación</span>
							</button>
							<a class="navbar-brand" href="indexNuevo.php">
								<img class="img-responsive" src="images/logo2.png" alt="logo">
							</a> 
						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color: #1B7B98;">
							<ul class="nav navbar-nav"></ul>
							<ul class="nav navbar-nav navbar-right">                 
								<li><a  href="bienvenida.php" >Novedades</a></li>
								<li class="scroll "><a href="bienvenidaNuevo.php#contact">Clubs</a></li>
								<li class="scroll"><a href="bienvenidaNuevo.php#event">Grupos</a></li>                         
								<li class="scroll"><a href="bienvenidaNuevo.php#explore">Eventos</a></li>
								<li class="scroll"><a href="bienvenidaNuevo.php#about">Búsqueda</a></li>
								<li><a href='perfilNuevo.php'><span class="glyphicon glyphicon-user"></span>Mi perfil</a></li>
								<li><a href="indexNuevo.php" onclick="logOut();"><span class="glyphicon glyphicon-log-out"></span></a></li>								
							</ul>
						</div>
					
				</div>
			</div>
		</div>
	</header>
		<section id="explore" >
			<div class="row"  style="postion: absolute ; Height:100%" >
				<div class="watch">
						<img class="img-responsive" src="images/watch.png" alt="">
				</div>				
				<div class="col-md-7 col-md-offset-3 col-sm-11" >
					<div id="eventos general" class="table-responsive" align="center">
						<table class="table" >
							<thead>
								<tr>
									<th>Club/Grupo</th>
									<th>Evento</th>
									<th>Posibles Fechas</th>
									<th></th>
									<th></th>
									<th>Invitados</th>
									<th>Cantidad Respuestas</th>
									<th>Opciones</th>
									<th></th>
								</tr>
							</thead>
								<tbody id="resultadoHorario">
									<script type="text/javascript">
										mostrarResultados("#resultadoHorario");
									</script>
								</tbody>
						</table>
					</div>
				</div>
				
			</div>			
		</section>
		<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Back to Top" data-toggle="tooltip" data-placement="top">
		  <span class="glyphicon glyphicon-chevron-up"></span>
		</a>
		<script type="text/javascript">
			$(document).ready(function(){
			 $(window).scroll(function () {
					if ($(this).scrollTop() > 50) {
						$('#back-to-top').fadeIn();
					} else {
						$('#back-to-top').fadeOut();
					}
				});
				// scroll body to 0px on click
				$('#back-to-top').click(function () {
					$('#back-to-top').tooltip('hide');
					$('body,html').animate({
						scrollTop: 0
					}, 800);
					return false;
				});
				
				$('#back-to-top').tooltip('show');

			});
		</script>
		</body>
		 <footer id="footer">
			<div class="container">
				<div class="text-center">
					<p> Sitio desarrollado por Dania Delgado - Tania Pizarro - Jose Villavicencio &copy;2016<br>
				</div>
			</div>
		</footer>
	</body>  
</html>
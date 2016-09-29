<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesEvento.js" type="text/javascript"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<!-- Esta parte es de nuestro codigo- -->
		<script src="Highcharts-4.1.5/js/highcharts.js"></script>
		<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css"><!--NECESARIA PARA EL DIALOG/IMAGEN-->
	<script src="js/jquery.dialog.js" type="text/javascript"></script><!--NECESARIA PARA EL DIALOG/IMAGEN-->	
	</head>

	<body>
		<script type="text/javascript">
			if(notLogged()){
				location.href= '/FanMusic/indexNuevo.php';
			}
		</script>
		<header id="header" role="banner">		
			<div class="main-nav">
				<div class="container">
					   
					<div class="row">	        		
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="indexNuevo.php">
								<img class="img-responsive" src="images/logo2.png" alt="logo">
							</a>                    
						</div>
					</div>
				</div>
			</div>                    
		</header>
		<!--/#header--> 
		<section id="explore">
			<div class="row">
				<div class="watch">
						<img class="img-responsive" src="images/watch.png" alt="">
				</div>				
				<div class="col-md-7 col-md-offset-3 col-sm-11">
					<div id="eventos general" align="center">
						<table class="table" >
							<thead>
								<tr>
									<th>Club/Grupo</th>
									<th>Evento</th>
									<th>Posibles Fechas</th>
									<th></th>
									<th></th>
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
		 <footer id="footer" style="postion: absolute ;bottom:0;">
			<div class="container">
				<div class="text-center">
					<p> Sitio desarrollado por Dania Delgado - Tania Pizarro - Jose Villavicencio &copy;2016<br>
				</div>
			</div>
		</footer>
	</body>  
</html>
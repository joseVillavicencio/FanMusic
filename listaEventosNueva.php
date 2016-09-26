<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<!-- Esta parte es de nuestro codigo- -->
		<link href="css/jquery.datetimepicker.css" rel="stylesheet" type="text/css">	<!--Para el datetimepicker-->	
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/funcionesEvento.js" type="text/javascript"></script>
		<script src="js/jquery.datetimepicker.full.min.js" type="text/javascript"></script>		<!--Para el datetimepicker-->
		
		
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
   	<section id="explore">
		<div class="container">
			<div class="row">
				<div class="watch">
					<img class="img-responsive" src="images/watch.png" alt="">
				</div>				
				<div class="col-md-4 col-md-offset-4 col-sm-11">
					<h2>Eventos</h2>
					<div id="evento">		
						<table class="table" >
						  <thead>
								<tr>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Motivo</th>
									<th>Ciudad</th>
									<th>Region</th>
									<th>Fecha Final</th>
									<th>Opción</th>
								</tr>
						  </thead>
							<tbody id="cuerpotablaNuevo">
								<script type="text/javascript">
									tablaEventos("#cuerpotablaNuevo");
								</script>
							</tbody>
						</table>
					</div>	
				</div><br>
				
				<div id="evento2" style = "text-align:center ; " class="col-lg-6 col-lg-offset-3 col-sm-12">
					<script type="text/javascript">
						crearEventos("#evento2");
					</script>
				</div>
				
				<div id="evento4"  style = " text-align:center;"  class="col-lg-8 col-sm-12">
					<script type="text/javascript">
						mostrarLideresCorreo("#evento4");
					</script>
				</div>
			</div>			
		</div>
	</section><!--/#explore-->
	 <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p> Sitio desarrollado por Dania Delgado - Tania Pizarro - Jose Villavicencio &copy;2016<br>
				<!--Designed by <a target="_blank" href="http://shapebootstrap.net/">ShapeBootstrap</a></p>  EN ALGUN MOMENTO PUEDE SERVIR-->              
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
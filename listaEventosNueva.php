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
	<header id="header" role="banner">		
		<div class="main-nav">
			<div class="container-fluid">
				<div class="row">	        		
		            <div class="navbar-header">
		                <a class="navbar-brand" href="indexNuevo.php">
		                	<img class="img-responsive" src="images/logo2.png" alt="logo">
		                </a>                    
		            </div>
		            <div class="collapse navbar-collapse">
		                <ul class="nav navbar-nav navbar-right">                 
							<li><a  href="bienvenidaNuevo.php" >Inicio</a></li>
							<li><a  href="bienvenida.php" >Novedades</a></li>
							<li><a href='perfilNuevo.php'><span class="glyphicon glyphicon-user"></span>Mi perfil</a></li>
							<li><a href="indexNuevo.php" onclick="logOut();"><span class="glyphicon glyphicon-log-out"></span></a></li>
						</ul>
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
				<div class="col-md-4 col-md-offset-3 col-sm-12">
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
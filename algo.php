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
	<link href="css/jquery.e-calendar.css" rel="stylesheet">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/jquery.e-calendar.js" type="text/javascript"></script>
	<script src="js/jquery.goup.min.js" type="text/javascript"></script><!--NUEVO-->
	<script src="js/nuevo.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			function cargarClub(div, desde){
				$(div).load(desde);
			}
		</script>
		<script type="text/javascript">
			
			carrusel1("#numero");
			carrusel2("#imags");
			$(document).ready(function(){
				function actualizando(){ 
					/*actualizar("#izquierda","listPuClu.php");
					actualizar("#derecha","listPuGru.php");*/
				}
				$('.main-slider').carousel({
					interval:5000
					});
				
			});
			
		</script>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery.goup();
			});
		</script>
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
		            <div class="collapse navbar-collapse">
		                <ul class="nav navbar-nav navbar-right">                 
							<li><a  href="bienvenida.php" >Bienvenida</a></li>
							<li class="scroll active"><a href="#contact">Clubs</a></li>
		                    <li class="scroll"><a href="#event">Grupos</a></li>                         
		                    <li class="scroll"><a href="#explore">Eventos</a></li>
		                    <li class="scroll"><a href="#about">Búsqueda</a></li>
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
				<center><h2>Calendario de FanMusic</h2></center>
				<div class="col-md-10 col-md-offset-2 col-sm-12">
					<div id="calendar" class="col-md-8">
						<script type="text/javascript">
							calendario("#calendar");
						</script>
					</div>
					<div id="e" class="col-md-4 col-sm-12" style="text-align:center;">
						<script type="text/javascript" >
							botonesEvento("#e"); //JOSE MVOER ESTA WEA PARA LA DERECHA
						</script>
					</div>
				</div><br>
					
				<div class="col-sm-12 col-md-12">					
					<h2>Tienes los siguientes eventos :</h2>
					<div id="asistenciaEventos" style="text-align:center">
						<script type="text/javascript">
							asistenciaEvento("#asistenciaEventos");
						</script>
					</div>
				</div>
			</div>			
		</div>
	</section>
	</body>
    <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p> Sitio desarrollado por Dania Delgado - Tania Pizarro - Jose Villavicencio &copy;2016<br>
		     </div>
        </div>
    </footer>
   	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <!--<script type="text/javascript" src="js/jquery.scrollTo.js"></script>-->
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
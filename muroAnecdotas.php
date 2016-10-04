<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery.js"></script>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<!-- Esta parte es de nuestro codigo- -->
		<script src="js/funcionesClub.js" type="text/javascript"></script>
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
		<section id="perfilClub">
			<div class="container">
				<div class="row">
					<div class="watch">
						<!--<img class="img-responsive" src="images/watch.png" alt="">-->
					</div>				
					<div id="portada perfil" align="center">
						<div id="botonEditar">
								<script type="text/javascript">
									editarPerfilClub("#botonEditar"); 
								</script>
						</div>
						<div id="botonDejarSeguir">
								<script type="text/javascript">
									dejarSeguirClub("#botonDejarSeguir");
								</script>
						</div>	
						
						<div id="fotoPerfil" >
							<script type="text/javascript">
								fotoPerfilClub("#fotoPerfil"); 
							</script>
						</div>
						
						<div id="presentacion" class="panel panel-info">
								<script type="text/javascript">
								presentacionClub("#presentacion"); 
							</script>
						</div>
						<div id="desc_g" >
							<script type="text/javascript">
								desc_Club("#desc_g"); 
							</script>
						</div><br>
						<div id="vol" >
							<button type="button" onclick="volver();" class="btn btn-primary" >Volver</button><br>
						</div>
					</div>
				</div>	
			</div>
			<hr>
			<div class="row" >
				<div id="muroClub" class="col-lg-5 col-lg-offset-1 col-sm-8 " style="text-align:center;">
					<script type="text/javascript">
						muroDelClub("#muroClub");
					</script>
				</div>
				<div id="listasCover" class="col-lg-5 col-sm-8 " style="text-align:center;">
					<script type="text/javascript">
						mostrarCovers("#listasCover");
					</script>
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
	 <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
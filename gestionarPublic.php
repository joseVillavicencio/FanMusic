<!DOCTYPE html>
<html lang="es" >
	<head>
		<title>FanMusic</title>
		<script type="text/javascript" src="js/jquery.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<script src="js/funcionesGrupo.js" type="text/javascript"></script>
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
		<script>
			$(document).ready(function(){
				function actualizandoS(){ 
					actualizar("#sol","gestionarSolicitudesPublic.php");
				}
				setInterval(actualizandoS,45000);
			});
		</script>
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
		<section id="perfilGrupo">
			<div class="container">
				<div class="row">
					<div id="portada perfil" align="center">	
						<div id="fotoPerfil" >
							<script type="text/javascript">
								fotoPerfilGrupo("#fotoPerfil"); 
							</script>
						</div>
						<div id="rescatar"> 
							
						</div>
						<div id="presentacion" class="panel panel-info">
							<script type="text/javascript">
								presentacion("#presentacion"); 
							</script>
						</div>
						<div id="desc_g" >
							<script type="text/javascript">
								desc_g("#desc_g"); 
							</script>
						</div><br>
						<div id="vol" >
							<button type="button" onclick="volver();" class="btn btn-primary" >Volver</button><br>
						</div>
						<br>
					</div>
					
				</div>
			
				<div id="panel">
					<div id="izquierda">
						<div class="titulo id="saludo">
							<h1> Solicitudes</h1>
						</div>
						<div id="sol">		
							<script type="text/javascript">
								listSolicitudes("#sol");
							</script>
						</div>
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
					actualizar("#sol","gestionarSolicitudesPublic.php");
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
</html>
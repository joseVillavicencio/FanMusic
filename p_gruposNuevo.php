<!DOCTYPE html>
<html lang="en">
<head>
    <title>Grupos</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/funcionesGrupo.js" type="text/javascript"></script>
		<meta charset="utf-8"/>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<!--<script src="js/jquery.goup.min.js" type="text/javascript"></script>NUEVO-->
	
	<script>
		function cargar(div, desde){
			$(div).load(desde);
		}
	</script>
	<script>
		$(document).ready(function(){
			function actualizando(){ 
				actualizar("#publicaciones","php/grupListPub.php");
			}
			setInterval(actualizando,45000);
		});
	</script>
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
	<!--<script>
		jQuery(document).ready(function(){
			jQuery.goup();
		});
	</script>-->
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
   	<section id="perfilGrupo">
		<div class="container">
			<div class="row">
				<div id="portada perfil" align="center">
					<div id="botonCeder">
						<script type="text/javascript">
							opcionCeder("#botonCeder");
						</script>
					</div>
					<div id="botonDejarSeguir">
						<script type="text/javascript">
							dejarSeguir("#botonDejarSeguir");
						</script>
					</div>	
					<div id="rescatar">
						<?php $nombreG = $_GET["pag"];?>
						<input type="hidden" id="nom_grup" value="<?php echo $nombreG;?>">
						<script type="text/javascript">
							setNombreActual("nom_grup");
						</script>
					</div>
					<div id="fotoPerfil" >
						<script type="text/javascript">
							fotoPerfilGrupo("#fotoPerfil"); 
						</script>
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
					</div>
					<br>
					<div id="gestion">
						<script type="text/javascript">
							opcionesGestion("#gestion");
						</script>
					</div>		
					<br><br>
				</div>
				<div class="row" style="text-align:center;">
					<div class="col-lg-1 col-sm-1">
					</div>
					<div id="publicaciones" class="col-lg-6 col-sm-6">
						<script type="text/javascript">
							mostrarP("#publicaciones");
						</script>
					</div>
					<div class="col-lg-4 col-sm-5">
						<div id="nuevo">
							<script type="text/javascript">
									nuevaPubli("#nuevo");
							</script>
						</div>
						<div id="opciones" >
						</div>
					</div>
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
</html>
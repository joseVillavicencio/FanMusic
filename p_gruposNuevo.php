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
		<script src="js/jquery.goup.min.js" type="text/javascript"></script><!--NUEVO-->
	
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
	<script>
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
	 <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p> Sitio desarrollado por Dania Delgado - Tania Pizarro - Jose Villavicencio &copy;2016<br>
				<!--Designed by <a target="_blank" href="http://shapebootstrap.net/">ShapeBootstrap</a></p>  EN ALGUN MOMENTO PUEDE SERVIR-->              
            </div>
        </div>
    </footer>
</html>
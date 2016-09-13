<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js" type="text/javascript"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/mainFanApp.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<script type="text/javascript" src="js/smoothscroll.js"></script>
	<!-- Esta parte es de nuestro codigo- -->
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/funcionesPerfil.js" type="text/javascript"></script>
</head>
<body>
	
	<script type="text/javascript">
			if(notLogged()){
				location.href= '/FanMusic/indexNuevo.php';
			}
	</script>
	<script>
		function cargarPerfil(div, desde){
			$(div).load(desde);
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
   	<section id="perfil">
		<div id="portada perfil" align="center">
			<div class="row">	
				<div class="miembro">
					<img class="img-responsive" src="images/miembro.png" alt="">
				</div>	
				<a href="editar_perfilNuevo.php" class="btn btn-primary btn-md" role="button" align="right">Editar Perfil</a>
				<br>
				<div id="foto">
					<script>
						imagenperfil("#foto");
					</script>
				</div>
				<div id="presentacion" class="panel panel-info">
					<script type="text/javascript">
						presentacion("#presentacion");
					</script>
				</div>
				<div class="row">
					<div id="descripcion" class="col-lg-12 col-sm-12">
						<script>
							mostrarDescripcion("#descripcion");
							redesSoc("#descripcion");
						</script>
					</div>
				</div>
				<br>
				<div id="anecdota" align="center" class="row">
						<script type="text/javascript">
							secciones("#anecdota");
						</script>
				</div>
				<hr>
				<div class="row">
					<div id="comentarios"  class="col-lg-4 col-lg-offset-1 col-sm-4 col-sm-offset-1">
						<script type="text/javascript">
							mostrarComentarios("#comentarios");
						</script>
					</div>
					<div id="opcionesPerfil" class="col-lg-7 col-sm-7">
					</div> 
				</div>
			</div>	
		</div>	
		
	</section>
	 <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p> Sitio desarrollado por Dania Delgado - Tania Pizarro - Jose Villavicencio &copy;2016<br>
		    </div>
        </div>
    </footer>
	 <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
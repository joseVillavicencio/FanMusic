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
		
	</head>
	<body>
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
						</div>
						<br>
					</div>
				</div>	
			</div>
			<hr>
			<div class="row" style=" text-align:center;" >
				<div id="muroClub" class="col-lg-5 col-lg-offset-1 col-sm-8 col-sm-offset-2">
					<script type="text/javascript">
						muroDelClub("#muroClub");
					</script>
				</div>
				<div id="listasCover" class="col-lg-5 col-sm-8 col-sm-offset-2">
					<script type="text/javascript">
						mostrarCovers("#listasCover");
					</script>
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
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
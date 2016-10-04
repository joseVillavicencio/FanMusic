<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/mainFanApp.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<!-- Esta parte es de nuestro codigo- -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesGrupo.js" type="text/javascript"></script>
		
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
				<div id="fotoPerfil" >
					<script type="text/javascript">
						fotoPerfilGrupo("#fotoPerfil");  <!-- Muestro la foto actual->
					</script>
				</div>
				<div id="nuevaFoto" type="text/javascript" >
					<script>
						subirFotoPerfilGrupo("#nuevaFoto");  
					</script>
				</div>	
				<br><br>
				<div id="rescatarNombreG" class="panel panel-info">
					<script type="text/javascript" >
						presentacion("#rescatarNombreG"); <!-- Muestro el nombre del grupo-->
					</script>
				</div>
				<div id="vol" >
					<button type="button" onclick="volver();" class="btn btn-primary" >Volver</button><br>
				</div>
				<br>
				<div id="datos" >
					
					<div class="panel-body">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">Descripción</span> 
							<input type="text" class="form-control" id="descripcion" aria-describedby="basic-addon3">
						</div><br>
						<button type="button" onclick="cargarCambiosPerfilGrupo();" class="btn btn-success">Editar Información</button>
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
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
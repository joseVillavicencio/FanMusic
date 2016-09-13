<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/mainFanApp.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<script src="js/jquery.js" type="text/javascript"></script>
	<link href="css/responsive.css" rel="stylesheet">
	
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
				<button type="button" onclick="eliminarCuenta();" class="btn btn-danger">Eliminar Cuenta</button>

				<div id="foto2">
					<script>
						imagenperfil("#foto2");
					</script>
				</div>
				<div id="foto">
					<script>
						subirFotoPerfilMiembro("#foto");
					</script>
				</div>		
				<br>
			<div class="row">
				<div class="col-lg-6 col-sm-12">
					<div id="presentacion" class="panel panel-info" style="margin-left:5%;margin-right:5%;">
						<div class="panel-heading">
							<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Apodo: </span>
									<input type="text" class="form-control" id="APODO" aria-describedby="basic-addon3">
									<script type="text/javascript">
										$('#APODO').tooltip({'trigger':'focus', 'title': 'El apodo debe ser escrito solo en minúsculas'});
									</script>
							</div>
							<br>
							<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Gustos: </span>
									<input type="text" class="form-control" id="GUSTOS" aria-describedby="basic-addon3">
							</div>
							<br>
							<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Descripción: </span>
									<input type="text" class="form-control" id="DESCRIP" aria-describedby="basic-addon3">
							</div>
							<br>
						</div>
						<div class="panel panel-body">
							<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Nueva Contraseña: </span>
									<input type="password" class="form-control" id="PASSnue" aria-describedby="basic-addon3">
									<script type="text/javascript">
										$('#PASSnue').tooltip({'trigger':'focus', 'title': 'La Contraseña debe tener al menos una Mayúscula, tres números y un largo superior a 6 carácteres.'});
									</script>
							</div>
							<br>
							<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Antigua Contraseña: </span>
									<input type="password" class="form-control" id="PASSant" aria-describedby="basic-addon3">
							</div>
							<br>
							<br>
							<button type="button" onclick="revisarApodo();" class="btn btn-primary">Guardar Cambios</button>
						</div>
					</div>
				</div>
				<div class="panel panel-default col-lg-6 col-sm-12">
					<div id="redes sociales" style="margin-left:5%;margin-right:5%; tex-align:center; color:black;" >
						<div class="alert alert-warning" role="alert">Recuerda escribir toda la dirección :) </div><br>
						<div id="twitter2">
							<script type="text/javascript">
								cambiarTwitter("#twitter2"); 
							</script>
						</div>
						<div id="facebook">
							<script type="text/javascript">
								cambiarFacebook("#facebook"); 
							</script>
						</div>
						<div id="youtube">
							<script type="text/javascript">
								cambiarYoutube("#youtube"); 
							</script>
						</div>
						<div id="tumblr">
							<script type="text/javascript">
								cambiarTumblr("#tumblr"); 
							</script>
						</div>
						<div id="instagram">
							<script type="text/javascript">
								cambiarInstagram("#instagram"); 
							</script>
						</div>
					</div><br>
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
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
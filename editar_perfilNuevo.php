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
							<h3>¿Qué deseas editar?</h3>
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
						<h3> Editar Redes Sociales</h3><br>
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
    
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>FanMusic</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery.js"></script>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/funcionesClub.js" type="text/javascript"></script>
		<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css"><!--NECESARIA PARA EL DIALOG/IMAGEN-->
		<script src="js/jquery.dialog.js" type="text/javascript"></script><!--NECESARIA PARA EL DIALOG/IMAGEN-->	
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
				<div id="portada perfil" align="center">
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
					<div id="vol" >
						<button type="button" onclick="volver();" class="btn btn-primary" >Volver</button><br>
					</div>	
				</div>
			</div>
		</div>
		<div id="superior" class="row">
			<div class="col-lg-6 col-md-6 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" style="margin-left:3%;margin-right:3%;" id="listaFinanzas" >		
				<h2>Miembros Bloqueados</h2><br>
				<table class="table table-striped" >
				  <thead>
					<tr>
						<th>Alias</th>
						<th>Correo</th>
						<th>Opción</th>
					</tr>
					</thead>
					<tbody id="tablaB">
						<script type="text/javascript">
							tablaBloqueados("#tablaB")
						</script>
					</tbody>
				</table>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >
				<center>
				<div id="bloquear" class="panel panel-default">
					<div class="panel-heading">Bloquear Miembro</div>
					<div class="panel-body">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">Correo</span> 
							<input type="text" class="form-control" id="correoMC" aria-describedby="basic-addon3">
							<script type="text/javascript">
								$('#correoMC').tooltip({'trigger':'focus', 'title': 'Ingrese el correo del miembro que desea bloquear.'});
							</script>
						</div><br>
						<button type="button" onclick="bloquearMiembroClub();" class="btn btn-danger"  >Bloquear</button><br>
					</div>
				</div>
				</center>
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
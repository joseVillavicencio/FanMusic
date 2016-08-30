<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Busqueda</title>
		<script src="js/jquery.js"></script>
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="js/bootstrap.js"></script>
		<script src="js/funciones.js" type="text/javascript"></script>
		<meta charset="utf-8"/>
		<script>
			carrusel1("#numero");
			carrusel2("#imags");
			
			$(document).ready(function(){
				$('.myCarousel').carousel()
			});
		</script>
	</head>
	<body>
		<script type="text/javascript">
			if(notLogged()){
				location.href= '/FanMusic/index.php';
			}
		</script>
		<header>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="bienvenida.php">FanApp</a>
					</div>
					<ul class="nav navbar-nav">
					  <li><a href="bienvenidaClub.php">Clubs</a></li>
					  <li><a href="vistaGrupos.php">Grupos</a></li>
					  <li><a href="miseventos.php">Eventos</a></li>
					  <li  class="active"><a href="busqueda.php">Buscar</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href='perfil.php'><span class="glyphicon glyphicon-user"></span>Mi perfil</a></li>
						<li><a href="index.php" onclick="logOut();"><span class="glyphicon glyphicon-log-out"></span></a></li>
					</ul>
				</div> 
			</nav>
		</header>
		<section>
			<div class="row">
				<div id="busqueda" align="center" class="col-lg-6 col-sm-6">
					<h2>Ingresa algo para comenzar la busqueda</h2>
					<input type="text"  id="buscando" name="buscando"><button  type="button" onclick='buscare("#respuesta");'  class="btn btn-info" >Buscar</button><br>
				</div>
				<div id="respuesta" align="center" class="col-lg-6 col-sm-6">
				</div>
			</div>
			<br>
			<hr>
			<div class="row">
				<div id="contenedor">
					<div id="myCarousel" class="carousel slide">
					  <ol class="carousel-indicators" id="numero">
					  </ol>
					  <!-- Carousel items -->
					  <div class="carousel-inner" id="imags">
					  </div>
					  <!-- Carousel nav -->
					  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
					</div>
				</div>
				
			</div>
		</section>
	</body>
</html>

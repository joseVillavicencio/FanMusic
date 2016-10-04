
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>FanApp</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script src="js/funciones.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.nav.js"></script>
		<script src="js/jquery.goup.min.js" type="text/javascript"></script><!--NUEVO-->
		
		<script type="text/javascript">
		
			$(document).ready(function(){
				function actualizando(){ 
					actualizar("#izquierda","listPuClu.php");
					actualizar("#derecha","listPuGru.php");
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
				location.href= '/FanApp/indexNuevo.php';
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
		<section id="bien">
			<div class="container" id="panel">
				<div class="row">
				<div id="izquierda" class="col-lg-6 col-sm-12">
					<div class="titulo"><h1><center>Novedades de tus Clubs</center></h1></div>
					<script type="text/javascript">
						listPublClu("#izquierda");
					</script>
				</div>
				<div id="derecha" class="col-lg-6 col-sm-12">
					<div class="titulo"><h1><center>Novedades de tus Grupos</center></h1></div>
					<script type="text/javascript"> 
						listPublGru("#derecha");
					</script>
				</div>
			</div>
		</section>
	</body>
</html>

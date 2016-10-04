
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
		<script src="js/funciones.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/smoothscroll.js"></script>
		<script type="text/javascript" src="js/jquery.parallax.js"></script>
		<script type="text/javascript" src="js/coundown-timer.js"></script>
		<script type="text/javascript" src="js/jquery.scrollTo.js"></script>
		<script type="text/javascript" src="js/jquery.nav.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!--<script src="js/jquery.goup.min.js" type="text/javascript"></script>NUEVO-->
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
		<script type="text/javascript">
		
			$(document).ready(function(){
				function actualizando(){ 
					actualizar("#izquierda","listPuClu.php");
					actualizar("#derecha","listPuGru.php");
				}
				setInterval(actualizando,45000);
			});
		</script>
		<!--<script>
			jQuery(document).ready(function(){
				jQuery.goup();
			});
		</script>-->
	</head>
	<body>
		<script type="text/javascript">
			if(notLogged()){
				location.href= '/FanApp/indexNuevo.php';
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
</html>

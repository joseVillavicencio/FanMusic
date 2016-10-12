<!DOCTYPE html>
<html lang="en">
<head>
	<title>FanMusic</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/mainFanApp.css" rel="stylesheet">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.goup.min.js" type="text/javascript"></script><!--NUEVO-->
	<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css"><!--NECESARIA PARA EL DIALOG/IMAGEN-->
	<script src="js/jquery.dialog.js" type="text/javascript"></script><!--NECESARIA PARA EL DIALOG/IMAGEN-->
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
	<script src="js/funcionesClub.js" type="text/javascript"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script type="text/javascript">
		function letras(){

          $("#L").dialog({ show: "blind",
			  hide: "blind",
			  width: 500
		  });

		}
	</script>
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
					</div><br>
					<div id="vol" >
						<button type="button" onclick="volver();" class="btn btn-primary" >Volver</button><br>
					</div>
					<br><br>
				</div>
				
			
			</div>	
		</div>
	
		<div class="row">
			<div  class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 > <!--class="col-lg-4 col-sm-4"-->
				<div class="panel panel-default" style="text-align:center;">
					<div class="panel panel-heading">
						<img src="img/musica.png" width='100' height='100' class="img-circle">
						<h1>Añade letras a tu FanClub</h1>
					</div>
					<div class="panel panel-body"><div class="input-group"></div>
						<div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span>
							<input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3">
							<script type="text/javascript">
								$('#tituloNuevo').tooltip({'trigger':'focus', 'title': 'Ingrese un título para su anécdota (80 caracteres máx)'});
							</script>
						</div>
						<center><h3>Ingrese el idioma</h3></center>
						
						<div id="div_language" style="color:black;">
							<select id="lang" onchange="updateCountry()"></select>
						</div>
							<script>
							var langs =
							[['Afrikaans'],
							 ['Bahasa Indonesia'],
							 ['Bahasa Melayu'],
							 ['Català'],
							 ['Čeština'],
							 ['Deutsch'],
							 ['English'],
							 ['Español'],
							 ['Euskara'],
							 ['Français'],
							 ['Galego'],
							 ['Hrvatski'],
							 ['IsiZulu'],
							 ['Íslenska'],
							 ['Italiano'],
							 ['Magyar'],
							 ['Nederlands'],
							 ['Norsk bokmål'],
							 ['Polski'],
							 ['Português'],
							 ['Română'],
							 ['Slovenčina'],
							 ['Suomi'],
							 ['Svenska'],
							 ['Türkçe'],
							 ['български'],
							 ['Pусский'],
							 ['Српски'],
							 ['한국어'],
							 ['中文'],
							 ['日本語'],
							 ['Lingua latīna']];

							for (var i = 0; i < langs.length; i++) {
							  lang.options[i] = new Option(langs[i][0], i);
							}
							lang.selectedIndex = 6;
							updateCountry();
							
							function updateCountry() {
							  
							  var list = langs[lang.selectedIndex];
							 
							}
						</script>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">Contenido</span>
						</div><br>
						<textarea rows="10" id="contenidoNuevo" style="width:100%; resize: none;"></textarea>
						<script type="text/javascript">
							$('#contenidoNuevo').tooltip({'trigger':'focus', 'title': 'Ingresa algo que quieras comentarnos (800 caracteres máx)'});
						</script>
						<div ><button class="btn btn-primary" onclick="publicarLetra();">Añadir</button></div>
					</div>
				</div>
			</div>
			<div id="listas" class="col-lg-6 col-lg-offset-1 col-md-7" >		
				<table class="table">
				  <h2>Letras Del Club</h2><br>
				  <thead>
						<tr>
							<th>Título</th>
							<th>Idioma</th>
							<th>Opciones</th>
							<th></th>
							<th></th>
						</tr>
				  </thead>
					<tbody id="cuerpotabla" >
						<script type="text/javascript">
							verLetras("#cuerpotabla");
						</script>
					</tbody>
				</table>
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
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
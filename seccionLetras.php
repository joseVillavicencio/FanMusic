<!DOCTYPE html>
<html lang="en">
<head>
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
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">-->
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script type="text/javascript">
		function letras(){

          $("#L").dialog({ show: "blind",
			  hide: "blind",
			  width: 500
		  });

		}
	</script>
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
						
					<br><br>
				</div>
				
			
			</div>	
		</div>
	
		<div class="row">
			<div  class="col-xs-5 .col-md-4 > <!--class="col-lg-4 col-sm-4"-->
				<div class="panel panel-default" style="text-align:center;">
					<div class="panel panel-heading">
						<img src="img/musica.png" width='100' height='100' class="img-circle">
						<h1>Añade letras a tu FanClub</h1>
						<div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span>
							<input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3">
						</div>
					</div>
					<div class="panel panel-body"><div class="input-group"></div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">Idioma</span> 
							<input type="text" class="form-control" id="idioma" aria-describedby="basic-addon5">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">Contenido</span> 
							<input type="text" class="form-control" id="contenidoNuevo" aria-describedby="basic-addon5"><br>
						</div><br>
						<div class="panel panel-footer"><button class="btn btn-primary" onclick="publicarLetra();">Añadir Letra</button></div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row" >
			<div id="listas" class="col-xs-6 col-md-4" >		
				<table class="table">
				  <h2>Letras Del Club</h2><br>
				  <thead>
						<tr>
							<th>Título</th>
							<th>Idioma</th>
							<th>Ver letra</th>
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
</body>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
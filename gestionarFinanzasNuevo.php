<!DOCTYPE html>
<html lang="en">
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
	<!-- Esta parte es de nuestro codigo- -->
	<script src="js/funcionesGrupo.js" type="text/javascript"></script>
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
				location.href= '/FanMusic/index.php';
			}
			$(document).ready(function(){
				function actualizando(){ 
					actualizar("#listaFinanzas","php/listFinaGrup.php");
				}
				setInterval(actualizando,45000);
			});
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
   	<section id="perfilGrupo">
		<div class="container">
			<div class="row">
				<div id="portada perfil" align="center">	
					<div id="fotoPerfil" >
						<script type="text/javascript">
							fotoPerfilGrupo("#fotoPerfil"); 
						</script>
					</div>
					<div id="rescatar"> 
						
					</div>
					<div id="presentacion" class="panel panel-info">
						<script type="text/javascript">
							presentacion("#presentacion"); 
						</script>
					</div>
					<div id="desc_g" >
						<script type="text/javascript">
							desc_g("#desc_g"); 
						</script>
					</div><br>
					<div id="vol" >
						<button type="button" onclick="volver();" class="btn btn-primary" >Volver</button><br>
					</div>
					<br>
				</div>
				
			</div>
			<div id="derecha" class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<div id="crearFinanzas"  align="center" class="panel panel-default">
						<div class="panel-heading" align="center" >Crear Finanzas </div>
						<div class="panel-body" align="center">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Motivo:</span>
								<input type="text" class="form-control" placeholder="Ingrese Motivo"  id="motivo" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#motivo').tooltip({'trigger':'focus', 'title': 'No debe superar 140 caracteres'});
								</script>
							</div>
							<br>
							<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Monto($):</span>
									<input type="text" class="form-control" placeholder="Ingrese Monto Recibido"  id="monto" aria-describedby="basic-addon3">
									<script type="text/javascript">
											$('#monto').tooltip({'trigger':'focus', 'title': 'Ingrese solo números'});
										</script>
							</div>
							<br>
							<div class="input-group">
									<span class="input-group-addon" id="basic-addon3">Descripcion:</span>
									<input type="text" class="form-control" placeholder="Ingrese Descripción"  id="descripcion" aria-describedby="basic-addon3">
									<script type="text/javascript">
											$('#descripcion').tooltip({'trigger':'focus', 'title': 'En que consiste (máx. 250 caracteres)'});
										</script>
							</div>
							<br>
							<button  type="button" onclick="crearF();"  align="center" class="btn btn-info" >Crear</button><br>
						</div>
					</div>
				</div>
			<div id="superior" class="row">
				<div class="col-lg-12 col-md-12 col-sm-12" id="listaFinanzas" style = "margin-right:5%; margin-left: 5%;">		
					<h2>Finanzas del Grupo</h2>
					<table class="table table-striped" >
					  <thead>
						<tr>
							<th>Motivo</th>
							<th>Descripcion</th>
							<th>Monto</th>
							<th>Fecha</th>
							<th>Eliminar</th>
							<th>Adjuntar</th>
							<th>Imágenes</th>
						</thead>
						<tbody id="tablaF">
							<script type="text/javascript">
								tablaFinanzas("#tablaF"); //OJO CON ESTA PARTE TANIA, AHORA DEBERÍA RETORNAR MAS COSAS???
							</script>
						</tbody>
					</table>
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
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
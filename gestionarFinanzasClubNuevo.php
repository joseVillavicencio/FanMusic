<!DOCTYPE html>
<html lang="en">
<head>
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
	<script src="js/funcionesClub.js" type="text/javascript"></script>
	<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css"><!--NECESARIA PARA EL DIALOG/IMAGEN-->
	<script src="js/jquery.dialog.js" type="text/javascript"></script><!--NECESARIA PARA EL DIALOG/IMAGEN-->	
			
	<script>
		$(document).ready(function(){
				function actualizando(){ 
					actualizar("#listaFinanzas","php/listFinaClub.php");
				}
				setInterval(actualizando,45000);
		});
	</script>
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
			<div class="col-lg-6 col-sm-12"  id="listaFinanzas" style="margin-right:5%; margin-left:5%;">		
				<h2>Finanzas Del Club</h2><br>
				<table class="table table-striped" >
				  <thead>
					<tr>
						<th>Motivo</th>
						<th>Descripción</th>
						<th>Monto</th>
						<th>Fecha</th>
						<th>Eliminar</th>
						<th>Adjuntar</th>
						<th>Imágenes</th>
					</tr>
					</thead>
					<tbody id="tablaFC">
						<script type="text/javascript">
							tablaFinanzasClub("#tablaFC");
						</script>
					</tbody>
				</table>
			</div>
			<div id="derecha" class="col-lg-4 col-sm-12" style="margin-left: 4%">
				<div id="crearFinanzas" align="center" class="panel panel-default">
					<div class="panel-heading" align="center" >Crear Finanzas </div>
						<div class="panel-body" aling="center" >
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
							<button  type="button" onclick="crearFinanzasClub();" aling="center" class="btn btn-info" >Crear</button><br>
						</div>
				</div>
			</div>

			
		</div>
	</section><!--/#explore-->
</body>
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
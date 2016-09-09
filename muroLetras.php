<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<title>Abr&iacute;r di&aacute;logo con jQuery</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css"><!--NECESARIA PARA EL DIALOG/IMAGEN-->
	<script src="js/jquery.dialog.js" type="text/javascript"></script><!--NECESARIA PARA EL DIALOG/IMAGEN-->
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script src="js/funcionesClub.js" type="text/javascript"></script>
	<script type="text/javascript">
		function VerCondiciones(){

          $("#dialog2").dialog({ show: "blind",
			  hide: "blind",
			  width: 500
		  });

		}
	</script>
	</head>
<body>
<div id="dialog2" style="display: none;" title="T&iacute;tulo del popup">
		<div style="width: 460px; height: 190px;" id="int_dialog">
			<div style="text-align: justify; font-size: 13px; width: 450px;">
				<script type="text/javascript">
					verLetras("#dialog2");
				</script>
			</div>
		</div>
</div>

	<!--<div style="padding-top:10px; padding-left:210px;">
		<a onclick="VerCondiciones();" style="cursor: pointer; text-decoration: underline;">Abrir di&aacute;logo</a>
	</div>-->
</body>
</html>


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


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
	<header id="header" role="banner">		
		                  
    </header>
   	<section id="perfilClub">
	
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
						<th>Imágenes</th>
					</thead>
					<tbody id="tablaFC">
						<script type="text/javascript">
							tablaFinanzasClub("#tablaFC");
						</script>
					</tbody>
				</table>
			</div>
		

			
		</div>
	</section><!--/#explore-->
</body>
	 
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</html>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesGrupo.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/mainFanApp.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<!-- Para que funcione el toolbar, ojo puede que se acople con algo..- -->
		<script src="js/bootstrap.js" type="text/javascript"></script>
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
		<section id="perfilGrupo">
			<div class="container">
				<div id="portada perfil" align="center">
					<div id="fotoPerfil" >
						<script type="text/javascript">
							fotoPerfilGrupo("#fotoPerfil"); 
						</script>
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
					</div>
					<div id="vol" >
						<button type="button" onclick="volver();" class="btn btn-primary" >Volver</button><br>
					</div>	
				</div>
			</div>
			<div id="superior" class="row">
				<div class="col-lg-6 col-sm-12"  id="listaFinanzas" style="margin-right:5%; margin-left:5%;">		
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
								tablaBloqueadosGrupo("#tablaB")
							</script>
						</tbody>
					</table>
				</div>
				<div class="col-lg-4 col-sm-12" >
					<div id="bloquear" class="panel panel-default" align="center">
						<div class="panel-heading">Bloquear Miembro</div>
						<div class="panel-body">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Correo</span> 
								<input type="text" class="form-control" id="correoMB" aria-describedby="basic-addon3">
								<script type="text/javascript">
									$('#correoMB').tooltip({'trigger':'focus', 'title': 'Ingrese el correo del miembro que desea bloquear.'});
								</script>
							</div><br>
							<button type="button" onclick="bloquearMiembro();" class="btn btn-danger" >Bloquear</button><br>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
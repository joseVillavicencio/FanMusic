<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Eventos</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/funcionesEvento.js" type="text/javascript"></script>
		<meta charset="utf-8"/>		
	</head>
	<body>
		<script type="text/javascript">
			if(notLogged()){
				location.href= '/FanMusic/indexNuevo.php';
			}
		</script>
		<header>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="bienvenida.php">FanMusic</a>
					</div>
					<ul class="nav navbar-nav">
					  <li><a href="misclubs.php">Clubs</a></li>
					  <li><a href="vistaGrupos.php">Grupos</a></li>
					  <li class="active"><a href="miseventos.php">Eventos</a></li>
					  <li><a href="busqueda.php">Buscar</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li ><a href='perfil.php'><span class="glyphicon glyphicon-user"></span>Mi perfil</a></li>
						<li><a href="index.php" onclick="logOut();"><span class="glyphicon glyphicon-log-out"></span></a></li>
					</ul>
				</div> 
			</nav>
		</header>
		<section>
			<div id="eventos general" align="center">
				<table class="table" >
				  <thead>
						<tr>
							<th>Club/Grupo</th>
							<th>Evento</th>
							<th>Resultados</th>
						</tr>
				  </thead>
					<tbody id="resultadoHorario">
						<script type="text/javascript">
							mostrarResultados("#resultadoHorario");
						</script>
					</tbody>
				</table>
			</div>
		</section>
	</body>
</html>

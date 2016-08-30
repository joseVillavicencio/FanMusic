<! DOCTYPE html>
<html lang="es">
	<head>
		<title>FanMusic</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/funciones.js" type="text/javascript"></script>
		<meta charset="utf-8"/>
	</head>
	<body>
		<script type="text/javascript">
			if(logged()){
				location.href= '/FanMusic/bienvenida.php';
			}
		</script>
		<header>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" >FanMusic</a>
					</div>
					<ul class="nav navbar-nav">
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<a class="navbar-brand" >¡Porque juntos haremos grandes cosas!</a>
					</ul>
				</div> 
			</nav>
		</header>
		<div id="cuerpo" name="cuerpo" class="container" style="text-align:center;" >
			<div class="row">
				<div class="col-lg-3 col-sm-2"></div>
				<div class="col-lg-6 col-sm-8">
					<div  id="ingreso" class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Recuperación</h2>
						</div>
						<div class="panel-body">								
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Nueva Contraseña:</span>
								<input type="password" class="form-control" id="pass1" placeholder="Password" aria-describedby="basic-addon3">
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Confirmar Contraseña:</span>
								<input type="password" class="form-control" id="pass2" placeholder="Password" aria-describedby="basic-addon3">
							</div>
							<br>
							<input type="hidden" id="correo" value="<?php echo $_GET["email"]; ?>"/>
							<input type="hidden" id="cod" value="<?php echo $_GET["key"]; ?>"/>
							<input type="submit" class="btn btn-success" value="Continuar" onclick="recuContra();" />
							<br>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-2"></div>
			</div>
		</div>
	</body>
</html>
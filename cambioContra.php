<! DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js" type="text/javascript"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/mainFanApp.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
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
		<header id="header" role="navigation">		
		<div class="main-nav">
			<div class="container-fluid">
				<div class="row">
						<div class="navbar-header" style="background-color: #1B7B98;">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Desplegar navegación</span>
							</button>
							<a class="navbar-brand">
								<img class="img-responsive" style="top:-50;margin-top:0px;" src="images/logo2.png" alt="logo">
							</a> 
						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color: #1B7B98;">
							<ul class="nav navbar-nav"></ul>
							<ul class="nav navbar-nav navbar-right">                 
								<center><h1>¡Juntos haremos grandes cosas!</h1></center>
							</ul>
						</div>
				</div>
			</div>
		</div>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js" type="text/javascript"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/mainFanApp.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<!-- Esta parte es de nuestro codigo- -->
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/funciones.js" type="text/javascript"></script>
</head>
<body>
	
	<script type="text/javascript">
		if(logged()){
			location.href= '/FanMusic/bienvenidaNuevo.php';
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
   	<section id="registro">
		<div id="cuerpo" name="cuerpo" class="container" style="text-align:center;" >
			<div class="row">
				<div class="col-lg-6 col-sm-12">
					<div  id="ingreso" class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Ingresa a FanMusic</h2>
						</div>
						<div class="panel-body">								
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Correo electrónico:</span>
								<input type="text" class="form-control" id="mailLog" placeholder="example@example.com" aria-describedby="basic-addon3">
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Contraseña:</span>
								<input type="password" class="form-control" id="passLog" placeholder="Password" aria-describedby="basic-addon3">
							</div>
							<br>
							<input type="submit" class="btn btn-primary" value="Entrar" onclick="verify();" />
							<br>
							<a onclick="recuperarContraseña();">¿Has olvidado la contraseña?</a>
							<br>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-12">
					<div id="registro2" class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Unete a FanMusic</h2>
						</div>
						<div class="panel-body">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Nombre:</span>
								<input type="text" class="form-control" id="nomSign" placeholder="Nombre" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#nomSign').tooltip({'trigger':'focus', 'title': 'El nombre debe ser escrito con la inicial en Mayúscula'});
									</script>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Apellido:</span>
								<input type="text" class="form-control" id="apeSign" placeholder="Apellido" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#apeSign').tooltip({'trigger':'focus', 'title': 'El apellido debe ser escrito con la inicial en Mayúscula'});
									</script>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Correo electrónico:</span>
								<input type="text" class="form-control" id="mailSign" placeholder="example@example.com" aria-describedby="basic-addon3">
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Apodo:</span>
								<input type="text" class="form-control" id="apodSign" placeholder="Todos te conocerán por ... " aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#apodSign').tooltip({'trigger':'focus', 'title': 'El apodo debe ser escrito solo con letras minúsculas'});
								</script>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3">Contraseña:</span>
								<input type="password" class="form-control" id="passSign" placeholder="No utilice contraseñas de otros sitios" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#passSign').tooltip({'trigger':'focus', 'title': 'La Contraseña debe tener al menos una Mayúscula, tres números y un largo superior a 6 caracteres.'});
								</script>
							</div>
							<br>
							<input type="submit"  onclick="revisarApodo();" class="btn btn-primary"  value="Enviar" /><br>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</section>
	 <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p> Sitio desarrollado por Dania Delgado - Tania Pizarro - Jose Villavicencio &copy;2016<br>
		    </div>
        </div>
    </footer>
</html>
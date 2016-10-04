<!DOCTYPE html>
<html lang="en">
<head>
    <title>FanMusic</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js" type="text/javascript"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/mainFanApp.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
	<!-- Esta parte es de nuestro codigo- -->
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/funciones.js" type="text/javascript"></script>
</head>
<body>
	
	<script type="text/javascript">
		if(logged()){
			location.href= '/FanMusic/bienvenidaNuevo.php';
		}
		$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#region").change(function(){dependencia_ciudad();});
	$("#region").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
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
					<div id="registro2" class="panel panel-default">				
						<div class="panel-heading">
							<h2 class="panel-title">Datos Personales</h2>
						</div>
						<div class="panel-body" style="text-align:center;">
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Confirmar Correo electrónico:</span>
								<input type="text" class="form-control" id="mailSign2" placeholder="example@example.com" aria-describedby="basic-addon3">
							</div>
							<br>
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Confirmar Contraseña:</span>
								<input type="password" class="form-control" id="passSign2" placeholder="Password" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#passSign2').tooltip({'trigger':'focus', 'title': 'Confirme la contraseña ingresada anteriormente.'});
								</script>
							</div>
							<br>
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Edad:</span>
								<input type="text" class="form-control" id="age" aria-describedby="basic-addon3" placeholder="¿Qué edad tienes?">
							</div>
							<br>
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Gustos:</span>
								<input type="text" class="form-control" id="gustos" placeholder="¿Qué te gusta Hacer?" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#gustos').tooltip({'trigger':'focus', 'title': 'No debe superar los 140 caracteres'});
								</script>
							</div>
							<br>
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Descripción:</span>
								<input type="text" class="form-control" id="descrip" placeholder="Cuentanos algo de ti" aria-describedby="basic-addon3">
								<script type="text/javascript">
										$('#descrip').tooltip({'trigger':'focus', 'title': 'No debe superar los 144 caracteres'});
								</script>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="color:black;">
									<select id="pais" name="pais" style="color:black;"><option value="0">Selecciona País</option></select>
								</div>
								
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="color:black;">
									<select id="region" name="region"style="color:black;"><option value="0">Selecciona Región</option></select>
								</div>
								
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="color:black;">
									<select id="ciudad" name="ciudad"style="color:black;"><option value="0">Selecciona Ciudad</option></select>
								</div>
							</div>
													
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-12">
					<div id="redes" class="panel panel-default">				
						<div class="panel-heading">
							<h2 class="panel-title">Completa tus Redes Sociales[Opcional]</h2>
						</div>
						<div class="panel-body" style="text-align:center;">
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Facebook:</span>
								<input type="text" class="form-control" id="facebook" value="https://www.facebook.com/" aria-describedby="basic-addon3">
							</div>
							<br>
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Twitter:</span>
								<input type="text" class="form-control" id="twitter2" value="https://twitter.com/" aria-describedby="basic-addon3">
							</div>
							<br>
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Instagram:</span>
								<input type="text" class="form-control" id="instagram" value="https://www.instagram.com/" aria-describedby="basic-addon3">
							</div>
							<br>
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Youtube:</span>
								<input type="text" class="form-control" id="youtube" value="https://www.youtube.com/" aria-describedby="basic-addon3">
							</div>
							<br>
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon3">Tumblr:</span>
								<input type="text" class="form-control" id="tumblr" value="https://www.tumblr.com/" aria-describedby="basic-addon3">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6" id="foto">
				</div>
				<div class="col-lg-12 col-sm-12" style="text-align:center;">
					<br><br>
					<input type="submit"  onclick="enviarRegistro('#foto');" class="btn btn-success"  value="Continuar" id="botonContinuar" /><br><br>
					<!--<script type="text/javascript">
						$('#botonContinuar').tooltip({'trigger':'focus', 'title': 'Al presionar se podra ingresar tu Foto de Perfil'});
					</script>-->
					<br>
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
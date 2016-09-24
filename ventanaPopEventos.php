<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesEvento.js" type="text/javascript"></script>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">	
		<link href="css/responsive.css" rel="stylesheet">
		<!-- Esta parte es de nuestro codigo- -->
		
		<script src="Highcharts-4.1.5/js/highcharts.js"></script>
	</head>

	<body>
		<script type="text/javascript">
			if(notLogged()){
				location.href= '/FanMusic/indexNuevo.php';
			}
			
		</script>

		
		
		
		<section id="explore">
			<div class="row">
				<div class="watch">
						<img class="img-responsive" src="images/watch.png" alt="">
				</div>				
				<div class="col-md-8 col-md-offset-3 col-sm-11">
					<div id="eventos general" align="center">
						
						
								<style type="text/css">${demo.css}</style>
								<script type="text/javascript">
									$(function () {
										$('#container2').highcharts({
											chart: {
												plotBackgroundColor: null,
												plotBorderWidth: null,
												plotShadow: false,
												type: 'pie'
											},
											title: {
												text: 'Votación'
											},
											subtitle: {
												text: 'Estas son las votaciones que se han realizado hasta el momento :'
											},
											tooltip: {
												pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
											},
											plotOptions: {
												pie: {
													allowPointSelect: true,
													cursor: 'pointer',
													dataLabels: {
														enabled: true,
														format: '<b>{point.name}</b>: {point.percentage:.1f} %',
														style: {
															color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
														}
													}
												}
											},
											series: [{
												name: '% de asistencia',
												data: [
													['Primera Opción:<br>'+FechaUno(),parseInt(contarFechaUno())],
													['Segunda Opción:<br>'+FechaDos(),parseInt(contarFechaDos())],
													['Tercera Opción:<br>'+FechaTres(),parseInt(contarFechaTres())],
												],
											}]
										});
									});
									
								</script>
						
					</div>
				</div><!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
				<div class="col-md-4 col-md-offset-4 col-sm-8" style="center" id="container2" style="min-width: 310px; height: 300px; margin: 0 auto">
			</div>			
		</section>
		 <footer id="footer" style="postion: absolute ;bottom:0;">
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
	</body>  
</html>
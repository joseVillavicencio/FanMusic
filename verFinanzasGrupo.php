<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/funcionesGrupo.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/jquery.dialog.js" type="text/javascript"></script><!--NECESARIA PARA EL DIALOG/IMAGEN-->
		<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css"><!--NECESARIA PARA EL DIALOG/IMAGEN-->
	</head>
	
	<body>
		<div id="listaFinanzas">		
			<h2>Finanzas del Grupo</h2>
			<table class="table" >
			  <thead>
				<tr>
					<th>Motivo</th>
					<th>Descripcion</th>
					<th>Monto</th>
					<th>Fecha</th>
					<th>Imágenes</th>
				</tr>
				</thead>
				<tbody id="tablaF">
					<script type="text/javascript">
						tablaFinanzas("#tablaF");
					</script>
				</tbody>
			</table>
		</div>
	</body>
	 
</html>
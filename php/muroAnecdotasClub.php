<?php
	include('funcionesI.php');
	
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombre=$_POST["nombreC"]; //nombre del Club
	$idM=$_POST["idM"];
	/*----------------------------------------------------------------------*/	
	//Consultas
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		mysqli_set_charset($conexion,"utf-8");
		$sql2 = " call obtenerAnecdotasClub('".$nombre."');"; // pregunta por si es visible=1
		$sql2 = " call obtenerAnecdotasClub('".$nombre."');";
		if($result = $conexion->query($sql2)){
			if($result->num_rows >0){
				while($fila = mysqli_fetch_row($result)){
					$titulo=$fila[0] ;
					$contenido=$fila[1] ;
					$autor=$fila[2] ;
					
					echo '<div class="panel panel-default"><div class="panel-heading"><h1>'.$titulo.'</h1><sup>'.$autor.'</sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="panel-body" style="text-align:center;"><h5>'.$contenido.'</h5></div></div>';
				}
			}
		}
		mysqli_close($conexion);
		
	}
?>
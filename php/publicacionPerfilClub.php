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
		$sql2 = " call obtenerPublicacionesClub('".$nombre."');";
		if($result = $conexion->query($sql2)){
			if($result->num_rows >0){
				while($fila = mysqli_fetch_row($result)){
					$id=$fila[0] ;
					$titulo=$fila[1] ;
					$subtitulo=$fila[2] ;
					$contenido=$fila[3] ;
					$fecha=$fila[4] ;
					$conexion2=conectar();
					$sql4 = " call puedePublicarAdmi('".$nombre."','".$idM."');";
					if($result3 = $conexion2->query($sql4)){
						if($result3->num_rows >0){
							while($fila3 = mysqli_fetch_row($result3)){
								$id_p=$fila3[0] ;
							}
							echo '<div class="panel panel-default"><div class="panel-heading"><h1>'.$titulo.'</h1><sup>'.$fecha.'</sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="eliminarPC('."'".$id."'".');">Eliminar</button></div><div class="panel-body" style="text-align:center;"><h4>'.$subtitulo.'</h4><hr/><h5>'.$contenido.'</h5>';
							
						}else{
							echo '<div class="panel panel-default"><div class="panel-heading"><h1>'.$titulo.'</h1><sup>'.$fecha.'</sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="panel-body" style="text-align:center;"><h4>'.$subtitulo.'</h4><hr/><h5>'.$contenido.'</h5>';
						}
					}
					$conexion=conectar();
					$sql5='CALL verImagsPubli("'.$id.'");';
					if($resu =$conexion->query($sql5)){
						if($resu->num_rows>0){
							while($rows2=$resu->fetch_array()){
								$imag=$rows2[0];
								echo '<br><img src="'.$imag.'" class="img-responsive img-rounded">';
							}
						}
					}
					echo '</div><div class="panel-footer">';
					$conexion=conectar();
					$sql3 = 'CALL obtenerComentarios("'.$id.'");';
					$conexion=conectar();
					if($result2 =$conexion->query($sql3)){
						if($result2->num_rows>0){
							while($row2=$result2->fetch_array()){
								$conten=$row2[0];
								$aut=$row2[1];
								$fec=$row2[2];
								echo '<h6>'.$conten.'</h6><sup>'.$aut.'---'.$fec.'</sup><br>';
							}
						}
					}
					echo '<input id="'.$id.'" type="text"><button type="button" class="btn btn-primary btn-xs" onclick="comentarP('.$id.');">Comentar</button></div></div><br><br>';
				}
			}
		}
		mysqli_close($conexion);
		
	}
?>
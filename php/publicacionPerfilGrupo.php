<?php
	header('Content-Type: charset=utf-8');
		include('funcionesI.php');
	
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombre=$_POST["nombreG"];
	$idM=$_POST["idM"];
	/*----------------------------------------------------------------------*/	
	//Consultas
	$conexion=conectar();
	$sql = "call  obtenerIdGrupo('".$nombre."');";
	
	if($registro1 =$conexion->query($sql)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$id_g=$fila1[0] ;
			}
			$conexion=conectar();
			$sql2 = " call obtenerPublicacionesGrupo('".$nombre."');";
			if($result = $conexion->query($sql2)){
			if($result->num_rows >0){
				while($fila = mysqli_fetch_row($result)){
					$id=$fila[0] ;
					$titulo=$fila[1] ;
					$subtitulo=$fila[2] ;
					$contenido=$fila[3] ;
					$fecha=$fila[4] ;
					$conexion2=conectar();
					$sql4 = " call esAdmin2('".$idM."','".$nombre."');";
					if($result3 = $conexion2->query($sql4)){
						if($result3->num_rows >0){
							while($fila3 = mysqli_fetch_row($result3)){
								$id_p=$fila3[0] ;
							}
							echo '<div class="panel panel-default"><div class="panel-heading"><h1>'.$titulo.'</h1><sup>'.$fecha.'</sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="eliminarPG('."'".$id."'".');">Eliminar</button></div><div class="panel-body" style="text-align:center;"><h4>'.$subtitulo.'</h4><hr/><h5>'.$contenido.'</h5>';
							
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
					echo '<input  id="'.$id.'" type="text"><button type="button" class="btn btn-info btn-xs" onclick="comentarP('.$id.');">Comentar</button></div></div>';
				}
			}
		}
		}
	}
	mysqli_close($conexion);
?>
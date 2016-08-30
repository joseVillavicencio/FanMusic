<?php
	header('Content-Type: charset=utf-8');
		include('funcionesI.php');
	
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombre=$_GET["pag"];
	
	/*----------------------------------------------------------------------*/	
	//Consultas
	$conexion=conectar();
	$sql = "call  obtenerIdGrupo('".$nombre."');";
	mysqli_set_charset($conexion,"utf8");
	if($registro1 =$conexion->query($sql)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$id_g=$fila1[0] ;
			}
			$conexion=conectar();
			mysqli_set_charset($conexion,"utf8");
			$sql2 = " call obtenerPublicacionesGrupo('".$nombre."');";
			if($registro2 =$conexion->query($sql2)){
				if($registro2->num_rows >0){
					while($fila = mysqli_fetch_row($registro2)){
						$id=$fila[0] ;
						$titulo=$fila[1] ;
						$subtitulo=$fila[2] ;
						$contenido=$fila[3] ;
						$fecha=$fila[4] ;
						echo '<div class="panel panel-default"><div class="panel-heading"><h1>'.$titulo.'</h1><hr/><sup>'.$fecha.'</sup></div><div class="panel-body"><h5>'.$contenido.'</h5></div><div class="panel-footer">';
						echo '<textarea name="comentarios" rows="8" cols="40" id="'.$id.'" type="text"></textarea><button type="button" class="btn btn-info btn-xs" onclick="comentar('.$id.');">Comentar</button></div></div>';
					
						$conexion=conectar();
						$sql2 = "call  datosComentario('".$id."');";
						if($result2 =$conexion->query($sql2)){
							if($result2->num_rows>0){
								while($row=mysqli_fetch_row($result2)){
									$contenido=$row[0] ;
									$autor=$row[1] ;
									$fecha=$row[2] ;
									echo '<h6>'.$contenido.'</h6><sup>'.$autor.'---'.$fecha.'</sup><br>';
								}
							}
						}

					}
				}
			}
		}
	}
	mysqli_close($conexion);
?>
<?php
	include('funcionesI.php');
	$id= $_POST["id"]; //ID del miembro
	$conexion=conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql="call listarEventoGrupo('".$id."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){ 
					$id_e=$fila[0] ;
					$nombre=$fila[1];
					$descrip=$fila[2];
					$motivo=$fila[3];
					$ciudad=$fila[4];
					$region=$fila[5];
					$fecha_f=$fila[6];
					
					echo '<tr><td>'.$nombre.'</td><td>'.$descrip.'</td><td>'.$motivo.'</td><td>'.$ciudad.'</td><td>'.$region.'</td><td>'.$fecha_f.'</td>';
					$conexion2=conectar();		
					$sql2 = "call listarEventoGrupoMod('".$id."','".$id_e."');"; //Si es el moderador del grupo que hizo el evento, puede eliminarlo
					if($result2 = $conexion2->query($sql2)){
						if($result2->num_rows >0){
							while($fila2=mysqli_fetch_row($result2)){ 
								$id_ev=$fila2[0] ;
								echo '<div><td><input  id="'.$id_ev.'" type="hidden"><button type="button" class="btn btn-danger btn-xs" onclick="eliminarEventos('.$id_ev.');"><span class="glyphicon glyphicon-remove"></span></button></tr></td></div>';
							}
						}
					}
				}
			}
		}
		$conexion=conectar();
		$sql="call listarEventoClub('".$id."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){ 
					$id_e=$fila[0] ;
					$nombre=$fila[1];
					$descrip=$fila[2];
					$motivo=$fila[3];
					$ciudad=$fila[4];
					$region=$fila[5];
					$fecha_f=$fila[6];
					echo '<tr><td>'.$nombre.'</td><td>'.$descrip.'</td><td>'.$motivo.'</td><td>'.$ciudad.'</td><td>'.$region.'</td><td>'.$fecha_f.'</td>';
					$conexion2=conectar();
					$sql2 = "call listarEventoClubAdmin('".$id."','".$id_e."');"; //Si es el admin del club que hizo el evento, puede eliminarlo
					if($result2 = $conexion2->query($sql2)){
						if($result2->num_rows >0){
							while($fila2=mysqli_fetch_row($result2)){ 
								$id_ev=$fila2[0] ;
								echo '<div><td><input  id="'.$id_ev.'" type="hidden"><button type="button" class="btn btn-danger btn-xs" onclick="eliminarEventos('.$id_ev.');"><span class="glyphicon glyphicon-remove"></span></button></tr></td></div>';
							}
						}
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>
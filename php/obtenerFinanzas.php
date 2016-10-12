<?php
	include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombre=$_POST["nombreG"];
	$id_Miembro=$_POST["id"];
	 // contador para mostrar Imagen 1,2....
	$conexion=conectar();
	mysqli_set_charset($conexion,"utf8");
	$registroquery2 = "call  obtenerIdGrupo('".$nombre."');";
	if($registro1 =$conexion->query($registroquery2)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$id_g=$fila1[0] ;
			}
			$conexion=conectar();
			$sql2 = "call  mostrarFinanzas('".$id_g."');";
			if($result2 = $conexion->query($sql2)){
				if($result2->num_rows >0){
					while($fila=mysqli_fetch_row($result2)){ //Datos de la finanza en sí
						$cont=1;
						$id=$fila[0] ;
						$motivo=$fila[1] ;
						$descripcion=$fila[2] ;
						$monto=$fila[3] ;
						$fecha=$fila[4] ;
						echo '<tr><td>'.$motivo.'</td><td>'.$descripcion.'</td><td>'.$monto.'</td><td>'.$fecha.'</td>';
						$conexion=conectar();
						$sql3 = "call  esModerador2('".$id_Miembro."','".$id_g."');"; //Pregunto si es moderador de ese grupo (para que pueda ver las siguientes opciones)
						if($result3 = $conexion->query($sql3)){
							if($result3->num_rows >0){ //Si es moderador del grupo, puede eliminar las finanzas
								echo '<div><td><input  id="'.$id.'" type="hidden"><button type="button" class="btn btn-danger btn-xs" onclick="eliminarF('.$id.');"><span class="glyphicon glyphicon-remove"></span></button></td></div>';
								echo '<div><td><input  id="'.$id.'" type="hidden"><button type="button" class="btn btn-info btn-xs" onclick="subirFotoFinanza('.$id.');">Adjuntar Foto</button></td></div>';
							}
						}
						echo '<td><div class="dropdown">';
						echo '<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Adjuntos';
						echo '<span class="caret"></span></button>';
						echo '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
						$conexion=conectar();
						$sql3 = "call mostrarFotosFinanzas('".$id."');"; 
						if($result3 = $conexion->query($sql3)){
							if($result3->num_rows >0){
								while($fila3=mysqli_fetch_row($result3)){ 
									$direccion=$fila3[0];
									echo'<li role="presentation"><a role="menuitem" tabindex="-1" onclick="imagenFinanza('."'".$direccion."'".');">Imagen'.$cont.'</a></li>';
									$cont=$cont+1;
								}
							}
							echo '</ul></div></div></td></tr>';		
						}else{
							echo 0;
						}
					}
				}else{
					echo 0;
				}
			}else{
				echo 0;
				}
		}else{
			echo 0;
		}
		mysqli_close($conexion);
	}
?>
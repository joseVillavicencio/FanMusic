<?php
	include('funcionesI.php');
	header('Content-Type: charset=utf-8');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombreClub=$_POST["nombreC"];
	$idM=$_POST["idM"];
	$cont=1; // contador para mostrar Imagen 1,2....
	$conexion=conectar();
	mysqli_set_charset($conexion,"utf8");
	$sql1 = "call  nombreClub('".$nombreClub."');"; //Rescato el ID del Club
	if($result1 =$conexion->query($sql1)){
		if($result1->num_rows >0){
			while($fila1=mysqli_fetch_row($result1)){ 
				$idClub=$fila1[0] ;
			}
			$conexion=conectar();
			$sql2 = "call  mostrarFinanzasClub('".$idClub."');";
			if($result2 = $conexion->query($sql2)){
				if($result2->num_rows >0){
					while($fila2=mysqli_fetch_row($result2)){ 
						$id=$fila2[0] ;
						$motivo=$fila2[1] ;
						$descripcion=$fila2[2] ;
						$monto=$fila2[3] ;
						$fecha=$fila2[4] ;
						echo '<tr><td>'.$motivo.'</td><td>'.$descripcion.'</td><td>'.$monto.'</td><td>'.$fecha.'</td>';
						$conexion=conectar();
						$sql4 = "call esAdmin3('".$idM."','".$idClub."');";
						if($result4 = $conexion->query($sql4)){
							if($result4->num_rows >0){
								echo '<div><td><input  id="'.$id.'" type="hidden"><button type="button" class="btn btn-danger btn-xs" onclick="eliminarFClub('.$id.');">Eliminar</button></td></div>';
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
											echo'<li role="presentation"><a role="menuitem" tabindex="-1" onclick="imagenFinanza('."'".$direccion."'".');">Imágen '.$cont.'</a></li>';
											$cont=$cont+1;
										}
									}
								echo '</ul></div></div></td></tr>';		
								}else{
									echo "El Club no posee finanzas.";
								}
						
					}
				}else{
					echo "El Club no posee finanzas.";
				}
			}
		}else{
			echo 0;
		}
		mysqli_close($conexion);
	}
?>
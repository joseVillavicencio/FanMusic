<?php
	include('funcionesI.php');
	$id= $_POST['idM'];
	$conexion=conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql = "call  obtenerNombreClubAdmin('".$id."');";	
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					$nombreClub=$fila[0] ; //Guardo el nombre del Club
					$conexion=conectar();
					$sql2 = "call  mostrarEventosAdmin('".$id."');"; 	
					if($result2 = $conexion->query($sql2)){
						if($result2->num_rows >0){
							while($fila2=mysqli_fetch_row($result2)){
								$idEvento=$fila2[0] ; //Guardo los datos del Evento
								$nombreEvento=$fila2[1] ;
								$descripEvento=$fila2[2] ;
								$conexion=conectar();
								$sql3 = "call mostrarHorarioEventos('".$idEvento."');"; 	
								if($result3 = $conexion->query($sql3)){
									if($result3->num_rows >0){
										while($fila3=mysqli_fetch_row($result3)){
											$fechaUno=$fila3[0] ;
											$fechaDos=$fila3[1] ;
											$fechaTres=$fila3[2] ;
											$cantUno=$fila3[3] ;
											$cantDos=$fila3[4] ;
											$cantTres=$fila3[5] ;
											$horarioFinal=$fila3[6];
											if($horarioFinal==null){ // para que no se pueda precionar el boton confirmar 2 veces
											echo '<tr> <td>'.$nombreClub.'<br><br></td>'; //Salto de fila con <TR>
											echo '<td>'.$nombreEvento.':<br> '.$descripEvento.'</td><br>';
											echo '<td> '.$fechaUno.'</td>';
											echo '<td> '.$fechaDos.' </td>' ;
											echo '<td> '.$fechaTres.'</td>' ;
											echo '<td> <button type="button" id="botonConfirmar" class="btn btn-primary btn-xs" onclick="fechaFinal('."'".$idEvento."'".','."'".$fechaUno."'".','."'".$fechaDos."'".','."'".$fechaTres."'".','."'".$cantUno."'".','."'".$cantDos."'".','."'".$cantTres."'".');" >Confirmar Fecha</button></td>';
											echo '<td> <button type="button" id="botonConfirmar" class="btn btn-primary btn-xs" onclick="ventanaPopEventos();" >Ver asistencia</button></td></tr>';
											
											}
										}
									}
								}
							}
						}else{ echo "No existen eventos registrados";}
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>
 
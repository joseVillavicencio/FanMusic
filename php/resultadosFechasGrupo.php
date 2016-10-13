<?php
	include('funcionesI.php');
	$id= $_POST['idM'];
	$conexion=conectar();
	mysqli_set_charset($conexion,"utf8");
	$contar1=0;
	$contar2=0;
	$contar3=0;
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql = "call  obtenerNombreGrupoMod('".$id."');";	
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					$nombreGrupo=$fila[0] ; //Guardo el nombre del Grupo
					$conexion=conectar();
					$sql2 = "call  mostrarEventosMod('".$id."');"; 	
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
											$id_h=$fila3[7];
										
											$conexion=conectar();
											$sql4 = "call  contarInvitados('".$idEvento."');"; 	
											if($result4 = $conexion->query($sql4)){
												if($result4->num_rows >0){
													while($fila4=mysqli_fetch_row($result4)){
														$contar=$fila4[0];
													}
												}
											}
											$conexion=conectar();											
											$sql5 = "call  contarFechaUno('".$id_h."');"; 	
											if($result5 = $conexion->query($sql5)){
												if($result5){
													while($fila5=mysqli_fetch_row($result5)){
														$contar1=$fila5[0];
														
													}
												}
											}
											$conexion=conectar();											
											$sql6 = "call  contarFechaDos('".$id_h."');"; 	
											if($result6 = $conexion->query($sql6)){
												if($result6){
													while($fila6=mysqli_fetch_row($result6)){
														$contar2=$fila6[0];
													}
												}
											}
											$conexion=conectar();											
											$sql7 = "call  contarFechaTres('".$id_h."');"; 	
											if($result7 = $conexion->query($sql7)){
												if($result7){
													while($fila7=mysqli_fetch_row($result7)){
														$contar3=$fila7[0];
													}
												}
											}
											$contarT=$contar1+$contar2+$contar3;
											if($horarioFinal==null){ // para que no se pueda precionar el boton confirmar 2 veces
												echo '<tr> <td>'.$nombreGrupo.'<br><br></td>'; //Salto de fila con <TR>
												echo '<td>'.$nombreEvento.':<br> '.$descripEvento.'</td><br>';
												echo '<td> '.$fechaUno.'</td>' ;
												echo '<td> '.$fechaDos.'</td>' ;
												echo '<td> '.$fechaTres.'</td>' ;
												echo '<td> '.$contar.'</td>' ;
												echo '<td> '.$contarT.'</td>' ;
												echo '<td> <button type="button" id="botonConfirmar" class="btn btn-info btn-xs" onclick="fechaFinal('."'".$idEvento."'".','."'".$fechaUno."'".','."'".$fechaDos."'".','."'".$fechaTres."'".','."'".$cantUno."'".','."'".$cantDos."'".','."'".$cantTres."'".');" >Confirmar Fecha</button></td>';
												if($contarT>0){
													echo '<td> <button type="button" id="botonConfirmar" class="btn btn-primary btn-xs" onclick="ventanaPopEventos('."'".$idEvento."'".','."'".$fechaUno."'".','."'".$fechaDos."'".','."'".$fechaTres."'".','."'".$cantUno."'".','."'".$cantDos."'".','."'".$cantTres."'".');" >Ver asistencia</button></td></tr>';
												}
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
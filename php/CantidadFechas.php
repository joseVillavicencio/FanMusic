<?php
	include('funcionesI.php');
	$id= $_POST['idM'];
	$conexion=conectar();
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
											echo json_encode(array('status'=>'success','message'=>''.$cantUno.';'.$cantDos.';'.$cantTres.';'.$fechaUno.';'.$fechaDos.';'.$fechaTres));
										}
									}
								}
							}
						}else{ 
							echo json_encode(array('status'=>'error','message'=>'No existen eventos'));
						}
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>
 
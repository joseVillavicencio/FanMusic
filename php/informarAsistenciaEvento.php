<?php
	include('funcionesI.php');
	$idEvento= $_POST["idE"];
	$id= $_POST["id"];
	$nombreEv = $_POST["nombreEvento"];
	$fechaEscogida = $_POST["fechaEscogida"];
	$conexion=conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql21 = "call actualizarRespuesta('".$id."','".$idEvento."');";
		if($result21 = $conexion->query($sql21)){
			if($fechaEscogida!="No"){
				$conexion=conectar();
				$sql3 = "call obtenerCantUno('".$fechaEscogida."');";
				if($result3 = $conexion->query($sql3)){
					if($result3->num_rows >0){
						while($fila=mysqli_fetch_row($result3)){	
							$cont=$fila[0] ;
						}	
						$conexion=conectar();
							$sql31 = "call actualizarContUno('".$fechaEscogida."','".$cont."');";
							if($result31 = $conexion->query($sql31)){
								echo 1;
							}
						
					}else{
							$conexion=conectar();
							$sql4 = "call obtenerCantDos('".$fechaEscogida."');";
							if($result4 = $conexion->query($sql4)){
								if($result4->num_rows >0){
									while($fila=mysqli_fetch_row($result4)){
										$cont=$fila[0] ;
										
									}
									$conexion=conectar();
									$sql41 = "call actualizarContDos('".$fechaEscogida."','".$cont."');";
									if($result41 = $conexion->query($sql41)){
										echo 1;
									}
								}else{
									$conexion=conectar();
									$sql5 = "call obtenerCantTres('".$fechaEscogida."');";
									if($result5= $conexion->query($sql5)){
										if($result5->num_rows >0){
											while($fila=mysqli_fetch_row($result5))	{
												$cont=$fila[0] ;
											}
											$conexion=conectar();
											$sql51 = "call actualizarContTres('".$fechaEscogida."','".$cont."');";
											if($result51 = $conexion->query($sql51)){
												echo 1;
											}
										}
									}
								}
							}
						}
				}
			}else{
				echo 1;
			}
		}
				
		mysqli_close($conexion);
	}
?>
 
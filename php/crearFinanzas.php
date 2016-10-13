<?php
	include('funcionesI.php');
	
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$id=$_POST["idUser"];
	$motivo=$_POST["motivo"];
	$monto=$_POST["monto"];
	$desc=$_POST["descripcion"];
	/*----------------------------------------------------------------------*/	
	//Consultas
	$conexion=conectar();
	
	$sql= "call obtenerIDGrupoMod('".$id."');"; //Busco el id del grupo que modera

	if($registro1 =$conexion->query($sql)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$id_g=$fila1[0] ;
			}
			$sql3="SELECT CURDATE();";
			$conexion=conectar();
			if($result2 = $conexion->query($sql3)){
				if($result2->num_rows >0){
					while($row = $result2->fetch_array()){
						$fech=$row[0];
						$conexion=conectar();
						$crear = 'call crearFinanza ("'.$motivo.'","'.$monto.'","'.$desc.'","'.$fech.'");';
						if($registro2 =$conexion->query($crear)){
							if($registro2){
								$conexion=conectar();
								$sql2= 'CALL obtenerIdFinanza("'.$motivo.'","'.$monto.'","'.$desc.'","'.$fech.'");';
								if($registro1 =$conexion->query($sql2)){
									if($registro1->num_rows >0){
										while($fila1=mysqli_fetch_row($registro1)){ 
											$id_f=$fila1[0] ;
										}
										$conexion=conectar();
										$agregar= "call agregarFinanza('".$id_g."','".$id_f."');";
										if($registro3 =$conexion->query($agregar)){
											if($registro3){
												echo 1;
											}
										}
									}
								}else{
									echo 0;
								}	
							}
						}else{
							echo 0;
						}
					}
				}
			}
		}
	}
	mysqli_close($conexion);
?>
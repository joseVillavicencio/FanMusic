<?php
		include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombre=$_POST["nombre"];
	$al=$_POST["al"];
	$pa=$_POST["pa"];
	$reg=$_POST["reg"];
	$ci=$_POST["ci"];
	$id_M=$_POST["id"];
	$desc=$_POST["descripcion"];
	
	//Consultas
	$conexion=conectar();
	mysqli_set_charset($conexion,"utf-8");
	$registroquery2 = "call  obtenerIdGrupo('".$nombre."');";
	if($registro1 =$conexion->query($registroquery2)){
		if($registro1->num_rows >0){
			echo "error 1";
		}else{
			$conexion=conectar();
			$ob_Club= "call obtenerClubAdmi($id_M);";
			if($registro1 =$conexion->query($ob_Club)){
				if($registro1->num_rows >0){
					while($fila1=mysqli_fetch_row($registro1)){ 
						$id_c=$fila1[0] ;
					}
					$conexion=conectar();
					$crear= "call crearGrupo('".$id_c."','".$desc."','".$nombre."','".$al."','".$pa."','".$reg."','".$ci."');";
					if($registro2 =$conexion->query($crear)){
						if($registro2){
							$conexion=conectar();
							$sql= "call obtenerIdGrupo('".$nombre."');";
							if($result =$conexion->query($sql)){
								if($result->num_rows>0){
									while($fila1=mysqli_fetch_row($result)){ 
										$id_g=$fila1[0] ;
									}
									$conexion=conectar();
									$agregar= "call agregarMiembroGrupo($id_g,$id_M);";
									if($registro3 =$conexion->query($agregar)){
										if($registro3){
											echo "success";
										}
									}
								}else{
									echo "error 2 ";
								}
							}
						}else{
							echo "error";
						}
					}
				}
			}
		}
	}
	mysqli_close($conexion);
?>
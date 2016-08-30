<?php
	include('php/funcionesI.php');
	$id_User=$_POST["id"];
	$nombre=$_POST["nombreG"];

	$conexion = conectar();
	mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		if($nombre!=''){
			$sql= "call  obtenerPermiso2('".$id_User."','".$nombre."');"; //Pregunta si es Admin		
			if($result = $conexion->query($sql)){
				if($result->num_rows >0){
					echo 1;	
				}else{
					$conexion = conectar();
					$sql2="call  obtenerPermiso('".$id_User."','".$nombre."');"; //Pregunta si es moderador
					if($result2 = $conexion->query($sql2)){
						if($result2->num_rows >0){
							echo 2;
						}else{
							echo 0;
						}
					}else{
						echo 0;
					}
				}				
			}else{
				echo 0;
			}
		}else{
			$sql4= "call  obtenerPermiso4('".$id_User."');"; //Pregunta si es Admin		
			if($result4 = $conexion->query($sql4)){
				if($result4->num_rows >0){
					echo 1;	
				}else{
					$conexion = conectar();
					$sql3="call  obtenerPermiso3('".$id_User."');"; //Pregunta si es moderador
					if($result3 = $conexion->query($sql3)){
						if($result3->num_rows >0){
							echo 2;
						}else{
							echo 0;
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
	mysqli_close($conexion);
?>
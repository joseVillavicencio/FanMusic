<?php
	header('Content-Type: charset=utf-8');
	include('php/funcionesI.php');
	$id_User=$_POST["id"];
	$nombre=$_POST["nombreC"];

	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql= "call  ClubDeAdmin('".$id_User."','".$nombre."');";
		//Pregunta si es Admin
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				echo 1;	
			}else{
				$conexion = conectar();
				$sql2="call  ModerDelClub('".$id_User."','".$nombre."');";
				//Pregunta si es moderador
				if($result2 = $conexion->query($sql2)){
					if($result2->num_rows >0){
						echo 2;
					}else{
						echo 0;
					}
				}else{
					echo "Ocurrio un problema";
				}
			}				
		}else{
			echo "Ocurrio un problema";
		}
	}	
	mysqli_close($conexion);
?>
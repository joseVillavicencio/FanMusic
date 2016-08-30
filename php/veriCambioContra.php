<?php
	include('funcionesI.php');
	$id_User=$_POST["idUser"];
	$con=$_POST["ant"];
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		if($con!=NULL){
			$sql2 = "CALL miContra('".$id_User."','".$con."');";
			if($result2 = $conexion->query($sql2)){
				if($result2->num_rows >0){
					echo "success";
				}else{
					echo "error";
				}
			}
		}else{	
			echo "error 2";
		}
		mysqli_close($conexion);
	}
?>
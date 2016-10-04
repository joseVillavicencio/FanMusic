<?php
		include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$id=$_POST["id"];
		
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql='call eliminarAnecdota('."'".$id."'".');';
		if($result = $conexion->query($sql)){
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}
		
	}
	mysqli_close($conexion);
?>
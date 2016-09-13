<?php

	include('funcionesI.php');
	$idM=$_POST["idM"];
	$idP=$_POST["idP"];

	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql="CALL resultadoApoyo('".$idM."','".$idP."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				$conexion = conectar();
				$sql3="CALL quitarApoyo('".$idM."','".$idP."');";
				if($result3 = $conexion->query($sql3)){
					if($result3){
						echo 0;
					}
				}
			}else{
				$conexion = conectar();
				$sql2="CALL sumarApoyo('".$idM."','".$idP."');";
				if($result2 = $conexion->query($sql2)){
					if($result2){
						echo 1;
					}
				}
					
			}
		}
		mysqli_close($conexion);
	}
?>
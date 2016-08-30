<?php
	include('funcionesI.php');
	$idClub=$_POST["idClub"];
	$idMiembro=$_POST["idMiembro"];

	$conexion = conectar();
	 mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql="call esMiembroDos('".$idMiembro."','".$idClub."');";//Consulta por los club
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				echo "Ya eres miembro";
			}else{
				$conexion = conectar();
				$sql2 = "call agregarMiembroClub('".$idClub."','".$idMiembro."')";//Consulta por los club
				if($result2 = $conexion->query($sql2)){
					echo "Ahora eres miembro del club";
				}
			}
		}		
		mysqli_close($conexion);
	}
?>













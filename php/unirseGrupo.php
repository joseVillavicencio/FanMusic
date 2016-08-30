<?php
	include('funcionesI.php');
	$idClub=$_POST["idClub"];
	$idGrupo=$_POST["idGrupo"];
	$idMiembro=$_POST["idMiembro"];

	$conexion = conectar();
	 mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql = "call esMiembroGrupo('".$idGrupo."','".$idMiembro."')"; //Consulta por los grupos
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				echo "Ya eres miembro";
			}else{
				$conexion = conectar();
				$sql2="call esMiembroDos('".$idMiembro."','".$idClub."');";//Consulta por los club
				if($result2 = $conexion->query($sql2)){
					if($result2->num_rows >0){
						$conexion = conectar();
						$sql3 = "call agregarMiembroGrupo('".$idGrupo."','".$idMiembro."')"; //Agrego en el grupo
						if($result3 = $conexion->query($sql3)){
							echo "Ahora eres miembro del Grupo";
						}
					}else{
						echo "Para unirte al grupo debes formar parte del club";
					}
				}
			}
		}		
		mysqli_close($conexion);
	}
?>













<?php
	include('funcionesI.php');
	
	$idC=$_POST["id"];
	$conexion=conectar();
		mysqli_set_charset($conexion,"utf-8");
	$sql2 = "call eliminarClub('".$idC."');";
	if($result2 = $conexion->query($sql2)){
		echo "1";
	}else{
		echo "2";
	}
?>
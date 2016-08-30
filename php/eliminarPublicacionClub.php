<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$idC=$_POST["id"];
	$conexion=conectar();
	$sql2 = "call eliminarPublicacionC('".$idC."');";
	if($result2 = $conexion->query($sql2)){
		echo "1";
	}else{
		echo "2";
	}
?>
<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$idG=$_POST["idG"];
	$conexion=conectar();
	$sql2 = "call eliminarGrupo('".$idG."');";
	if($result2 = $conexion->query($sql2)){
		echo "success";
	}else{
		echo "error";
	}
?>
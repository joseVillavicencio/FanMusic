<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	echo "aqui";
	$idE=$_POST["id"];
	$conexion=conectar();
	$sql2 = "call eliminarEvento('".$idE."');";
	if($result2 = $conexion->query($sql2)){
		echo " Su evento se ha eliminado correctamente";
	}else{
		echo "No se ha podido eliminar el evento";
	}
?>
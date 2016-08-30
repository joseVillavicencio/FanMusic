<?php

	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	$conexion = conectar();
	
	$nombreG=$_POST["nombreG"]; 
	$alias=$_POST["alias"]; 
	$descripcion=$_POST["descripcion"]; 
	$pais=$_POST["pais"]; 
	$region=$_POST["region"]; 
	$ciudad=$_POST["ciudad"];
	
	mysqli_set_charset($conexion,"utf-8");
	$registroquery3 = "call actualizarDatosGrupo('".$nombreG."','".$alias."','".$descripcion."','".$pais."','".$region."','".$ciudad."');";
	if($registro3 =$conexion->query($registroquery3)){
		if($registro3){
			echo " La información del grupo fue editada";	
		}else{
			echo "El grupo no fue editado";
		}
	}else{
		echo "No existe el nombre del grupo";
	}
	
	mysqli_close($conexion);
	
?>
<?php
	include('funcionesI.php');
	$nombreG=$_POST["nombreG"]; 
	$descripcion=$_POST["descripcion"]; 
	$pais=$_POST["pais"]; 
	$region=$_POST["region"]; 
	$ciudad=$_POST["ciudad"];

	$conexion=conectar();
	 mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		if($descripcion!=null){
			$sql2 = 'CALL actDescGrupo("'.$nombreG.'","'.$descripcion.'");';
			if($result2 = $conexion->query($sql2)){
				echo 1;
			}
		}
		$conexion=conectar();
		if($pais!=null){
			$sql3 = 'CALL actPaisGrupo("'.$nombreG.'","'.$pais.'");';
			if($result3 = $conexion->query($sql3)){
				echo 2;
			}
		}
		$conexion=conectar();
		if($region!=null){
			$sql4 = 'CALL actRegiGrupo("'.$nombreG.'","'.$region.'");';
			if($result4 = $conexion->query($sql4)){
				echo 3;
			}
		}
		$conexion=conectar();
		if($ciudad!=null){
			$sql4 = 'CALL actCiudGrupo("'.$nombreG.'","'.$ciudad.'");';
			if($result4 = $conexion->query($sql4)){
				echo 4;
			}
		}
		mysqli_close($conexion);
	}
?>
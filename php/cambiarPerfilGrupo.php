<?php
	include('funcionesI.php');
	$nombreG=$_POST["nombreG"]; 
	$descripcion=$_POST["descripcion"]; 
	

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
		mysqli_close($conexion);
	}
?>
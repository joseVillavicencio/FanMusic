<?php
	include('funcionesI.php');
	
	$id= $_POST['id'];
	$conexion=conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql = "CALL  eliminarLetra('".$id."');";	
		if($result = $conexion->query($sql)){
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}
		mysqli_close($conexion);
	}
?>
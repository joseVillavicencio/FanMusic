<?php
	include('funcionesI.php');
	$conexion = conectar();
	$id=$_POST["id"];
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql ="call dejarCompartirAnecdota('".$id."');";
		if($result2 = $conexion->query($sql)){
			if($result2){
				echo 1 ;
			}else{
				echo 0;
			}
		}else{
			echo -1;
		}
	}
	mysqli_close($conexion);
?>
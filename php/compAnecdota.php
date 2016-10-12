<?php
	include('funcionesI.php');
	$conexion = conectar();
	$id=$_POST["id"];
	$sql2='call compartirAnecdota("'.$id.'");';
	if($result2 = $conexion->query($sql2)){
		if($result2){
			echo 1 ;
		}else{
			echo 0 ;
		}
	}
	mysqli_close($conexion);
?>
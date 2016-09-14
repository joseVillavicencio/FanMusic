<?php
	include('funcionesI.php');
	$conexion = conectar();
	$video=$_POST["id_video"];
	$sql2='call elimiCover("'.$video.'");';
	if($result2 = $conexion->query($sql2)){
		if($result2->num_rows >0){
			echo 1 ;
		}
	}
	mysqli_close($conexion);
?>
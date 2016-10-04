<?php
	include('funcionesI.php');
	$conexion = conectar();
	$video=$_POST["id_video"];
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql ="call dejarCompartirCover('".$video."');";
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
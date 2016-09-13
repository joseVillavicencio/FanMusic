<?php
 	include('funcionesI.php');
	$conexion = conectar();
	$apodo=$_POST["apodo"];
	$sql2='call existeApodo("'.$apodo.'");';
	if($result2 = $conexion->query($sql2)){
		if($result2->num_rows >0){
			while($row2=$result2->fetch_array()){
				$cant= $row2[0];
				if($cant==0){
					echo 1;
				}else{
					echo 2;
				}
			}
		}
	}
	mysqli_close($conexion);
?>
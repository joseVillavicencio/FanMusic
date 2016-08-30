<?php
	include('funcionesI.php');
	$id_User=$_POST["id"];
	$conexion = conectar();
		mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql = 'SELECT * FROM miembro WHERE id_M='.$id_User.';' ;
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){
					echo 1;
				}
			}else{
				echo 0;
			}
		}
		mysqli_close($conexion);
	}
	
?>
<?php
	include('funcionesI.php');
	$id_User=$_POST["id"];
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");
	
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql= "call imagMiembro('".$id_User."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){
					echo '<img src="'.$row["imag"].'" width=200 height=200 vspace=15 class="img-circle">';
				}
			}
		}
		mysqli_close($conexion);
	}
?>













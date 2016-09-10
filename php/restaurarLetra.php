<?php
	include('funcionesI.php');
	$id= $_POST['id'];
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql = "CALL  rescatarLetraDos('".$id."');";	
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					$contenido=$fila[0] ;
				}
				$conexion=conectar();
				$sql3 = "CALL  restaurarLetra('".$id."','".$contenido."');";	
				if($result3 = $conexion->query($sql3)){
					if($result3){
						echo 1;
					}else{
						echo 0;
					}
				}
			}else{
				echo 0;
			}
		}
		mysqli_close($conexion);
	}
?>
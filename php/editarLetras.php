<?php
	include('funcionesI.php');
	
	$contenido_nuevo= $_POST['text'];
	$id= $_POST['id'];
	$conexion=conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql = "CALL  rescatarLetraOriginal('".$id."');";	
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					$contenido_original=$fila[0] ;
				}
				//$conexion=conectar();
				//$sql2 = "CALL  guardarCopia('".$id."','".$contenido_original."');";	
				//if($result2 = $conexion->query($sql2)){
					//if($result2){
						
						$conexion=conectar();
						$sql3 = "CALL  editarLetra('".$id."','".$contenido_nuevo."');";	
						if($result3 = $conexion->query($sql3)){
							if($result3){
								echo 1;
							}
						}
					//}
				//}	
			}else{
				echo 0;
			}
		}
		mysqli_close($conexion);
	}
?>
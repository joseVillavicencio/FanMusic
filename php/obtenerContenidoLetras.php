<?php
	include('funcionesI.php');
	$nombreC= $_POST['nombreC'];
	$conexion=conectar();

	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql2 = "CALL  nombreClub('".$nombreC."');";	
		if($result2 = $conexion->query($sql2)){
			if($result2->num_rows >0){
				while($fila=mysqli_fetch_row($result2)){
					$idi=$fila[0] ;
				}
				$conexion=conectar();
				$sql = "CALL  obtenerLetraCancion('".$idi."');";	
				if($result = $conexion->query($sql)){
					if($result->num_rows >0){
						while($fila=mysqli_fetch_row($result)){
							$versionUno=$fila[1] ;
							echo ''.$versionUno.'';
						}
						
					}else{
						echo 0;
					}
				}
			}
		}	
		mysqli_close($conexion);
	}
?>
 
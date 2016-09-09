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
				$sql = "CALL  mostrarLetrasCanciones('".$idi."');";	
				$cont=0;
				if($result = $conexion->query($sql)){
					if($result->num_rows >0){
						while($fila=mysqli_fetch_row($result)){
							$titulo=$fila[0] ;
							$versionUno=$fila[1] ;
							$idioma=$fila[2];
							
						}
					}else{
						echo "El club no contiene letras";
					}
				}
			}
		}	
		
		mysqli_close($conexion);
	}
?>
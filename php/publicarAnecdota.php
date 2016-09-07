<?php
		include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$id=$_POST["id"];
	$titulo=$_POST["titulo"];
	$contenido=$_POST["contenido"];
	
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql='call esUnico('."'".$titulo."'".');';
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				echo 0;
			}else{
				$conexion = conectar();
				$sql2='call insertarAnecdota('."'".$id."'".','."'".$titulo."'".','."'".$contenido."'".');'; 
				if($result2 = $conexion->query($sql2)){
					if($result2>0){
						echo 1 ;
					}
				}
			}
		}
		
	}
	mysqli_close($conexion);
?>
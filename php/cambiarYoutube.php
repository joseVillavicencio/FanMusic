<?php
	include('funcionesI.php');
	//Datos rescatados desde el "formulario"
	$id_User=$_POST["idUser"];
	$youtube=$_POST["YOUTUBE"];
	$opcion=$_POST["flag"];
	
	$conexion=conectar();
	mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		if($youtube!=null){
			if($opcion == 0){//Actualizar
				$sql2 =  "call actualizarYoutube('".$youtube."','".$id_User."');"; 
				if($result2 = $conexion->query($sql2)){
					echo true;
				}else{
					echo false;
				}
			}else{
				$conexion=conectar();
				$sql3 =  "call eliminarYoutube('".$id_User."');"; 
				if($result3 = $conexion->query($sql3)){
					echo -1;
				}else{
					echo false;
				}
			}
		}
		mysqli_close($conexion);
	}
?>
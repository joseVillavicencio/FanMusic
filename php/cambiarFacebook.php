<?php
	include('funcionesI.php');
	//Datos rescatados desde el "formulario"
	$id_User=$_POST["idUser"];
	$facebook=$_POST["FACEBOOK"];
	$opcion=$_POST["flag"];
	
	$conexion=conectar();
	 mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		if($facebook){
			if($opcion == 0){//Actualizar
				$sql2 =  "call actualizarFacebook('".$facebook."','".$id_User."');"; 
				if($result2 = $conexion->query($sql2)){
					echo true;
				}else{
					echo false;
				}
			}
		}else{
			if($opcion == 1){ //Eliminar
				$conexion=conectar();
				$sql3 =  "call eliminarFacebook('".$id_User."');"; 
				if($result3 = $conexion->query($sql3)){
					echo true;
				}else{
					echo false;
				}
			}
		}
		mysqli_close($conexion);
	}
?>
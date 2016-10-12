<?php
	include('funcionesI.php');
	//Datos rescatados desde el "formulario"
	$id_User=$_POST["idUser"];
	$instagram=$_POST["INSTAGRAM"];
	$opcion=$_POST["flag"];
	
	$conexion=conectar();
	 mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		if($instagram!=null){
			if($opcion == 0){//Actualizar
				if(strlen($instagram)<=125){				
				$sql2 =  "call actualizarInstagram('".$instagram."','".$id_User."');"; 
					if($result2 = $conexion->query($sql2)){
						echo true;
					}else{
						echo false;
					}
				}else{
					echo 2;
				}	
			}else{
				$conexion=conectar();
				$sql3 =  "call eliminarInstagram('".$id_User."');"; 
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
<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$idF=$_POST["idF"];
	
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql= "call eliminarFinanza('".$idF."');";//Elimino de la tabla finanza
		if($registro =$conexion->query($sql)){
			if($registro){
				$conexion=conectar();
				$sql2= "call eliminarListaFinanza('".$idF."');"; //Elimino de la tabla lista_finanza
				if($registro2 =$conexion->query($sql2)){
					if($registro2){
						echo "1"; //La publicacion se elimino exitosamente
					}
				}
			}else{
				echo "No pudo eliminarse la publicación de finanza";
			}
		}
		
		mysqli_close($conexion);
	}
?>
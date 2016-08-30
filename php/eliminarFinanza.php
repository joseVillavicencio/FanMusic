<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$idF=$_POST["idF"];
	
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql = 'SELECT F.id_Finanza FROM finanza as F
				WHERE F.id_Finanza="'.$idF.'";';
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				$conexion=conectar();
				$consulta2= "call eliminarFinanza('".$idF."');";
				if($registro4 =$conexion->query($consulta2)){
					if($registro4){
						$conexion=conectar();
						$consulta3= "call eliminarListaFinanza('".$idF."');";
						if($registro5 =$conexion->query($consulta3)){
							if($registro5){
								echo "1"; 
							}
						}
					}else{
						echo "No se elimino finanza";
					}
				}
			}
		}else{
			echo "No se encontro finanza";
		}
		mysqli_close($conexion);
	}
?>
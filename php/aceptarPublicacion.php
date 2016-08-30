<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$idP=$_POST["idP"];
	$nombreG=$_POST["nombreG"];
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql = "call obtenerIdGrupo('".$nombreG."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila = mysqli_fetch_row($result)){
					$id_g= $fila[0];
				}
				$conexion = conectar();
				$consulta2= "call aceptarPublic('".$idP."','".$id_g."');";
				if($registro4 =$conexion->query($consulta2)){
					if($registro4){
						echo "1"; 
					}
				}
			}
		}	
		
		mysqli_close($conexion);
	}
?>
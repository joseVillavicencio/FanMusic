<?php
	include('funcionesI.php');
	
	$nombre=$_POST["nombreG"];
	$id_m=$_POST["id"];
	
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql= "call obtenerIdGrupo('".$nombre."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila1=mysqli_fetch_row($result)){ 
					$id_g=$fila1[0] ;
				}
				$conexion2=conectar();
				$consulta2= "call dejarModer('".$id_m."','".$id_g."');";
				if($registro4 =$conexion2->query($consulta2)){
					if($registro4){
						echo "1"; 
					}
				}
			}else{
				echo "0";
			}
		}
		mysqli_close($conexion);
	}
?>
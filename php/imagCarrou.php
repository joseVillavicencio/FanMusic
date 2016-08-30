<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');

	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql="call obtenerImgClubs(); "; //Consulta por la cantidad de club
		$cont=1;
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila = $result->fetch_array()){
					$imag=$fila[0];
					if($cont==1){
						echo '<div class="active item"><img class="img-responsive" src="'.$imag.'" alt="slider" style="width:2000px;height:610px;"/></div>';
						$cont++;
					}else{
						echo '<div class="item"><img class="img-responsive" src="'.$imag.'" alt="slider" style="width:2000px;height:610px;" /></div>';
						$cont++;
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>


				
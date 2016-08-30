<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');

	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql="call contarClub(); "; //Consulta por la cantidad de club
		$cont=0;
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila = $result->fetch_array()){
					$n=$fila[0];
					echo '<li data-target="#main-slider" data-slide-to="'.$cont.'" class="active"></li>';
					$cont++;
					$n--;
					while($n>0){
						echo '<li data-target="#main-slider" data-slide-to="'.$cont.'"></li>';
						$cont++;
						$n--;
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>


				
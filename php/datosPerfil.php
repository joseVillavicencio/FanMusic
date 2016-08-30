<?php
	include('funcionesI.php');
	$nombre= $_POST["nombreGrupo"];

	$conexion=conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql=" call mostrarDatosGrupo ('".$nombre."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				$conexion=conectar();
				while($fila=mysqli_fetch_row($result)){ 
					$alias= $fila[6];
					$descrip=$fila[2];
					$pais=$fila[3];
					$reg=$fila[4];
					$city=$fila[5];
				}
				echo '<tr><td><b>Alias:</b> '.$alias.'</td></tr>';
				echo '<tr><td><b>Descripción:</b> '.$descrip.'</td></tr>';
				echo '<tr><td><b>País:</b> '.$pais.'</td></tr>';
				echo '<tr><td><b>Región:</b> '.$reg.'</td></tr>';
				echo '<tr><td><b>Ciudad:</b> '.$city.'</td></tr>';
			}
		}else{
			echo " No se encuentra Grupo";
		}
		mysqli_close($conexion);
	}
?>
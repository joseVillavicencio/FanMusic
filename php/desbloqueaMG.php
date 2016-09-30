<?php
	include('funcionesI.php');
	$nombreG=$_POST['nombreG'];
	$idM= $_POST['idi'];
	$conexion=conectar();

	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$conexion=conectar();
		$sql = "call obtenerIdGrupo('".$nombreG."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					$idG=$fila[0] ;
				}
				$conexion=conectar();
				$sql2 = "call desbloquearMG('".$idM."','".$idG."');";
				if($result2 = $conexion->query($sql2)){
					if($result2){
						echo 1;
					}
				}
			}else{
				echo 0;
			}
		}
		mysqli_close($conexion);
	}
?>
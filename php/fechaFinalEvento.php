<?php
	include('funcionesI.php');
	$idEvento= $_POST["idEvento"];
	$fechaUno= $_POST["fechaUno"];
	$fechaDos= $_POST["fechaDos"];
	$fechaTres= $_POST["fechaTres"];
	$cantUno= $_POST["cantUno"];
	$cantDos= $_POST["cantDos"];
	$cantTres= $_POST["cantTres"];
	
	if($cantUno >= $cantDos){
		if($cantUno >= $cantTres){
			$cantFinal = $cantUno;
			$fechaFinal = $fechaUno;
		}
	}else{
		if($cantDos >= $cantTres){
			$cantFinal = $cantDos;
			$fechaFinal = $fechaDos;
		}else{
			$cantFinal = $cantTres;
			$fechaFinal = $fechaTres;
		}
	}
	$conexion=conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql = "call  ponerFechaFinal('".$idEvento."','".$fechaFinal."');";	
		if($result = $conexion->query($sql)){
			echo "La fecha final del evento es: ".$fechaFinal.".";
		}else{ 
			echo "No se pudo guardar la fecha";
		}
		mysqli_close($conexion);
	}
?>
 
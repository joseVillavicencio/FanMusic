<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	$nombre= $_POST["nombreC"];
	
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		
		$sql=" call mostrarDatosClub ('".$nombre."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				$conexion=conectar();
				while($fila=mysqli_fetch_row($result)){ 
					$imag=$fila[0] ;
					$nombre=$fila[1];
				} 
				echo "<tr><td><img src='$imag' class='img-circle' border='0' width='200' height='200' vspace='15'></td></tr>"  ;
			}
		}else{
			echo " No se encuentra Club";
		}
		mysqli_close($conexion);
	}
?>
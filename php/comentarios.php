<?php
	include('funcionesI.php');
	$apodo=$_POST["apodo"];
	$conexion = conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql = "call comentarioAutor('".$apodo."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){ //Va separando por filas
					echo '<div class="panel panel-info"><div style="color:black;" class="panel panel-heading">'.$row["titulo"].'</div><div style="color:black;" class="panel panel-body"><p>'.$row["contenido"].'</p><br><sup>'.substr($row["fecha"],0,10).'</sup><br></div></div>';
				}
			}
		}
		mysqli_close($conexion);
	}
?>
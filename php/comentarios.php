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
					echo '<div class="panel panel-info " ><div style="color:black;" class="panel panel-heading">En '.$row["titulo"].'</div><div style="color:black;" class="panel-body"><p><center>'.$row["contenido"].'<center></p><br><sup><center>'.substr($row["fecha"],0,10).'</sup><br></div></div>';
				}
			}
		}
		mysqli_close($conexion);
	}
?>
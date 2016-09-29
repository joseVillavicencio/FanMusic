<?php
	include('funcionesI.php');
	$apodo=$_POST["apodo"];
	$conexion = conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql ="call obtenerIdPublicAutor('".$apodo."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){ //Va separando por filas
					$id_p=$row[0];
					$titulo=$row[1];
					echo '<div class="panel panel-info"><div style="color:black;" class="panel panel-heading">'.$titulo.'</div>';
					$conexion = conectar();
					$sql2 = "call comentarioAutor('".$apodo."','".$id_p."','".$titulo."');";
					if($result2 = $conexion->query($sql2)){
						if($result2->num_rows >0){
							while($row2 = $result2->fetch_array()){ 
								
								echo '<div style="color:black;" class="panel panel-body"> <p>'.$row2["contenido"].'</p><br>'.substr($row2["fecha"],0,10).'<br></div>';
							}
							echo '</div>';
						}
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>
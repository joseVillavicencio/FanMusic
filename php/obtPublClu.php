<?php
	include('funcionesI.php');
	$id_User=$_POST["idUser"];
	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql = "call obtenerPublicacionesClub2('".$id_User."')";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){
					$titulo=$row["titulo"];
					$nombre=$row["nombre_Club"];
					$fecha=$row["fecha"];
					$subtitulo=$row["subtitulo"];
					$contenido=$row["contenido"];
					$id=$row["id_Publicacion"];
					
					echo '<div class="panel panel-default" style="color:black;"><div style="color:black;" class="panel-heading"><h1>'.$titulo.'</h1><sup>'.$nombre.'---'.$fecha.'</sup></div><div class="panel-body"><h4>'.$subtitulo.'</h4><hr/><h5>'.$contenido.'</h5>';
					$conexion=conectar();
					$sql5='CALL verImagsPubli("'.$id.'");';
					if($resu =$conexion->query($sql5)){
						if($resu->num_rows>0){
							while($rows2=$resu->fetch_array()){
								$imag=$rows2[0];
								echo '<br><img src="'.$imag.'" class="img-responsive img-rounded">';
							}
						}
					}
					echo '</div><div class="panel-footer">';
					$sql3 = 'CALL obtenerComentarios("'.$id.'");';
					$conexion=conectar();
					if($result2 =$conexion->query($sql3)){
						if($result2->num_rows>0){
							while($row2=$result2->fetch_array()){
								$conten=$row2[0];
								$aut=$row2[1];
								$fec=$row2[2];
								echo '<h6>'.$conten.'</h6><sup>'.$aut.'---'.$fec.'</sup><br>';
							}
						}
					}
					echo '<input  id="'.$id.'" type="text"><tr><button type="button" class="btn btn-info btn-xs" onclick="comentar('.$id.');">Comentar</button></div></div>';
				}
			}
		}
	}
	mysqli_close($conexion);

?>
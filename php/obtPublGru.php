<?php
	include('funcionesI.php');
	include('showContenido.php');
	$id_User=$_POST["idUser"];
	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql = "call obtenerPublicacionesGrupo2('".$id_User."')";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){
					echo '<div class="panel panel-default" style="color:black;text-align:center;"><div style="color:black;" class="panel-heading"><h1>'.$row["titulo"].'</h1><sup>'.$row["nombre_Grupo"].'---'.$row["fecha"].'</sup>';
					$conexion=conectar();
					$sql4 = 'CALL obtenerApoyo("'.$row["id_Publicacion"].'");';
					if($result4 =$conexion->query($sql4)){
						if($result4->num_rows>0){
							while($row4=$result4->fetch_array()){
								$cant=$row4[0];
							}
							echo '<button  type="button" class="btn btn-warning btn-xs" onclick="apoyarGrupo('.$row["id_Publicacion"].');"><span class="glyphicon glyphicon-star">'.$cant.'</span></button><br>';	
						}
						
					}
					echo '</div><div style="color:black;" class="panel-body"><h4>'.$row["subtitulo"].'</h4><hr/><h5>';
					mostrarContenido($row["contenido"]);
					echo '</h5>';
					$conexion=conectar();
					$sql5='CALL verImagsPubli("'.$row["id_Publicacion"].'");';
					if($resu =$conexion->query($sql5)){
						if($resu->num_rows>0){
							while($rows2=$resu->fetch_array()){
								$imag=$rows2[0];
								echo '<br><center><img align="center" src="'.$imag.'" class="img-responsive img-rounded"></center>';
							}
						}
					}
					
					echo '</div><div class="panel-footer">';
					$sql3 = 'CALL obtenerComentarios("'.$row["id_Publicacion"].'");';
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
					echo '<input  id="'.$row["id_Publicacion"].'" type="text"><button type="button" class="btn btn-info btn-xs" onclick="comentar('.$row["id_Publicacion"].');">Comentar</button></div></div>';
				}
			}
		}
	}
	mysqli_close($conexion);

?>
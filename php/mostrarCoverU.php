<?php
		include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$idM=$_POST["id"];
	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql='call mostrarCoversUser('."'".$idM."'".');';
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row=$result->fetch_array()){
					$song=$row[0];
					$cd=$row[1];
					$lang=$row[2];
					$video=$row[3];
					$compartir=$row[4];
					if($compartir==0){
						echo '<div class="panel panel-default" style="color:black;"><div style="color:black;" class="panel-heading"><h1>'.$song.'&nbsp;&nbsp;&nbsp;'.$cd.'</h1><sup>'.$lang.'</sup></div><div class="panel-body"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/'.$video.'"  allowfullscreen></iframe></div><br><button type="button" class="btn btn-danger btn-xs" onclick="eliminarCover('."'".$video."'".');"><span class="glyphicon glyphicon-remove"></span></button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success btn-xs" onclick="compartirCover('."'".$video."'".');">Compartir</button></div></div>';
					}else{
						echo '<div class="panel panel-default" style="color:black;"><div style="color:black;" class="panel-heading"><h1>'.$song.'&nbsp;&nbsp;&nbsp;'.$cd.'</h1><sup>'.$lang.'</sup></div><div class="panel-body"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/'.$video.'"  allowfullscreen></iframe></div><br><button type="button" class="btn btn-danger btn-xs" onclick="eliminarCover('."'".$video."'".');"><span class="glyphicon glyphicon-remove"></span></button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-warning btn-xs" onclick="dejarCompCover('."'".$video."'".');">Dejar de Compartir</button></div></div>';
					}
				}
			}else{
				echo "El club no posee covers.";
			}
		}
	}
	mysqli_close($conexion);
?>
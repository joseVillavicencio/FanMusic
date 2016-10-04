<?php
	include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$club=$_POST["nombreC"];
	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql2='CALL nombreClub("'.$club.'");';
		if($result2 = $conexion->query($sql2)){
			if($result2->num_rows>0){
				while($row2=$result2->fetch_array()){
					$idC=$row2[0];
					$conexion=conectar();
					$sql='CALL mostrarCoversClub("'.$idC.'");';
					if($result = $conexion->query($sql)){
						if($result->num_rows >0){
							while($row=$result->fetch_array()){
								$song=$row[0];
								$cd=$row[1];
								$lang=$row[2];
								$video=$row[3];
								echo '<div class="panel panel-default" style="color:black;"><div style="color:black;" class="panel-heading"><h1>'.$song.'&nbsp;&nbsp;&nbsp;'.$cd.'</h1><sup>'.$lang.'</sup></div><div class="panel-body"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/'.$video.'"  allowfullscreen></iframe></div><br></div></div>';
							}
						}
					}
				}
			}
		}
	}
	mysqli_close($conexion);
?>
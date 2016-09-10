<?php
		include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$id=$_POST["id"];
	$titulo=$_POST["titulo"];
	$club=$_POST["nombreClub"];
	$cd=$_POST["album"];
	$lang=$_POST["idioma"];
	$link=$_POST["video"];
	$compartir=$_POST["compartir"];
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql='call esUnico('."'".$titulo."'".');';
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				echo 0;
			}else{
				$conexion = conectar();
				if($compartir=="No Compartir"){
					$sql2='call insertarAnecdota('."'".$id."'".','."'".$titulo."'".','."'".$contenido."'".');'; 
					if($result2 = $conexion->query($sql2)){
						if($result2>0){
							echo 1 ;
						}
					}
				}else{
					$sql3='call nombreClub('."'".$compartir."'".');'; 
					if($result3 = $conexion->query($sql3)){
						if($result3->num_rows >0){
							while($row3=$result3->fetch_array()){
								$idC=$row3[0];
							}
						}
						$conexion = conectar();
						$sql4='call insertarAnecdotaYcompartir('."'".$id."'".','."'".$titulo."'".','."'".$contenido."'".','."'".$idC."'".');'; 
						if($result4 = $conexion->query($sql4)){
							if($result4>0){
								echo 1 ;
							}
						}
					}	
					
					
				}
			}
		}
		
	}
	mysqli_close($conexion);
?>
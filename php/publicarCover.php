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
		preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $link, $matches);
		
		if($matches[0]!=null){
			$video=$matches[0][0];
	
			$sql='call veriUnicoCover('."'".$video."'".');';
			if($result = $conexion->query($sql)){
				if($result->num_rows >0){
					echo 0;
				}else{
					$conexion = conectar();
					$sql3="CALL nombreClub('".$club."');";
					if($result2 = $conexion->query($sql3)){
						if($result2->num_rows >0){
							while($row2=$result2->fetch_array()){
								$id_Club= $row2[0];
							}
							$conexion=conectar();
							$sql2="CALL agregarCover('".$id."','".$id_Club."','".$video."','".$titulo."','".$cd."','".$lang."','".$compartir."');";
							if($result3 = $conexion->query($sql2)){
								if($result3){
									echo 1;
								}
							}
						}else{
							echo 3;
						}
					}
				}
			}
		}else{
			echo 2;
		}
	}
	mysqli_close($conexion);
?>
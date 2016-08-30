<?php
	
	include('funcionesI.php');
	$nombreClub=$_POST["nombreC"];
	$id_m=$_POST["id"];
	
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		mysqli_set_charset($conexion,"utf8");
		$sql= "call nombreClub('".$nombreClub."');";
		if($registro =$conexion->query($sql)){
			if($registro->num_rows >0){
				while($fila1=mysqli_fetch_row($registro)){ 
					$id_Club=$fila1[0] ;
				}
				$conexion=conectar();
				$sql2 = "call dejarSeguir2('".$id_m."','".$id_Club."');"; // Hago que deje de seguir todos los grupos del club.
				if($registro2 =$conexion->query($sql2)){
					if($registro2){
						$conexion=conectar();
						$dej = "call eliminarMiembro('".$id_m."','".$id_Club."');";
						if($result =$conexion->query($dej)){
							if($result){
								echo "1"; //Dejo de seguir el club. :)
							}
						}
					}else{
						echo "No se ha podido dejar el club 1 ";
					}
				}else{
						echo "No se ha podido dejar el club2";
					}
			}else{
				echo "No se ha podido dejar el club3";
			}
		}
	}
	mysqli_close($conexion);
?>
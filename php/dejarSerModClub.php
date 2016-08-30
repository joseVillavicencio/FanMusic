<?php
	
	include('funcionesI.php');
	$nombreClub=$_POST["nombreClub"];
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
				$sql2 = "call dejarModer2('".$id_m."','".$id_Club."');"; 
				if($registro2 =$conexion->query($sql2)){
					echo "1"; //Dejo de ser moderador del club club. :)
				}else{
						echo "No se ha podido dejar el club";
					}
			}else{
				echo "No se ha podido dejar el club";
			}
		}
	}
	mysqli_close($conexion);
?>
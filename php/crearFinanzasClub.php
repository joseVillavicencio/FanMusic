<?php
	header('Content-Type: charset=utf-8');
		include('funcionesI.php');
	
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$id=$_POST["idUser"];
	$motivo=$_POST["motivo"];
	$monto=$_POST["monto"];
	$desc=$_POST["descripcion"];
	
	/*----------------------------------------------------------------------*/	
	$conexion=conectar();
	$sql = "SELECT NOW();";
	if($fechap =$conexion->query($sql)){
		if($fechap->num_rows >0){
			while($filap=mysqli_fetch_row($fechap)){ 
				$fech=$filap[0] ;
			}
		}
	}
	$conexion=conectar();
	$sql= "SELECT club.id_Club FROM club INNER JOIN administrador ON administrador.id_Club= club.id_Club WHERE administrador.id_Miembro=".$id.";";
	
	if($registro1 =$conexion->query($sql)){ //Veo si quien está haciendo la publicación es el admin.
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$idClub=$fila1[0] ;
			}
			$conexion=conectar();
			$sql3 = " call crearFinanza (".'"'.$motivo.'"'.",".'"'.$monto.'"'.",".'"'.$desc.'"'.",".'"'.$fech.'"'.")" ;
			if($registro3 =$conexion->query($sql3)){
				$conexion=conectar();
				$sql4= "call obtenerIdFinanza(".'"'.$motivo.'"'.",".'"'.$monto.'"'.",".'"'.$desc.'"'.",".'"'.$fech.'"'.")";
				if($registro4 =$conexion->query($sql4)){
					if($registro4->num_rows >0){
						while($fila4=mysqli_fetch_row($registro4)){ 
							$id_f=$fila4[0] ;
						}
						$conexion=conectar();
						$agregar= "call agregarFinanzaClub(".'"'.$idClub.'"'.",".'"'.$id_f.'"'.");";
						if($registro3 =$conexion->query($agregar)){
							echo "1"; //Finanza creada exitosamente ;)
						}
					}
				}	
			}else{
				echo "No se pudo crea su finanza";
			}
		}else{
			echo "No se pudo crea su finanza";
		}
	}
	mysqli_close($conexion);
?>
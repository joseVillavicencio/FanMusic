<?php
	include('funcionesI.php');
	$id= $_POST["idMiembro"]; //ID del miembro
	$conexion=conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql="call mostrarEventos('".$id."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){ 
					$nombreE=$fila[0] ;
					$descripE=$fila[1];
					$fecha_f=$fila[2];
					$idClubE=$fila[3];
					$idGrupoE=$fila[4];
					
					$conexion2=conectar();	
					$sql2 = "call nombreDelClub('".$idClubE."');"; //Busco el nombre del club para mostrarlo
					if($result2 = $conexion2->query($sql2)){
						if($result2->num_rows >0){
							while($fila2=mysqli_fetch_row($result2)){ 
								$nombreClub=$fila2[0] ;
							}
							echo $nombreE."/".$descripE."/".$fecha_f."/".$nombreClub;
						}
					}
					
					$conexion2=conectar();
					$sql2 = "call nombreDelGrupo('".$idGrupoE."');"; //Busco el nombre del club para mostrarlo
					if($result2 = $conexion2->query($sql2)){
						if($result2->num_rows >0){
							while($fila2=mysqli_fetch_row($result2)){ 
								$nombreGrupo=$fila2[0] ;
							}
							echo $nombreE."/".$descripE."/".$fecha_f."/".$nombreGrupo;
						}
					}
						
				}
			}else{
				//No hay eventos en los que esté participando actualmente
			}
		}
		mysqli_close($conexion);
	}
?>
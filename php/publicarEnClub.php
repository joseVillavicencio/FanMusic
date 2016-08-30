<?php
	//include('conexion.php');
	include('funcionesI.php');
	header('Content-Type: charset=utf-8');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombre=$_POST["nombre"];
	$titulo=$_POST["tit"];
	$sub=$_POST["sub"];
	$cont=$_POST["cont"];
	
	$conexion=conectar();
	$sql = "SELECT NOW();";
	if($fechap =$conexion->query($sql)){
		if($fechap->num_rows >0){
			while($filap=mysqli_fetch_row($fechap)){ 
				$fecha=$filap[0] ;
			}
		}
	}
	$conexion=conectar();
	$registroquery2 = "call  nombreClub('".$nombre."');";
	if($registro1 =$conexion->query($registroquery2)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$idClub=$fila1[0] ;
			}
			$conexion=conectar();
			$sql2 = "call  publicarClub('".$idClub."','".$titulo."','".$cont."','".$sub."','".$fecha."');"; // Se agregaron mas campos 800 caracteres
			if($result2 = $conexion->query($sql2)){
				if($result2){
					$sql4="CALL obtenerId_Pub('".$titulo."','".$sub."','".$fecha."');";
					if($result4	= $conexion->query($sql4)){
						if($result4->num_rows >0){
							while($rows = $result4->fetch_array()){
								echo $rows[0];
							}
						}
					}else{
						echo 0;
					}
				}else{
					echo "error";
				}
			}
		}else{
			echo "El club no existe";
		}
	}
?>
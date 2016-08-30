<?php
	include('funcionesI.php');
	header('Content-Type: charset=utf-8');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombre=$_POST["nombreG"]; // En el caso de ser un club, deberia rescatar su nombre
	$titulo=$_POST["tit"];
	$sub=$_POST["sub"];
	$cont=$_POST["cont"];
	
	$conexion=conectar();
	 mysqli_set_charset($conexion,"utf-8");
	$sql = "SELECT NOW();";
	if($fechap =$conexion->query($sql)){
		if($fechap->num_rows >0){
			while($filap=mysqli_fetch_row($fechap)){ 
				$fecha=$filap[0] ;
			}
		}
	}	
	$conexion=conectar();
	$registroquery2 = "call  obtenerIdGrupo('".$nombre."');";
	if($registro1 =$conexion->query($registroquery2)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$id=$fila1[0] ;
			}
			
			$conexion=conectar();
			$sql2 = "call  solicitarPub('".$id."','".$titulo."','".$cont."','".$sub."','".$fecha."',0);";
			if($result2 = $conexion->query($sql2)){
				if($result2){
					echo 1;
				}else{
					echo 0;
				}
			}
		}else{
			echo "El grupo no existe";
		}
	}
?>
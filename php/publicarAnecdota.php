<?php
		include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$id=$_POST["id"];
	$titulo=$_POST["titulo"];
	$contenido=$_POST["contenido"];
	$compartir=$_POST["compartir"];
	
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$conexion = conectar();
		if($compartir=="No Compartir"){
			
			$sql2='call insertarAnecdota('."'".$id."'".','."'".$titulo."'".','."'".$contenido."'".');'; 
			if($result2 = $conexion->query($sql2)){
				if($result2){
					echo 1 ;
				}else{
					echo 0;
				}
			}
		}else{
			echo "aqui se mete";
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
	mysqli_close($conexion);
?>
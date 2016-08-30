<?php
	include('funcionesI.php');
	$correo=$_POST["mail"];
	$conexion=conectar();
	if($conexion->connect_errno ) {
			die ("Error de conexion") ;
	}else{
		$cod=md5(rand(0,1000));
		$sql2="CALL recuperacionCon('".$correo."');";
		if($result1= $conexion->query($sql2)){
			if($result1->num_rows >0){
				while($row = $result1->fetch_array()){
					$sql="CALL cambiarCod('".$correo."','".$cod."');";
					$conexion=conectar();
					if($result=$conexion->query($sql)){
						echo json_encode(array('status'=>'success','message'=>''.$row[0].','.$row[1].','.$cod.''));
					}else{
						echo json_encode(array('status'=>'error','message'=>'Error al recuperar codigo de autenticacion'));
					}
				}
			}
		}else{
			echo json_encode(array('status'=>'error','message'=>'No se pudo encontrar'));
		}
		mysqli_close($conexion);
	}
?>
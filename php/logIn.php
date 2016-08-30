<?php
	
	include('funcionesI.php');
	$pass=$_POST["passUser"];
	$mail=$_POST["mailUser"];
	$conexion=conectar();
	if($conexion->connect_errno ) {
			die ("Error de conexion") ;
	}else{
		$sql='CALL entrar("'.$mail.'","'.$pass.'");';
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){
					$nombre=$row[0];
					$apellido=$row[1];
					$id=$row[2];
					$edad=$row[3];
					$correo=$row[4];
					$apodo=$row[5];
					$gustos=$row[6];
					$face=$row[7];
					$twit=$row[8];
					$inst=$row[9];
					$yout=$row[10];
					$tumb=$row[11];
					echo json_encode(array('status'=>'success','message'=>''.$nombre.';'.$apellido.';'.$id.';'.$edad.';'.$correo.';'.$apodo.';'.$gustos.';'.$face.';'.$twit.';'.$inst.';'.$yout.';'.$tumb));	
				}
			}else{
				$conexion=conectar();
				$sql2 = 'CALL existo("'.$mail.'");';
				if($result2 = $conexion->query($sql2)){
					if($result2->num_rows >0){
						while($row2 = $result2->fetch_array()){
							$state=$row2[0];
							if($state==1){
								echo json_encode(array('status'=>'error','message'=>'Has ingresado incorrectamente tu contraseña'));
							}else{
								echo json_encode(array('status'=>'error','message'=>'Aún no has activado tu cuenta'));
							}
						}
					}else{
						echo json_encode(array('status'=>'error','message'=>'El correo eléctronico proporcionado no se encuentra en nuestra Base de Datos'));
					}
				}
			}
		}
		mysqli_close($conexion);
	}						
?>
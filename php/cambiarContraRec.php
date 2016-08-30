<?php
	include('funcionesI.php');
	$correo=$_POST["mail"];
	$cod=$_POST["cod"];
	$pass=$_POST["contra"];
	$conexion=conectar();
	if($conexion->connect_errno ) {
			die ("Error de conexion") ;
	}else{
		$sql3="CALL aunCambioCon('".$correo."','".$cod."')";
		if($resul= $conexion->query($sql3)){
			if($resul->num_rows >0){
				$sql2="CALL cambiarContRe('".$correo."','".$cod."','".$pass."');";
				if($result1= $conexion->query($sql2)){
					echo $result1;
					$code=md5(rand(0,1000));
					$sql="CALL cambiarCod('".$correo."','".$code."');";
					$conexion=conectar();
					if($result2=$conexion->query($sql)){
						echo "success";
					}
				}
			}else{
				echo "error";
			}
		}
		mysqli_close($conexion);
	}
?>
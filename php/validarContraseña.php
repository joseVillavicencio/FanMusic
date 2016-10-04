<?php
	include('funcionesI.php');
	$id= $_POST["id"]; //ID del miembro
	$pass=$_POST["pass"]; //Contraseña ingresada por el miembro
	$conexion=conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql="call existeConPass('".$id."','".$pass."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila2=mysqli_fetch_row($result)){ 
					echo $fila2[0] ;
				}
			}
		}
		mysqli_close($conexion);
	}
/*
DELIMITER $$
CREATE PROCEDURE existoConPass(id INTEGER, pass VARCHAR(16))
BEGIN
	SELECT COUNT(1) FROM miembro WHERE id_M=id AND contrasena=pass;
END $$
DELIMITER ;
*/	
?>
	
	
	
	
	
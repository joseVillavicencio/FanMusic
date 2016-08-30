<?php

	$servidor= "localhost";
	$user= "root";
	$pass="";
	$BD="fanapp"; 

	$conexion= new mysqli($servidor,$user,$pass,$BD);

	if($conexion->connect_errno ) {
		echo "Error de conexion" .$mysqli->connect_error;
	}
?>
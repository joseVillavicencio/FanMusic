<?php
	
	function conectar(){
	$servidor= "localhost";
	$user= "root";
	$pass="";
	$BD="fanapp"; 
	$conexion= new mysqli($servidor,$user,$pass,$BD);
	return $conexion;
   }
 
?>
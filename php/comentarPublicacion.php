<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$idP=$_POST["idP"];
	$id_m=$_POST["id_m"];
	$cont=$_POST["contenido"];
	$ano=$_POST["ano"];
	$mes=$_POST["mes"];
	$dia=$_POST["dia"];
	$hora=$_POST["hora"];
	$segundos=$_POST["segundos"];
	$g="-";
	$mes=$mes+1; 
	$fecha=$ano.$g.$mes.$g.$dia." ".$hora.":".$segundos;
	echo $con;
	// Nota: No llega el contenido que se escriba solo el id, no puedo concatenar la fecha tampoco.
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql= "call obtenerAutor('".$id_m."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows>0){
				while($row=mysqli_fetch_row($result2)){
					$autor=$row[0] ;
				}
				/*$sql= "call comentarPublic('".$idP."','".$fecha."','".$cont."','".$autor."');";
				if($result = $conexion->query($sql)){
					if($result){
						echo "1"; 
					}
				} /*/
			}else{
				echo "No se encontró autor";
			}
		} 
		mysqli_close($conexion);
	}
	
?>
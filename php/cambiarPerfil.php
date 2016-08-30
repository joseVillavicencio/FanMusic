<?php
	include('funcionesI.php');
	$id_User=$_POST["idUser"];
	$apodoNuevo=$_POST["APODO"];
	$descrip=$_POST["DESCRIP"];
	$gustos=$_POST["GUSTOS"];
	$pass=$_POST["PASS"];
	$flag=0;
	
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		if($apodoNuevo!=null){
			$sql2 = "call actualizarAutor('".$apodoNuevo."','".$id_User."');";
			if($result2 = $conexion->query($sql2)){
				if($result2){
					$conexion = conectar();
					$sql = "call actualizarApodo('".$apodoNuevo."','".$id_User."');";
					if($result = $conexion->query($sql)){
						if($result){
							$flag++;
						}
					}
				}
				
			}
		}if($descrip!=null){ //Agrega estas 4 o 5 lineas
			$sql5 = "call actualizarDescripcion('".$descrip."','".$id_User."');";
			if($result5 = $conexion->query($sql5)){
				$flag++;
			}
		}if($gustos!=null){
			$sql3 = "call actualizarGustos('".$gustos."','".$id_User."');";
			if($result3 = $conexion->query($sql3)){
				$flag++;
			}
		}if($pass!=null){
			$sql4 = "call actualizarContra('".$pass."','".$id_User."');";
			if($result4 = $conexion->query($sql4)){
				$flag++;
			}
		}
		if($flag!=0){
			echo "success";
		}else{
			echo "error";
		}
		mysqli_close($conexion);
	}
?>
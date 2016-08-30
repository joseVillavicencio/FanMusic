<?php

	include('funcionesI.php');
	$id_User=$_POST["idUser"];
	$publ=$_POST["idPubl"];
	$content=$_POST["contenido"];
	$apod=$_POST["apodo"];
	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql="CALL obtenerApodo('".$id_User."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){
					$apoSo=$row["apodo"];
					if($apoSo==$apod){
						$conexion = conectar();
						$sql3="SELECT NOW();";
						if($result2 = $conexion->query($sql3)){
							if($result2->num_rows >0){
								while($row = $result2->fetch_array()){
									$fecha=$row[0];
									$conexion=conectar();
									$sql2="CALL agregarComentario(".$publ.",'".$fecha."','".$content."','".$apod."');";
									if($result3 = $conexion->query($sql2)){
										echo "success";
									}else{
										echo "error 1";
									}
								}
							}
						}
					}else{
						echo "error 2";
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>
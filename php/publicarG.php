<?php

	include('funcionesI.php');
	$nombre=$_POST["nombreG"];
	$titu=$_POST["titulo"];
	$subt=$_POST["subtitulo"];
	$content=$_POST["contenido"];
	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		
		$sql="CALL obtenerIdGrupo('".$nombre."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){
					$id=$row[0];
				}
				$sql3="SELECT NOW();";
				$conexion=conectar();
				if($result2 = $conexion->query($sql3)){
					if($result2->num_rows >0){
						while($row3 = $result2->fetch_array()){
							$fecha=$row3[0];
							$conexion=conectar();
							$sql2="CALL publicarG(".$id.",'".$titu."','".$subt."','".$content."','".$fecha."');";
							if($result3 = $conexion->query($sql2)){
								$conexion=conectar();
								$sql4="CALL obtenerId_Pub('".$titu."','".$subt."','".$fecha."');";
								if($result4	= $conexion->query($sql4)){
									if($result4->num_rows >0){
										while($rows = $result4->fetch_array()){
											echo $rows[0];
										}
									}
								}
							}else{
								echo 0;
							}
						}
					}else{
						echo "error";
					}
				}
			}
		}			
		mysqli_close($conexion);
	}
?>
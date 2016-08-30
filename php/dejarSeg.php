<?php
	
	include('funcionesI.php');
	$nombre=$_POST["nombreG"];
	$id_m=$_POST["id"];
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		mysqli_set_charset($conexion,"utf8");
		$consulta= "call obtenerIdGrupo('".$nombre."');";
		if($registro =$conexion->query($consulta)){
			if($registro->num_rows >0){
				while($fila1=mysqli_fetch_row($registro)){ 
					$id_g=$fila1[0] ;
				}
				$conexion=conectar();
				$registroquery3 = "call esMiembroGrupo($id_g,$id_m);"; // para verificar que ya no sea miembro
				if($registro3 =$conexion->query($registroquery3)){
					if($registro3->num_rows >0){
						$conexion=conectar();
						$dej = "call dejarSeguir($id_m,$id_g);";
						if($result =$conexion->query($dej)){
							if($result){
								echo 1;
							}
						}
					}else{
						echo "No se ha podido dejar el grupo";
					}
				}else{
						echo "No se ha podido dejar el grupo ";
					}
			}else{
				echo "No se ha podido dejar el grupo ";
			}
		}
	}
	mysqli_close($conexion);
?>
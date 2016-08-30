<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$nombre=$_POST["nombreG"];
	$desc=$_POST["desc_edit"];
	$id_m=$_POST["id_m"];
	
	
	$conexion=conectar();
	$consulta = "call obtenerIdGrupo('".$nombre."');";
	if($registro1 =$conexion->query($consulta)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$id_g=$fila1[0] ;
			}
			$conexion=conectar();
			$registroquery3 = "call esMiembroGrupo($id_g,$id_m);";
			if($registro3 =$conexion->query($registroquery3)){
				if($registro3->num_rows >0){
					echo "estaaca";
					$conexion2=conectar();
					$consulta2= "call actInfoGrupo('".$nombre."','".$desc."');";
					if($registro4 =$conexion2->query($consulta2)){
						if($registro4){
							echo " El  grupo ha sido actualizado";
						}
					}
				}else{
					echo "El miembro no pertenece al grupo";
				}
			}
		}
	}
	
	
?>
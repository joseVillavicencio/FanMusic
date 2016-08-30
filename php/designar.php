<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$nombreG=$_POST["nombreG"];
	$correo=$_POST["correo"];
	$conexion=conectar();
	$sql = "call  obtenerIdGrupo('".$nombreG."');";
	$flag=0;
	if($registro1 =$conexion->query($sql)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$id_g=$fila1[0] ; //Rescata el id del grupo
			}
			$conexion=conectar();
			$sql = "call  obtenerIdM2('".$correo."');";
			if($registro1 =$conexion->query($sql)){
				if($registro1->num_rows >0){
					while($fila1=mysqli_fetch_row($registro1)){ 
						$id_m=$fila1[0] ; //Rescato el ID del moderador
					}
					$conexion=conectar();
					$sql3 = "call  esMiembroGrupo('".$id_g."','".$id_m."');"; //Reviso que sea miembro del Club
					if($registro3 =$conexion->query($sql3)){
						if($registro3->num_rows >0){
							$conexion=conectar();
							$sql4 = "call  estaBloqueadoEnGrupo('".$id_m."','".$id_g."');"; // Revisamos que no esté en la lista de bloqueados
							if($registro4 =$conexion->query($sql4)){
								if($registro4->num_rows <=0){
									$conexion=conectar();
									$sql4 = "call  esModerador('".$id_m."');"; // Revisamos que no sea moderador de algo mas
									if($registro4 =$conexion->query($sql4)){
										if($registro4->num_rows >0){
											echo 0;//echo "Ya es moderador de otro grupo";
											$flag=1;
										}
									}
									$conexion=conectar();
									$sql4 = "call  esAdmin('".$id_m."');"; // Revisamos que no sea admin de algo mas
									if($registro4 =$conexion->query($sql4)){
										if($registro4->num_rows >0){
											echo 0; //echo "Este usuario ya posee un cargo";
											$flag=1;
										}
									}
									if($flag!=1){
										$conexion=conectar();
										$sql5 = "call  designarM('".$id_m."','".$id_g."');"; 
										if($result5 = $conexion->query($sql5)){
											echo 1;//echo "ASSDDDD"; //Agregamos al nuevo moderador del club exitosamente ;)
										}else{
											echo "0"; 
										}
									}
								}else{
									echo 0; //Se encuentra en la lista de bloqueados.
								}
							}
						}else{
							echo 0;//echo "El usuario no es miembro del grupo"; //echo "0";
						}
					}
				}
			}
		}else{
			echo 0; //echo "El grupo no existe";
		}
	}
	mysqli_close($conexion);
?>
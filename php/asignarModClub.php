<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$nombreClub=$_POST["nombreC"];
	$correo=$_POST["mailMod"];
	$flag=0;
	$conexion=conectar();
	$sql = "call nombreClub('".$nombreClub."');"; //Rescato el ID del club
	if($registro1 =$conexion->query($sql)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$idClub=$fila1[0] ;
			}
			$conexion=conectar();
			$sql2 = "call  obtenerIdM2('".$correo."');"; //Rescato el id del miembro
			if($registro2 =$conexion->query($sql2)){
				if($registro2->num_rows >0){
					while($fila2=mysqli_fetch_row($registro2)){ 
						$idMiembro=$fila2[0] ;
					}
					$conexion=conectar();
					$sql3 = "call  esMiembro('".$correo."','".$nombreClub."');"; //Reviso que sea miembro del Club
					if($registro3 =$conexion->query($sql3)){
						if($registro3->num_rows >0){
							$conexion=conectar();
							$sql4 = "call  estaBloqueadoEnGrupo2('".$idMiembro."','".$idClub."');"; // Revisamos que no esté en la lista de bloqueados
							if($registro4 =$conexion->query($sql4)){
								if($registro4->num_rows >0){
									while($fila4=mysqli_fetch_row($registro4)){ 
										$idBloqGr=$fila4[0] ;
									}
									if($idBloqGr>0){
										echo 3; //echo "El miembro se encuentra en la lista de bloqueados en uno de los grupos del club"; //echo "0";
									}else{
										$conexion=conectar();
										$sql4 = "call  esModerador('".$idMiembro."');"; // Revisamos que no sea moderador de algo mas
										if($registro4 =$conexion->query($sql4)){
											if($registro4->num_rows >0){
												echo 5;//echo "Ya es moderador de otro grupo";
												$flag=1;
											}
										}
										$conexion=conectar();
										$sql4 = "call  esAdmin('".$idMiembro."');"; // Revisamos que no sea admin de algo mas
										if($registro4 =$conexion->query($sql4)){
											if($registro4->num_rows >0){
												echo 4; //echo "Este usuario ya posee un cargo";
												$flag=1;
											}
										}
										if($flag!=1){
											$conexion=conectar();
											$sql5 = "call  designarMod2('".$idMiembro."','".$idClub."');"; 
											if($result5 = $conexion->query($sql5)){
												echo 1;//echo "ASSDDDD"; //Agregamos al nuevo moderador del club exitosamente ;)
											}else{
												echo "0"; 
											}
										}
									}
								}
							}
						}else{
							echo 2;//echo "El usuario no es miembro del club"; //echo "0";
						}
					}
				}
			}
		}else{
			echo "0"; //echo "0";
		}
	}

	mysqli_close($conexion);
?>
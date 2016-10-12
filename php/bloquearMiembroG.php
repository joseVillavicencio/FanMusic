<?php
	include('funcionesI.php');
	$nombreGrupo=$_POST["nombreGM"]; //Nombre del grupo
	$correoMiembro=$_POST["correoMB"]; //Correo del Miembro
	
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql = "call obtenerCorreoM('".$correoMiembro."');"; //Rescato el id del miembro a través del correo
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){ 
					$idMiembro=$fila[0] ; //ID del miembro a bloquear
				}
				$conexion=conectar();
				$sql5 = "call esAdmin2('".$idMiembro."','".$nombreGrupo."');"; //Verifico que no intente bloquear al administrador del grupo...
				if($registro5 =$conexion->query($sql5)){
					if($registro5->num_rows <= 0){
						$conexion=conectar();
						$sql2 = "call obtenerIdGrupo('".$nombreGrupo."');"; //Rescato el id del grupo donde bloqueare
						if($registro2 =$conexion->query($sql2)){
							if($registro2->num_rows >0){
								while($fila1=mysqli_fetch_row($registro2)){ 
									$idGrupo=$fila1[0] ;
								}
								$conexion=conectar();
								$sql6 = "call esModerador2('".$idMiembro."','".$idGrupo."');"; //Me aseguro que sea miembro del grupo
								if($registro6 =$conexion->query($sql6)){
									if($registro6->num_rows >0){
										echo 5;
									}else{
										$conexion=conectar();
										$sql3 = "call esMiembroGrupo('".$idGrupo."','".$idMiembro."');"; //Me aseguro que sea miembro del grupo
										if($registro3 =$conexion->query($sql3)){
											if($registro3->num_rows >0){
												$conexion=conectar();
												$bloq = "call estaBloqueadoEnGrupo('".$idMiembro."','".$idGrupo."');"; //Aseguramos que no se encuentre bloqueado desde antes
												if($registro4 =$conexion->query($bloq)){
													if($registro4->num_rows >0){
														echo 4; //ya esta bloqueado
													}else{														
														$conexion=conectar();
														$bloc = "call bloquear2('".$idMiembro."','".$idGrupo."');";
														if($result_bloc =$conexion->query($bloc)){
															echo 1; //Bloqueamos correctamente ;)
														}
													}
												}
											}else{
												echo 3; //No es miembro del grupo
											}
										}
									}	
								}
							}else{
								echo 0; //Error al rescatar ID del grupo enviado
							}
						}
					}else{
						echo 2; //No puede bloquear al Admin del grupo
					}
				}
			}else{
				echo 0; //no existe el usuario
			}
		}
		mysqli_close($conexion);
	}
	
?>
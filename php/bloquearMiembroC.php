<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	$nombreClub=$_POST["nombreC"]; 
	$correoMiembro=$_POST["correoMC"]; 
	$conexion = conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		
		$sql = "call obtenerCorreoM('".$correoMiembro."');"; //Rescato el id del miembro a través del correo
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){ 
					$idMiembro=$fila[0] ;
				}
				$conexion=conectar();
				$sql5 = "call obtenerAdminConCorreo('".$idMiembro."');"; //Verifico que no sea el Admin para no cometer errores...
				if($registro5 =$conexion->query($sql5)){
					if($registro5->num_rows >0){
						echo 0;
					}else{
						$conexion=conectar();
						$sql2 = "call nombreClub('".$nombreClub."');"; //Rescato el id del club donde bloqueare
						if($registro2 =$conexion->query($sql2)){
							if($registro2->num_rows >0){
								while($fila1=mysqli_fetch_row($registro2)){ 
									$idClub=$fila1[0] ;
								}
								$conexion=conectar();
								$sql3 = "call esMiembro('".$correoMiembro."','".$nombreClub."');"; //Me aseguro que sea miembro del club
								if($registro3 =$conexion->query($sql3)){
									if($registro3->num_rows >0){
										$conexion=conectar();
										$bloq = "call estaBloqueadoEnClub('".$idMiembro."','".$idClub."');"; //Buscamos que no se encuentre bloqueado desde antes
										if($registro4 =$conexion->query($bloq)){
											if($registro4->num_rows >0){
												echo 0; //Se encuentra bloqueado desde antes
											}else{ 												
												$conexion=conectar();
												$bloc = "call bloquear('".$idMiembro."','".$idClub."');";
												if($result_bloc =$conexion->query($bloc)){
													echo 1; //Bloqueado del Club ;)
												}
											}
										}
									}else{
										echo 0;// 0;
									}
								}
								
							}else{
								echo 0;// echo 0;
							}
						}
					}
				}
			}else{
				echo 0;//echo 0;
			}
		}
		mysqli_close($conexion);
	}
	
?>
<?php
		include('funcionesI.php');
	/*----------------------------------------------------------------------
	La coincidencia con las "invitaciones" las hacemos en PAÍS-REGIÓN-CIUDAD*/
	$id=$_POST["idUser"];
	$nombreE=$_POST["nombreE"];
	$desE=$_POST["desE"]; 
	$paE=$_POST["paisN"]; //pais del evento 
	$regE=$_POST["regionN"]; //region del evento
	$ciE=$_POST["ciudadN"]; //ciudad del evento
	$motivoE=$_POST["motivoE"];
	$fecha1=$_POST["anio1"]."-".$_POST["mes1"]."-".$_POST["dia1"].":00"; //Concatenación para las fechas
	$fecha2=$_POST["anio2"]."-".$_POST["mes2"]."-".$_POST["dia2"].":00";
	$fecha3=$_POST["anio3"]."-".$_POST["mes3"]."-".$_POST["dia3"].":00";
	$invitar=$_POST["invitar"];
	
	//Consultas
	$conexion=conectar();
	if($fecha1!=NULL ){
		$consulta = 'CALL esAdmin("'.$id.'");' ;
		if($registro3 =$conexion->query($consulta)){
			if($registro3->num_rows>0){
				while($fila1=mysqli_fetch_row($registro3)){ 
					$id_c=$fila1[0] ; //ID del club del admin.
				}
				$conexion=conectar();
				$insertar= "call insertarFechas('".$fecha1."','".$fecha2."','".$fecha3."');";
				if($in =$conexion->query($insertar)){
					if($in){//existe (TRUE al crear)
						$conexion=conectar();
						$id_fecha= "call obtenerIdFecha('".$fecha1."','".$fecha2."','".$fecha3."');"; //Obtenemos el ID de las fechas que recien ingresamos
						if($obt =$conexion->query($id_fecha)){
							if($obt->num_rows>0){
								while($fila5=mysqli_fetch_row($obt)){ 
									$id_f=$fila5[0] ;
								}
								$conexion=conectar();
								$crear= "call crearEventoClub('".$id_c."','".$desE."','".$nombreE."','".$paE."','".$regE."','".$ciE."','".$motivoE."','".$id_f."');";
								if($result =$conexion->query($crear)){
									if($result){//existe (TRUE al crear)
										$conexion=conectar();
										$ob_nomb = "call obtenerIDEvento('".$nombreE."');"; //Rescatamos el ID del evento recién creado
										if($result_ob_nomb=$conexion->query($ob_nomb)){
											if($result_ob_nomb->num_rows>0){
												while($fila_nombre=mysqli_fetch_row($result_ob_nomb)){ 
													$id_e=$fila_nombre[0] ;
												}
												$conexion=conectar();
												if($invitar=='Pais'){
													$sql_c = "call eventoPaisClub('".$id_c."');";
													if($sql_respuesta1=$conexion->query($sql_c)){
														if($sql_respuesta1->num_rows>0){
															while($fila_part1=mysqli_fetch_row($sql_respuesta1)){ 
																$id_part=$fila_part1[0] ; //ID del participante
																$pais_part=$fila_part1[1] ; //Pais del participante
																if(stristr($pais_part,$paE)){ //Comparo que el pais que tiene participante COINCIDA en caracteres con el del evento.
																	$conexion=conectar();
																	$ag_c1 = "call agregarParticipantes('".$id_part."','".$id_e."');";
																	if($resp_ag_c1=$conexion->query($ag_c1)){
																		if($resp_ag_c1){ //existe (TRUE al crear)
																			//echo "El evento ".$nombreE." en ".$paE." se ha creado exitosamente";
																		}
																	}
																}
															}
															echo "El evento ".$nombreE." en ".$paE." se ha creado exitosamente";
														}else{
															echo "No existen participantes que residan en ".$paE;
														}
													}
												}else{
													if($invitar=='Region'){
														$sql_c2 = "call eventoRegionClub('".$id_c."');";
														if($sql_respuesta2=$conexion->query($sql_c2)){
															if($sql_respuesta2->num_rows>0){
																while($fila_part2=mysqli_fetch_row($sql_respuesta2)){ 
																	$id_part=$fila_part2[0] ; //ID del participante
																	$region_part=$fila_part2[1] ; //Region del participante
																	if(stristr($region_part,$regE)){//Comparo que la region que tiene participante COINCIDA en caracteres con el del evento.
																		$conexion=conectar();
																		$ag_c2 = "call agregarParticipantes('".$id_part."','".$id_e."');";
																		if($resp_ag_c2=$conexion->query($ag_c2)){
																			if($resp_ag_c2){ //existe (TRUE al crear)
																				
																			}
																		}
																	}
																}
																
															}else{
																echo "No existen participantes que residan en ".$regE;
															}
														}
														
													}else{	
														if($invitar=='Ciudad'){
															$sql_c3 = "call eventoCiudadClub('".$id_c."');";
															if($sql_respuesta3=$conexion->query($sql_c3)){
																if($sql_respuesta3->num_rows>0){
																	while($fila_part3=mysqli_fetch_row($sql_respuesta3)){ 
																		$id_part=$fila_part3[0] ; //ID del participante
																		$ciudad_part=$fila_part3[1] ; //Ciudad del participante
																		if(stristr($ciudad_part,$ciE)){ //Comparo que la ciudad que tiene participante COINCIDA en caracteres con el del evento.
																			$conexion=conectar();
																			$ag_c3 = "call agregarParticipantes('".$id_part."','".$id_e."');";
																			if($resp_ag_c3=$conexion->query($ag_c3)){
																				if($resp_ag_c3){ //existe (TRUE al crear)
																					//echo "El evento ".$nombreE." en ".$ciE." se ha creado exitosamente";
																				}
																			}
																		}
																	}
																	
																}else{
																	echo "No existen participantes que residan en ".$ciE;
																}
															}
														}else{
															$sql_c4 =  "call eventoTodosMiembrosClub('".$id."');"; //Si invito a todos los miembros
															if($sql_resc4=$conexion->query($sql_c4)){ //no me importa de donde sean, así que solo necesito...
																if($sql_resc4->num_rows>0){
																	while($fila_c4=mysqli_fetch_row($sql_resc4)){ 
																		$id_part_grupo=$fila_c4[0] ; //ID del participante
																		$conexion=conectar();
																		$ag_c4 = "call agregarParticipantes('".$id_part_grupo."','".$id_e."');";
																		if($resp_ag_c4=$conexion->query($ag_c4)){
																			if($resp_ag_c4){ //existe (TRUE al crear)
																				//echo "Se ha invitado a todos los miembros del club para el evento ".$nombreE;
																			}
																		}
																	}
																	
																}else{
																	echo "No existen participantes para este evento";
																}
															}	
														}
													}
												}
											}
										}	
									}else{
										echo "No fue posible crear el evento, revisa los campos";
									}
								}
							}
						}
					}else{
						echo "No fue posible crear el evento, revisa los campos";
					}	
				}
			}else{
				$conexion = conectar();
				$sql = 'CALL esModerador("'.$id.'");' ;
				if($result2 = $conexion->query($sql)){
					if($result2->num_rows >0){
						while($fila=mysqli_fetch_row($result2)){ 
							$id_g=$fila[0] ; //ID del grupo de ese moderador
						}
						$conexion2=conectar();
						$insertar2= "call insertarFechas('".$fecha1."','".$fecha2."','".$fecha3."');";
						if($in2 =$conexion2->query($insertar2)){
							if($in2){ //existe (TRUE al crear)
								$conexion3=conectar();
								$id_fecha2= "call obtenerIdFecha('".$fecha1."','".$fecha2."','".$fecha3."');"; //Obtenemos el ID de las fechas que recien ingresamos
								if($obt2 =$conexion3->query($id_fecha2)){
									if($obt2->num_rows>0){
										while($fila6=mysqli_fetch_row($obt2)){ 
											$id_fe=$fila6[0] ;
										}
										$conexion4=conectar();
										$crear2= "CALL crearEventoGrupo('".$id_g."','".$desE."','".$nombreE."','".$paE."','".$regE."','".$ciE."','".$motivoE."','".$id_fe."');";
										if($result3 =$conexion4->query($crear2)){
											if($result3){ //existe (TRUE al crear)
												$conexion=conectar();
												$ob_nomb = "call obtenerIDEvento('".$nombreE."');"; //Rescatamos el ID del evento recién creado
												if($result_ob_nomb=$conexion->query($ob_nomb)){
													if($result_ob_nomb->num_rows>0){
														while($fila_nombre=mysqli_fetch_row($result_ob_nomb)){ 
															$id_e=$fila_nombre[0] ;
														}
														$conexion=conectar();
														if($invitar=='Pais'){
															$sql_g1 = "call eventoPaisGrupo('".$id_g."');";
															if($sql_resP1=$conexion->query($sql_g1)){
																if($sql_resP1->num_rows>0){
																	while($fila_g1=mysqli_fetch_row($sql_resP1)){ 
																		$id_part_grupo=$fila_g1[0] ; //ID del participante
																		$pais_part_grupo=$fila_g1[1] ; //país del participante
																		if(stristr($pais_part_grupo,$paE)){ //Comparo que el pais que tiene participante COINCIDA en caracteres con el del evento.
																			$conexion=conectar();
																			$ag_g1 = "call agregarParticipantes('".$id_part_grupo."','".$id_e."');";
																			if($resp_ag_g1=$conexion->query($ag_g1)){
																				if($resp_ag_g1){//existe (TRUE al crear)
																					//echo "El evento ".$nombreE." en ".$paE." se ha creado exitosamente";
																				}
																			}
																		}
																	}
																	
																}else{
																	echo "No existen participantes que residan en ".$paE;
																}
															}
														}else{
															if($invitar=='Region'){
																$sql_g2 = "call eventoRegionGrupo('".$id_g."');";
																if($sql_resP2=$conexion->query($sql_g2)){
																	if($sql_resP2->num_rows>0){
																		while($fila_g2=mysqli_fetch_row($sql_resP2)){ 
																			$id_part_grupo=$fila_g2[0] ; //ID del participante
																			$region_part_grupo=$fila_g2[1] ; //region del participante
																			if(stristr($region_part_grupo,$regE)){ //Comparo que la region que tiene participante COINCIDA en caracteres con el del evento.
																				$conexion=conectar();
																				$ag_g1 = "call agregarParticipantes('".$id_part_grupo."','".$id_e."');";
																				if($resp_ag_g1=$conexion->query($ag_g1)){
																					if($resp_ag_g1){//existe (TRUE al crear)
																						//echo "El evento ".$nombreE." en ".$regE." se ha creado exitosamente";
																					}
																				}
																			}
																		}
																	
																	}else{
																		echo "No existen participantes que residan en ".$regE;
																	}
																}
															}else{	
																if($invitar=='Ciudad'){
																	$sql_g3 =  "call eventoCiudadGrupo('".$id_g."');";
																	if($sql_resP3=$conexion->query($sql_g3)){
																		if($sql_resP3->num_rows>0){
																			while($fila_g3=mysqli_fetch_row($sql_resP3)){ 
																				$id_part_grupo=$fila_g3[0] ; //ID del participante
																				$ciudad_part_grupo=$fila_g3[1] ; //ciudad del participante
																				if(stristr($ciudad_part_grupo,$ciE)){ //Comparo que la ciudad que tiene participante COINCIDA en caracteres con el del evento.
																					$conexion=conectar();
																					$ag_g1 = "call agregarParticipantes('".$id_part_grupo."','".$id_e."');";
																					if($resp_ag_g1=$conexion->query($ag_g1)){
																						if($resp_ag_g1){//existe (TRUE al crear)
																							//echo "El evento ".$nombreE." en ".$ciE." se ha creado exitosamente";
																						}
																					}
																				}
																			}
																			
																		}else{
																			echo "No existen participantes que residan en ".$ciE;
																		}
																	}
																}else{
																	$sql_g4 =  "call eventoTodosMiembros('".$id."');"; //Si invito a todos los miembros
																	if($sql_resP4=$conexion->query($sql_g4)){//no me importa de donde sean, así que solo necesito...
																		if($sql_resP4->num_rows>0){
																			while($fila_g4=mysqli_fetch_row($sql_resP4)){ 
																				$id_part_grupo=$fila_g4[0] ;//ID del participante
																				$conexion=conectar();
																				$ag_g4 = "call agregarParticipantes('".$id_part_grupo."','".$id_e."');";
																				if($resp_ag_g4=$conexion->query($ag_g4)){
																					if($resp_ag_g4){//existe (TRUE al crear)
																						//echo "Se ha invitado a todos los miembros del club para el evento ".$nombreE;
																					}
																				}
																			}
																			
																		}else{
																			echo "No existen participantes para este evento";
																		}
																	}
																}
															}
														}
													}
												}
											}else{
												echo "No fue posible crear el evento, revisa los campos";
											}
										}
									}
								}
							}
						}else{
							echo "No fue posible crear el evento, revisa los campos";
						}	
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>
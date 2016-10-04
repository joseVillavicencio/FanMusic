<?php
	include('funcionesI.php');
	$nombreC= $_POST['nombreC'];
	$idM= $_POST['idM'];
	$conexion=conectar();

	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql2 = "CALL  nombreClub('".$nombreC."');";	
		if($result2 = $conexion->query($sql2)){
			if($result2->num_rows >0){
				while($fila=mysqli_fetch_row($result2)){
					$idi=$fila[0] ;
				}
				$conexion=conectar();
				$sql = "CALL  mostrarLetrasCanciones('".$idi."');";	
				$cont=0;
				if($result = $conexion->query($sql)){
					if($result->num_rows >0){
						while($fila=mysqli_fetch_row($result)){
							$id_l=$fila[0];
							$titulo=$fila[1] ;
							$versionUno=$fila[2] ;
							$idioma=$fila[3];	
							/*Esta parte solo muestra */
							echo '<tr><td>'.$titulo.'</td><td>'.$idioma.'</td>';
							echo '<td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal'.$cont.'">Ver letra</button>';
							echo '<div class="modal fade" id="myModal'.$cont.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Letra</h4>
								  </div>
								  <div class="modal-body">
									<textarea rows="10" style="width:100%; resize: none;" id="textMostrar'.$cont.'" disabled >'.$versionUno.'</textarea>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Cerrar</button>
								 </div>
								</div>
							  </div>
							</div>&nbsp&nbsp&nbsp';
							/*Esta parte es para editar  */
							echo '<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModalB'.$cont.'">
							<span class="glyphicon glyphicon-pencil"></span></button>';
							echo '<div class="modal fade" id="myModalB'.$cont.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Letra</h4>
								  </div>
								  <div class="modal-body">
									<textarea rows="10" style="width:100%; resize: none;" id="text'.$cont.'"  >'.$versionUno.'</textarea>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
									<button type="button" id="aceptarL" name="aceptarL"  onclick="guardarCambioLetra('.$cont.','.$id_l.');" class="btn btn-warning  btn-xs">Aceptar</button>
									<button type="button" id="restaurar" name="restaurar"  onclick="restaurarOriginalLetra('.$id_l.');" class="btn btn-danger btn-xs">Restaurar Versión Original</button>;
								  </div>
								</div>
							  </div>
							</div>&nbsp&nbsp&nbsp';
							$conexion=conectar();
							$sql3 = "CALL  clubsAdmi('".$nombreC."','".$idM."');";	
							if($result3 = $conexion->query($sql3)){
								if($result3->num_rows >0){
									/*Esta parte solo para eliminar*/
									echo '<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModalC'.$cont.'">
									<span class="glyphicon glyphicon-remove"></span></button>';
									echo '<div class="modal fade" id="myModalC'.$cont.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Letra</h4>
										  </div>
										  <div class="modal-body">
											<textarea rows="10" style="width:100%; resize: none;" id="text'.$cont.'" disabled  >'.$versionUno.'</textarea>
										  </div>
										  <div class="modal-footer">
											<p>¿Estás seguro de querer eliminar esta letra?</p>
											<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
											<button type="button" id="eliminarL" name="eliminarL"  onclick="eliminarLetra('.$id_l.');" class="btn btn-danger btn-xs">Eliminar</button>;
										  </div>
										</div>
									  </div>
									</div></td></tr>';
								}else{
									$conexion=conectar();
									$sql4 = "CALL  ModerDelClub('".$idM."','".$nombreC."');";	
									if($result4 = $conexion->query($sql4)){
										if($result4->num_rows >0){
											/*Esta parte solo para eliminar*/
											echo '<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModalC'.$cont.'">
											Eliminar</button>';
											echo '<div class="modal fade" id="myModalC'.$cont.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Letra</h4>
												  </div>
												  <div class="modal-body">
													<textarea rows="10" style="width:100%; resize: none;" id="text'.$cont.'" disabled  >'.$versionUno.'</textarea>
												  </div>
												  <div class="modal-footer">
													<p>¿Estás seguro de querer eliminar esta letra?</p>
													<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
													<button type="button" id="eliminarL" name="eliminarL"  onclick="eliminarLetra('.$id_l.');" class="btn btn-danger btn-xs">Eliminar</button>;
												  </div>
												</div>
											  </div>
											</div></td><tr>';
										}
									}
								}
							}
							$cont++;
						}
					}else{
						echo "El club no contiene letras";
					}
				}
			}
		}	
		
		mysqli_close($conexion);
	}
?>
 
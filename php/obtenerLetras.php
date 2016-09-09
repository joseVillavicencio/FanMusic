<?php
	include('funcionesI.php');
	$nombreC= $_POST['nombreC'];
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
							$titulo=$fila[0] ;
							$versionUno=$fila[1] ;
							$idioma=$fila[2];
							echo '<tr><td>'.$titulo.'</td><td>'.$idioma.'</td>';
							echo '<td><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal'.$cont.'">
							Ver letra</button>';
							echo '<div class="modal fade" id="myModal'.$cont.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Letra</h4>
								  </div>
								  <div class="modal-body">
									<textarea id="text'.$cont.'" disabled >'.$versionUno.'</textarea>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<button type="button" id="botonEditar" name="botonEditar"  onclick="activarEdicionLetra('.$cont.');" class="btn btn-primary">Editar</button>
								  </div>
								</div>
							  </div>
							</div></td></tr>';
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
 
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
				if($result = $conexion->query($sql)){
					if($result->num_rows >0){
						while($fila=mysqli_fetch_row($result)){
							$titulo=$fila[0] ;
							$versionUno=$fila[1] ;
							$idioma=$fila[2];
							echo ''.$titulo.'&ensp;&ensp;'.$idioma.'<br>';
							echo '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
							Launch demo modal</button>';


							echo '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Modal title</h4>
								  </div>
								  <div class="modal-body">
									...
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								  </div>
								</div>
							  </div>
							</div>';
							/*echo '<td><a onclick="letras();" style="cursor: pointer; text-decoration: underline;">Ver</a></td>';
							echo '<script type="text/javascript"> function letras(){ $('."'#L'".').dialog({ show: "blind",hide: "blind",width: 500});}</script>';/*/
							
						}
						
					}else{
						echo "El club no contiene letras";
					}
				}
			}
		}	
		echo '<div id="L"><td>'.$versionUno.'</td></tr></div>';
		mysqli_close($conexion);
	}
?>
 
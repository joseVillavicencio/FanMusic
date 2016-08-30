<?php
	include('funcionesI.php');
	
	$nombreGrupo=$_GET["pag"];
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");

	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$registroquery2 = "call  obtenerIdGrupo('".$nombreGrupo."');";
		if($registro1 =$conexion->query($registroquery2)){
			if($registro1->num_rows >0){
				while($fila1=mysqli_fetch_row($registro1)){ 
					$id_G=$fila1[0] ;
				}
				$conexion=conectar();
				$sql = "call publicacionPendienteGrupo('".$id_G."');";
				if($result = $conexion->query($sql)){
					if($result->num_rows >0){
						while($fila = mysqli_fetch_row($result)){
							$id=$fila[0] ;
							$titulo=$fila[1] ;
							$subtitulo=$fila[2] ;
							$contenido=$fila[3] ;
							$fecha=$fila[4] ;
							echo '<div class="panel panel-default"><div class="panel-heading"><h1>'.$titulo.'</h1><hr/><h4>'.$subtitulo.'</h4><sup>'.$fecha.'</sup></div><div class="panel-body"><h5>'.$contenido.'</h5></div><div class="panel-footer">';
							echo '<input  id="'.$id.'" type="hidden"><button type="button" class="btn btn-info btn-xs" onclick="aceptarP('.$id.');">Aceptar</button>';
							echo '<input  id="'.$id.'" type="hidden"><button type="button" class="btn btn-info btn-xs" onclick="rechazarP('.$id.');">Rechazar</button></div></div>';
						}
					}
				}
			}
		}
	}
	mysqli_close($conexion);
?>
<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	//include('js/funcionesGrupo.js' );
	
	$nombreClub=$_POST["nombreC"]; // ahora nombre club
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");

	if($conexion->connect_errno){
		die ("Error de conexion");
	}else{
		$registroquery2 = "call  nombreClub('".$nombreClub."');";
		if($registro1 =$conexion->query($registroquery2)){
			if($registro1->num_rows >0){
				while($fila1=mysqli_fetch_row($registro1)){ 
					$id_Club=$fila1[0] ;
				}
				$conexion=conectar();
				$sql = "SELECT P.id_Publicacion ,P.titulo,P.subtitulo,P.contenido,P.fecha FROM publicacion P INNER JOIN club C ON C.id_Club=P.id_Club WHERE P.estado=0 and C.id_Club=".$id_Club."
						ORDER BY P.FECHA DESC;";
				if($result = $conexion->query($sql)){
					if($result->num_rows >0){
						while($fila = mysqli_fetch_row($result)){
							$id=$fila[0] ;
							$titulo=$fila[1] ;
							$subtitulo=$fila[2] ;
							$contenido=$fila[3] ;
							$fecha=$fila[4] ;
							echo '<div align="center" class="panel panel-default"><div class="panel-heading"><h1>'.$titulo.'</h1><hr/><h4>'.$subtitulo.'</h4><sup>'.$fecha.'</sup></div><div class="panel-body"><h5>'.$contenido.'</h5></div><div class="panel-footer">';
							echo '&nbsp;<input id="'.$id.'" type="hidden"><button type="button" class="btn btn-primary btn-xs" onclick="aceptarPC('.$id.');"><span class="glyphicon glyphicon-ok"></span></button>&nbsp;&nbsp;&nbsp;';
							echo '<input  id="'.$id.'" type="hidden"><button type="button" class="btn btn-danger btn-xs" onclick="rechazarPC('.$id.');"><span class="glyphicon glyphicon-remove"></span></button></div></div>';
						}
					}
				}
			}
		}
	} 
	mysqli_close($conexion);
?>
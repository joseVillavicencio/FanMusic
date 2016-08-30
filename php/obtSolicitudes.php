<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");
	$id=$_POST["idUser"];
	$nombreGrupo=$_POST["nomG"];
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
						while($row = $result->fetch_array()){
							echo '<div class="panel panel-default"><div class="panel-heading"><h1>'.$row["titulo"].'</h1><sup>'.$row["fecha"].'</sup></div><div class="panel-body"><h4>'.$row["subtitulo"].'</h4><hr/><h5>'.$row["contenido"].'</h5></div><div class="panel-footer">';
							
							echo '<input  id="'.$row["id_Publicacion"].'" type="hidden"><button type="button" class="btn btn-info btn-xs" onclick="aceptarP('.$row["id_Publicacion"].');">Aceptar</button>';
							
							echo '<input  id="'.$row["id_Publicacion"].'" type="hidden"><button type="button" class="btn btn-info btn-xs" onclick="rechazarP('.$row["id_Publicacion"].');">Rechazar</button></div></div>';
						}
					}
				}
			}
		}
	}
	mysqli_close($conexion);

?>
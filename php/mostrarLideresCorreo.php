<?php
	include('funcionesI.php');
	
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql = "CALL  mostrarAdmin();";	
		if($result = $conexion->query($sql)){
			echo "<div class='col-lg-6 col-sm-12'>";
				if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					$nombreClub=$fila[0] ;
					$apodoM=$fila[1] ;
					$correoM=$fila[2] ;
					$conexion=conectar();
						echo '<br><div class="alert alert-warning"><strong>Administrador:  </strong>'.$nombreClub.'&nbsp;&nbsp;<em>'.$apodoM.'</em>&nbsp;&nbsp;'.$correoM.'</div>' ;
				}
			}
			echo "</div>";
		}
		$sql2 = "call  todosModeradoresClub();";	
			if($result2 = $conexion->query($sql2)){
				echo "<div class='col-lg-6 col-sm-12'>";
				if($result2->num_rows >0){
					while($fila2=mysqli_fetch_row($result2)){
						$correoM=$fila2[0] ;
						$apodoM=$fila2[1] ;
						echo '<br><div class="alert alert-info"><strong>Moderador Club:  </strong>'.$nombreClub.'&nbsp;&nbsp;<em>'.$apodoM.'</em>&nbsp;&nbsp;'.$correoM.'</div>' ;
					}		
				}
				echo "</div>";
			}		
		$conexion=conectar();
		$sql3 = "call  todosModeradoresGrupo();";	
			if($result3 = $conexion->query($sql3)){
				echo "<div class='col-lg-6 col-sm-12'>";
				if($result3->num_rows >0){
					while($fila3=mysqli_fetch_row($result3)){
						$correoM=$fila3[0];
						$apodoM=$fila3[1] ;
						$nombreGrupo=$fila3[2] ;
						
						echo '<div class="alert alert-info"><strong>Moderador Grupo: </strong>'.$nombreGrupo.'&nbsp;&nbsp;<em>'.$apodoM.'</em>&nbsp;&nbsp;'.$correoM.'</div>' ;
					}
				}
				echo "</div>";
			}
		mysqli_close($conexion);
	}
?>
 
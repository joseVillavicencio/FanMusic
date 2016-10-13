<?php
	include('funcionesI.php');
	$id= $_POST['idM'];
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		
		$sql = "CALL  mostrarFechas('".$id."');";	
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					
					$nombreEvento=$fila[0] ;
					$idE=$fila[1];
					$idC=$fila[2];
					$idG=$fila[3];
					$fechaUno=$fila[4];
					$fechaDos=$fila[5];
					$fechaTres=$fila[6];
					$fechaFinal=$fila[7];
					if($fechaFinal==NULL){
					echo '<div id="opcionesFechas"> <tr> <td> '.$nombreEvento.'- </td>';
					if($idC!="NULL"){
						$conexion=conectar();
						$sql2="CAll nombreDelClub('".$idC."');";
						if($result2 = $conexion->query($sql2)){
							if($result2->num_rows >0){
								while($fila2=mysqli_fetch_row($result2)){
									$nombrec=$fila2[0];
									echo '<td> '.$nombrec.' </td>';
								}
							}
						}
					}
					if($idG!="NULL"){
						$conexion=conectar();
						$sql3="CALL nombreDelGrupo('".$idG."');";
						if($result3 = $conexion->query($sql3)){
							if($result3->num_rows >0){
								while($fila3=mysqli_fetch_row($result3)){
									$nombreg=$fila3[0];
									echo '<td> '.$nombreg.' </td>';
								}
							}
						}
					}
					echo '&nbsp;<td> <input type="radio" name="opcion'.$idE.'" value="'.$fechaUno.'" checked> '.$fechaUno.' </td>' ;
					echo '&nbsp;<td> <input type="radio" name="opcion'.$idE.'" value="'.$fechaDos.'" > '.$fechaDos.' </td>' ;
					echo '&nbsp;<td> <input type="radio" name="opcion'.$idE.'" value="'.$fechaTres.'" > '.$fechaTres.' </td>' ;
					echo '&nbsp;<td> <input type="radio" name="opcion'.$idE.'" value="No">No asistiré</td>' ;
					echo '&nbsp;<td> <button type="button" id="botonFecha" class="btn btn-info btn-xs" onclick="informarAsistencia('.$idE.','."'".$nombreEvento."'".','."'".'opcion'.$idE."'".');" >Elegir</button></div><br>';
					
					}
				}
			}else{
				echo 0;
			}
		}
		mysqli_close($conexion);
	}
?>
 
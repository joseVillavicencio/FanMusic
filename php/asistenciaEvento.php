<?php
	include('funcionesI.php');
	$id= $_POST['idM'];
	$conexion=conectar();
	$cont=0;
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql = "CALL  mostrarFechas('".$id."');";	
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					$nombreEvento=$fila[0] ;
					$fechaUno=$fila[1] ;
					$fechaDos=$fila[2];
					$fechaTres=$fila[3];
					$fechaFinal=$fila[4];
					if($fechaFinal==NULL){
					echo '<div id="opcionesFechas"> <tr> <td> '.$nombreEvento.' </td>';
					echo '&nbsp;<td> <input type="radio" name="opcion'.$cont.'" value="'.$fechaUno.'" checked> '.$fechaUno.' </td>' ;
					echo '&nbsp;<td> <input type="radio" name="opcion'.$cont.'" value="'.$fechaDos.'" > '.$fechaDos.' </td>' ;
					echo '&nbsp;<td> <input type="radio" name="opcion'.$cont.'" value="'.$fechaTres.'" > '.$fechaTres.' </td>' ;
					echo '&nbsp;<td> <button type="button" id="botonFecha" class="btn btn-info btn-xs" onclick="informarAsistencia('.$id.','."'".$nombreEvento."'".','."'".'opcion'.$cont."'".');" >Elegir</button></div><br>';
					$cont++;
					}
				}
			}else{
				echo 0;
			}
		}
		mysqli_close($conexion);
	}
?>
 
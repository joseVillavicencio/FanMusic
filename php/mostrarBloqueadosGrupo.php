<?php
	include('funcionesI.php');
	$nombreG= $_POST['nombreG'];
	$conexion=conectar();

	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$conexion=conectar();
		$sql = "call obtenerIdGrupo('".$nombreG."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					$idG=$fila[0] ;
				}
				$conexion=conectar();
				$sql2 = "call listarBloqueadosGrupo('".$idG."');";
				if($result2 = $conexion->query($sql2)){
					if($result2->num_rows >0){
						while($fila=mysqli_fetch_row($result2)){
							$idM=$fila[0] ;
							$correo=$fila[1] ;
							$apodo=$fila[2] ;
							echo '<tr> <td>'.$apodo.'<br><br></td><td>'.$correo.'</td>'; 
							echo '<td> <button type="button" id="botonConfirmar" class="btn btn-primary btn-xs" onclick="desbloquearMG('."'".$idM."'".');" >Desbloquear</button></td></tr>';
						}
					}
				}
			}else{
				echo 0;
			}
		}
		mysqli_close($conexion);
	}
?>
<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	$id= $_POST["id"];
	$conexion=conectar();
	
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql='CALL listarMisClub("'.$id.'")';
		if($result = $conexion->query($sql)){
			
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){ 
					$imag=$fila[2] ;
					$nombre=$fila[0];
					$descrip=$fila[1];
					echo "<tr><td><img src='$imag' class='img-circle' 'border='0' width='50' height='50' ></td>"  ;
					echo '<td><a style="color:black;"href="\FanMusic/perfilClubNuevo.php?pag='.$nombre.'" >'.$nombre.'</a></td><td>'.$descrip.'</td>';
					$conexion=conectar();
					$sql2 = "call  clubsAdmi('".$nombre."','".$id."');";					
					if($result2 = $conexion->query($sql2)){
						if($result2->num_rows >0){
							while($fila2=mysqli_fetch_row($result2)){ 
								$id_c=$fila2[0] ;
								echo '<div><td><button type="button" class="btn btn-danger btn-xs" onclick="eliminarC('.$id_c.');"><span class="glyphicon glyphicon-remove"></span></button></td></tr></div>';
							}
						}
					}else{
					echo "error";
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>
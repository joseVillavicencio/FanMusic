<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	$id= $_POST["id"];
	$FLAG=0;
	$conexion=conectar();
	mysqli_set_charset($conexion,"utf8");
	
	if($conexion->connect_errno ) {
		die ("Error de conexion") ;
	}else{
		$sql= "call mostrarDatosGrupo2('".$id."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){ 
					$imag=$fila[0] ;
					$nombre=$fila[1];
					$descrip=$fila[2];
					$club=$fila[3];

					$conexion = conectar(); //Desde aquí comienza un filtrado, para no mostrar los clubs en los que está bloqueado
					$consulta="call nombreClub('".$club."');";
					if($resultado = $conexion->query($consulta)){
						if($resultado->num_rows >0){
							while($filita=mysqli_fetch_row($resultado)){
								$id_CLUB=$filita[0];
								$conexion = conectar();
								$consulta2= "call estaBloqueadoEnClub('".$id."','".$id_CLUB."');";
								if($resultado2 = $conexion->query($consulta2)){
									if($resultado2->num_rows > 0){ //QUIERE DECIR QUE ESTÁ BLOQUEADO EN ESE CLUB
										$FLAG=1;
									}									
								}
							}
						}
					}
					$conexion = conectar(); //Desde aquí comienza un filtrado, para no mostrar los grupos en los que está bloqueado
					$consulta="call obtenerIdGrupo('".$nombre."');";
					if($resultado = $conexion->query($consulta)){
						if($resultado->num_rows >0){
							while($filita=mysqli_fetch_row($resultado)){
								$id_GRUPO=$filita[0];
								$conexion = conectar();
								$consulta2= "call estaBloqueadoEnGrupo('".$id."','".$id_GRUPO."');";
								if($resultado2 = $conexion->query($consulta2)){
									if($resultado2->num_rows > 0){ //QUIERE DECIR QUE ESTÁ BLOQUEADO EN ESE GRUPO
										$FLAG=1;
									}									
								}
							}
						}
					}
					if($FLAG!=1){
						echo "<tr><td><img src='$imag' class='img-circle' ' border='0' width='50' height='50' ></td>"  ;
						echo '<td><a style="color:black;" href="\FanMusic/p_gruposNuevo.php?pag='.$nombre.'" >'.$club.'-'.$nombre.'</a></td><td>'.$descrip.'</td>';
						$conexion=conectar();
						$sql2 = "call  gruposAdmi('".$nombre."','".$id."');";					
						if($result2 = $conexion->query($sql2)){
							if($result2->num_rows >0){
								while($fila2=mysqli_fetch_row($result2)){ 
									$id_Grupo=$fila2[0] ;
									echo '<div><td><input  id="'.$id_Grupo.'" type="hidden"><button type="button" class="btn btn-danger btn-xs" onclick="eliminarG('.$id_Grupo.');">Eliminar</button></tr></td></div>';
								}
							}
						}
					}
					$FLAG=0;
				}
			}
		}
		mysqli_close($conexion);
	}
?>
 
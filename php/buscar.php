<?php
	include('funcionesI.php');
	$palabra=$_POST["palabraBusqueda"];

	$conexion = conectar();
	 
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql="call funcionBuscarUno();"; //Consulta por los club
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila = $result->fetch_array()){
					$idClub = $fila[0]; //Ojo que esta parte no la muestra completa (La descrpicion en sí)
					$nombreClub = $fila[1];
					$descripClub = $fila[2];
					$aliasClub = $fila[3];
					if(stristr($nombreClub,$palabra) || stristr($aliasClub,$palabra)){
						echo '<tr><td>'.$nombreClub.' : '.$descripClub.'</td>';
						echo '<td> <button type="button" id="botonUnirse" class="btn btn-info btn-xs" onclick="unirseClub('."'".$idClub."'".');" >Unirse al Club</button></td></tr>';
					}
					
					$conexion = conectar();
					$sql2="call funcionBuscarDos();"; //Consulta por los club
					if($result2 = $conexion->query($sql2)){
						if($result2->num_rows >0){
							while($fila2 = $result2->fetch_array()){
								$idGrupo = $fila2[0]; //Ojo que esta parte no la muestra completa (La descrpicion en sí)
								$nombreGrupo = $fila2[1];
								$descripGrupo = $fila2[2];
								$idClub2 = $fila2[3];
								$aliasGrupo = $fila2[4];
								
								if(stristr($nombreGrupo,$palabra) || stristr($aliasGrupo,$palabra)){
									if($idClub == $idClub2){
										echo '<tr><td>'.$nombreClub.' - '.$nombreGrupo.' : '.$descripGrupo.'</td>';
										echo '<td> <button type="button" id="botonUnirse" class="btn btn-info btn-xs" onclick="unirseGrupo('."'".$idClub."'".','."'".$idGrupo."'".');" >Unirse al Grupo</button></td></tr>';
									}
								}
							}
						}
					}
				}
			}else{
				echo "No existen clubs o grupos con ese nombre";
			}
		}
		mysqli_close($conexion);
	}
?>



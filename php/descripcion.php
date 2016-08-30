<?php
	include('funcionesI.php');
	$id_User=$_POST["id"];
	$conexion = conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql= "CALL cosasMiembro('".$id_User."');";
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row = $result->fetch_array()){
					$descripcion = $row[0]; //Ojo que esta parte no la muestra completa (La descrpicion en sí)
					$gustos= $row[1];
					$pais=$row[2];
					$region=$row[3];
					$ciudad=$row[4];
					$apodo=$row[5];
					$lev=$row[6];
					echo '<tr><td><b>Descripción:</b> '.$descripcion.'</td></tr><tr><td><b>Gustos:</b> '.$gustos.'</td></tr><tr><td><b>País:</b> '.$pais.'</td></tr><tr><td><b>Región:</b> '.$region.'</td></tr><tr><td><b>Ciudad:</b> '.$ciudad.'</td></tr>';
					//echo "<td><b>Nivel :</b><img src='$nivel' rel='lightbox' ' border='0' width='50' height='50' ></td></tr>"  ;
					
					//echo '<div class="panel-heading"></div><div class="panel-body"><dl class="dl-horizontal"><dt>'.$descripcion.'</dt><br><dt>Nivel:</dt><dd></td><td>'.$nivel.'</dd><dt>Gustos:</dt><dd></td><td>'.$gustos.'</dd><dt>País:</dt><dd></td><td>'.$pais.'</dd><dt>Región:</dt><dd></td><td>'.$region.'</dd><dt>Ciudad:</dt><dd></td><td>'.$ciudad.'</dd></dl></div>';
				}
				$conexion = conectar();
				$sql_club= 'call cantComentClub('."'".$apodo."'".');'; //Veo cuantos comentarios ha hecho en los clubs
				if($comClubR = $conexion->query($sql_club)){
					if($comClubR->num_rows >0){
						while($row = $comClubR->fetch_array()){
							$numCC= $row[0];
						}
					}
				}
				$conexion = conectar();
				$sql_grupo= 'call cantComentGrupo('."'".$apodo."'".');'; //Veo cuantos comentarios ha hecho en los grupos 
				if($comGrupoR = $conexion->query($sql_grupo)){
					if($comGrupoR->num_rows >0){
						while($rowG = $comGrupoR->fetch_array()){
							$numCG= $rowG[0];
						}
					}
				}
				$conexion = conectar();
				$sql_cantClub= 'call cantMiembroClub('."'".$apodo."'".');'; //Veo a cuantos clubs pertenece
				if($sql_cantClubR = $conexion->query($sql_cantClub)){
					if($sql_cantClubR->num_rows >0){
						while($rowCC = $sql_cantClubR->fetch_array()){
							$numMC= $rowCC[0];
						}
					}
				}
				$conexion = conectar();
				$sql_cantGrupo= 'call cantMiembroGrupo('."'".$apodo."'".');';  //Veo a cuantos grupos pertenece
				if($sql_cantGrupoR = $conexion->query($sql_cantGrupo)){
					if($sql_cantGrupoR->num_rows >0){
						while($rowMG = $sql_cantGrupoR->fetch_array()){
							$numMG= $rowMG[0];
						}
					}
				}
				$conexion = conectar();
				$ver_nivel= "call verNivel('".$numCC."','".$numCG."','".$numMC."','".$numMG."');"; //Calculo el nivel con los datos 
				if($ver_nivelR = $conexion->query($ver_nivel)){
					if($ver_nivelR->num_rows >0){
						
						//echo "nivel"; no me acuerdo donde iba el "<=" jose...
						while($rowNivel = $ver_nivelR->fetch_array()){
							$id_nivel=$rowNivel[0];
							echo $id_nivel;
						}
					}
				}
				$conexion = conectar();
				if($id_nivel>$lev){
					$sql_upda="call actualizarNivel('".$id."','".$id_nivel."');"; //Actualiza el nivel
					if($act_nivel = $conexion->query($sql_upda)){
						if($act_nivel){
							$bestLev=$id_nivel;
						}
					}
				}else{
					$bestLev=$lev;
				}
				$conexion = conectar();
				$sql_level="call getNivel('".$bestLev."');";  //Obtiene el nivel y lo muestra 
				if($mostrar=$conexion->query($sql_level)){
					if($mostrar->num_rows >0){
						while($mRow = $mostrar->fetch_array()){
							$nombreL=$mRow[0];
							$imag=$mRow[1];
							echo "<tr><td><b>Nivel:</b> ".$nombreL."</td><td><img src='".$imag."' class='img-circle img-responsive' ' border='0' width='50' height='50' ></td></tr>";
						}
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>

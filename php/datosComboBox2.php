<?php
	include('funcionesI.php');
	$conexion = conectar();
	$idM=$_POST["id"];
	$sql2='call obtenerAliasClubs('."'".$idM."'".');';
	if($result2 = $conexion->query($sql2)){
		if($result2->num_rows >0){
			echo '<select style="color:black;" name="nombreC" id="artista">';
			while($row2=$result2->fetch_array()){
				$nombreC= $row2[0];
				$alias= $row2[1];
				echo '<option value="'.$nombreC.'">'.$alias.'</option>' ;
				
			}
			echo '</select><br><br>';
		}
	}
	mysqli_close($conexion);
?>
<?php
	include('funcionesI.php');
	$conexion = conectar();
	$idM=$_POST["id"];
	$sql2='call listarMisClub('."'".$idM."'".');';
	if($result2 = $conexion->query($sql2)){
		if($result2->num_rows >0){
			echo '<select style="color:black;" name="nombreC" id="nombreC"><option selected="selected" >No Compartir</option> ';
			while($row2=$result2->fetch_array()){
				$nombreC= $row2[0];
				echo '<option value='.$nombreC.'>'.$nombreC.'</option>' ;
				
			}
			echo '</select><br><br>';
		}
	}
	mysqli_close($conexion);
?>
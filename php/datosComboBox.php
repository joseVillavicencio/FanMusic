<?php
	include('funcionesI.php');
	$conexion = conectar();
	$idM=$_POST["id"];
	$sql2='call listarMisClub('."'".$idM."'".');';
	if($result2 = $conexion->query($sql2)){
		if($result2->num_rows >0){
			echo '<div class="panel panel-default" style="text-align:center;"><div class="panel panel-heading"><div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span><input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3"></div></div><div class="panel panel-body"><div class="input-group"></div><div class="input-group"><span class="input-group-addon" id="basic-addon3">Contenido</span> <input type="text" class="form-control" id="contenidoNuevo" aria-describedby="basic-addon5"></div><br>';
			echo '<script type="text/javascript">$('."'#tituloNuevo'".').tooltip({'."'trigger'".':'."'focus'".', '."'title'".': '."'Ingrese un título adecuado para tu anécdota'".'});</script>';
			echo '<script type="text/javascript">$('."'#contenidoNuevo'".').tooltip({'."'trigger'".':'."'focus'".', '."'title'".': '."'Cuéntanos tu anécdota'".'});</script>';
			echo '<span class="input-group-addon" id="basic-addon3">¿Deseas Compartirlo con alguno de tus Clubs?</span><br>';
			echo '<select style="color:black;" name="nombreC" id="nombreC"><option selected="selected" >No Compartir</option> ';
			while($row2=$result2->fetch_array()){
				$nombreC= $row2[0];
				echo '<option value='.$nombreC.'>'.$nombreC.'</option>' ;
				
			}
			echo '</select>';
			echo '</div><div class="panel panel-footer"><button class="btn btn-info" onclick="publicarAnecdota();">Compartir</button></div></div>';
		}
	}
	mysqli_close($conexion);
?>
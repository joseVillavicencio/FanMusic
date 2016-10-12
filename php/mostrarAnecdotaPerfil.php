<?php
		include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$idM=$_POST["id"];
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql='call obtenerAnecdotasMiembro('."'".$idM."'".');';
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($row=$result->fetch_array()){
					$estado=$row[0];
					$id=$row[1];
					$alias=$row[4];
					$titulo=$row[2];
					$contenido=$row[3];
					if($estado==0){
						echo '<div class="panel panel-default" style="color:black;"><div style="color:black;" class="panel-heading"><h1>'.$titulo.'</h1><sup>'.$alias.'</sup></div><div class="panel-body"><h4>'.$contenido.'</h4><hr/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="eliminarAnecdota('."'".$id."'".');"><span class="glyphicon glyphicon-remove"></span></button>&nbsp;<button type="button" class="btn btn-warning btn-xs" onclick="compartirAnecdota('."'".$id."'".');">Compartir</button></div></div>';
					}else{
						echo '<div class="panel panel-default" style="color:black;"><div style="color:black;" class="panel-heading"><h1>'.$titulo.'</h1><sup>'.$alias.'</sup></div><div class="panel-body"><h4>'.$contenido.'</h4><hr/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="eliminarAnecdota('."'".$id."'".');"><span class="glyphicon glyphicon-remove"></span></button>&nbsp;<button type="button" class="btn btn-warning btn-xs" onclick="dejarCompartirAnecdota('."'".$id."'".');">Dejar de Compartir</button></div></div>';
					}
				}
				
			}
		}
		
	}
	mysqli_close($conexion);
?>
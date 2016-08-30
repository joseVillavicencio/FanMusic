<?php
	include('funcionesI.php');
	$nombreClub=$_POST["nombre"];
	$id=$_POST["id"];
	$descrip=$_POST["descripcion"];
	$pais=$_POST["pais"];
	$region=$_POST["region"];
	$ciudad=$_POST["ciudad"];
	$alias=$_POST["alias"];
	$FLAG = 0;
	$flag = 0;
	
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf-8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql='call nombreAliasClub();';
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){
					$clubEncontrado=$fila[0];
					$aliasEncontrado=$fila[1];
					
					if(stristr($clubEncontrado,$nombreClub) || stristr($aliasEncontrado,$nombreClub)){
						echo "Ya existe un club con este nombre o similar";
						$FLAG=1;
					}
				}
			}
		}
		if($FLAG == 0){
			$conexion = conectar();
			$sql2='call insertarClub('."'".$nombreClub."'".','."'".$descrip."'".','."'".$pais."'".','."'".$region."'".','."'".$ciudad."'".','."'".$alias."'".');'; 
			if($result2 = $conexion->query($sql2)){
				
				$conexion = conectar();
				$sql3='call nombreClub('."'".$nombreClub."'".');'; 
				if($result3 = $conexion->query($sql3)){
					if($result3->num_rows >0){
						while($fila3=mysqli_fetch_row($result3)){
							$idNuevoClub=$fila3[0];
							
							$conexion = conectar();
							$sql31='call insertarAdmin('."'".$id."'".','."'".$idNuevoClub."'".');'; 
							if($result31 = $conexion->query($sql31)){
								$flag++;
							}
							$conexion = conectar();
							$sql31='call agregarMiembroClub('."'".$idNuevoClub."'".','."'".$id."'".');'; 
							if($result31 = $conexion->query($sql31)){
								$flag++;
							}
							if($flag==2){
								echo "El club ".$nombreClub." se ha creado exitosamente";
							}
						}
					}
				}
			}
		}
		mysqli_close($conexion);
	}
?>

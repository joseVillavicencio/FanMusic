<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$id_m=$_POST["id"];
	$nombreClub=$_POST["nombreC"];
	$correoAdminNuevo = $_POST["mailAdmi"];
	
	$conexion = conectar();
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
		$sql= "call nombreClub('".$nombreClub."');"; //Rescato el id del Club que voy a actualizar
		if($result = $conexion->query($sql)){
			if($result->num_rows >0){
				while($fila=mysqli_fetch_row($result)){ 
					$idClub=$fila[0] ;
				}
				$conexion=conectar();
				$sql1= "call esMiembro('".$correoAdminNuevo."','".$nombreClub."');"; //veo que la persona se encuentre dentro del club
				if($result1 =$conexion->query($sql1)){
					if($result1->num_rows >0){
						while($fila1=mysqli_fetch_row($result1)){ 
							$idAdminNuevo=$fila1[0] ; 
							$conexion=conectar();
							$sql11= "call esAdmin('".$idAdminNuevo."');"; //Me aseguro que no sea administrador de otro club
							if($result11 =$conexion->query($sql11)){
								if($result11->num_rows >0){
									echo "Este usuario ya es administrador de otro club"; //echo "0"; ????
								}else{
									$conexion=conectar();
									$sql2= "call actualizarAdmin('".$idAdminNuevo."','".$idClub."');"; //Me aseguro que no sea administrador de otro club
									if($result11 =$conexion->query($sql2)){
										echo "1";
									}else{
										echo "No se pudo cambiar el administrador"; //echo "0"; ????
									}
								}
							}
						}
					}else{
						echo "Este usuario no es miembro del club"; //echo "0"; ????
					}
				}
			}else{
				echo "0";
			}
		}
		mysqli_close($conexion);
	}
?>
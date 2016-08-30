<?php
	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	
	$nombre=$_POST["nombreC"];
	$desc=$_POST["descripcion"];
	$pais=$_POST["pais"];
	$region=$_POST["region"];
	$ciudad=$_POST["ciudad"];
	$id_m=$_POST["id_m"];
	
	$conexion=conectar();
	$consulta = "call nombreClub('".$nombre."');";
	if($registro1 =$conexion->query($consulta)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$id_Club=$fila1[0] ;
			}
			$conexion=conectar();
			$EXTRA = "SELECT miembro.correo FROM miembro WHERE miembro.id_M='".$id_m."';";
			if($EXTRA2 = $conexion->query($EXTRA)){
				if($EXTRA2->num_rows >0){
					while($filota=mysqli_fetch_row($EXTRA2)){
						$correo=$filota[0];
					}
					
					$conexion=conectar();
					$registroquery3 = "call esMiembro('".$correo."','".$nombre."');";
					if($registro3 =$conexion->query($registroquery3)){
						if($registro3->num_rows >0){
							
							$conexion=conectar();
							if($desc!=null){
								$sql2 = 'UPDATE club SET club.descrip_Club = "'.$desc.'" WHERE club.id_Club= '.$id_Club.';';
								if($result2 = $conexion->query($sql2)){
									if($result2) echo true;
								}
							}
							if($pais!=null){
								$sql2 = 'UPDATE club SET club.pais = "'.$pais.'" WHERE club.id_Club= '.$id_Club.';';
								if($result2 = $conexion->query($sql2)){
									if($result2) echo true;
								}
							}
							if($region!=null){
								$sql2 = 'UPDATE club SET club.region = "'.$region.'" WHERE club.id_Club= '.$id_Club.';';
								if($result2 = $conexion->query($sql2)){
									if($result2) echo true;
								}
							}
							if($ciudad!=null){
								$sql2 = 'UPDATE club SET club.ciudad = "'.$ciudad.'" WHERE club.id_Club= '.$id_Club.';';
								if($result2 = $conexion->query($sql2)){
									if($result2) echo true;
								}
							}
						}else{
							echo "El miembro no pertenece al club";
						}
					}
				}
			}			
		}
	}
?>
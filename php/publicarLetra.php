<?php
	//include('conexion.php');
	include('funcionesI.php');
	header('Content-Type: charset=utf-8');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombre=$_POST["nombreC"];
	$titulo=$_POST["tit"];
	$idioma=$_POST["idioma"];
	$cont=$_POST["cont"];
	
	$conexion=conectar();
	$registroquery2 = "call  nombreClub('".$nombre."');";
	if($registro1 =$conexion->query($registroquery2)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$idClub=$fila1[0] ;
			}
			$conexion=conectar();
			$existe = "call  existeLetra('".$idClub."','".$titulo."','".$idioma."');";
			if($result1 =$conexion->query($existe)){
				if($result1->num_rows >0){
					echo "2";
				}else{
					$conexion=conectar();
					$sql2 = "call  crearLetra('".$idClub."','".$titulo."','".$cont."','".$cont."','".$idioma."');";
					if($result2 = $conexion->query($sql2)){
						if($result2){
							echo "1";
						}else{
							echo "0";
						}
					}else{
						echo "0";
					}
				}
			}
			
		}else{
			echo 0;
		}
	}
?>
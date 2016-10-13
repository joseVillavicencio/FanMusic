<?php
	//include('conexion.php');
	include('funcionesI.php');
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$nombre=$_POST["nombreC"];
	$titulo=$_POST["tit"];
	$idioma=$_POST["idioma"];
	$cont=$_POST["cont"];
	$cont2=$cont;
	
	$conexion=conectar();
	if($conexion->connect_errno ) {
		die ("Error de conexion");
	}else{
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
						$sql2 = 'CALL  crearLetra("'.$idClub.'","'.$titulo.'","'.$cont.'","'.$cont2.'","'.$idioma.'");';
						if($result2 = $conexion->query($sql2)){
							if($result2){
								echo "1";
							}else{
								echo "3";
							}
						}
					}
				}
			}else{
				echo 0;
			}
		}
		mysqli_close($conexion);
	}
?>
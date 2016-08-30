<?php
	include('funcionesI.php');
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$apodo=$_POST["apodo"];
	$correo=$_POST["correo"];
	$contra=$_POST["contra"];
	$edad=$_POST["edad"];
	$gustos=$_POST["gustos"];
	$descrip=$_POST["descripcion"];
	$pais=$_POST["pais"];
	$region=$_POST["region"];
	$ciudad=$_POST["ciudad"];
	$face=$_POST["face"];
	$twit=$_POST["twit"];
	$inst=$_POST["inst"];
	$yout=$_POST["yout"];
	$tumb=$_POST["tumb"];
	$conexion=conectar();
	if($conexion->connect_errno ) {
			die ("Error de conexion") ;
	}else{
		$cod = md5(rand(0,1000));
		$sql="CALL inscribir('".$nombre."','".$apellido."','".$edad."','".$correo."','".$contra."','".$apodo."','".$gustos."','".$face."','".$twit."','".$inst."','".$yout."','".$tumb."','".$pais."','".$region."','".$ciudad."','".$descrip."','".$cod."');";
		if($result = $conexion->query($sql)){
			$sql2="CALL obtenerIdM2('".$correo."');";
			if($result1= $conexion->query($sql2)){
				if($result1->num_rows >0){
					while($row = $result1->fetch_array()){
						echo json_encode(array('status'=>'success','message'=>''.$row[0].','.$nombre.','.$correo.','.$cod.''));
					}
				}
			}else{
				echo json_encode(array('status'=>'error','message'=>'No se pudo encontrar'));
			}
		}else{
			echo json_encode(array('status'=>'error','message'=>'No se pudo registrar el nuevo miembro, el E-mail ingresado ya se encuentra en nuestra base de datos'));
		}
	}
	mysqli_close($conexion);
?>
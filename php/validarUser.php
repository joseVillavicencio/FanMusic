<?php
	include('funcionesI.php');
	$user=$_GET["email"];
	$cod=$_GET["key"];
	$conexion=conectar();
	if($conexion->connect_errno ) {
			die ("Error de conexion") ;
	}else{
		$verificacion ="CALL veriMiembro('".$user."','".$cod."');";
		if($result = $conexion->query($verificacion)){
			if($result->num_rows >0){
				$conexion=conectar();
				$cod2= md5(rand(0,1000));
				$sql="CALL activarMiembro('".$user."','".$cod2."');";
				if($result2 = $conexion->query($sql)){
					//header('Location: http://158.251.97.0:80/FanApp/indexNuevo.php');
					header('Location: http://localhost/FanMusic/indexNuevo.php');
				}
			}else{
				//echo "<div class='panel' style='text-align:center;'>Tu cuenta se encuentra activada<br><a href='http://158.251.97.0:80/FanMusic/indexNuevo.php'>Continuar</a></div>";
				echo "<div class='panel' style='text-align:center;'>Tu cuenta se encuentra activada<br><a href='http://localhost/FanMusic/indexNuevo.php'>Continuar</a></div>";
			}	
		}else{
			echo 'Error 300: entre el escritorio y el asiento';
		}
	}
?>
<?php
	include('funcionesI.php');
	
	/*----------------------------------------------------------------------*/
	//Datos obtenidos 
	$id_User=$_POST["idUser"];
	$conexion=conectar();
	mysqli_set_charset($conexion,"utf8");
	$sql="call redesSoc('".$id_User."');";
	if($registro1 =$conexion->query($sql)){
		if($registro1->num_rows >0){
			while($fila1=mysqli_fetch_row($registro1)){ 
				$cF=$fila1[0] ;
				$cT=$fila1[1] ;
				$cI=$fila1[2] ;
				$cY=$fila1[3] ;
				$cTu=$fila1[4] ;
			}
			if($cF){
				echo "<a href= '".$cF."' target='_blank'><img src='img/help/facebook.png' alt='Facebook'/></a>" ;
			}
			if($cT){
				echo "<a href='".$cT."' target='_blank'><img src='img/help/twitter.png' alt='Twitter'/></a>" ;
			}
			if($cI){
				echo "<a href= '".$cI."' target='_blank'><img src='img/help/instagram.png' alt='Instagram'/></a>";
			}
			if($cY){
				echo "<a href='".$cY."' target='_blank'><img src='img/help/youtube.png' alt='Youtube'/></a>";				
			}
			if($cTu){
				echo	"<a href='".$cTu."' target='_blank'><img src='img/help/tumblr.png' alt='Tumblr'/></a>";
			}
		}
		mysqli_close($conexion);
	}
?>
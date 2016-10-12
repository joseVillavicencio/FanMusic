<?php

	
	include('funcionesI.php');
	$conexion = conectar();
	$idF=$_POST["idF"]; 
	$titulo=$_POST["titulo"]; 
	$target_path= "C:/xampp/htdocs/FanMusic/img/publicaciones";
	$target_path2="img/publicaciones/";
		echo "el titulo es :";
		echo $titulo;
	$tipo = basename ($_FILES['uploadedfile']['type']);
	$tipocorrect = true;
	$nombreFinal= $idF."_".$titulo;
	
	if($tipo!="jpeg"){
		if($tipo!="jpg"){
			if($tipo!="gif"){
				//header('Location: inicio.php?id=2&op=3'); si hay error devuelve a otra pagina
				echo "Ha Ocurrido un problema, la imagen seleccionada no es del formato soportado por el sistema, favor intentar con JPEG, JPG y GIF.<br><button onclick='location.href=".'"'."//localhost/FanMusic/imagPopPublicacion.php".'"'."'>Volver</button>";
				$tipocorrect=false;
			}
		}
	}
	if($tipocorrect){
		$target_path= $target_path."/".$nombreFinal.".".$tipo;
		$target_path2=$target_path2.$nombreFinal.".".$tipo;
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path )){
			$sql = "CALL agregarFotoPublic('".$nombreFinal."','".$target_path2."','".$idF."');";
			if($conexion->query($sql)==TRUE){
				echo "Se ha ingresado correctamente la imagen <script type='text/javascript'>window.close();</script>";
			}
		}else{
			echo "Ha Ocurrido un Error";
		}
	}
	
?>


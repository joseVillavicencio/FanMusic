<?php

	header('Content-Type: charset=utf-8');
	include('funcionesI.php');
	$conexion = conectar();
	
	$nombreC=$_POST["nombreC"]; 
	$target_path= "C:/xampp/htdocs/FanMusic/img/perfil_club";
	$target_path2="img/perfil_club/";
	
	$tipo = basename ($_FILES['uploadedfile']['type']);
	$tipocorrect = true;
	if($tipo!="jpeg"){
		if($tipo!="jpg"){
			if($tipo!="gif"){
				//header('Location: inicio.php?id=2&op=3'); si hay error devuelve a otra pagina
				echo "no es tipo";
				$tipocorrect=false;
			}
		}
	}
	if($tipocorrect){
		$target_path= $target_path."/".$nombreC.".".$tipo;
		$target_path2=$target_path2.$nombreC.".".$tipo;
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path )){
			$sql = "call actualizarFotoPerfilClub('".$target_path2."','".$nombreC."');";
			//$sql = "UPDATE grupo SET imag='".$target_path2."' WHERE nombre_Grupo=".$nombre_grupo." ;";
			if($conexion->query($sql)==TRUE){
				header('location:/FanMusic/perfilClubNuevo.php?pag='.$nombreC);
			}
		}else{
			echo "Ha Ocurrido un Error";
			//header...
		}
	}
	
?>
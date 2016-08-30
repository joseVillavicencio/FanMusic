<?php
	include('funcionesI.php');
	$conexion=conectar();
	$target_path= "C:/xampp/htdocs/FanMusic/img/perfil_grupo";
	$target_path2="img/perfil_grupo/";
	$nombre_grupo= $_POST["nombre_grupo"];
	
	echo $nombre_grupo;
	
	$tipo = basename ($_FILES['uploadedfile']['type']);
	$tipocorrect = true;
	if($tipo!="jpeg"){
		if($tipo!="gif"){
			//header('Location: inicio.php?id=2&op=3'); si hay error devuelve a otra pagina
			echo "no es tipo";
			$tipocorrect=false;
		}
	}
	if($tipocorrect){
		$target_path= $target_path."/".$nombre_grupo.".".$tipo;
		$target_path2=$target_path2.$nombre_grupo.".".$tipo;
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path )){
			$sql = "call actualizarFotoPerfilGrupo('".$target_path2."','".$nombre_grupo."');";
			//$sql = "UPDATE grupo SET imag='".$target_path2."' WHERE nombre_Grupo=".$nombre_grupo." ;";
			if($conexion->query($sql)==TRUE){
				echo "2";
				header('location:/FanMusic/p_gruposNuevo.php?pag='.$nombre_grupo);
			}
		}else{
			echo "Ha Ocurrido un Error";
			//header...
		}
	}
?>
<?php
	include('funcionesI.php');
	$conexion=conectar();
		mysqli_set_charset($conexion,"utf-8");
	$target_path= "C:/xampp/htdocs/FanMusic/img/profile";
	$target_path2="img/profile/";
	$id_User= $_POST["idUser"];
	$tipo = basename ($_FILES['uploadedfile']['type']);
	$tipocorrect = true;
	if($tipo!="jpeg"){
		if($tipo!="jpg"){
			if($tipo!="gif"){
				header('Location: \FanMusic/editar_perfilNuevo.php'); //si hay error devuelve a otra pagina
				$tipocorrect=false;
			}
		}
	}
	if($tipocorrect){
		$target_path= $target_path."/".$id_User.".".$tipo;
		$target_path2=$target_path2.$id_User.".".$tipo;
		//$target_path= $target_path."".$_POST['id'].".".$tipo;
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path )){
			// EN ESTA PARTE SE SETEARA EL ID PARA QUE NOSOTROS LES PONGAMOS EL NOMBE A LA FOTO
			//$nombre=($_FILES['uploadefile']['type'] );
			//$id=$_POST['id'];
			$sql = "UPDATE miembro SET imag='".$target_path2."' WHERE id_M=".$id_User." ;";
			if($conexion->query($sql)==TRUE){
				//echo "El archivo" .basename($_FILES['uploadefile']['name']). " ha sido subido";
				header ('location:\FanMusic/perfilNuevo.php');
			}
		 echo "lo guarde";
		
		}else{
			echo "Ha ocurrido un error";
			//header...
		}
	}
?>
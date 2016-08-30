<?php
    include('funcionesI.php');
    header('Content-Type: charset=utf-8');
    /*----------------------------------------------------------------------*/
    //Datos obtenidos
    $idM=$_POST["idM"]; //ID del miembro
    $correo=$_POST["correo"];
    $contra = $_POST["contra"];
    $conexion=conectar();
    
    $sql1 = "CALL  entrar('".$correo."', '".$contra."');"; //Rescato el ID del Club
    if($result1 =$conexion->query($sql1)){
   	 if($result1->num_rows >0){
   		 $conexion=conectar();
   		 $sql2 = "CALL  eliminarCuenta('".$idM."', '".$contra."');"; //Rescato el ID del Club
   		 if($result2 =$conexion->query($sql2)){
   			 if($result2){
   				 echo 1;
   			 }
   		 }
   	 }else{
   		 echo 0;
   	 }
    }
    mysqli_close($conexion);
?>

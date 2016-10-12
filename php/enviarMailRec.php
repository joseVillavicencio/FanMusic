
<?php 
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$cod=$_POST["cod"];
require 'class.phpmailer.php';
require 'class.smtp.php';
   
$mail = new PHPMailer();   
    
$mail->IsSMTP();   
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPDebug  = 0;
$mail->Port = 465; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure="ssl";
$mail->Username = 'team.fanapp.2016@gmail.com'; 
$mail->Password = 'tFanApp016'; 

$mail->From = "team.fanapp.2016@gmail.com";   
$mail->FromName = "FanMusic";   
$mail->Subject = "Recuperacion Contraseña";   
$mail->AddAddress($correo);  
   
//$mail->WordWrap = 50;   
//$body = "Hola ".$nombre.", para restaurar tu password necesitas ingresar en la siguiente url: http://158.251.97.0:80/FanApp/cambioContra.php?email=".$correo."&key=".$cod."";   
 
$body = "Hola ".$nombre.", para restaurar tu password necesitas ingresar en la siguiente url: http://192.168.0.14:80/FanMusic/cambioContra.php?email=".$correo."&key=".$cod."";   
   
$mail->Body = $body;   
   
if( !$mail->Send() ) 
{  
    echo 0;   
} 
else 
{   
    echo 1;   
}   
?>
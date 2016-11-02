
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
$mail->Subject = "Activa tu Cuenta";   
$mail->AddAddress($correo);  
   
//$mail->WordWrap = 50;   
//   $body = "Hola ".$nombre.", Bienvenido a FanApp y para activar tu cuenta necesitas ingresar en la siguiente url: http://158.251.97.1:80/FanApp/php/validarUser.php?email=".$correo."&key=".$cod;   
  
$body = "Hola ".$nombre.", Bienvenido a FanMusic y para activar tu cuenta necesitas ingresar en la siguiente url: http://158.251.194.16:80/FanMusic/php/validarUser.php?email=".$correo."&key=".$cod;   
   
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

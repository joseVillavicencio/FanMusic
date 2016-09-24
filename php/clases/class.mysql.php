<?php
class MySQL
{
  var $conexion;
  function MySQL()
  {
  	if(!isset($this->conexion))
	{
  		$this->conexion = new mysqli("localhost","root","","fanapp");
  		
  	}
  }

 function consulta($consulta)
 {
	$resultado = $this->conexion->query($consulta);
  	if(!$resultado)
	{
  		echo 'MySQL Error: ' . mysql_error();
	    exit;
	}
  	return $resultado; 
  }
  
 function fetch_array($consulta)
 { 
  	return mysqli_fetch_array($consulta);
 }
 
 function num_rows($consulta)
 { 
 	 return mysqli_num_rows($consulta);
 }
 
 function fetch_row($consulta)
 { 
 	 return mysqli_fetch_row($consulta);
 }
 function fetch_assoc($consulta)
 { 
 	 return mysqli_fetch_assoc($consulta);
 } 
 
}

?>
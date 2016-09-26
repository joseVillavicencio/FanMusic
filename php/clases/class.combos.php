<?php

class selects extends MySQL
{
	var $code = "";
	var $name = "";
	
	function cargarPaises()
	{
		$consulta = parent::consulta("SELECT nombre_P,id_P FROM pais ORDER BY nombre_P ASC");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$paises = array();
			while($pais = parent::fetch_assoc($consulta))
			{
				$code = $pais["id_P"];
				$name = $pais["nombre_P"];				
				$paises[$code]=$name;
			}
			return $paises;
		}
		else
		{
			return false;
		}
	}
	function cargarEstados()
	{
		$consulta = parent::consulta("SELECT nombre_R,id_R FROM region WHERE ref_P = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$estados = array();
			while($estado = parent::fetch_assoc($consulta))
			{
				$code = $estado["id_R"];
				$name = $estado["nombre_R"];				
				$estados[$code]=$name;
			}
			return $estados;
		}
		else
		{
			return false;
		}
	}
		
	function cargarCiudades()
	{
		$consulta = parent::consulta("SELECT nombre_C,id_C FROM ciudad WHERE ref_R = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$ciudades = array();
			while($ciudad = parent::fetch_assoc($consulta))
			{
				$code = $ciudad["id_C"];
				$name = $ciudad["nombre_C"];				
				$ciudades[$code]=$name;
			}
			return $ciudades;
		}
		else
		{
			return false;
		}
	}		
}
?>
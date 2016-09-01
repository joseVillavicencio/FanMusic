<?php
	function mostrarContenido(string $content){
		preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $content, $matches);
		
		foreach($matches as $values){
			echo '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/'.$values[0].'" frameborder="0" allowfullscreen></iframe>';
			echo '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/'.$values[1].'" frameborder="0" allowfullscreen></iframe>';
		}
			
	
		$cadena_origen=$content;
		$cadena_resultante= preg_replace("/((http|https|www)[^\s]+)/", '<a href="$1">$0</a>', $cadena_origen);
		$cadena_resultante= preg_replace("/href=\"www/", 'href="http://www', $cadena_resultante);
		
		echo $cadena_resultante;
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
?>
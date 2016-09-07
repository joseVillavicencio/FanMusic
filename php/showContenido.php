<?php
	function mostrarContenido(string $content){
		preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $content, $matches);
		
		if($matches[0]!=null){
			foreach($matches[0] as $values){
			
				echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/'.$values.'"  allowfullscreen></iframe></div>';
			}
		}
			
	
		$cadena_origen=$content;
		$cadena_resultante= preg_replace("/((http|https|www)[^\s]+)/", '<a href="$1">$0</a>', $cadena_origen);
		$cadena_resultante= preg_replace("/href=\"www/", 'href="http://www', $cadena_resultante);
		
		echo $cadena_resultante;
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
?>
<form enctype="multipart/form-data" action="php/subirFotoPublicacion.php" method="POST">
	<div class= "form-group"><div class="input-group">
		<span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span>
		<input type="text" class="form-control" id="titulo" aria-describedby="basic-addon3">
	</div><br>
	<input type="hidden" id="idF" name="idF" value="'+localStorage.getItem("nuevaPubli")+'">
	<div><input name="uploadedfile" id="uploadedfile" type="file"><br></div>
	<button type="submit" class="btn btn-success"> Adjuntar Foto</button>&nbsp;&nbsp;
	<button type="submit"  class="btn btn-danger">Cerrar</button>
	</div>
</form>;	
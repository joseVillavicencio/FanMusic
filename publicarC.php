<div class="panel panel-default" style="text-align:center;">
	<div class="panel panel-heading">
		<h1>Publicar Noticia</h1>
	</div>
	<div class="panel panel-body">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span>
			<input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3">
			<script type="text/javascript">
				$('#tituloNuevo').tooltip({'trigger':'focus', 'title': 'Ingrese un título para su publicación (50 caracteres máx)'});
			</script>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon3">Subtitulo</span> 
			<input type="text" class="form-control" id="subtituloNuevo" aria-describedby="basic-addon3">
			<script type="text/javascript">
				$('#subtituloNuevo').tooltip({'trigger':'focus', 'title': 'Ingrese un subtítulo para su publicación (50 caracteres máx)'});
			</script>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon3">Contenido</span>
			<script type="text/javascript">
				$('#contenidoNuevo').tooltip({'trigger':'focus', 'title': 'Ingrese el contenido de su publicación (800 caracteres máx)'});
			</script>
		</div><br>
		<div>
			<textarea rows="5" style="width:100%; resize: none;" id="contenidoNuevo"></textarea>
		<div>
		<button class="btn btn-primary" onclick="publicarClub2();">A&#xF1;adir</button>
	</div>
</div>


			<div id="listasAnecdota2" class="col-lg-8 col-lg-offset-2"> <!--class="col-lg-4 col-sm-4"-->
				<div class="panel panel-default" style="text-align:center;">
					<div class="panel panel-heading"><h3>Cuéntanos Tus Anécdotas!!</h3></div>
					<div class="panel panel-body"><div class="input-group"></div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span>
							<input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3">
							<script type="text/javascript">
								$('#tituloNuevo').tooltip({'trigger':'focus', 'title': 'Ingrese un título adecuado para tu anécdota'});
							</script>
						</div><br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">Contenido</span> 
							<input type="text" class="form-control" id="contenidoNuevo" aria-describedby="basic-addon5">
							<script type="text/javascript">
								$('#contenidoNuevo').tooltip({'trigger':'focus', 'title': 'Cuéntanos tu anécdota'});
							</script>
						</div><br>
						<span class="input-group-addon" id="basic-addon3">¿Deseas Compartirlo con alguno de tus Clubs?</span><br>
						<div id="pegar">
							<script type="text/javascript">
								listarClubs("#pegar");
							</script>
						</div>
						<hr>
						<button class="btn btn-primary" onclick="publicarAnecdota();">Guardar</button>
					</div>
				</div>
				<div id="listasAnecdota" >
				<script type="text/javascript">
					mostrarAnecdota("#listasAnecdota");
				</script>
			</div>
			</div>
			


			<div id="listasAnecdota2" class="col-lg-8 col-lg-offset-2"> <!--class="col-lg-4 col-sm-4"-->
				<div class="panel panel-default" style="text-align:center;">
					<div class="panel panel-heading"><h3>Compartenos tus nuevos Covers!!</h3></div>
					<div class="panel panel-body"><div class="input-group"></div>
						<div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span>
							<input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3">
							<script type="text/javascript">
								$('#tituloNuevo').tooltip({'trigger':'focus', 'title': 'Debes ingresar el nombre de la canción'});
							</script>
						</div><br>
						<div class="input-group"><span class="input-group-addon" id="basic-addon3">Álbum</span>
							<input type="text" class="form-control" id="albumNuevo" aria-describedby="basic-addon3">
							<script type="text/javascript">
								$('#albumNuevo').tooltip({'trigger':'focus', 'title': 'Debes ingresar el álbum al que pertenece la canción'});
							</script>
						</div><br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">Link</span> 
							<input type="text" class="form-control" id="link" aria-describedby="basic-addon5">
							<script type="text/javascript">
								$('#link').tooltip({'trigger':'focus', 'title': 'Ingresa la dirección URL de tu video en la plataforma Youtube'});
							</script>
						</div><br>
						<div class="row">
							<div id="div_language" class="col-lg-4" style="color:black;">
								<select id="lang" onchange="updateCountry()"></select>
							</div>
								<script>
								var langs =
								[['Afrikaans'],
								 ['Bahasa Indonesia'],
								 ['Bahasa Melayu'],
								 ['Català'],
								 ['Čeština'],
								 ['Deutsch'],
								 ['English'],
								 ['Español'],
								 ['Euskara'],
								 ['Français'],
								 ['Galego'],
								 ['Hrvatski'],
								 ['IsiZulu'],
								 ['Íslenska'],
								 ['Italiano'],
								 ['Magyar'],
								 ['Nederlands'],
								 ['Norsk bokmål'],
								 ['Polski'],
								 ['Português'],
								 ['Română'],
								 ['Slovenčina'],
								 ['Suomi'],
								 ['Svenska'],
								 ['Türkçe'],
								 ['български'],
								 ['Pусский'],
								 ['Српски'],
								 ['한국어'],
								 ['中文'],
								 ['日本語'],
								 ['Lingua latīna']];

								for (var i = 0; i < langs.length; i++) {
								  lang.options[i] = new Option(langs[i][0], i);
								}
								lang.selectedIndex = 6;
								updateCountry();
								
								

								function updateCountry() {
								  
								  var list = langs[lang.selectedIndex];
								 
								}
							</script>
							<div id="pegar" class="col-lg-4">
								<script type="text/javascript">
									listarArtis("#pegar");
								</script>
							</div>
							<div class="input-group" class="col-lg-4" style="color:black;">
								<input type="checkbox" id="compartir" value="true">&nbsp;Compartir en el Club<br>
							</div><br>
						</div>
						<hr>
						<button class="btn btn-primary" onclick="publicarCover();">Guardar</button>
					</div>
				</div>
				<br>
				<div id="listasCover">
					<script type="text/javascript">
						mostrarCovers("#listasCover");
					</script>
				</div>
			</div>
			
			


function notLogged(){
	if(localStorage.getItem("id_M")==""){
		return true;
	}
	return false;
}
function logOut(){
	localStorage.setItem("nombre","");
	localStorage.setItem("apellido","");
	localStorage.setItem("id_M","");
	localStorage.setItem("edad","");
	localStorage.setItem("apodo","");
	localStorage.setItem("correo","");
	localStorage.setItem("gustos","");
	localStorage.setItem("ctaFB","");
	localStorage.setItem("ctaTW","");
	localStorage.setItem("ctaYT","");
	localStorage.setItem("ctaIG","");
	localStorage.setItem("ctaTM","");
	location.href='indexNuevo.php';
}

function tiene_mayus(valor){
	var may="ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	var cont=0;
	for(i=0;i<valor.length;i++){
		if(may.indexOf(valor.charAt(i),0)!=-1){
			cont++;
		}
	}
	return cont;	
}

function tiene_num(valor){
	var num="0123456789";
	var cont=0;
	for(i=0;i<valor.length;i++){
		if(num.indexOf(valor.charAt(i),0)!=-1){
			cont++;
		}
	}
	return cont;	
}

function tiene_signos(valor){
	var sig="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
	var cont=0;
	for(i=0;i<valor.length;i++){
		if(sig.indexOf(valor.charAt(i),0)==-1){
			cont++;
		}
	}
	return cont;	
}

function soloNumeros(valor){
	var num="0123456789";
	var cont=0;
	for(i=0;i<valor.length;i++){
		if(num.indexOf(valor.charAt(i),0)==-1){
			cont++;
		}
	}
	return cont;
}

function validarPass(valor){ 
	var tam=valor.length;
	if((tam>=6)&&(tam<=12)){
		if(tiene_mayus(valor)>=1){
			if(tiene_num(valor)>=3){
				if(tiene_signos(valor)<=0){
					return 1;
				}else{
					alert("La Contraseña tiene signos.");
				}
			}else{
				alert("La contraseña no tiene al menos 3 números.");
			}
		}else{
			alert("La Contraseña no tiene Mayúsculas.");
		}
	}else{
		alert("La Contraseña debe tener entre 6 a 12 carácteres.");	
	}
	return 0;
}

function getNomActual(){
	return localStorage.getItem("nombre");
}
function getApeActual(){
	return localStorage.getItem("apellido");
}
function getApoActual(){
	return localStorage.getItem("apodo");
}
function getCorrActual(){
	return localStorage.getItem("correo");
}
function getIDActual(){
	return localStorage.getItem("id_M");
}
function getEdadActual(){
	return localStorage.getItem("edad");
}
function getGustosActual(){
	return localStorage.getItem("gustos");
}
function getFBActual(){
	return localStorage.getItem("ctaFB");
}
function getTWActual(){
	return localStorage.getItem("ctaTW");
}
function getIGActual(){
	return localStorage.getItem("ctaIG");
}
function getYTActual(){
	return localStorage.getItem("ctaYT");
}
function getTMActual(){
	return localStorage.getItem("ctaTM");
}

/*--------------------------------------------------------------------------
FUNCIONES PARA LAS REDES SOCIALES
--------------------------------------------------------------------------*/
function cambiarTwitter(div){
	$(div).append('<img src="img/help/twitter.png" alt="Twitter"/>&nbsp;Twitter:&nbsp;&nbsp;&nbsp;&nbsp;   <input id="TWITTER" type="text" name="twitter" value="'+getTWActual()+'">&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="actTwitter(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="actTwitter(1);" class="btn btn-danger">Eliminar</button><br><br>');			
		
}

function actTwitter(opcion){ 
	var tw=document.getElementById("TWITTER").value;
	var parametros = {
		"idUser": getIDActual(),
		"TWITTER": tw,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarTwitter.php",
		type: "post",	
		success: function(response){	
			if(response==1){
				localStorage.setItem("ctaTW",tw);
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				if(response==-1){
					localStorage.setItem("ctaTW","");
					location.href='/FanMusic/perfilNuevo.php';
				}else{
						alert("Hubo un problema con tu petición");
					}
			}
		}		
	});
}
function cambiarFacebook(div){
	$(div).append('<img src="img/help/facebook.png" alt="Facebook"/>&nbsp;Facebook:&nbsp;&nbsp;<input id="FACEBOOK" type="text" name="facebook" value="'+getFBActual()+'">&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="actFacebook(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="actFacebook(1);" class="btn btn-danger">Eliminar</button><br><br>');			
}

function actFacebook(opcion){
	var f=document.getElementById("FACEBOOK").value;
	var parametros = {
		"idUser": getIDActual(),
		"FACEBOOK" : f,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarFacebook.php",
		type: "post",	
		
		success: function(response){	
			if(response==1){
				localStorage.setItem("ctaFB",f);
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				if(response==-1){
					localStorage.setItem("ctaFB","");
					location.href='/FanMusic/perfilNuevo.php';
				}else{
					alert("Hubo un problema con tu petición");
				}
			}
		}
	});
}

function cambiarYoutube(div){
	$(div).append('<img src="img/help/youtube.png" alt="Youtube"/>&nbsp;Youtube:&nbsp;&nbsp;&nbsp;<input id="YOUTUBE" type="text" name="youtube" value="'+getYTActual()+'">&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="actYoutube(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="actYoutube(1);" class="btn btn-danger">Eliminar</button><br><br>');			
}

function actYoutube(opcion){ 
	var y=document.getElementById("YOUTUBE").value;
	var parametros = {
		"idUser": getIDActual(),
		"YOUTUBE" : y,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarYoutube.php",
		type: "post",	
		
		success: function(response){	
			if(response==1){
				localStorage.setItem("ctaYT",y);
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				if(response==-1){
					localStorage.setItem("ctaYT","");
					location.href='/FanMusic/perfilNuevo.php';
				}else{
					alert("Hubo un problema con tu petición");
				}
			}
		}
	});
}

function cambiarTumblr(div){
	$(div).append('<img src="img/help/tumblr.png" alt="Tumblr"/>&nbsp;&nbsp;&nbsp;Tumblr:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <input id="TUMBLR" type="text" name="tumblr" value="'+getTMActual()+'">&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="actTumblr(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="actTumblr(1);" class="btn btn-danger">Eliminar</button><br><br>');			
}
function actTumblr(opcion){
	var t=document.getElementById("TUMBLR").value;
	var parametros = {
		"idUser": getIDActual(),
		"TUMBLR" : t,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarTumblr.php",
		type: "post",
		
		success: function(response){			
			if(response==1){
				localStorage.setItem("ctaTM",t);
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				if(response==-1){
					localStorage.setItem("ctaTM","");
					location.href='/FanMusic/perfilNuevo.php';
				}else{
					alert("Hubo un problema con tu petición");
				}
			}
		}
	});
}

function cambiarInstagram(div){
	
	$(div).append('<img src="img/help/instagram.png" alt="Instagram"/>&nbsp&nbsp;&nbsp;Instagram:&nbsp;&nbsp;<input id="INSTAGRAM" type="text" name="instagram" value="'+getIGActual()+'">&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="actInstagram(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="actInstagram(1);" class="btn btn-danger">Eliminar</button><br><br>');			
}
function actInstagram(opcion){ 
	var i=document.getElementById("INSTAGRAM").value;
	var parametros = {
		"idUser": getIDActual(),
		"INSTAGRAM" : i ,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarInstagram.php",
		type: "post",	
		
		success: function(response){			
			if(response==1){
				localStorage.setItem("ctaIG",i);
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				if(response==-1){
					localStorage.setItem("ctaIG","");
					location.href='/FanMusic/perfilNuevo.php';
				}else{
					alert("Hubo un problema con tu petición");
				}
			}
		}
	});
}

function actualizarVariables(ap,gu){
	localStorage.setItem("apodo",ap);
}

function revisarApodo(){
	var parametros={
		"apodo" : document.getElementById("APODO").value,
	}
	$.ajax({
		data: parametros,
		url: "php/validarApodo.php",
		type: "post",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			if(response==1){
				veriCambioContra();
			}else{
				alert("Este apodo ya esta siendo usado por otro usuario, favor de ingresar otro.")
			}
		}
	});
	
}

function veriCambioContra(){
	var nueva=document.getElementById("PASSnue").value;
	if(nueva!=""){
		var parametros={
			"idUser": getIDActual(),
			"ant": document.getElementById("PASSant").value,
		}
		$.ajax({
			data: parametros,
			url: "php/veriCambioContra.php",
			type: "post",	//Defino la forma en que llegarán los parámetros al php
			success: function(response){
				if(response=="success"){
					if(validarPass(nueva)==1){
						cargarCambiosPerfil(nueva);
					}
				}else{
					if(response=="error 2"){
						alert("El campo Antigua Contraseña se encuentra Vacio, debe completar este campo");
						location.href='/FanMusic/editar_perfilNuevo.php';
					}else{
						alert("La contraseña antigua que ha ingresado no concuerda con nuestra base de datos");
						location.href='/FanMusic/editar_perfilNuevo.php';
					}
				}
			}
		});
	}else{
		cargarCambiosPerfil("");
	}
}

function cargarCambiosPerfil(pass){ //Para comunicarse con PHP
	var parametros = {
		"idUser": getIDActual(),
		"APODO" : document.getElementById("APODO").value,
		"DESCRIP" : document.getElementById("DESCRIP").value,
		"GUSTOS" : document.getElementById("GUSTOS").value,
		"PASS" : pass,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarPerfil.php",
		type: "post",	//Defino la forma en que llegarán los parámetros al php
		success: function(response){
			if((parametros["APODO"]!="")&&(response=="success")){
				actualizarVariables(parametros["APODO"]);
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				if(response=="success"){
					location.href='/FanMusic/perfilNuevo.php';
				}else{
					alert("Ha ocurrido una error al conectarse con el servidor, favor de intentar más tarde");
					location.href='/FanMusic/editar_perfilNuevo.php';
				}
			}
		}
	});
}

function redesSoc(div){ //Para comunicarse con PHP
	var parametros = {
		"idUser": getIDActual(),
	}
	$.ajax({
		data: parametros,
		url: "php/redesSociales.php",
		type: "post",	//Defino la forma en que llegarán los parámetros al php
		success: function(response){			
			$(div).append(response)
		}
	});
}
function imagenperfil(div){
	var parametros={
		"id":getIDActual()
	}
	$.ajax({
		data:parametros,
		url:"php/ImagenPerfilMiembro.php",
		type:"POST",
		success:	function(response){
			//alert(response);
			$(div).append(response)
		}
	});
}

function subirFotoPerfilMiembro(div){
	$(div).append('<form enctype="multipart/form-data" action="php/foto.php" method="POST"><div class= "form-group"><label class="fg-label"> Foto de Perfil </label><div class="input-group"><div><input type="hidden" id="idUser" name="idUser" value="'+getIDActual()+'"><input name="uploadedfile" id="uploadedfile" type="file" /></div></div></div><button class="btn btn-primary" class="btn bgm-blue"> Subir Foto </button></form>');			
}

function mostrarComentarios(div){
	var parametros={
		"apodo":getApoActual()
	}
	$.ajax({
		data:parametros,
		url:"php/comentarios.php",
		type:"POST",
		success:	function(response){
			$(div).append(response)
		}
	});
}
function mostrarDescripcion(div){
	var parametros={
		"id":getIDActual(),
	}
	$.ajax({
		data:parametros,
		url:"php/descripcion.php",
		type:"POST",
		success:	function(response){
			$(div).append(response);
		}
	});
}
function presentacion(div){
	$(div).append('<div class="panel-heading">'+getApoActual()+'</div>');
} 
function eliminarCuenta(){
    var contra= prompt("Favor ingrese su constraseña para confirmar:");
    var parametros={
   	 "idM":getIDActual(),
   	 "correo" : getCorrActual(),
   	 "contra" : contra
    }
    $.ajax({
   	 data:parametros,
   	 url:"php/eliminarCuenta.php",
   	 type:"POST",
   	 success:    function(response){
   		if(response==1){
   			 alert("Su cuenta ha sido eliminada");
   			 logOut();
   		 }else{
   			 alert("Ocurrió un problema al eliminar su cuenta");
   		 }
   	 }
    });
}
//*----------seccion nueva--------------------- *
function anecdota(div){
	var parametros={
		"apodo":getApoActual(),
		 "id":getIDActual(),
	}
	$.ajax({
		data:parametros,
		url:"php/esFan.php",
		type:"POST",
		success:	function(response){
	
			if(response==1){
				$.ajax({
					data:parametros,
					url:"php/datosComboBox.php",
					type:"POST",
					success:	function(response){
							$(div).append(response);
					}
				});
				
			
			}
		}
	});
}

function publicarAnecdota(){
	var compartir = ($("#nombreC option:selected").text());
	var titulo = document.getElementById("tituloNuevo").value;
	var contenido=  document.getElementById("contenidoNuevo").value;
	var parametros={
		 "id":getIDActual(),
		"titulo" : titulo,
		"contenido" :contenido,
		"compartir": compartir,
	}
	if((titulo!="")&&(contenido!="")){
		$.ajax({
			data:parametros,
			url:"php/publicarAnecdota.php",
			type:"POST",
			success:	function(response){
				if(response==1){
					location.href='/FanMusic/perfilNuevo.php';
				}else{
					alert("No se ha podido eliminar su anécdota");
				}
			}
		});
	}else{
		alert("Debe completar el título y contenido de su anécdota");
	}
}
function mostrarAnecdota(div){
	var parametros={
		 "id":getIDActual(),
		 
	}
	$.ajax({
		data:parametros,
		url:"php/mostrarAnecdotaPerfil.php",
		type:"POST",
		success:	function(response){
			$(div).append(response);
		}
	});
	
}
function eliminarAnecdota(idi){
	var parametros={
		 "id":idi,
	}
	$.ajax({
		data:parametros,
		url:"php/eliminarAnecdota.php",
		type:"POST",
		success:	function(response){
			if(response==1){
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				alert ("No se ha podido eliminar la anécdota");
			}
		}
	});
	
}
/* PARA MOSTRAR LA SECCION DE ANECDOTAS SEPARADA DE LOS COMENTARIOS */
function secciones(div){
	var parametros={
		'id':getIDActual(),
		
	}
	$.ajax({
		data:parametros,
		url: "php/esFan.php",
		type: "post",
		success: function(response){			
			if(response=="1"){ //JOSE EL SEGUNDO BOTON ES TUYO, AHI DEBES PONER EL CODIGO DE LOS COVERS
				$(div).append('<a onclick="cargarPerfil('+"'"+'#opcionesPerfil'+"'"+','+"'"+'seccionAnecdotas.php'+"'"+')" class="btn btn-primary"  role="button" align="right">Anécdotas</a><a onclick="cargarPerfil('+"'"+'#opcionesPerfil'+"'"+','+"'"+'secCoverM.php'+"'"+')" class="btn btn-success"  role="button" align="right">Covers</a>');
			}
		}
	});
}
function listarClubs(div){
	var parametros={
		'id':getIDActual(),
	}
	$.ajax({
		data:parametros,
		url:"php/datosComboBox.php",
		type:"POST",
		success:	function(response){
			$(div).append(response);
		}
	});
	
}

//==========================COVERS======================

function publicarCover(){
	var club = ($("#artista option:selected").val());
	var titulo = document.getElementById("tituloNuevo").value;
	var album=  document.getElementById("albumNuevo").value;
	var idioma= ($("#lang option:selected").text());
	var link=  document.getElementById("link").value;
	var compartir=0;
	if(document.getElementById("compartir").checked){
		compartir=1;
	}
	
	var parametros={
		"id":getIDActual(),
		"nombreClub": club,
		"titulo" : titulo,
		"album" :album,
		"idioma":idioma,
		"video":link,
		"compartir": compartir,
	}
	
	if((titulo!="")&&(album!="")&&(link!="")){
		
		$.ajax({
			data:parametros,
			url:"php/publicarCover.php",
			type:"POST",
			success:	function(response){
				
				if(response==1){
					location.href='/FanMusic/perfilNuevo.php';
				}else{
					if(response==2){
						alert("Error al reconocer la URL del video");
					}
					if(response==3){
						alert("Error al encontrar el Artista");
					}
					if(response==0){
						alert("Este video ya se encuentra dentro de nuestra base de datos");
					}
				}
			}
		});
	}else{
		alert("Existen campos sin completar");
	}
}

function listarArtis(div){
	var parametros={
		'id':getIDActual(),
	}
	$.ajax({
		data:parametros,
		url:"php/datosComboBox2.php",
		type:"POST",
		success:	function(response){
			$(div).append(response);
		}
	});
}
function mostrarCovers(div){
	var parametros={
		'id':getIDActual(),
	}
	$.ajax({
		data:parametros,
		url:"php/mostrarCoverU.php",
		type:"POST",
		success:	function(response){
			$(div).append(response);
		}
	});
}

function eliminarCover(video){
	var parametros={
		"id_video":video
	}
	$.ajax({
		data:parametros,
		url:"php/elimiCover.php",
		type:"POST",
		success:	function(response){
			alert(response);
			if(response==1){
				alert("Tu Cover ha sido eliminado");
				location.href='/FanMusic/perfilNuevo.php';
			}
		}
	});
}
function compartirCover(video){
	var parametros={
		"id_video":video
	}
	$.ajax({
		data:parametros,
		url:"php/compCover.php",
		type:"POST",
		success:	function(response){
			if(response==1){
				alert("Desde ahora tu cover será visible en el Club");
				location.href='/FanMusic/perfilNuevo.php';
			}
		}
	});
}
function dejarCompCover(video){
	var parametros={
		"id_video":video
	}
	$.ajax({
		data:parametros,
		url:"php/noCompCover.php",
		type:"POST",
		success:	function(response){
			if(response==1){
				alert("Desde ahora tu cover ya no será visible en el Club");
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				alert("No se ha podido dejar de compartir");
			}
		}
	});
}

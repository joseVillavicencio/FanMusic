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
	$(div).append('<img src="img/help/twitter.png" alt="Twitter"/>&nbsp;Twitter:&nbsp;&nbsp;&nbsp;&nbsp;   <input id="TWITTER" type="text" name="twitter" value="'+getTWActual()+'"> <button type="button" onclick="actTwitter(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="actTwitter(1);" class="btn btn-danger">Eliminar</button><br><br>');			
		
}

function actTwitter(opcion){ 
	var parametros = {
		"idUser": getIDActual(),
		"TWITTER" : document.getElementById("TWITTER").value,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarTwitter.php",
		type: "post",	
		
		success: function(response){	
			if(response==1){
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				alert("Hubo un problema con tu petición");
			}
		}
	});
}
function cambiarFacebook(div){
	$(div).append('<img src="img/help/facebook.png" alt="Facebook"/>&nbsp;Facebook:&nbsp;<input id="FACEBOOK" type="text" name="facebook" value="'+getFBActual()+'"> <button type="button" onclick="actFacebook(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="actFacebook(1);" class="btn btn-danger">Eliminar</button><br><br>');			
}

function actFacebook(opcion){
	var parametros = {
		"idUser": getIDActual(),
		"FACEBOOK" : document.getElementById("FACEBOOK").value,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarFacebook.php",
		type: "post",	
		
		success: function(response){	
			if(response==1){
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				alert("Hubo un problema con tu petición");
			}
		}
	});
}

function cambiarYoutube(div){
	$(div).append('<img src="img/help/youtube.png" alt="Youtube"/>&nbsp;Youtube:&nbsp;&nbsp;&nbsp;   <input id="Youtube" type="text" name="youtube" value="'+getYTActual()+'"> <button type="button" onclick="actYoutube(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="actYoutube(1);" class="btn btn-danger">Eliminar</button><br><br>');			
}

function actYoutube(opcion){ 
	var parametros = {
		"idUser": getIDActual(),
		"YOUTUBE" : document.getElementById("YOUTUBE").value,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarYoutube.php",
		type: "post",	
		
		success: function(response){	
			if(response==1){
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				alert("Hubo un problema con tu petición");
			}
		}
	});
}

function cambiarTumblr(div){
	$(div).append('<img src="img/help/tumblr.png" alt="Tumblr"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tumblr:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <input id="Tumblr" type="text" name="tumblr" value="'+getTMActual()+'"> <button type="button" onclick="actTumblr(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="actTumblr(1);" class="btn btn-danger">Eliminar</button><br><br>');			
}
function actTumblr(opcion){
	var parametros = {
		"idUser": getIDActual(),
		"TUMBLR" : document.getElementById("TUMBLR").value,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarTumblr.php",
		type: "post",
		
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				alert("Hubo un problema con tu petición");
			}
		}
	});
}

function cambiarInstagram(div){
	$(div).append('<img src="img/help/instagram.png" alt="Instagram"/>&nbsp&nbsp;&nbsp;;Instagram:<input id="Instagram" type="text" name="instagram" value="'+getIGActual()+'"> <button type="button" onclick="actInstagram(0);" class="btn btn-info">Cambiar</button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="actInstagram(1);" class="btn btn-danger">Eliminar</button><br><br>');			
}
function actInstagram(opcion){ 
	var parametros = {
		"idUser": getIDActual(),
		"INSTAGRAM" : document.getElementById("INSTAGRAM").value,
		"flag": opcion,
	}
	$.ajax({
		data: parametros,
		url: "php/cambiarInstagram.php",
		type: "post",	
		
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/perfilNuevo.php';
			}else{
				alert("Hubo un problema con tu petición");
			}
		}
	});
}

function actualizarVariables(ap,gu){
	localStorage.setItem("apodo",ap);
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
				$(div).append('<div class="panel panel-default" style="text-align:center;"><div class="panel panel-heading"><div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span><input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3"></div></div><div class="panel panel-body"><div class="input-group"></div><div class="input-group"><span class="input-group-addon" id="basic-addon3">Contenido</span> <input type="text" class="form-control" id="contenidoNuevo" aria-describedby="basic-addon5"></div></div><div class="panel panel-footer"><button class="btn btn-info" onclick="publicarAnecdota();">Compartir</button></div></div>');
			}
		}
	});
}

function publicarAnecdota(){
	var titulo = document.getElementById("tituloNuevo").value;
	var contenido=  document.getElementById("contenidoNuevo").value;
	var parametros={
		 "id":getIDActual(),
		"titulo" : titulo,
		"contenido" :contenido,
	}
	if((titulo!="")&&(contenido!="")){
		$.ajax({
			data:parametros,
			url:"php/publicarAnecdota.php",
			type:"POST",
			success:	function(response){
				if(response==1){
					location.href='/FanMusic/perfilNuevo.php';
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
			alert(response);
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
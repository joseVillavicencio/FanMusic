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
}
function getIDActual(){
	return localStorage.getItem("id_M");
}
function getNombreG(){
	return document.getElementById("nombreG").value;
}
function getDesc_Edit(){
	return document.getElementById("desc_edit").value; 
}
function getNombre(){
	return document.getElementById("nombre").value;
}
function getDescripcion(){
	return document.getElementById("descripcion").value;
}
function getNombre2(){
	return document.getElementById("nombre2").value;
}
function getN2(){
	return document.getElementById("n2").value;
}
function getNombreMB(){
	return document.getElementById("nombreMB").value;
}
function getNombreGM(){
	return document.getElementById("nombreGM").value;
}
function getNomActual(){ // nombre de la persona
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
function getPassActual(){
	return localStorage.getItem("contraseña");
}
function getIDActual(){
	return localStorage.getItem("id_M");
}
function getNombreActual(){ // nombre del Grupo actual
	return localStorage.getItem("nombreG");
}

function getIdFina(){
	return localStorage.getItem("idFina");
}
function getCont(){
	return localStorage.getItem("cont");
}

function logOut(){
	localStorage.setItem("nombre","");
	localStorage.setItem("apellido","");
	localStorage.setItem("id_M","");
	localStorage.setItem("apodo","");
	localStorage.setItem("correo","");
	localStorage.setItem("tipo","");
	localStorage.setItem("nivel","");
	localStorage.setItem("gustos","");
	localStorage.setItem("idFina","");
}
function setNombreActual(div){
	id=document.getElementById(div).value;
	localStorage.setItem("nombreG",id);
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

function validarTexto(valor,lon,str){
	var tam=valor.length;
	if(tam<lon){
		if(tiene_num(valor)==0){
			if(tiene_signos(valor)==0){
				return 1;
			}else{
				alert(""+str+" debe contener solo Texto, no signos.");
			}
		}else{
			alert(""+str+" debe contener solo Texto, no numeros.");
		}
	}else{
		alert(""+str+" tiene un tamaño maximo de "+lon+" caracteres.");
	}
	return 0;
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

/* -----------------------------------------------------------------------------------------------------------------------------------------------------------------
FUNCIONES VISTA GRUPOS 
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function crearGrupo(div){ 
	var parametros={
		'id':getIDActual(),
		'nombreG':""
	}
	$.ajax({
		data: parametros,
		url: "queUsuario.php",
		type: "POST",	
		success: function(response){			
			alert(response);
			if(response==1){
				$(div).append('<a  onclick ="actualizar('+"'"+'#botonCrear'+"'"+','+"'"+'crearGrupito.php'+"'"+');"   class="btn btn-info" role="button" align="right">Crear un Nuevo Grupo</a>');
			}
		}
	});
}

function tablaGrupos(div){
	var parametros = {
		"id" :  getIDActual(),
	}
	$.ajax({
		data: parametros,
		url: "php/listagrupo.php",
		type: "POST",	
		
		success: function(response){	
			$(div).append(response);	
		}
	});
}
function eliminarG(idG){ 
	var parametros = {
		"idG":idG,
	}
	$.ajax({
		data: parametros,
		url: "php/eliminar.php",
		type: "POST",	
		success: function(response){			
			if(response=="success"){
				alert("El grupo ha sido Eliminado");
				location.href='bienvenidaNuevo.php';
			}else{
				alert("No se ha podido eliminar el Grupo");
			}
		}
	});
}

/* -----------------------------------------------------------------------------------------------------------------------------------------------------------------
FUNCIONES GRUPOS 
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function grupSaludo(div){
	$(div).append("<h1><center>Bienvenido a tus grupos "+getApoActual()+"</center></h1>");
}
function designarModerador(){ 
	var correo=getN2();
	if(correo!=""){
		var parametros = {
			"nombreG": localStorage.getItem("nombreG"),
			"correo" : getN2(),
		}
		$.ajax({
			data: parametros,
			url: "php/designar.php",
			type: "POST",	
			success: function(response){			
				if(response==1){
					alert("Se ha designado correctamente");
					location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
				}else{
					if(response==2){
						alert("El miembro que desea designar no pertenece a la lista de miembros del grupo");
						location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
					}else{
						if(response==3){
							alert("El miembro que desea designar se encuentra bloqueado");
							location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
						}else{
							if(response==4){
								alert("El miembro que desea designar ya tiene un cargo de administrador");
								location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
							}else{
								if(response==5){
									alert("El miembro que desea designar ya tiene un cargo de moderador");
									location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
								}else{
									alert("No se ha podido designar moderador");
									location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
								}
							}
						}
					}
				}
			}
		});
	}else{
		alert("Debe ingresar el correo de algún miembro");
	}
}
function bloquearMiembro(){ 
	var correo=document.getElementById("correoMB").value;
	if((correo!="")){
		var parametros = {
			"correoMB" : document.getElementById("correoMB").value, //Correo miembro bloqueado
			"nombreGM":  localStorage.getItem("nombreG"), //Nombre del grupo
		}
		$.ajax({
			data: parametros,
			url: "php/bloquearMiembroG.php",
			type: "POST",	
				
			success: function(response){
				if(response==1){
					alert("Se ha bloqueado correctamente");
					location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
				}else{
					if(response==2){
						alert("No se puede bloquear al administrador");
						location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
					}else{
						if(response==3){
							alert("El miembro a bloquear no pertenece al grupo");
							location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
						}else{
							if(response==4){
								alert("El miembro a bloquear ya se encuentra bloqueado");
								location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
							}else{
								if(response==5){
									alert("No es posible bloquear moderadores");
									location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
								}else{
									alert("No es posible bloquear a este usuario");
									location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
								}
							}
						}
					}
				} 
			}
		});
	}else{
		alert("Debe ingresar el correo de algún miembro");
	}
}
/* -----------------------------------------------------------------------------------------------------------------------------------------------------------------
FUNCION GENERAL DE GESTION
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function opcionesGestion(div){
/*Debemos mejorar las opciones que se muestran a continuacion,y realizar las verificaciones internas con el id del usuario y si coincide con lo almacenado con el nombre ingresado*/
	
	var parametros={
		'id':getIDActual(),
		'nombreG': localStorage.getItem("nombreG"),
	}
	$.ajax({
		data:parametros,
		url: "queUsuario.php",
		type: "post",
		success: function(response){
			if(response==1){ // es Admin
				$(div).append('<a onclick="cargar('+"'"+'#opciones'+"'"+','+"'"+'designarModer.php'+"'"+')"  class="btn btn-primary" role="button" align="right">Designar Moderador</a><a href='+"'"+'bloquearM.php'+"'"+'  class="btn btn-danger" role="button" align="right">Bloquear Miembro</a><a  href="verFinanzasGrupo.php"   class="btn btn-info" role="button" align="right">Ver Finanzas</a>');
			}else{
				if(response==2){// es moder
					$(div).append('<a href='+"'"+'bloquearM.php'+"'"+'  class="btn btn-danger" role="button" align="right">Bloquear Miembro</a><a href="gestionarPublic.php" class="btn btn-success"  role="button" align="right">Administrar Publicaciones</a><a href='+"'"+'editarperfilGrupoNuevo.php'+"'"+'  class="btn btn-primary" role="button" align="right">Editar Perfil </a><a href='+"'"+'gestionarFinanzasNuevo.php'+"'"+'  class="btn btn-info" role="button" align="right">Ver Finanzas </a>');
				}else{
					$(div).append('<a  href="verFinanzasGrupo.php"   class="btn btn-info" role="button" align="right">Ver Finanzas</a><a onclick="cargar('+"'"+'#opciones'+"'"+','+"'"+'solicitarPublic.php'+"'"+')" class="btn btn-success"  role="button" align="right">Solicitar Publicación</a>');
				}
			}
			
		}
	});
}
/* -----------------------------------------------------------------------------------------------------------------------------------------------------------------
FUNCIONES PARA  PUBLICACIONES
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function solic(){
	var tit=document.getElementById("tit").value;
	var sub=document.getElementById("sub").value;
	var cont=document.getElementById("cont").value;
	if((tit!="")&&(sub!="")&&(cont!="")){
		var parametros={
			'nombreG': localStorage.getItem("nombreG"),
			'tit': document.getElementById("tit").value,
			'sub': document.getElementById("sub").value,
			'cont': document.getElementById("cont").value,
		}
		$.ajax({
			data: parametros,
			url: "php/solicitarPb.php",
			type: "POST",	
			success: function(response){			
				if(response==1) {
					alert("Su publicación ha sido solicitada");
					location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
				}else{
					alert("No se ha podido solicitar su publicación");
					location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
				}
				
			}
		});
	}else{
		alert("Debe completar todos los campos");
	}
}
function listSolicitudes(div){
	var parametros={
		"idUser":getIDActual(),
		"nomG":  localStorage.getItem("nombreG")
	}
	$.ajax({
		data: parametros,
		url:	"php/obtSolicitudes.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
			$(div).append(response);
		}
	});
}
function aceptarP(idPublic){
	if(getIDActual()!=""){
		var parametros={
			"idP":idPublic,
			"nombreG":localStorage.getItem("nombreG"),
		}
		$.ajax({
			data: parametros,
			url:	"php/aceptarPublicacion.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				if(response==1){
					location.href='/FanMusic/gestionarPublic.php';
				}
			}
		});
	}
}
function rechazarP(idPublic){
	if(getIDActual()!=""){
		var parametros={
			"idP":idPublic,
			"nombreG":localStorage.getItem("nombreG"),
		}
		$.ajax({
			data: parametros,
			url:	"php/rechazarPublicacion.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				if(response==1){
					location.href='/FanMusic/gestionarPublic.php';
				}
			}
		});
	}
}
function mostrarP(div){
	if(getIDActual()!=""){
		var parametros={
			"nombreG": localStorage.getItem("nombreG"),
			"idM":getIDActual()
		}
		$.ajax({
			data: parametros,
			url:	"php/publicacionPerfilGrupo.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				$(div).append(response);
			}
		});
	}
}

function eliminarPG(idi){ 
	var parametros={
		'id':idi
	}
	$.ajax({
		data:parametros,
		url: "php/eliminarPublicacionClub.php",
		type: "post",
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/p_gruposNuevo.php?pag='+localStorage.getItem("nombreG")+'';
			}
		}
	});
}

function comentarP(idPublic){
	var content=document.getElementById(idPublic).value;
	if(content!=""){
		if(getIDActual()!=""){
			var parametros={
				"idPubl":idPublic,
				"contenido":content,
				"idUser":getIDActual(),
				"apodo":getApoActual()
			}
			
			$.ajax({
				data: parametros,
				url:	"php/coment.php",
				type:	"POST",
				cache:	false,
				success:	function(response){
							if(response=="success"){
								actualizar("#publicaciones","php/grupListPub.php");
							}else {
								alert("Favor de intentarlo mas tarde, existen problemas de conexión al servidor");
							}
				}
			});
		}
	}else{
		alert("Debe ingresar algún contenido");
	}
}
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------
FUNCIONES PARA  FINANZAS
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function tablaFinanzas(div){
	var parametros = {
		'nombreG': localStorage.getItem("nombreG"),
		'id':getIDActual(),
	}
	$.ajax({
		data: parametros,
		url: "php/obtenerFinanzas.php",
		type: "POST",	
		
		success: function(response){
		
			if(response==0){
				$(div).append("No es posible mostrar las finanzas");
			}else{
				$(div).append(response);
			}
		}
	});
}
function crearF(){
	var flag=0;
	var motivo=document.getElementById("motivo").value;
	var mont=document.getElementById("monto").value;
	var descrip=document.getElementById("descripcion").value;
	if(mont!=""){
		if(soloNumeros(mont)!=0){
			alert("Has ingresado elementos incorrectos en el campo monto");
			flag=1;
		}
	}
	if((flag==0)&&(motivo!="")&&(mont!="")&&(descrip!="")){
		var parametros={
			"idUser":getIDActual(),
			"motivo": motivo,
			"monto": mont,
			"descripcion": descrip,
		}
		$.ajax({
			data: parametros,
			url:	"php/crearFinanzas.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				if(response==1){
					location.href='/FanMusic/gestionarFinanzasNuevo.php';
				}else{
					alert("Hubo un error al crear el documento");
				}
			}
		});
	}else{
		alert("Necesitas llenar correctamente los campos");
	}
}
function eliminarF(idF){
	if(getIDActual()!=""){
		var parametros={
			"idF":idF,
		}
		$.ajax({
			data: parametros,
			url:	"php/eliminarFinanza.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				location.href='/FanMusic/gestionarFinanzasNuevo.php';
			}
		});
	}
}
function actualizarFinanzas(id){
	localStorage.setItem("idFina",id);
}
function subirFotoFinanza(id){ //Para llamar al POP
	actualizarFinanzas(id);
	window.open('/FanMusic/ventanaPopFinanzaG.php',"finanza","width=420,height=340,toolbar=no");
}
function finanzaNueva(div){
	$(div).append('<form enctype="multipart/form-data" action="php/subirFotoFinanzaGrupo.php" method="POST"><div class= "form-group"><div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span><input type="text" class="form-control" id="titulo" aria-describedby="basic-addon3"></div><br><input type="hidden" id="idF" name="idF" value="'+getIdFina()+'" ><div><input name="uploadedfile" id="uploadedfile" type="file"></div><br><button type="submit" class="btn btn-success"> Adjuntar</button>&nbsp;&nbsp;<button type="submit" onclick="window.close();" class="btn btn-danger">Cerrar</button></form></div>');	
}
function imagenFinanza(cont){
	localStorage.setItem("cont",cont);
	$('<div style=""><td><img src="'+getCont()+'" alt="Open picture"  title="Finanzas" /></a></td></div>').dialog({modal:false});
}
//style="width:640px;height:480px;"
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------
FUNCIONES PARA EL PERFIL 
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function opcionCeder(div){
/*Debemos mejorar las opciones que se muestran a continuacion,y realizar las verificaciones internas con el id del usuario y si coincide con lo almacenado con el nombre ingresado*/
	var parametros={
		'id':getIDActual(),
		'nombreG': localStorage.getItem("nombreG"),
	}
	$.ajax({
		data:parametros,
		url: "queUsuario.php",
		type: "post",
		success: function(response){
			if(response==2){
				$(div).append('<button class="btn btn-danger" role="button" align="right" onclick="confirmarCeder('+getIDActual()+','+"'"+localStorage.getItem("nombreG")+"'"+');" >Abandonar Cargo</button>');
			} 
		}
	});
	
}
function confirmarCeder(idi,grupo){ 
	var parametros={
		'id':idi,
		'nombreG': grupo
	}
	$.ajax({
		data:parametros,
		url: "php/ceder.php",
		type: "post",
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/bienvenidaNuevo.php';
			}
		}
	});
}
function presentacion(div){
	$(div).append('<div class="panel-heading">'+localStorage.getItem("nombreG")+'</div>');
} 
function desc_g(div){
	if(getIDActual()!=""){
		var parametros={
			"nombreGrupo": localStorage.getItem("nombreG"),
		}
		$.ajax({
			data: parametros,
			url:	"php/datosPerfil.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				$(div).append(response);
			}
		});
	}
}
function fotoPerfilGrupo(div){
	if(getIDActual()!=""){
		var parametros={
			"nombreG": localStorage.getItem("nombreG"),
		}
		$.ajax({
			data: parametros,
			url:	"php/fotoPerfilGrupo.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				$(div).append(response);
			}
		});
	}
}
function cargarCambiosPerfilGrupo(){
	var des=document.getElementById("descripcion").value;
	var parametros={
		"nombreG": localStorage.getItem("nombreG"),
		"descripcion": des
	}
	if(des!=""){
		$.ajax({
			data: parametros,
			url:	"php/cambiarPerfilGrupo.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				if(response=="error"){
					alert("Ha ocurrido un problema");
				}else{
					location.href='\p_gruposNuevo.php?pag='+localStorage.getItem("nombreG");
				}
			}
		});
	}else{
		alert("Debe completar el campo descripción");
	}
}
function subirFotoPerfilGrupo(div){
	$(div).append('<form enctype="multipart/form-data" action="php/fotoPGrupo.php" method="POST"><div class= "form-group"><div class="input-group"><div><input type="hidden" id="nombre_grupo" name="nombre_grupo" value="'+getNombreActual()+'"><input name="uploadedfile" id="uploadedfile" type="file" /></div></div></div><button type="submit"  class="btn btn-success"> Actualizar Foto </button></form>');			
}
function dejarSeguir(div){ 
	var parametros={
		'id':getIDActual(),
		'nombreG': localStorage.getItem("nombreG")
	}
	$.ajax({
		data:parametros,
		url: "queUsuario.php",
		type: "post",
		success: function(response){			
			if(response==0){ 
				$(div).append('<button class="btn btn-danger" role="button" align="right" onclick="confirmarUnfollow('+getIDActual()+','+"'"+localStorage.getItem("nombreG")+"'"+');" >Dejar de Seguir</button>');
			}
		}
	});
}
function confirmarUnfollow(idi,grupo){ 
	var parametros={
		'id':idi,
		'nombreG': grupo
	}
	$.ajax({
		data:parametros,
		url: "php/dejarSeg.php",
		type: "post",
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/bienvenidaNuevo.php';
			}
		}
	});
}
function actualizar(div,dir){
	$(div).load(dir);
}	
function nuevaPubli(div){ //Esta funcion se muestra distinto a la que tiene Dania en club :(
	var parametros={
		'id': getIDActual(),
		'nombreG': getNombreActual()
	}
	$.ajax({
		data:parametros,
		url: "queUsuario.php",
		type: "post",
		
		success: function(response){ //Sólo si trata de un administrador o moderador mostrará la ventana para una nueva publicación
			if(response==1 || response ==2){
				$(div).append('<div class="panel panel-default" style="text-align:center;"><div class="panel panel-heading"><h1>Publicar Noticia</h1></div><div class="panel panel-body"><div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span><input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3"></div><br><div class="input-group"><span class="input-group-addon" id="basic-addon3">Subtitulo</span> <input type="text" class="form-control" id="subtituloNuevo" aria-describedby="basic-addon3"></div><br><div class="input-group"><span class="input-group-addon" id="basic-addon3">Contenido</span></div><br><div><textarea rows="5" style="width:100%; resize: none;" id="contenidoNuevo"></textarea></div><button class="btn btn-primary" onclick="publicar();">A&#xF1;adir</button></div></div>');
			}
		}
	});
}

function getTituloNuevo(){
	return document.getElementById("tituloNuevo").value;
}

function getSubtituloNuevo(){
	return document.getElementById("subtituloNuevo").value;
}

function getContenidoNuevo(){
	return document.getElementById("contenidoNuevo").value;
}

function publicar(){
	var tit=getTituloNuevo();
	var sub=getSubtituloNuevo();
	var cont=getContenidoNuevo();
	if((tit!="")&&(sub!="")&&(cont!="")){
		var parametros={
			"nombreG":localStorage.getItem("nombreG"),
			"titulo": getTituloNuevo(),
			"subtitulo": getSubtituloNuevo(),
			"contenido": getContenidoNuevo()
		}
		$.ajax({
			data:parametros,
			url: "php/publicarG.php",
			type: "post",
			success: function(response){	
				if(response=="error"){
					alert("Tenemos Problemas con nuestros servidores, favor de intentar más tarde");
				}else{
					if(response==0){
						alert("Su publicación no se ha podido crear, favor intentar más tarde");
					}else{
						localStorage.setItem("nuevaPubli",response);
						window.open('imagPopPublicacion.php',"Upload","width=400,height=320,toolbar=no");//abre el PopUp para agregar imagenes a las publicaciones
						location.href='\p_gruposNuevo.php?pag='+localStorage.getItem("nombreG");// no actualiza
					}
				}
			}
		});
	}else{
		alert("Debe completar los campos ");
	}
}

function publImagNueva(div){
		
	$(div).append('<form enctype="multipart/form-data" action="php/subirFotoPublicacion.php" method="POST"><div class= "form-group"><div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span><input type="text" class="form-control" id="titulo" aria-describedby="basic-addon3"></div><br><input type="hidden" id="idF" name="idF" value="'+localStorage.getItem("nuevaPubli")+'"><div><input name="uploadedfile" id="uploadedfile" type="file"><br></div><button type="submit" class="btn btn-success"> Adjuntar Foto</button>&nbsp;&nbsp;<button type="submit" onclick="window.close();" class="btn btn-danger">Cerrar</button></div></form>');
}
function apoyarGrupo(idi){ 
	var parametros={
		'idP':idi,
		'idM': getIDActual(),
	}
	$.ajax({
		data:parametros,
		url: "php/darApoyo.php",
		type: "post",
		cache:	false,
		success: function(response){			
			if(response==1){
				location.href='\p_gruposNuevo.php?pag='+localStorage.getItem("nombreG");
			}else{
				if(response==0){
					location.href='\p_gruposNuevo.php?pag='+localStorage.getItem("nombreG");
				}
			}
		}
	});
}
function volver(){ 
	location.href='\p_gruposNuevo.php?pag='+localStorage.getItem("nombreG");
}

//=======================================================================================
//paises
//====================================+
function cargar_paises()
{
	$.get("php/cargar-paises.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#pais').append(resultado);			
		}
	});	
}
function dependencia_estado()
{
	var code = $("#pais").val();
	$.get("php/dependencia-estado.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#region").attr("disabled",false);
				document.getElementById("region").options.length=1;
				$('#region').append(resultado);			
			}
		}

	);
}

function dependencia_ciudad()
{
	var code = $("#region").val();
	$.get("php/dependencia-ciudades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#ciudad").attr("disabled",false);
			document.getElementById("ciudad").options.length=1;
			$('#ciudad').append(resultado);			
		}
	});	
	
}
function tablaBloqueadosGrupo(div){ 
	var parametros={
		"nombreG":localStorage.getItem("nombreG"),
	}
	$.ajax({
		data:parametros,
		url: "php/mostrarBloqueadosGrupo.php",
		type: "post",
		cache:	false,
		success: function(response){			
			$(div).append(response); 
		}
	});
}
function desbloquearMG(idi){
	var parametros={
		'idi': idi,
		'nombreG': localStorage.getItem("nombreG")
	}
	$.ajax({
		data:parametros,
		url: "php/desbloqueaMG.php",
		type: "post",
		cache:	false,
		success: function(response){			
			if(response==1){
				alert("El miembro ha sido desbloqueado");
				location.href='/FanMusic/bloquearM.php';
			}else{
				alert("No se ha podido desbloquear el miembro");
				location.href='/FanMusic/bloquearM.php';
			}
		}
	});
}
function solicitudes(div){
	if(getIDActual()!=""){
		var parametros={
			"nomG": localStorage.getItem("nombreG"),
			'idUser':getIDActual(),
		}
		$.ajax({
			data: parametros,
			url:	"php/obtSolicitudes.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				$(div).append(response);
			}
		});
	}
}
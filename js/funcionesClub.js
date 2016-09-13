function getNomActual(){
	return localStorage.getItem("nombre");
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
function getNombreC(){
	return localStorage.getItem("nombreC");
}
function getIdFina(){
	return localStorage.getItem("idFina");
}
function getCont(){
	return localStorage.getItem("cont");
}
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

function validarTexto(valor,lon,str){
	var tam=valor.length;
	if(tam<25){
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
FUNCIONES Bienvenida Club
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function grupSaludo(div){
	$(div).append("<h1><center>Bienvenido a tus grupos "+getApoActual()+"<center></h1>");
}
function clubCrear(){ 
	var pais=document.getElementById("pais").value;
	var region=document.getElementById("region").value;
	var ciudad= document.getElementById("ciudad").value;
	if((validarTexto(pais,20,"Pais")==1)&&(validarTexto(region,20,"Region")==1)&&(validarTexto(ciudad,20,"Ciudad")==1)){
		var parametros={
			'id':getIDActual(),
			'nombre':document.getElementById("nombreC").value,
			'descripcion':document.getElementById("descripcion").value,
			'pais':document.getElementById("pais").value,
			'region':document.getElementById("region").value,
			'ciudad':document.getElementById("ciudad").value,
			'alias':document.getElementById("alias").value,
		}
		$.ajax({
			data: parametros,
			url: "php/crearClub.php",
			type: "POST",	
			success: function(response){
				alert(response);
				location.href='/FanMusic/bienvenidaNuevo.php';
			}
		});
	}
}

function clubSaludo(div){
	$(div).append("<h1><center>Estos son tus Clubs "+getApoActual()+"<center></h1>");
}

function tablaClubs(div){
	var parametros = {
		"id" :  getIDActual()
	}
	$.ajax({
		data: parametros,
		url: "php/listarClub.php",
		type: "POST",	
		
		success: function(response){			
			$(div).append(response);	
		}
	});
}

function crearClub(div,dov){
	var parametros={
	'id':getIDActual(),
	"nombreG":""
	}
	$.ajax({
		data: parametros,
		url: "queUsuario.php",
		type: "POST",	
		success: function(response){
			if(response=="0"){// es decir si no es admin o moderador, porque solo puede ser admi de 1 club 
				$(div).append('<a  onclick ="actualizar('+"'"+dov+"'"+','+"'"+'crearClubNuevo.php'+"'"+')"   class="btn btn-info" role="button" align="right">Crear un Nuevo Club</a>');
			}
		}
	});
}
/*  ------------------------------------------------------------
---------------------AQUI EMPEZE YO A DEJAR LA CAJA -------------------------------------------------------------------- */
function eliminarC(idi){
	var parametros = {
		"id" : idi
	}
	$.ajax({
		data: parametros,
		url: "php/eliminarClub.php",
		type: "POST",
		
		success: function(response){			
			
			if(response==1){
				location.href='/FanMusic/bienvenidaNuevo.php';
			}
		}
	});
}
/* -----------------------------------------------------------------------------------------------------------------------------------------------------------------
FUNCIONES Clubs 
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function fotoPerfilClub(div){
	if(getIDActual()!=""){
		var parametros={
			"nombreC": localStorage.getItem("nombreC"),
		}
		$.ajax({
			data: parametros,
			url:	"php/fotoperfilClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				$(div).append(response);
			}
		});
	}
}
function setNombreActualClub(div){
	id=document.getElementById(div).value;
	localStorage.setItem("nombreC",id);
}
function presentacionClub(div){
	$(div).append('<div class="panel-heading">'+localStorage.getItem("nombreC")+'</div>');
} 
function desc_Club(div){
	if(getIDActual()!=""){
		var parametros={
			"nombreC": localStorage.getItem("nombreC"),
		}
		$.ajax({
			data: parametros,
			url:	"php/datosperfilClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				$(div).append(response);
			}
		});
	}
}

function confirmarCederClub(){ 
	var parametros={
		'id':getIDActual(),
		'nombreC': localStorage.getItem("nombreC"),
		"mailAdmi" : document.getElementById("mailAdmi").value,
		
	}
	$.ajax({
		data:parametros,
		url: "php/cederAdmin.php", 
		type: "post",
		success: function(response){			
			
			if(response==1){
				location.href='/FanMusic/bienvenidaNuevo.php';
			}else{
				alert("No se puede ceder la administración del Club");
			}
		}
	});
}
function dejarSeguirClub(div){ 
	var parametros={
		'id':getIDActual(),
		'nombreC': localStorage.getItem("nombreC")
	}
	$.ajax({
		data:parametros,
		url: "queUsuarioClub.php",
		type: "post",
		success: function(response){			
			if(response=="0"){ 
				$(div).append('<button class="btn btn-danger" role="button" align="right" onclick="confirmarUnfollowClub('+getIDActual()+','+"'"+localStorage.getItem("nombreC")+"'"+');" >Dejar de Seguir</button>');
			}else{
				if(response=="2"){
					$(div).append('<button class="btn btn-danger" role="button" align="right" onclick="confirmarDejarModClub('+getIDActual()+','+"'"+localStorage.getItem("nombreC")+"'"+');" >Ceder Puesto</button>');
				}
			}
		}
	});
}
function confirmarUnfollowClub(idi,club){ 
	var parametros={
		'id':idi,
		'nombreC':club
	}
	$.ajax({
		data:parametros,
		url: "php/dejarSegClub.php",
		type: "post",
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/bienvenidaNuevo.php';
			}else{
				alert("No se puede dejar el Club");
			}
		}
	});
}
function confirmarDejarModClub(idi,club){ 
	var parametros={
		'id':idi,
		'nombreClub':club
	}
	$.ajax({
		data:parametros,
		url: "php/dejarSerModClub.php",
		type: "post",
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/bienvenidaNuevo.php';
			}else{
				alert("No se puede dejar el Club");
			}
		}
	});
}
/* -----------------------------------------------------------------------------
		FUNCION DE GESTION, BOTONES PRINCIPALES
----------------------------------------------------------------------------- /*/

function GestionClub(div){
	var parametros={
		'id':getIDActual(),
		'nombreC': localStorage.getItem("nombreC")
	}
	$.ajax({
		data:parametros,
		url: "queUsuarioClub.php",
		type: "post",
		success: function(response){			
			if(response=="1"){ // es Admin 
				$(div).append('<a onclick="cargarClub('+"'"+'#opcionesClub'+"'"+','+"'"+'asignarModerClubNuevo.php'+"'"+')"  class="btn btn-primary" role="button" align="right">Asignar Moderador</a><a onclick="cargarClub('+"'"+'#opcionesClub'+"'"+','+"'"+'cederAdministracion.php'+"'"+')"  class="btn btn-warning" role="button" align="right">Ceder Administracion</a><a onclick="cargarClub('+"'"+'#opcionesClub'+"'"+','+"'"+'bloquearMiembroClub.php'+"'"+');" class="btn btn-danger"  role="button" align="right">Bloquear Miembros</a><a href='+"'"+'gestionarFinanzasClubNuevo.php'+"'"+'  class="btn btn-info" role="button" align="right">Gestionar Finanzas</a><a onclick="cargarClub('+"'"+'#opcionesClub'+"'"+','+"'"+'gestionarPublicacionesClub.php'+"'"+')" class="btn btn-success"  role="button" align="right">Administrar Publicaciones</a>');
			}else{
				if(response=="2"){// es moder
					$(div).append('<a onclick="cargarClub('+"'"+'#opcionesClub'+"'"+','+"'"+'bloquearMiembroClub.php'+"'"+')" class="btn btn-danger"  role="button" align="right">Bloquear Miembros</a><a onclick="cargarClub('+"'"+'#opcionesClub'+"'"+','+"'"+'gestionarPublicacionesClub.php'+"'"+')" class="btn btn-success"  role="button" align="right">Administrar Publicaciones</a><a onclick ="cargarClub('+"'"+'#opcionesClub'+"'"+','+"'"+'verFinanzasClub.php'+"'"+')"   class="btn btn-info" role="button" align="right">Ver Finanzas</a>');
				}else{
					$(div).append('<a onclick ="cargarClub('+"'"+'#opcionesClub'+"'"+','+"'"+'verFinanzasClub.php'+"'"+')"   class="btn btn-info" role="button" align="right">Ver Finanzas</a><a onclick="cargarClub('+"'"+'#opcionesClub'+"'"+','+"'"+'solicitarPublicacionClub.php'+"'"+')" class="btn btn-warning"  role="button" align="right">Solicitar Publicacion</a>');
				} 
			}

			/*Falta considerar que los covers tambien iran dentro de la seccion anecdotas*/
			$(div).append('<a href='+"'"+'muroAnecdotas.php'+"'"+' class="btn btn-primary"  role="button" align="right">Ver Aportes</a><a href='+"'"+'seccionLetras.php'+"'"+'  class="btn btn-info" role="button" align="right">Ver Letras</a>');
		}
	});
}

function asignarModerador(){ 
	var parametros = {
		'nombreC': localStorage.getItem("nombreC"),
		"mailMod" : document.getElementById("mailMod").value, //Nombre que llego desde el formulario
	}
	$.ajax({
		data: parametros,
		url: "php/asignarModClub.php",
		type: "POST",	
		success: function(response){			
			if(response==1){
				alert("Se asignó correctamente moderador");
				location.href='/FanMusic/perfilClubNuevo.php?pag='+localStorage.getItem("nombreC")+'';
			}else{
				alert("No se pudo asignar moderador");
			}
		}
	});
}
function bloquearMiembroClub(){
	var parametros = {
	"correoMC" : document.getElementById("correoMC").value, 
	"correo": getCorrActual()
	}
	if(correoMC== getCorrActual()){
		alert("No se puede bloquear a si mismo");
	}else{
		bloquearMiembroClub2();
	}
}
function bloquearMiembroClub2(){ 
	var parametros = {
		"correoMC" : document.getElementById("correoMC").value, 
		"nombreC":  localStorage.getItem("nombreC")
	}
	$.ajax({
		data: parametros,
		url: "php/bloquearMiembroC.php",
		type: "POST",
			
		success: function(response){			
			if(response==1){
				alert("Se bloqueo correctamente el miembro");
				location.href='/FanMusic/perfilClubNuevo.php?pag='+localStorage.getItem("nombreC")+'';
			}else{
				alert("No se puede bloquear el miembro");
			}
		}
	});
}
/* --------------------------------------------------------
						FINANZAS
--------------------------------------------------------*/
function tablaFinanzasClub(div){
	var parametros = {
		'nombreC': localStorage.getItem("nombreC"),
		"idM":getIDActual()
	}
	$.ajax({
		data: parametros,
		url: "php/obtenerFinanzasClub.php",
		type: "POST",	
		
		success: function(response){			
			$(div).append(response);	
		}
	});
}
function crearFinanzasClub(){
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
			"motivo": document.getElementById("motivo").value,
			"monto": document.getElementById("monto").value,
			"descripcion": document.getElementById("descripcion").value,
		}
		$.ajax({
			data: parametros,
			url:	"php/crearFinanzasClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				if(response==1){
					location.href='/FanMusic/gestionarFinanzasClubNuevo.php';
				}else{
					alert("No se pudo crear la finanza");
				}
			}
		});
	}else{
		alert("Necesitas llenar correctamente los campos");
	}
}
function eliminarFClub(idF){
	if(getIDActual()!=""){
		var parametros={
			"idF":idF,
		}
		$.ajax({
			data: parametros,
			url:	"php/eliminarFinanzaClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				location.href='/FanMusic/gestionarFinanzasClubNuevo.php';
			}
		});
	}
}
function imagenFinanza(cont){
	localStorage.setItem("cont",cont);
	$('<div><td><img src="'+getCont()+'" alt="Open picture" title="Finanzas" /></a></td></div>').dialog({modal:false});
}

// SOLICITUD DE PUBLICACIONES
function listSolicitudesPublicaciones(div){
	var parametros={
		"idUser":getIDActual(),
		"nombreC":  localStorage.getItem("nombreC")
	}
	$.ajax({
		data: parametros,
		url:	"php/obtSolicitudesClub.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
			$(div).append(response);
		}
	});
}
// EDITAR Perfil
function editarPerfilClub(div){
	var parametros={
		"id":getIDActual(),
		"nombreC":  localStorage.getItem("nombreC")
	}
	$.ajax({
		data: parametros,
		url:	"queUsuarioClub.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
			//alert(response);
			if(response=="1"){
				$(div).append('<a href='+"'"+'editarperfilClubNuevo.php'+"'"+'  class="btn btn-primary" role="button" align="right">Editar Perfil </a>');
			}
		}
	});
}
function subirFotoPerfilClub(div){
	$(div).append('<form enctype="multipart/form-data" action="php/editarFotoPClub.php" method="POST"><div class= "form-group"><div class="input-group"><div><input type="hidden" id="nombre_grupo" name="nombreC" value="'+getNombreC()+'"><input name="uploadedfile" id="uploadedfile" type="file" /></div></div></div><button type="submit"  class="btn btn-primary"> Actualizar Foto </button></form>');			
}

// ---------------------------------------------Finanzas
function actualizarFinanzas(id){
	localStorage.setItem("idFina",id);
}
function subirFotoFinanza(id){
	actualizarFinanzas(id);
	window.open('/FanMusic/ventanaPopFinanza.php',"finanza","width=420,height=340,toolbar=no");
}
function finanzaNueva(div){
		$(div).append('<form enctype="multipart/form-data" action="php/subirFotoFinanzaClub.php" method="POST"><div class= "form-group"><div class="input-group"><label>Agregue un Titulo : </label><input type="text" id="titulo" name="titulo" > <br><br><input type="hidden" id="idF" name="idF" value="'+getIdFina()+'"><div><input name="uploadedfile" id="uploadedfile" type="file" /></div></div></div><button type="submit" class="btn btn-success"> Adjuntar Foto </button></form>');		
}
//--------------------------------------------------------------
function obtenerNombreClub(div){
	$(div).append('<div class="panel-heading">'+localStorage.getItem("nombreC")+'</div>');
}



function cargarCambiosPerfilClub(){
	var flag=0;
	var pais=document.getElementById("pais").value;
	var region=document.getElementById("region").value;
	var ciudad= document.getElementById("ciudad").value;
	if(pais!=""){
		if(validarTexto(pais,20,"Pais")!=1){
			flag=1;
		}
	}
	if(region!=""){
		if(validarTexto(region,20,"Region")!=1){
			flag=1;
		}
	}
	if(ciudad!=""){
		if(validarTexto(ciudad,20,"Ciudad")!=1){
			flag=1;
		}
	}
	if(flag==0){
		var parametros={
			"id_m":getIDActual(),
			"nombreC": localStorage.getItem("nombreC"),
			"descripcion": document.getElementById("descripcion").value,
			"pais": document.getElementById("pais").value,
			"region" : document.getElementById("region").value,
			"ciudad": document.getElementById("ciudad").value
		}
		$.ajax({
			data: parametros,
			url:	"php/editarPClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				location.href='/FanMusic/bienvenidaNuevo.php';
			}
		});
	}
}
/* --------------------------------------------------------
					PUBLICACIONES
--------------------------------------------------------*/
function solicitarPClub(){ 
	var tit=document.getElementById("tit").value;
	var sub=document.getElementById("sub").value;
	var cont=document.getElementById("cont").value;
	if((tit!="")&&(sub!="")&&(cont!="")){
		var parametros={
			'nombreC':localStorage.getItem("nombreC"),
			'tit': document.getElementById("tit").value,
			'sub': document.getElementById("sub").value,
			'cont': document.getElementById("cont").value,
		}
		$.ajax({
			data: parametros,
			url: "php/solicitarPClub.php",
			type: "POST",	
			success: function(response){			
				if(response==1){
					location.href='/FanMusic/perfilClubNuevo.php?pag='+localStorage.getItem("nombreC")+'';
				}else{
					alert("No se pudo solicitar");
				}
			}
		});
	}else{
		alert("Debe completar los campos de la nueva publicación");
		alert("Debe completar los campos de la nueva publicación");
	}
}

function crearBtn(){
	$('#crear').show();
}

function aceptarPC(idPublic){
	if(getIDActual()!=""){
		var parametros={
			"idP":idPublic,
			'nombreC':localStorage.getItem("nombreC"),
		}
		$.ajax({
			data: parametros,
			url:	"php/aceptarPublicacionClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				if(response==1){
					location.href='/FanMusic/perfilClubNuevo.php?pag='+localStorage.getItem("nombreC")+'';
				}else{
					alert("No se pudo aceptar la publicacion");
				}
			}
		});
	}
}
function rechazarPC(idPublic){
	if(getIDActual()!=""){
		var parametros={
			"idP":idPublic,
			'nombreC':localStorage.getItem("nombreC"),
		}
		$.ajax({
			data: parametros,
			url:	"php/rechazarPublicacionClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				if(response==1){
					location.href='/FanMusic/perfilClubNuevo.php?pag='+localStorage.getItem("nombreC")+'';
				}else{
					alert("No se pudo rechazar la publicacion");
				}
			}
		});
	}
}
function mostrarPC(div){
	if(getIDActual()!=""){
		var parametros={
			"nombreC": localStorage.getItem("nombreC"),
			"idM":getIDActual()
		}
		$.ajax({
			data: parametros,
			url:	"php/publicacionperfilClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				$(div).append(response);
			}
		});
	}
}

function solicitudes(div){
	if(getIDActual()!=""){
		var parametros={
			"nombreC": localStorage.getItem("nombreC")
		}
		$.ajax({
			data: parametros,
			url:	"php/obtSolicitudesClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				$(div).append(response);
			}
		});
	}
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
								actualizar("#publicaciones","php/ListPubClub.php");
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

function actualizar(div,dir){
	$(div).load(dir);
}

function publicarClub(div){
	if(getIDActual()!=""){
		var parametros={
			"id":getIDActual(),
			"nombreC": localStorage.getItem("nombreC")
		}
		$.ajax({
			data: parametros,
			url:	"queUsuarioClub.php",
			type:	"POST",
			cache:	false,
			success:	function(response){
				if(response=="1" || response=="2"){
					$(div).append('<div class="panel panel-default" style="text-align:center;"><div class="panel panel-heading"><div class="input-group"><span class="input-group-addon" id="basic-addon3">T&iacute;tulo</span><input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3"></div></div><div class="panel panel-body"><div class="input-group"><span class="input-group-addon" id="basic-addon3">Subtitulo</span> <input type="text" class="form-control" id="subtituloNuevo" aria-describedby="basic-addon3"></div><br><div class="input-group"><span class="input-group-addon" id="basic-addon3">Contenido</span></div><br><div><textarea rows="5" cols="30" id="contenidoNuevo"></textarea></div></div><div><button class="btn btn-primary" onclick="publicarClub2();">A&#xF1;adir</button></div></div>');
				}
			}
		});
	}
}
function publicarClub2(){ 
	var tit=document.getElementById("tituloNuevo").value;
	var sub=document.getElementById("subtituloNuevo").value;
	var cont=document.getElementById("contenidoNuevo").value;
	
	if((tit!="")&&(sub!="")&&(cont!="")){
		var parametros={
			'nombre':localStorage.getItem("nombreC"),
			'tit': tit,
			'sub': sub,
			'cont': cont
		}
		$.ajax({
			data: parametros,
			url: "php/publicarEnClub.php",
			type: "POST",	
			success: function(response){			
				if(response=="error"){
					alert("Tenemos Problemas con nuestros servidores, favor de intentar más tarde");
				}else{
					if(response=="0"){
						alert("Su publicación no se ha podido crear, favor intentar más tarde");
					}else{
						localStorage.setItem("nuevaPubli",response);
						window.open('/FanMusic/imagPopPublicacion.php',"Upload","width=400,height=320,toolbar=no");//abre el PopUp para agregar imagenes a las publicaciones
						location.href='/FanMusic/perfilClubNuevo.php?pag='+localStorage.getItem("nombreC")+'';
					}
				}
			}
		});
	}else{
		alert("Debe completar los campos de la nueva publicación");
	}
}

function eliminarPC(idi){ 
	var parametros={
		'id':idi
	}
	$.ajax({
		data:parametros,
		url: "php/eliminarPublicacionClub.php",
		type: "post",
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/perfilClubNuevo.php?pag='+localStorage.getItem("nombreC")+'';
			}
		}
	});
}
function publImagNueva(div){
	$(div).append('<form enctype="multipart/form-data" action="php/subirFotoPublicacion.php" method="POST"><div class= "form-group"><div class="input-group"><label>Agregue un Titulo : </label><input type="text" id="titulo" name="titulo" > <br><br><input type="hidden" id="idF" name="idF" value="'+localStorage.getItem("nuevaPubli")+'"><div><input name="uploadedfile" id="uploadedfile" type="file" /></div></div></div><button type="submit" class="btn btn-success"> Adjuntar Foto </button></form>');		
}

/*===================================================================
NUEVA FUNCION PARA LA COSA DE LAS ANECDOTAS
===================================================================*/

function muroDelClub(div){ 
	var parametros={
		'idM': getIDActual(),
		'nombreC': localStorage.getItem("nombreC")
	}
	$.ajax({
		data:parametros,
		url: "php/muroAnecdotasClub.php",
		type: "post",
		cache:	false,
		success: function(response){			

			$(div).append(response); 
		}
	});
}
/*===================================================================
NUEVA FUNCION PARA LA COSA DE LAS LETRAS
============================================*/
function verLetras(div){ 
	var parametros={
		'nombreC': localStorage.getItem("nombreC"),
		'idM': getIDActual()
	}
	$.ajax({
		data:parametros,
		url: "php/obtenerLetras.php",
		type: "post",
		cache:	false,
		success: function(response){			
			$(div).append(response); 
		}
	});
}
function verContenidoLetras(div){ 
	var parametros={
		'nombreC': localStorage.getItem("nombreC")
	}
	$.ajax({
		data:parametros,
		url: "php/obtenerContenidoLetras.php",
		type: "post",
		cache:	false,
		success: function(response){			
			//alert(response);
			$(div).append(response); 
		}
	});
}
function publicarLetra(div){ 
	var tit=document.getElementById("tituloNuevo").value;
	var idioma=document.getElementById("idioma").value;
	var cont=document.getElementById("contenidoNuevo").value;
	if((tit!="")&&(idioma!="")&&(cont!="")){
		var parametros={
			'nombreC': localStorage.getItem("nombreC"),
			'tit': tit,
			'idioma': idioma,
			'cont': cont,
		}
		$.ajax({
			data:parametros,
			url: "php/publicarLetra.php",
			type: "post",
			cache:	false,
			success: function(response){			
				if(response=="1"){
						location.href='/FanMusic/seccionLetras.php';
				}else{
					if(response=='2'){
						alert("La letra de la canción ya existe");
						location.href='/FanMusic/seccionLetras.php';
					}else{
						alert("No se ha podido crear la Letra");
						location.href='/FanMusic/seccionLetras.php';
					}
				}
			}
		});
	}else{
		alert("Debe ingresar los campos necesarios para añadir una Letra");
	}

}
function guardarCambioLetra(cont,idi){
	$("#text"+cont).prop('disabled',false);
	var nom="text"+cont;
	var aer=document.getElementById(nom).value;
	if((aer!="")){
		var parametros={
			'text': aer,
			'id':idi
		}
		$.ajax({
			data:parametros,
			url: "php/editarLetras.php",
			type: "post",
			cache:	false,
			success: function(response){			
				if(response==1){
					alert("La letra ha sido editada");
					location.href='/FanMusic/seccionLetras.php';
				}else{
					alert("No se pudo editar la letra");
					location.href='/FanMusic/seccionLetras.php';
				}
			}
		});
	}else{
		alert("Ingrese algun cambio");
	}	
}
function eliminarLetra(idi){ 
	var parametros={
		'id':idi
	}
	$.ajax({
		data:parametros,
		url: "php/eliminarLetra.php",
		type: "post",
		cache:	false,
		success: function(response){			
			if(response==1){
				alert("Se ha eliminado la letra de su canción");
				location.href='/FanMusic/seccionLetras.php';
			}else{
				alert("No se ha podido eliminar la letra");
				location.href='/FanMusic/seccionLetras.php';
			}
		}
	});
}
function restaurarOriginalLetra(idi){ 
	var parametros={
		'id':idi
	}
	$.ajax({
		data:parametros,
		url: "php/restaurarLetra.php",
		type: "post",
		cache:	false,
		success: function(response){			
			if(response==1){
				alert("Se ha restaurado la letra original de su canción");
				location.href='/FanMusic/seccionLetras.php';
			}else{
				alert("No se ha podido restaurar la letra");
				location.href='/FanMusic/seccionLetras.php';
			}
		}
	});
}
function mostrarCovers(div){
	var parametros={
		'nombreC': localStorage.getItem("nombreC")
	}
	$.ajax({
		data:parametros,
		url:"php/mostrarCoverC.php",
		type:"POST",
		success:	function(response){
			$(div).append(response);
		}
	});
}
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
			if(response==1){
				$(div).append('<a  onclick ="actualizar('+"'"+'#ponerBoton'+"'"+','+"'"+'crearGrupito.php'+"'"+');"   class="btn btn-info" role="button" align="right">Crear un Nuevo Grupo</a>');
			}
		}
	});
}
function crearGrupo2(){ 
	var pais=document.getElementById("pa").value;
	var region=document.getElementById("reg").value;
	var ciudad= document.getElementById("ci").value;
	if((validarTexto(pais,20,"Pais")==1)&&(validarTexto(region,20,"Region")==1)&&(validarTexto(ciudad,20,"Ciudad")==1)){
		var parametros={
			'nombre':getNombre(),
			'al': document.getElementById("al").value,
			'pa': document.getElementById("pa").value,
			'reg': document.getElementById("reg").value,
			'ci': document.getElementById("ci").value,
			'id':getIDActual(), 
			'descripcion':getDescripcion(),
		}
		$.ajax({
			data: parametros,
			url: "php/crear.php",
			type: "POST",	
			success: function(response){			
				if(response=="success"){
					location.href='bienvenidaNuevo.php';
				}else{
					if(response=="error 1"){
						alert("El grupo ya existe");
						location.href='bienvenidaNuevo.php';
					}else{
						alert("No se ha podido crear el grupo");
					}
				}
			}
		});
	}
}
function buscar(div){
	var parametros ={
		"palabraBusqueda" : localStorage.getItem("aBuscar")
	}
	$.ajax({
		data: parametros,
		url: "php/buscar.php",
		type: "post",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			//alert(response);	//Response rescata EL PRIMER ECHO que encuentre en el php
			$(div).append(response);
			localStorage.setItem("aBuscar","");
		}
	});
}
function buscare(div){
	localStorage.setItem("aBuscar",document.getElementById("buscando").value);
	$(div).load('/FanMusic/php/resultBusqe.php');
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
function carrusel2(div){
	$.ajax({
		url:'php/imagCarrou.php',
		type:'post',
		success:function(response){
			$(div).append(response);
		}
	});
}
function carrusel1(div){
	$.ajax({
		url:'php/contCarrou.php',
		type:'post',
		success:function(response){
			$(div).append(response);
		}
	});
}
function listPublClu(div){
	var parametros={"idUser":getIDActual()}
	$.ajax({
		data: parametros,
		url:	"php/obtPublClu.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
					$(div).append(response);
		}
	});
}
function listPublGru(div){
	var parametros={"idUser":getIDActual()}
	$.ajax({
		data: parametros,
		url:	"php/obtPublGru.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
					$(div).append(response);
		}
	});
}
function actualizar(div,dir){
	$(div).load(dir);
}
function asistenciaEvento(div){
	var parametros = {
		'idM' :  getIDActual()//Nombre que llego desde el formulario	
	}
	$.ajax({
		data: parametros,
		url: "php/asistenciaEvento.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){
			if(response==0){
				
			}else{
				$(div).append(response);	
			}
		}
	});
}
function informarAsistencia(id, nombreEvento,name){
	var seleccion=obtenerOpcionFechas(name);

	var parametros = {
		"id" :  id,//Nombre que llego desde el formulario	
		"nombreEvento" : nombreEvento,
		"fechaEscogida": seleccion,
	}
	$.ajax({
		data: parametros,
		url: "php/informarAsistenciaEvento.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){	
			
			if(response==1){
				location.href='bienvenidaNuevo.php';
			}else{
				alert("No se ha podidido guardar su respuesta");
			}
		}
	});
}
function botonesEvento(div){
	var parametros = {
		"id" :  getIDActual(),//Nombre que llego desde el formulario	
		"nombreG" :  ""
	}
	$.ajax({
		data: parametros,
		url: "queUsuario.php", 
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			if(response==2 || response==1){ // va a mostrar para el moderador del grupo o el admi
				$(div).append('<div id="panelE" class="panel panel-default" style="margin-right:5%;margin-left:5%;"><div class="panel-heading" >Eventos </div><div class="panel-body" ><a href='+"'"+'listaEventosNueva.php'+"'"+'  class="btn btn-primary" role="button" align="right">Gestionar Eventos </a><br><br><a href='+"'"+'miseventosEXITONUEVO.php'+"'"+'  class="btn btn-info" role="button" align="right">Ver resultados</a></div></div></div>');
			}	
		}
	});
}
function tablaEventos(div){
	var parametros = {
		"id" :  getIDActual()//Nombre que llego desde el formulario	
	}
	$.ajax({
		data: parametros,
		url: "php/listaevent.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			$(div).append(response);	
		}
	});
}
function crearEventos(div){
	var parametros = {
		"id" :  getIDActual(),//Nombre que llego desde el formulario
		"nombreG" :  ""
	}
	$.ajax({
		data: parametros,
		url: "queUsuario.php", //Falta Hacer ijij
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){	
			if(response==1 || response ==2){
				$(div).append('<a  onclick ="actualizar('+"'"+'#evento2'+"'"+','+"'"+'crearEvento.php'+"'"+')"   class="btn btn-primary" role="button" align="right">Crear Eventos</a>');
			}
		}
	});
}
function editarEventos(div){ //POR EL MOMENTO, AL PARECER NADIE ESTÁ LLAMANDO A ESTA FUNCIÓN
	$(div).append('<div id="hacerEdicion"> <a href="https://calendar.google.com/calendar/render?pli=1" class="btn btn-info btn-md" role="button" align="right">Agregar Evento al Calendario</a></div><br>');
}
function mostrarLideresCorreo(div){
	
	var parametros = {
		
	}
	$.ajax({
		data: parametros,
		url: "php/mostrarLideresCorreo.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
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
				$(div).append('<a  onclick ="actualizar('+"'"+dov+"'"+','+"'"+'crearClubNuevo.php'+"'"+')"   class="btn btn-primary" role="button" align="right">Crear un Nuevo Club</a>');
			}
		}
	});
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
function obtenerOpcionFechas(name){
	var elementos = document.getElementsByName(name);
	for(var i=0; i< elementos.length; i++){
		if(elementos[i].checked){
			return elementos[i].value;
		}
	}
	
}

<<<<<<< HEAD
/*==========================================================================
NUEVA FUNCION PARA CALENDARIO
============================================================================*/

function calendario(div){
	
	$(div).eCalendar({});
	
	var parametros ={
		"idMiembro" : getIDActual(),
	}
	$.ajax({
		data: parametros,
		url: "php/mostrarEventos.php",
		type: "post",
		dataType:"JSON",
		
		
		success: function(response){		//Recibo de vuelta el nombre, descripcion y hora del evento, ademas del club o grupo donde se hace ese evento. :)
			alert(response);
			if(response.status="success"){
				var respuesta=response.message.toString();
				var casilla=(respuesta).split("@");
				for(var i=0;i<casilla.length;i++){
					var datos=casilla[i].split("/"); 
					var nombreE=datos[0],descripE=datos[1],fechaE=datos[2],perteneceE=datos[3];
					alert("nombre:"+nombreE+" descripción:"+descripE+" fecha:"+fechaE+" pertenece:"+perteneceE );
					//var fechita=datos[2].split("-");
					//var anio =fechita[0], mes = fechita[1], dia = fechita[2], hora = fechita[3];
					//$(div).eCalendar({
						//events: [
						//	{title: perteneceE+" - "+nombreE, description: descripE, datetime: new Date(anio, mes, dia, hora)}
						//]
				}
			}
			/*if(response){
				var datos=response.value.split("/"); 
				nombreE : datos[0], descripE : datos[1], fechaE : datos[2], perteneceE : datos[3],
				/*var fechita=fechaE.value.split("-");
				anio : fechita[0], mes : fechita[1], dia : fechita[2], hora : fechita[3],
				$(div).eCalendar({
					events: [
						{title: perteneceE" - "nombreE, description: descripE, datetime: new Date(anio, mes, dia, hora)}
					]
				});
			}*/
		}
	});	
}
=======
/*---------------- ESTO ES PARA EL GRAFICO --------------*/

>>>>>>> dania

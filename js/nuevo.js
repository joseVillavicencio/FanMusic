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
	};
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
	};
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
	var pais=($("#pais option:selected").text());
	var region=($("#region option:selected").text());
	var ciudad= ($("#ciudad option:selected").text());

	var parametros={
		'nombre':getNombre(),
		'al': document.getElementById("al").value,
		'pa': pais,
		'reg': region,
		'ci': ciudad,
		'id':getIDActual(), 
		'descripcion':getDescripcion(),
	};
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
function buscar(div){
	var parametros ={
		"palabraBusqueda" : localStorage.getItem("aBuscar")
	};
	$.ajax({
		data: parametros,
		url: "php/buscar.php",
		type: "post",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){				//Response rescata EL PRIMER ECHO que encuentre en el php
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
	};
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
	var parametros={"idUser":getIDActual()};
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
	var parametros={"idUser":getIDActual()};
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
	};
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
	};
	$.ajax({
		data: parametros,
		url: "php/informarAsistenciaEvento.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){	
			alert(response);
			if(response==1){
				location.href='bienvenidaNuevo.php';
			}else{
				if(response==2){
					alert("Usted ya ha votado");
				}else{
					alert("No se ha podidido guardar su respuesta");
				}
			}
		}
	});
}
function botonesEvento(div){
	var parametros = {
		"id" :  getIDActual(),	
		"nombreG" :  ""
	};
	$.ajax({
		data: parametros,
		url: "queUsuario.php", 
		type: "POST",	
		
		success: function(response){			
			if(response==2 || response==1){ // va a mostrar para el moderador del grupo o el admi
				$(div).append('<a href='+"'"+'listaEventosNueva.php'+"'"+'  class="btn btn-primary" role="button" align="right">Gestionar Eventos </a><br><br><a href='+"'"+'miseventosEXITONUEVO.php'+"'"+'  class="btn btn-info" role="button" align="right">Ver resultados</a>');
			}	
		}
	});
}
function tablaEventos(div){
	var parametros = {
		"id" :  getIDActual()//Nombre que llego desde el formulario	
	};
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
	};
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
	};
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
	};
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
	var pais   =($("#pais option:selected").text());
	var region =($("#region option:selected").text());
	var ciudad =($("#ciudad option:selected").text());
	
	var parametros={
		'id':getIDActual(),
		'nombre':document.getElementById("nombreC").value,
		'descripcion':document.getElementById("descripcion").value,
		'pais':pais,
		'region':region,
		'ciudad':ciudad,
		'alias':document.getElementById("alias").value,
	};
	$.ajax({
		data: parametros,
		url: "php/crearClub.php",
		type: "POST",	
		success: function(response){
			location.href='/FanMusic/bienvenidaNuevo.php';
		}
	});
	
}
function eliminarC(idi){
	var parametros = {
		"id" : idi
	};
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
	};
	$.ajax({
		data: parametros,
		url: "php/eliminar.php",
		type: "POST",	
		success: function(response){			
			if(response=="success"){
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


/*==========================================================================
NUEVA FUNCION PARA CALENDARIO
============================================================================*/

function calendario(div){
	$(div).eCalendar({});
	var events= new Array();
	var parametros ={
		"idMiembro" : getIDActual()
	};
	$.ajax({
		data: parametros,
		url: "php/mostrarEventos.php",
		type: "POST",
		dataType:"JSON",
		cache:	false,
		success: function(response){
			if(response.status=="success"){
				var respuesta=response.message.toString();
				var i=0;
				var casilla=(respuesta).split("@");
				while(i<(casilla.length-1)){
					var datos=casilla[i].split("/"); 
					var nombreE=datos[0],descripE=datos[1],perteneceE=datos[3];
					if(datos[2]!=""){
						var fechita=datos[2].split("-");
						var anio =fechita[0], mes = fechita[1];
						var dihora= fechita[2].split(" ");
						var dias=dihora[0], hora=dihora[1];
						var horario = hora.split(":");
						events.push({title: nombreE, description: descripE, datetime: new Date(anio, mes-1, dias, horario[0])});
						
					}
					i++;
				}
				$(div).eCalendar({events});
			}
		}
	});	
}
/*---------------- ESTO ES PARA EL GRAFICO --------------*/



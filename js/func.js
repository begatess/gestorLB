function mostrarMaterial(){
	$.ajax({
		url: "mostrarMaterial.php",
		method: "POST",
		success: function(data){
			$("#invExistencia").html(data)
		}
	})
}

function actualizarMaterial(id,texto,campo){
	$.ajax({
		url: "editarMaterial.php",
		method: "POST",
		data: {id: id, texto: texto, campo: campo},
		success: function(data){
			mostrarMaterial();
		},
		error: function() {
        	alert('There was some error performing the AJAX call!');
      	}
	})
}

function obtenerPrestamo(idPres){
	$.ajax({
		url: "obtenerPrestamo.php",
		method: "POST",
		data: {idPres: idPres},
		success: function(data){
			var prestamo = JSON.parse(data);
			$("#nombreEstudiante-Prestamo").html(prestamo[0]);
			$("#material-Prestamo").html(prestamo[1]);
			$("#fecha-Prestamo").html(prestamo[2]);
			$("#hora-Prestamo").html(prestamo[3]);
			$("#encargado-Prestamo").html(prestamo[4]);
			$("#comentario-Prestamo").html(prestamo[5]);
		},
		error: function() {
        	alert('There was some error performing the AJAX call!');
      	}
	})
}

function hacerEntrega(idPres,comentario){
	var fechaeEntrega = obtenerFecha();
	$.ajax({
		url: "hacerEntrega.php",
		method: "POST",
		data: {idPres: idPres, comentario: comentario, fechaeEntrega: fechaeEntrega},
		success: function(data){
			limpiarRecepcion();
		},
		error: function() {
        	alert('There was some error performing the AJAX call!');
      	}
	})
}

function obtenerFecha(){
	var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth()+1;
    var yyyy = hoy.getFullYear();
        
    if(dd<10) {
	    dd='0'+dd;
	} 
	if(mm<10) {
    	mm='0'+mm;
	} 

    return yyyy+'-'+mm+'-'+dd;
}

function limpiarRecepcion(){
	document.getElementById('search').value = "";
	document.getElementById('comentarioRecepcion').value = "";
	document.getElementById('nombreEstudiante-Prestamo').innerHTML = "";
	document.getElementById('material-Prestamo').innerHTML = "";
	document.getElementById('fecha-Prestamo').innerHTML = "";
	document.getElementById('hora-Prestamo').innerHTML = "";
	document.getElementById('encargado-Prestamo').innerHTML = "";
	document.getElementById('comentario-Prestamo').innerHTML = "";
}

$(document).on("blur","#matNom",function(){
	var id = $(this).data("id");
	var nombre = $(this).text();
	actualizarMaterial(id,nombre,"nombre");
})

$(document).on("blur","#matComp",function(){
	var id = $(this).data("id");
	var nombre = $(this).text();
	actualizarMaterial(id,nombre,"complementos");
})

$(document).on("blur","#matEst",function(){
	var id = $(this).data("id");
	var nombre = $(this).text();
	actualizarMaterial(id,nombre,"estado");
})

$(document).on("blur","#matCant",function(){
	var id = $(this).data("id");
	var nombre = $(this).text();
	actualizarMaterial(id,nombre,"cantidad");
})

$(document).on("blur","#search",function(){
	var prestamo=document.getElementById('search').value;
	obtenerPrestamo(prestamo);
})

$(document).on("click","#entregar",function(){
	var prestamo=document.getElementById('search').value;
	var comentario=document.getElementById('comentarioRecepcion').value;
	hacerEntrega(prestamo,comentario);
})

$(document).on("click","#cancelarEntrega",function(){
	limpiarRecepcion();
})

$(document).on("click","#addfila",function(){
	document.getElementById("newfila").removeAttribute('style');
})

$(document).on("click","#agregar",function(){
	var nombre = $("#addNom").text();
	var complementos = $("#addComp").text();
	var estado = $("#addEst").text();
	var cantidad = $("#addCant").text();
	
	$.ajax({
		url:"agregarMaterial.php",
		method: "POST",
		data: {nombre: nombre, complementos: complementos, estado: estado, cantidad: cantidad},
		success: function(data) {
        	mostrarMaterial();
      	},
      	error: function() {
        	alert('There was some error performing the AJAX call!');
      	}
	});
})

$(document).on("click","#eliminar",function(){
   	var id = $(this).data("id");

   	$.ajax({
		url:"borrarMaterial.php",
		method: "POST",
		data: {id: id},
		success: function(data) {
        	mostrarMaterial();
      	},
      	error: function() {
        	alert('There was some error performing the AJAX call!');
      	}
	});
})
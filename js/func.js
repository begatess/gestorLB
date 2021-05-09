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

$(document).on("blur","#matNom",function(){
	var id = $(this).data("id");
	var nombre = $(this).text();
	actualizarMaterial(id,nombre,"nombreMH");
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

$(document).on("click","#eliminar",function(){
   	var id = $(this).data("id");

   	$.ajax({
		url:"borrarMaterial.php",
		method: "POST",
		data: {id: id,},
		success: function(data) {
        	mostrarMaterial();
      	},
      	error: function() {
        	alert('There was some error performing the AJAX call!');
      	}
	});
})
function guarda1()
    {
        $.ajax({
            type:'POST', //aqui puede ser igual get
            url: 'Encargados/guardaPrestamo.php',//aqui va tu direccion donde esta tu funcion php
            data: {nombre: nameP, matricula: matriculaP, numero: numeroP, material: material, coment: comentarioPrestamo},//aqui tus datos
            success:function(){
                //lo que devuelve tu archivo mifuncion.php
				alert("si entre");
           },
           error:function(){
			alert('There was some error performing the AJAX call!');
            //lo que devuelve si falla tu archivo mifuncion.php
           }
         });
    }
//Funcion de prueba. Para un encargado los letreros tambien deben cambiar.
function muestra(){
    //alert("buqueda");
    var ya = document.getElementById("tipoUsuario");
    ya.innerHTML = "ADMINISTRADOR";
    var ya = document.getElementById("let-secundario");
    ya.innerHTML = "";
    var ley = document.getElementById("opciones-Admin");
    ley.style.display = "block";
    var lay = document.getElementById("login");
    lay.style.display = "none";
}

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

function irPrestamo(){
  bloqueos();
  var id = document.getElementById("prestamo");
  id.style.display = "block";
  var letreto = document.getElementById("banner-title");
  letreto.innerHTML = "Realizar prestamo de material";
  var letrero = document.getElementById("banner-descrip");
  letrero.innerHTML = "Ingrese cuidadosamente toda la informacion solicitada del estudiante y del material de laboratorio";
}

function irReprestamo(){
  bloqueos();
  var id = document.getElementById("recepcion");
  id.style.display = "block";
  var letreto = document.getElementById("banner-title");
  letreto.innerHTML = "Recepción de prestamos";
  var letrero = document.getElementById("banner-descrip");
  letrero.innerHTML = "Busque el material mediante el numero de identificador de prestamo. Realice la verificación de datos y de material.";
}

function irInventario(){
  bloqueos();
  var letreto = document.getElementById("banner-title");
  letreto.innerHTML = "Inventario";
  var letrero = document.getElementById("banner-descrip");
  letrero.innerHTML = "Realice consultas según sea el caso.";
  var id = document.getElementById("inventario");
  id.style.display = "block";

  irExistencia();
}

function irExistencia(){
  bloquearPaneles();
  var one = document.getElementById("one-panel");
  one.style.display = "block";
}

function irPrestado(){
  bloquearPaneles();
  var two = document.getElementById("two-panel");
  two.style.display = "block";
  //var panel = document.getElementById("invPrestado");
  //alert('<?php echo accion(); ?>');
  //alert(<?php echo acciondos(); ?>);
    /* Escribir en el Documento*/
  //document.write('<?php echo accion(); ?>');
  //document.write(<?php echo acciondos(); ?>);
  //panel.innerHTML = "";
  //panel.innerHTML += '<?php echo mostrarPrestado(); ?>';
  
}

function irEntregados(){
  bloquearPaneles();
  var three = document.getElementById("three-panel");
  three.style.display = "block";
}

function bloqueos(){
  var contenedores = document.getElementsByClassName("contenedores");
  for (var i = 0; i < contenedores.length ; i++){
    contenedores[i].style.display = "none";
  }
}

function bloquearPaneles(){
  var paneles = document.getElementsByClassName("panel");
  for (var i = 0; i < paneles.length ; i++){
    paneles[i].style.display = "none";
  }
}

function aceptar(){
  var confirmacion = document.getElementById("confirmacion");
  confirmacion.style.display = "block";
  var boton = document.getElementById("guardaP");
  boton.innerText = "Imprimir comprobante"
  boton.addEventListener("click",impresion);
}
function cambia(){
  document.getElementById("img-Confirmacion").src = "../../img/garrapata.png";
}
function impresion(){
  document.getElementById("guardaP").type = "submit"
  
}

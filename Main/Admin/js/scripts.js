function OPC1(){
    document.getElementById("uno").style.display= 'block';
    document.getElementById("dos").style.display= 'none';
    limpiarFormulario();
}

function OPC2(){
    document.getElementById("uno").style.display= 'none';
    document.getElementById("dos").style.display= 'block';
    limpiarFormulario();
}

function limpiarFormulario() {
    document.getElementById("miForm").reset();
  }

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
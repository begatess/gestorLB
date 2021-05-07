<?php
    session_start();
    if(isset($_SESSION['userName'])){
        if($_SESSION['userName']['Tipo_usuario'] == "admin"){
            header('Location: Main/Admin/');
        }else if($_SESSION['userName']['Tipo_usuario'] == "encargado"){
          header('Location: Main/Encargados/');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <title>Gestor de inventario </title>
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="css/asdmin.css" />
    
  </head>
  <body> 
    <div class="main">
        <nav id="tmSidebar" class="tm-sidebar">
            <div class="tm-sidebar-sticky">
              <div class="tm-brand-box"> <!--imagenstyle="
                margin-top: 30%; margin-bottom: 0px"-->
                <img src="img/buap-logo.png" alt="Client Image" class="img-fluid tm-client-img" />
                <h2 class="tm-section-title mb-5 text-uppercase">BIENVENIDO</h2>
              </div>
              <p id="tipoUsuario" class="tm-section-text">GESTOR DE INVENTARIO</p>
              <p id="let-secundario" class="tm-section-text">LABORATORIOS DE HARDWARE</p>
              <div class="tm-brand-box"> <!--imagenstyle="
                margin-top: 30%; margin-bottom: 0px"-->
                <img src="img/logo_FCC.png" alt="Client Image" class="img-fluid tm-client-img" />
              </div>
        
              
            </div>
        </nav>         
        <div id="intro" class="tm-section">
            <div class="tm-intro">
                <div id="login">
                <p class="tm-section-text">INGRESE USUARIO Y CONTRASEÑA.</p>
                <form action="" id="formlg">
                    <div class="form-group">
                        <input type="text" id="usuariolg" name="usuariolg" class="form-control entradas" require pattern = "[A-Za-z0-9_-]{1,15}" placeholder="Usuario" required />
                    </div>
                    <div class="form-group">
                        <input type="password" id="passlg" name="passlg" class="form-control entradas" require pattern = "[A-Za-z0-9_-]{1,15}" placeholder="Contraseña" required/>
                    </div>
                    <div class="form-group ">
                        <input type="submit"  class="btn rounded-0 d-block ml-auto botonlg" value="Iniciar Sesión" >
                    </div>
                </form>  
                </div>
      
            </div>              
        </div>
        
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/main2.js"></script>
  </body>
</html>
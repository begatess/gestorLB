<?php
    session_start();

    if(isset($_SESSION['userName'])){
        if($_SESSION['userName']['Tipo_usuario'] != "admin"){
          header('Location: ../Encargados/');
        }
    }else{
      header('Location: ../../');
    }
?>
<?php
  
  $consulta=ConsultarUsuario($_GET['id']);
  function ConsultarUsuario($idUser){
    include("../conexion.php");
    $sentencia="SELECT * FROM encargados WHERE idEncargado='".$idUser."'";
    $resultado= mysqli_query($mysqli,$sentencia); 
    $fila=$resultado->fetch_assoc();

    return [
        $fila['idEncargado'],
        $fila['nombre'],
        $fila['matricula'], 
        $fila['telefono'], 
        $fila['userName'], 
        $fila['userPass'], 
        $fila['Tipo_usuario'] 
    ];
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <title>Gestor de inventario </title>
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="css/asdmin.css" />
    <script src="js/scripts.js"></script>
    
  </head>
  <body> 
        <nav id="tmSidebar" class="tm-sidebar">
            <div class="tm-sidebar-sticky">
              <div class="tm-brand-box"> 
                <img src="../../img/buap-logo.png" alt="Client Image" class="img-fluid tm-client-img" />
                <h2 class="tm-section-title mb-5 text-uppercase">BIENVENIDO</h2>
              </div>
              <p id="tipoUsuario" class="tm-section-text">ADMINISTRADOR</p>
              <div class="tm-brand-box"> 
                <img src="../../img/logo_FCC.png" alt="Client Image" class="img-fluid tm-client-img" />
              </div>
        
              
            </div>
        </nav>         
        <br>
          <div class="tm-intro">
              <div class="area-Admin">
                <div class="barra">
                  <aside class="navbar_aside">
                  <div class="opciones">
                    <div class="documentacion">
                      <p>Opciones</p>
                      <a href="index.php">Regresar</a>
                      <!--Esta opcion guarda todas las tareas que se realicen como usuario de admin quien también puede ser encargado -->
                    </div>
                      <div id="cerrarsesionAdmin"><a href="../salir.php">Cerrar Sesión</a></div>
                  </div>
                  </aside>
                </div>
                    <!--Contenido de las opciones del administrador-->
                    <div class="areaopciones">
                      <div id="agregar-Nuevo"></div>
                      <div id="ver-Usuarios"></div>
                    </div>
              </div>
          </div>         
          
          <section class= "sectionOne" id="tres">
        <form action="editar2.php" method="POST">
        <fieldset>    
        
        <legend>Ingrese la Información</legend>
            <label for="id">ID de usuario:</label>  
            <input type="number" id="id" name="id" readonly value="<?php echo $consulta[0]?>"><br>

            <label for="nombre">Nombre y Apellidos:</label>
            <input maxlength="50" type="text" id="nombre" name="nombre" value="<?php echo $consulta[1]?>"><br>
            
            <label for="matricula">Matrícula:</label>
            <input type="number" id="matricula" name="matricula" value="<?php echo $consulta[2]?>"><br>
            
            <label for="numero">Teléfono:</label>
            <input type="number" id="numero" name="numero" value="<?php echo $consulta[3]?>"><br>
            
            <label for="usuario">Nombre de Usuario:</label>
            <input maxlength="20" type="text" id="usuario" name="usuario" value="<?php echo $consulta[4]?>"><br>
            
            <label for="pass">Contraseña:</label>
            <input maxlength="20" type="text" id="pass" name="pass" value="<?php echo $consulta[5]?>"><br>
            
            <label for="tipoUsuario">Tipo de Usuario:</label>
            <select name='tipoUsuario' >
              <option value='admin'>Administrador</option>
              <option value='encargado'>Encargado</option>
            </select><br><br>

            <input type="submit" value="Guardar Cambios">
        </fieldset>
        </form>

      </section> 
  </body>
</html>

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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <title>Gestor de inventario </title>
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="css/asdmin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/scripts.js"></script>
    
  </head>
  <body onload="OPC1();"> 
        <nav id="tmSidebar" class="tm-sidebar">
            <div class="tm-sidebar-sticky">
              <div class="tm-brand-box"> 
                <img src="../../img/buap-logo.png" alt="Client Image" class="img-fluid tm-client-img" />
                <h2 class="tm-section-title mb-5 text-uppercase">BIENVENIDO</h2>
              </div>
              <p id="tipoUsuario" class="tm-section-text">ADMINISTRADOR: <br><?php echo $_SESSION['userName']["nombre"] ?></p>
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
                      <a href="#" onclick="OPC1()">Agregar nuevo</a>
                      <a href="#" onclick="OPC2()">Ver usuarios</a>
                      <!--Esta opcion guarda todas las tareas que se realicen como usuario de admin quien también puede ser encargado -->
                      <a href="../Encargados/" onclick="">Continuar como encargado</a>
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
          
          <section class= "sectionOne" id="uno">
            <form id="miForm" action="registro.php" method="POST">
              <h1 id="registro">REGISTRAR USUARIOS</h1>
              <fieldset>
                <legend>Ingrese la Información</legend>

                <label for="nombre">Nombre y Apellidos:</label>
                <input maxlength="50" type="text" id="nombre" name="nombre"><br>
                
                <label for="matricula">Matrícula:</label>
                <input type="number" id="matricula" name="matricula"><br>
                
                <label for="numero">Teléfono:</label>
                <input type="number" id="numero" name="numero"><br>
                
                <label for="usuario">Nombre de Usuario:</label>
                <input maxlength="20" type="text" id="usuario" name="usuario"><br>
                
                <label for="pass">Contraseña:</label>
                <input maxlength="20" type="text" id="pass" name="pass"><br>

                <label for="tipoUsuario">Tipo de Usuario:</label>
                <select name='tipoUsuario' >
                  <option value='admin'>Administrador</option>
                  <option value='encargado'>Encargado</option>
                </select><br>
                
                <input type="submit" value="Agregar">
              </fieldset>
            </form>
          </section>
          
        <section class= "sectionDos" id="dos">
          <h1>CONSULTAR REGISTRO</h1>
          <div class="panel" id="one-panel">
            <table>
                <tr>
                  <th bgcolor="#002E4B" width="50">ID</th>
                  <th bgcolor="#002E4B" width="100">Nombre</th>
                  <th bgcolor="#002E4B" width="80">Matrícula</th>
                  <th bgcolor="#002E4B" width="100">Teléfono</th>
                  <th bgcolor="#002E4B"width="80">Usuario</th>
                  <th bgcolor="#002E4B"width="80">Contraseña</th>
                  <th bgcolor="#002E4B"width="100">Tipo de Usuario</th>	
                  <th bgcolor="#002E4B"width="50"></th>
                  <th bgcolor="#002E4B"width="50"></th>
                </tr>

                <?php 
                require '../conexion.php';
                $sql="SELECT * from encargados";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){
                
                    echo "<tr>";
                      echo "<td>" . $mostrar['idEncargado'] . "</td>";
                      echo "<td>" . $mostrar['nombre']  . "</td>";
                      echo "<td>" . $mostrar['matricula']  . "</td>";
                      echo "<td>" . $mostrar['telefono']  . "</td>";
                      echo "<td>" . $mostrar['userName']  . "</td>";
                      echo "<td>" . $mostrar['userPass']  . "</td>";
                      echo "<td>" . $mostrar['Tipo_usuario']  . "</td>";
                      echo "<td><button class='btn'><i class='fa fa-trash'><a href='borrar.php?id=".$mostrar['idEncargado']."'> Eliminar</a></i></button></td>";
                      echo "<td><button class='btn'><i class='fa fa-pencil-square-o'><a href='editar.php?id=".$mostrar['idEncargado']."'> Editar</a></i></button></td>";
                    echo "</tr>";
                 
                }
                  $mysqli->close();
                ?>
              </table>
          </div>
        </section>
  </body>
</html>
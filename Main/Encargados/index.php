<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <title>Gestor de inventario </title>
    <link rel="stylesheet" href="../../css/estiloEncargado.css" />
    <link rel="stylesheet" href="../../css/menucss.css" />
    <link rel="stylesheet" href="../../css/tabs.css" />
    <link rel="stylesheet" href="../../css/tablas.css" />
    
  </head>
  <body> 
    <nav class="main-menu">
        <ul>
            <li id="menuInventario">
                <a href="javascript:irInventario()">
                    <i class="fa fa-home fa-2x"><img class="iconos-menu" src="../../img/lupa.png"></i>
                    <span class="nav-text">Inventario </span>
                </a>
              
            </li>
            <li class="has-subnav">
                <a href="javascript:irPrestamo()">
                    <i class="fa fa-laptop fa-2x"><img class="iconos-menu" src="../../img/parcela.png"></i>
                    <span class="nav-text">Prestamo</span>
                </a>
                
            </li>
            <li class="has-subnav">
                <a href="javascript:irReprestamo()">
                   <i class="fa fa-list fa-2x"><img class="iconos-menu" src="../../img/paquete.png"></i>
                    <span class="nav-text">Recepcion de prestamo</span>
                </a>
            </li>
            <li class="logout">
                <a href="../salir.php">
                      <i class="fa fa-power-off fa-2x"><img class="iconos-menu" src="../../img/logout.png"></i>
                     <span class="nav-text">Cerrar Sesión</span>
                 </a>
             </li> 
    </nav>
</body>
    <div class="main">
        <div class="tm-section">
            <div class="tm-fondo">
                <div id="all-cont">
                    <div class="banner">
                        <div class="cont-text">
                            <p id="banner-title" class="banner-title">Bienvenido, encargado: <br><?php echo $_SESSION['userName']['nombre'] ?>.</p>
                        </div>
                        <div class="cont-text">
                            <p id="banner-descrip" class="banner-txt"> Seleccione una opciones del menu lateral.</p>
                        </div>
                    </div>

                    <div id="prestamo" class="contenedores">
                        <div class="area-prestamo">
                            <div class="formulario">
                                <div class="form-group">
                                    <p class="prestamo-txt banner-txt"> Datos del alumno</p>
                                    <input type="text" id="nameP" name="nameP" class="form-control" placeholder="Nombre del alumno" required="" />
                                    <input type="text" id="matriculaP" name="matriculaP" class="form-control" placeholder="Matricula del alumno" required="" />
                                    <input type="text" id="nameP" name="nameP" class="form-control" placeholder="Numero de contacto" required="" />
                                    <p class="prestamo-txt banner-txt"> Material</p>
                                    <input type="text" id="material" name="material" class="form-control" placeholder="ID de material" required="" />
                                    <textarea id="comentarioPrestamo" class="form-control" name="texto" cols="3" rows="10" placeholder="Observaciones"></textarea>
                                </div>
                            </div>
                            <div class="botons">
                                    <div class="botones">
                                    <button type="submit" class="btn btn-stylo" onclick="guarda()">Guardar</button> 
                                    <button type="submit" class="btn btn-stylo" onclick="">Limpiar</button> 
                                    <button type="submit" class="btn btn-stylo" onclick="">Cancelar</button>
                                    <button type="submit" class="btn btn-stylo" onclick="">Imprimir comprobante</button>
                                </div>
                            </div>
                          </div>
                        
                        
                    </div>

                    <div id="inventario" class="contenedores">
                        <div class="warpper">
                            <input class="radio" id="one" name="group" type="radio" checked onclick="irExistencia()">
                            <input class="radio" id="two" name="group" type="radio" onclick="irPrestado()">
                            <input class="radio" id="three" name="group" type="radio" onclick="irEntregados()">
                            <div class="tabs">
                                <label class="tab" id="existencia" for="one">Existencia</label>
                                <label class="tab" id="prestado" for="two">Prestado</label>
                                <label class="tab" id="entregados" for="three">Entregados</label>
                            </div>
                            <div class="panels">
                                <div class="panel" id="one-panel">
                                    <!-- Aqui van la tabla del material en existencia-->
                                    <table class="table-Inventario">
                                        <thead>
                                            <tr class="table-head">
                                                <th class="col-ID">ID</th>
                                                <th class="col-Nom">Nombre</th>
                                                <th class="col-Comp">Complementos</th>
                                                <th class="col-Est">Estado</th>
                                                <th class="col-Cant">Cantidad</th>
                                                <th class="col-ID"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="invExistencia">

                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="panel" id="two-panel">
                                    <!--Aqui va la tabla de material que se encuentra prestado-->
                                    <table>
                                        <thead>
                                            <tr class="table-head">
                                                <th class="col-ID">ID Material</th>
                                                <th class="col-ID">ID Prestador</th>
                                                <th class="col-Nom">Nombre Alumno</th>
                                                <th class="col-Matri">Matricula</th>
                                                <th class="col-Contac">#Contacto</th>
                                                <th class="col-Comp">Comentarios</th>
                                                <th class="col-HPrestamo">Hora Prestamo</th>
                                                <th class="col-FPrestamo">Fecha Prestamo</th>
                                                <th class="col-HEntrega">Hora Entrega</th>
                                                <th class="col-FEntrega">Fecha Entrega</th>
                                            </tr>
                                        </thead>
                                        <tbody id="invPrestado">

                                        </tbody>
                                    </table>
                                </div>

                                <div class="panel" id="three-panel">
                                    <!--Aqui va la tabla de material que se encuentra prestado-->
                                    <table>
                                        <thead>
                                            <tr class="table-head">
                                                <th class="col-ID">ID Material</th>
                                                <th class="col-ID">ID Encargado</th>
                                                <th class="col-Nom">Nombre Alumno</th>
                                                <th class="col-Matri">Matricula</th>
                                                <th class="col-Comp">Ultimo Comentario</th>
                                                <th class="col-HPrestamo">Hora Prestamo</th>
                                                <th class="col-FPrestamo">Fecha Prestamo</th>
                                                <th class="col-HEntrega">Hora Entrega</th>
                                                <th class="col-FEntrega">Fecha Entrega</th>
                                            </tr>
                                        </thead>
                                        <tbody id="invEntregado">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="recepcion" class="contenedores">
                        <div class="area-recepcion">
                            <div class="busca">
                                
                                <div class="container-1">
                                    <div class="box">
                                        <p class="let-recepcion"> Ingrese número de prestamo: </p>
                                    </div>
                                    <div class="box">
                                        <input class="buscador" type="search" id="search" placeholder="Buscar..." />
                                    </div>
                                   
                                </div>
                            </div>
                       
                            <div class="imprime">
                                <p class="recepcion-txt"> Información del prestamo</p>
                                <table class="tabla-recepcion">
                                    <tbody>
                                      <tr>
                                        <th class="encabezados">Nombre:</th>
                                        <th id="nombreEstudiante-Prestamo" class="imprime-area"></th>
                                      </tr>
                                      <tr>
                                        <td class="encabezados">Material:</td>
                                        <td id="material-Prestamo" class="imprime-area"> </td>
                                      </tr>
                                      <tr>
                                        <td class="encabezados">Fecha de prestamo:</td>
                                        <td id="fecha-Prestamo" class="imprime-area"> </td>
                                      </tr>
                                      <tr>
                                        <td class="encabezados">Hora de prestamo:</td>
                                        <td id="hora-Prestamo" class="imprime-area"> </td>
                                      </tr>
                                      <tr>
                                        <td class="encabezados">Encargado:</td>
                                        <td id="encargado-Prestamo" class="imprime-area"> </td>
                                      </tr>
                                      <tr>
                                        <td class="encabezados">Comentario guardado:</td>
                                        <td id="comentarioPrestamo" class="imprime-area"> </td>
                                      </tr>
                                    </tbody>
                                </table> 
                            </div>
                            <div class="coment" class="contenedores">
                                <p class="recepcion-txt">Estado actual del material</p>
                                <textarea id="comentarioRecepcion" class="" name="texto" cols="3" rows="10" placeholder="Observaciones"></textarea>
                                <button type="submit" class="btn btn-stylo" onclick="">Imprimir comprobante</button> 
                                <button type="submit" class="btn btn-stylo" onclick="">Cancelar</button>
                            </div>
                        </div>
                    </div>

                </div>  
                
            </div>     
        </div>
    </div>
    <script src="../../js/funciones.js"> </script>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/func.js"></script>
    <script>
        $(document).ready(function(){
            $('#menuInventario').click(function(){
                $("#invExistencia").load("mostrarMaterial.php");
            });
        });
        $(document).ready(function(){
            $('#one').click(function(){
                $("#invExistencia").load("mostrarMaterial.php");
            });
        });
        $(document).ready(function(){
            $('#two').click(function(){
                $("#invPrestado").load("mostrarPrestamos.php");
            });
        });
        $(document).ready(function(){
            $('#three').click(function(){
                $("#invEntregado").load("mostrarEntregas.php");
            });
        });
    </script>
  </body>
</html>
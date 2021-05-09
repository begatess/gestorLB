<?php
  require 'conexion.php';
  sleep(2);
  session_start();

  $usuarios = $mysqli->query("SELECT nombre,Tipo_usuario FROM encargados WHERE userName = '".$_POST['usuariolg']."' AND userPass = '".$_POST['passlg']."'");

  if($usuarios->num_rows == 1):
    $datos= $usuarios->fetch_assoc();
    $_SESSION['userName'] = $datos;
      echo json_encode(array('error'=>false,'tipo'=>$datos['Tipo_usuario']));
  else:
      echo json_encode(array('error'=>true));
  endif;
  $mysqli->close();
 ?>
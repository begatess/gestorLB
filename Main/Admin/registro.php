<?php        
    require '../conexion.php';

    $nombre = $_POST['nombre'];
    $matricula = $_POST['matricula'];
    $numero = $_POST['numero'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $tipoUsuario = $_POST['tipoUsuario'];

    $sql = "INSERT INTO usuarios (idEncargado,nombre,matricula,telefono,userName,userPass,Tipo_usuario) VALUES (NULL,'$nombre','$matricula','$numero','$usuario','$pass','$tipoUsuario')";

    $ejecutar=mysqli_query($mysqli,$sql);
    //verificamos la ejecucion
    if(!$ejecutar){
        echo'<script type="text/javascript"> alert("Error Inesperado...");
             window.location.href="index.php"; </script>';
    }else{
        echo'<script type="text/javascript"> alert("Datos Guardados Correctamente");
             window.location.href="index.php"; </script>';
    }


    $mysqli->close();
?>
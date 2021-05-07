<?php

    require '../conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $matricula = $_POST['matricula'];
    $numero = $_POST['numero'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $tipoUsuario = $_POST['tipoUsuario'];

    $sql = "UPDATE encargados SET idEncargado='".$id."', nombre='".$nombre."', matricula='".$matricula."', telefono='".$numero."', userName='".$usuario."', userPass='".$pass."', Tipo_usuario='".$tipoUsuario."' WHERE idEncargado='".$id."' ";

    $ejecutar=mysqli_query($mysqli,$sql);
    //verificamos la ejecucion
    if(!$ejecutar){
        echo'<script type="text/javascript"> alert("Error Inesperado...");
             window.location.href="index.php"; </script>';
    }else{
        /*echo"Datos Guardados Correctamente<br><a href='index.php'>Volver</a>";*/
        echo'<script type="text/javascript"> alert("Datos Actualizados Correctamente");
             window.location.href="index.php"; </script>';
    }


    $mysqli->close();
?>
<?php        
    require '../conexion.php';
    $nombre = $_POST['nameP'];
    $matricula = $_POST['matriculaP'];
    $numero = $_POST['numeroP'];
    $material = $_POST['material'];
    $coment = $_POST['comentarioPrestamo'];
    
    //buscel id en la tabla de existencias 
    $IdEncargado = '1';
    $fecha = date('Y-m-d');
    $hora = date('H:i:s',time());
    $sql = "INSERT INTO mprestado (idPres,idEncargado,idMaterial,alumno,matricula,telefono,coment,fechaPrestamo,horaPrestamo) VALUES (NULL,$IdEncargado,'$material','$nombre','$matricula','$numero','$coment','$fecha','$hora')";

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
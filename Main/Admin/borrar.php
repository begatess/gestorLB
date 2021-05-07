<?php
	include("../conexion.php");

    if(isset($_GET['id'])) {
        $delete_id = $_GET['id'];
        $sql = mysqli_query($mysqli,"DELETE FROM encargados WHERE idEncargado = $delete_id");
        if(!$sql) {
            echo'<script type="text/javascript"> alert("Error Inesperado...");
             window.location.href="index.php"; </script>';
        }else{
            echo'<script type="text/javascript"> alert("Usuario Eliminado Correctamente");
                window.location.href="index.php"; </script>';
        }
    }

    $mysqli->close();
?>
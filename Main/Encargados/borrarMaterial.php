<?php
	$db_host="localhost";
	$db_nombre="gestorinventario";
    $db_usuario="root";
    $db_contra="";

    $conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
    mysqli_set_charset($conexion,"utf8");

    $id=$_POST["id"];

    $consulta = "DELETE FROM materialoherramienta WHERE idMaterialHerramienta = $id";

    $resultados=mysqli_query($conexion,$consulta);
    if($resultados==false){
        echo "Error en consulta";
    }

?>
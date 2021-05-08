<?php
	$db_host="localhost";
	$db_nombre="gestorinventario";
    $db_usuario="root";
    $db_contra="";

    $conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
    mysqli_set_charset($conexion,"utf8");

    $nombre=$_POST["nombre"];
    $complementos=$_POST["complementos"];
    $estado=$_POST["estado"];
    $cantidad=$_POST["cantidad"];

    $consulta = "INSERT INTO materialoherramienta (`idMaterialHerramienta`,`nombre`, `complementos`, `estado`, `cantidad`) VALUES ('','$nombre', '$complementos', '$estado', '$cantidad')";

    $resultados=mysqli_query($conexion,$consulta);
    if($resultados==false){
        echo "Error en consulta";
    }

?>
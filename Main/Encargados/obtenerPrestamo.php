<?php
	$db_host="localhost";
	$db_nombre="gestorinventario";
    $db_usuario="root";
    $db_contra="";

    $conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
    mysqli_set_charset($conexion,"utf8");

    $idPres=$_POST["idPres"];

    $consulta = "SELECT alumno,idMaterial,fechaPrestamo,horaPrestamo,idEncargado,Coment FROM mprestado WHERE idPres = $idPres";

    $resultados=mysqli_query($conexion,$consulta);
    if($resultados==false){
        echo "Error en consulta";
    }else{
        $arreglo=mysqli_fetch_array($resultados);

        $idMat = $arreglo['idMaterial'];
        $consultaMaterial = "SELECT nombre FROM materialoherramienta WHERE idMaterialHerramienta = $idMat";
        
        $resultado = mysqli_query($conexion,$consultaMaterial);
        if($resultado==false){
            echo "Error en consulta";
        }else{
            $material=mysqli_fetch_array($resultado);
        }

        $idEnc = $arreglo['idEncargado'];
        $consultaEncargado = "SELECT nombre FROM encargados WHERE idEncargado = $idEnc";
        
        $result = mysqli_query($conexion,$consultaEncargado);
        if($result==false){
            echo "Error en consulta";
        }else{
            $encargado=mysqli_fetch_array($result);
        }
        
        $arr[0] = $arreglo['alumno']; 
        $arr[1] = $material['nombre'];
        $arr[2] = $arreglo['fechaPrestamo'];
        $arr[3] = $arreglo['horaPrestamo'];
        $arr[4] = $encargado['nombre'];
        $arr[5] = $arreglo['Coment'];

        echo json_encode($arr);
    }
?>
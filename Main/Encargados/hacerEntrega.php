<?php
	$db_host="localhost";
	$db_nombre="gestorinventario";
    $db_usuario="root";
    $db_contra="";

    $conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
    mysqli_set_charset($conexion,"utf8");

    $idPres=$_POST["idPres"];
    $comentario=$_POST["comentario"];
    $fechaeEntrega=$_POST["fechaeEntrega"];
    
    $consulta = "SELECT idEncargado,idMaterial,alumno,matricula,Coment,fechaPrestamo FROM mprestado WHERE idPres = $idPres";

    $resultados=mysqli_query($conexion,$consulta);
    if($resultados==false){
        echo "Error en consulta";
    }else{
        $arreglo=mysqli_fetch_array($resultados);
        $idMat = $arreglo['idMaterial'];
        $idEnc = $arreglo['idEncargado'];
        $alumno = $arreglo['alumno'];
        $matricula = $arreglo['matricula'];
        $ultimoComent = $arreglo['Coment'];
        $fechaPrestamo = $arreglo['fechaPrestamo'];

        $consultaEntrega = "INSERT INTO mentregados (`idEntrega`,`idMaterial`,`idEncargado`,`alumno`,`matricula`,`ultimoComent`,`fechaPrestamo`,`fechaeEntrega`) VALUES ('$idPres','$idMat','$idEnc','$alumno','$matricula','$ultimoComent','$fechaPrestamo','$fechaeEntrega')";
        
        $resultado = mysqli_query($conexion,$consultaEntrega);
        if($resultado==false){
            echo "Error en consulta";
        }else{
            $borrar = "DELETE FROM mprestado WHERE idPres = $idPres";

    		$result=mysqli_query($conexion,$borrar);
    		if($result==false){
        		echo "Error en consulta";
    		}else{
    			$actEstado = "UPDATE materialoherramienta SET estado = '$comentario' WHERE idMaterialHerramienta = $idMat";

    			$res=mysqli_query($conexion,$actEstado);
    			if($res==false){
        			echo "Error en consulta";
    			}else{
    				$actCantidad = "UPDATE materialoherramienta SET cantidad = cantidad+1 WHERE idMaterialHerramienta = $idMat";

    				$ress=mysqli_query($conexion,$actCantidad);
    				if($ress==false){
        				echo "Error en consulta";
    				}
    			}
    		}
        }

    }
?>
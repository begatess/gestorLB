<?php

$db_host="localhost";
$db_nombre="gestorinventario";
$db_usuario="root";
$db_contra="";

$conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
mysqli_set_charset($conexion,"utf8");
$consulta="SELECT * FROM materialoherramienta";
    $resultados=mysqli_query($conexion,$consulta);

    $j=0;

    $fila=mysqli_fetch_row($resultados);
    do{
        echo("<tr>");
        for($i=0;$i<5;$i++){
            if($i==0){
                $id=$fila[$i];
            }
            switch ($i) {
                case 0:
                    echo("<td class='col-ID'>");
                    break;
                case 1:
                    echo("<td class='col-Nom' id='matNom' data-id='$id' contenteditable>");
                    break;
                case 2:
                    echo("<td class='col-Comp' id='matComp' data-id='$id' contenteditable>");
                    break;
                case 3:
                    echo("<td class='col-Est' id='matEst' data-id='$id' contenteditable>");
                    break;
                case 4:
                    echo("<td class='col-Cant' id='matCant' data-id='$id' contenteditable>");
                    break;
            }
            echo $fila[$i];
            echo("</td>");
        }
        echo("<td class='col-Boton'>");
        //echo("<button class='btnborr' id='eliminar' data-id='$id'>");
        //echo("Borrar");
        echo("<img id='eliminar' data-id='$id' src='../../img/trash.png'>");
        //echo("</button>");
        echo("</td>");
        echo("</tr>");

        $j++;
        $fila=mysqli_fetch_row($resultados);
    }while($fila!=NULL);

    echo("<tr id='newfila' style='display:none;'><td class='col-ID'></td>");
    echo("<td class='col-Nom' id='addNom' contenteditable> </td>");
    echo("<td class='col-Comp' id='addComp' contenteditable> </td>");
    echo("<td class='col-Est' id='addEst' contenteditable> </td>");
    echo("<td class='col-Cant' id='addCant' contenteditable> </td>");
    echo("<td class='col-Boton'><img id='agregar' src='../../img/plus.png'></img></td></tr>");     
        
?>
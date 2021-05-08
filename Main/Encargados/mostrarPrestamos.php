<?php
$db_host="localhost";
$db_nombre="gestorinventario";
$db_usuario="root";
$db_contra="";

$conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
mysqli_set_charset($conexion,"utf8");
$consulta="SELECT * FROM mprestado";
    $resultados=mysqli_query($conexion,$consulta);

    $j=0;
    $fila=mysqli_fetch_row($resultados);
    do{
        echo("<tr>");
        for($i=0;$i<9;$i++){
            switch ($i) {
                case 0: 
                    echo("<td class='col-ID'>");
                    break;
                case 1:
                    echo("<td class='col-ID'>");
                    break;
                case 2:
                    echo("<td class='col-ID'>");
                    break;
                case 3:
                    echo("<td class='col-Nom'>");
                    break;
                case 4:
                    echo("<td class='col-Matri'>");
                    break;
                case 5:
                    echo("<td class='col-Contac'>");
                    break;
                case 6:
                    echo("<td class='col-Comp'>");
                    break;
                case 7:
                    echo("<td class='col-FPrestamo'>");
                    break;
                case 8:
                    echo("<td class='col-HPrestamo'>");
                    break;
            }
            echo $fila[$i];
            echo("</td>");
        }
        echo("</tr>");
        
        $j++;
        $fila=mysqli_fetch_row($resultados);
    }while($fila!=NULL);
?>
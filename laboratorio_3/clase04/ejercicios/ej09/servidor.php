<?php

$accion = isset($_POST['accion']) ? $_POST['accion'] : "Error";
$archivo = "";
$respuesta ="";

if($accion != "Error"){
    $archivo = fopen('provincias.txt',"r");
    while(!feof($archivo)){
        $linea = fgets($archivo);        
        $respuesta +=  $index_prov[1]."<br>";
    }

}
echo $respuesta;

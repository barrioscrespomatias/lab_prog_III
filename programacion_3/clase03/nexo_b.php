<?php

//En get va el name!
$accion = $_GET["accion"];

$path = "./archivos/alumnos.txt";
$archivo = fopen($path,"r");

if ($accion == "listado")
{
    do{
        echo fgets($archivo)."<br>";
    }while(!feof($archivo));
    
}
else
    echo "No se pudo obtener el listado<br>"; 

fclose($archivo);





?>
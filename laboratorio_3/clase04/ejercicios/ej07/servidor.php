<?php

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "Error";

if($nombre!="Error")
LeerArchivo('nombres.txt',$nombre);



function LeerArchivo ($path,$nombre):void{
    $archivo = fopen($path, "r");
    $bandera = false;

    while(!feof($archivo)){
        $linea=fgets($archivo);        
        if($linea[0] == $nombre[0]){
            //Serán estas las respuestas del servidor???
            echo $linea."<br>";
            $bandera = true;
        }        
    }
    if(!$bandera)
    echo "No hay sugerencias para mostrar";
    
    fclose($archivo);
}

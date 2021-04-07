<?php

$destino = "archivos/" . $_FILES["archivo"]["name"];

//PATHINFO_DIRNAME -> Retorna el nombre del directorio
//PATHINFO_BASENAME -> Retorna nombre del archivo con la extension
//PATHINFO_EXTENSION -> Retorna extension
//PATHINFO_FILENAME -> Retorna nombre del archivo sin la extension


$tipoArchivo = pathinfo($destino,PATHINFO_BASENAME);


if(move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino))
    echo "Se ha guardado el archivo ". basename($_FILES["archivo"]["name"]);

// if(file_exists($destino))
//     echo $tipoArchivo;







?>
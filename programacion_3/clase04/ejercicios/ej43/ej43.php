<?php

//[name]
//[type]
//[tmp_name]
//[error]
//[size]

//PATHINFO_DIRNAME -> Retorna el nombre del directorio
//PATHINFO_BASENAME -> Retorna nombre del archivo con la extension
//PATHINFO_EXTENSION -> Retorna extension
//PATHINFO_FILENAME -> Retorna nombre del archivo sin la extension

$nombres = isset($_FILES['archivo']['name']) ? $_FILES['archivo']['name'] : "Error";
$tamanios = isset($_FILES['archivo']['size']) ? $_FILES['archivo']['size'] : "Error";
$tmpNames = isset($_FILES['archivo']['tmp_name']) ? $_FILES['archivo']['tmp_name'] : "Error";

$destinos = array();
$tipos = array();
$nombresSinExtension = array();


//Obtengo destinos y tipos
foreach ($nombres as $item) {
    $destino = './Uploads/' . $item;
    array_push($destinos, $destino);
    array_push($tipos, pathinfo($destino, PATHINFO_EXTENSION));
    array_push($nombresSinExtension, pathinfo($item, PATHINFO_FILENAME));
}



//Validar archivos y moverlos al directorio
for ($i = 0; $i < count($tmpNames); $i++) {
    $uploadOk = false;
    switch ($tipos[$i]) {
        case "doc":
        case "docx":
            //60Kb
            if ($tamanios[$i] <= 60000)
                $uploadOk = true;
            break;
            //300Kb
        case "jpg":
        case "jpeg":
        case "gif":
        case "png":
            if ($tamanios[$i] <= 300000)
                $uploadOk = true;
            break;
            //500Kb
        default:
            if ($tamanios[$i] <= 500000)
                $uploadOk = true;
            break;
    }
    if (!$uploadOk)
        echo "<br>Error al subir el archivo ".$nombres[$i]. ". Su tamanio excede lo permitido. Su tamaño es: ".$tamanios[$i]." bytes";
    else{
        move_uploaded_file($tmpNames[$i], $destinos[$i]);
        echo "<br>Upload correcto " . basename($nombresSinExtension[$i]) . ". Extensión " . $tipos[$i] . ". Tamanio " . $tamanios[$i] . "bytes";
    }
    
}

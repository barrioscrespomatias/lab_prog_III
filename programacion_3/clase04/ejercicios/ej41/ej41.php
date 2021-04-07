<?php
session_start();

$nombres = isset($_FILES['fotos']['name'])? $_FILES['fotos']['name']:"Error";
$tmpNames = isset($_FILES['fotos']['tmp_name'])? $_FILES['fotos']['tmp_name']:"Error";
$destinos = array();
$tipos = array();

// CARGO LOS DESTINOS EN ARRAY.
if ($nombres != "Error") {
    foreach ($nombres as $item) {
        $destinoGuardado = './socios/' . $item;
        array_push($destinos, $destinoGuardado);
        array_push($tipos, pathinfo($destinoGuardado, PATHINFO_EXTENSION));
    }   
}



//MUEVO LOS ARCHIVOS A UN DIRECTORIO LOCAL
//Valido que los archivos sean imagenes.

$destinosValidados = array();
for ($i = 0; $i < count($tmpNames); $i++) {
    if (getimagesize($tmpNames[$i]) !== FALSE) {
        if ($tipos[$i] == "png") {
            if (move_uploaded_file($tmpNames[$i], $destinos[$i])) {
                array_push($destinosValidados, $destinos[$i]);
                echo "<br>Se ha movido el archivo " . basename($nombres[$i] . "<br>");
            } else {
                echo "<br>No se pudo obtener el archivo";
            }
        }else
        echo "El archivo ".basename($nombres[$i]). " no está permitido. Solo puede subir extensiones .PNG<br>";
    } else
        echo "<br>El archivo que se itenta subir, no es una imagen.";
}
?>

<td><a href="index.php">Ir a las imágenes</a></td>

<?php

//Enviar las imágenes
$_SESSION['destinos']=$destinosValidados;






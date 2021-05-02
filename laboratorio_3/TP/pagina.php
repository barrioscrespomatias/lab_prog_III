<?php

$nombre = isset($_GET['name']) ? $_GET['name'] : "Error";
$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : "Error";
$edad = isset($_GET['edad']) ? $_GET['edad'] : "Error";
$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : null;


switch ($opcion) {
    case "subirFoto":
        $ok = false;
        $destino = "./fotos/" . date("Ymd_His") . ".jpg";
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $destino))
            $ok = "true" . "-" . $destino;
        //Echo $ok es la respuesta que se le dá al ajax.
        // $ok es lo que se carga en xhttp.responseText
        echo $ok;
        break;
}


if($apellido!="Error" && $apellido!="Error" && $edad != "Error")
echo $apellido." ".$nombre." ".$edad;

?>
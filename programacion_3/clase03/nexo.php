<?php

//Se vincula con el name del formulario
// $accion = isset($_GET["accion"]) ? $_GET["accion"] : "Error";
$accion = isset($_POST["accion"]) ? $_POST["accion"] : $_GET["accion"];

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "Error";
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "Error";
$legajo = isset($_POST["legajo"]) ? $_POST["legajo"] : "Error";

$path = "./archivos/alumnos.txt";
$cadena = $legajo ." - ". $apellido ." - ". $nombre."\n";


switch ($accion) {
    case "alta":
        $archivo = fopen($path, "a");
        fwrite($archivo, $cadena);
        echo "Se ha guardado correctamente el registro de ${nombre}";
        fclose($archivo);
        break;
    case "listado":
        $archivo = fopen($path, "r");
        do {
            echo fgets($archivo) . "<br>";
        } while (!feof($archivo));
       
        fclose($archivo);
        break;
    case "verificar":
        $archivo = fopen($path, "r");

        while (!feof($archivo)) {

            $renglon = fgets($archivo);
            $persona = explode(" - ", $renglon);
            if ($persona[0] == $legajo)
                break;
        }

        foreach ($persona as $item) {
            echo $item . " ";
        }

        fclose($archivo);
        break;
}

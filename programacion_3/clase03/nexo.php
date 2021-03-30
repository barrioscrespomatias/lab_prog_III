<?php

// $accion = $_POST["accion"];
// $nombre = $_POST["nombre"];
// $apellido = $_POST["apellido"];
// $legajo = $_POST["legajo"];

//En get va el name!
$accion = $_GET["accion"];

$path = "./archivos/alumnos.txt";
$archivo = fopen($path,"r");

var_dump($accion);

// if ($accion == "alta")
// {
//     fwrite($archivo, "- ${legajo} - ${apellido} - ${nombre}\r\n");
//     echo "Se ha guardado correctamente el registro de ${nombre}";
// }
// else
//     echo "No se ha podido realizar el alta<br>"; 


if ($accion == "listado")
{
    // fread($archivo, "- ${legajo} - ${apellido} - ${nombre}\r\n");
    // echo "Se ha guardado correctamente el registro de ${nombre}";
    echo "<h2>". fread($archivo, filesize($path)) . "<br>";
}
else
    echo "No se pudo obtener el listado<br>"; 

fclose($archivo);





?>
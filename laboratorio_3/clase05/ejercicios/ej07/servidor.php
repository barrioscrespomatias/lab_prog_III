<?php 

$accion = isset($_POST['accion']) ? $_POST['accion'] : "Error";

if($accion != "Error"){
    $archivo = fopen('../Json/auto.json',"r");
    $auto="";
    while(!feof($archivo)){
        $auto = fgets($archivo);
    }
    echo $auto;
}



?>
<?php 

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "Error";
$numeroRandom = rand(0,6);
sleep($numeroRandom);
if($nombre != "Error"){
    if($numeroRandom>=0 && $numeroRandom<=3)
        echo "Si";
    else
    echo "No";
}



?>
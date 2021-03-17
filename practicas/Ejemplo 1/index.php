<?php
include 'clases/persona.php';

function Saludar($nombre)
{
    echo "Hola $nombre";
}

$p1 = new persona('Pablo','Pérez');
$p1->Mostrar();



?>


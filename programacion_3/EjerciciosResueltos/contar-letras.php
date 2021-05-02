<?php
//Contar cantidad de letras

$i = 0;
$contador = 0;
$flag = true;
$cadena = "Hola matute!";

for($i=0; $i<strlen($cadena); $i++){
    if($cadena[$i] != "." && $cadena[$i] != " " && $cadena[$i] != "!")
    $contador++;
}

echo "La cantidad de caracteres es $contador"."<br>";
echo strlen($cadena);

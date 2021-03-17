<?php

echo "<br> Aplicacion 15 <br>";

for($j=1;$j<5;$j++)
{
    echo "Potencias de ".$j."<br>";
    for($i=1;$i<5;$i++)
    {        
        echo pow($j,$i)."<br>";
    }
}


echo "<br> Aplicacion 16 <br>";
$cadena = 'HOLA';

$invertida = Inverter($cadena);

echo $invertida;


function Inverter($string)
{
    $salida="";
    for($i=strlen($string)-1;$i>=0;$i--)
    {    
        $salida.=$string[$i];
    }
    return $salida;
}


echo "<br> Aplicacion 19 <br>";









?>
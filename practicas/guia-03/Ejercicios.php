<?php
/* #region  Aplicación 15 */

echo "<br> Aplicacion 15 <br>";

for ($j = 1; $j < 5; $j++) {
    echo "Potencias de " . $j . "<br>";
    for ($i = 1; $i < 5; $i++) {
        echo pow($j, $i) . "<br>";
    }
}
/* #endregion */

/* #region  Aplicación 16 */

echo "<br> Aplicacion 16 <br>";
$cadena = 'HOLA';

$invertida = Inverter($cadena);

echo $invertida;


function Inverter($string)
{
    $salida = "";
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $salida .= $string[$i];
    }
    return $salida;
}
/* #endregion */


echo "<br> Aplicacion 21: Auto <br>";



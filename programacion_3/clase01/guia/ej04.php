<?php

$numero=1;
$acumulador=0;
$cantidad=0;

do
{
    $acumulador+=$numero;
    
    // if($acumulador<1000){
        
        echo $acumulador."<br>";    
        $cantidad++;     

    // }

    
    $numero++;

}while($acumulador<1000);

echo "La cantidad de numeros sumados es: ".$cantidad."<br>";





?>
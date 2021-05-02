<?php


// Armar un programa en pseudocódigo que muestre 
// y cuente cuántas veces se repite una palabra en un 
// string de entrada. (Puede usar cualquier lenguaje POO).

$stringEntrada = "palabra se repite 2 veces palabra palabra palabra palabra";
$palabra = "palabra";

$cantidad = contarPalabras($stringEntrada, $palabra);
echo "La cantidad de veces que se repite la palabra es $cantidad";

function contarPalabras($cadena, $palabra): int
{
    $retorno = 0;
    $arrayDePalabras= array();
    $arrayDePalabras = explode(" ", $cadena);
    foreach ($arrayDePalabras as $item) {
        if ($item == $palabra)
            $retorno++;
    }
    return $retorno;
}


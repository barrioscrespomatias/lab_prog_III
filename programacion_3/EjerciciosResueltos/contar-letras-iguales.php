<?php


$cadena = "AABBCCDCDECEFFGGCGGGGGACAABCBBBC";
$cadenaAuxiliar = "";

$cantidad = 0;
$maximo = 0;

$i = 0;

$primeraVez = true;
$cantidad = 0;
$yaFueContada = false;
$letraMaxima = "";


// $esta= laLetraEsta($cadena,$letra);
// $cantidadApariciones = contarApariciones($cadena,$letra,5);
// $cadenaAuxiliar= agregarLetra($cadenaAuxiliar,$otraletra);

for ($i; $i < strlen($cadena); $i++) {
    $yaFueContada = laLetraEsta($cadena, $cadena[$i]);
    if ($yaFueContada == false) {
        agregarLetra($cadenaAuxiliar, $cadena[$i]);
        if ($primeraVez) {
            $primeraVez = false;
            $cantidad = contarApariciones($cadena, $cadena[$i], $i);
            $maximo = $cantidad;
            $letraMaxima = $cadena[$i];
        }
    }
    //Acá falta un else
    // que diga: sino es la primera vez... que haga XCosa.
    // la bandera es para que me tome la primer cantidad como maxima.

    //Acá iria todo el codigo para las letras que no fueron contadas.
    else {
        $cantidad = contarApariciones($cadena, $cadena[$i], $i);
        if ($cantidad > $maximo) {
            $maximo = $cantidad;
            $letraMaxima = $cadena[$i];
        }
    }
}

echo "Maximo: " . $maximo . "<br>";
echo "Letra: " . $letraMaxima . "<br>";


function agregarLetra($cadena, $letra): string
{
    $existe = laLetraEsta($cadena, $letra);
    if ($existe == false) {
        $cadena .= $letra;
    }
    return $cadena;
}

function contarApariciones($cadena, $letra, $indice): int
{
    $retorno = 0;
    $i = 0;
    for ($indice; $indice < strlen($cadena); $indice++) {
        if ($cadena[$indice] == $letra)
            $retorno++;
    }

    return $retorno;
}

function laLetraEsta($palabra, $letra): bool
{
    $i = 0;
    $retorno = false;

    for ($i; $i < strlen($palabra); $i++) {
        if ($palabra[$i] == $letra) {
            $retorno = true;
            break;
        }
    }
    return $retorno;
}

<?php
/* #region PARTE 1: Ejercicios simples */

/* #region Aplicación 1   */
$nombre = 'Kily';
$apellido = 'Gonzalez';

echo "Ejercicio 01" . "<br><br>";
echo $apellido . ", " . $nombre;
/* #endregion */

/* #region Aplicación 02  */

echo "<br><br>" . "Ejercicio 02" . "<br><br>";
$x = -3;
$y = 15;
$resultado = $x + $y;

echo "El resultado de la suma es: " . $resultado;

/* #endregion */

/* #region Aplicación 03  */

echo "<br><br>" . "Ejercicio 03" . "<br><br>";

echo "El valor de x es: " . $x . "<br>";
echo "El valor de y es: " . $y . "<br>";
echo "El valor de la suma es: " . $resultado . "<br>";
/* #endregion */

/* #region  Aplicación 04 */
echo "<br><br>" . "Ejercicio 04" . "<br><br>";

$i = 1;
$acumulador = 0;
$cantidad = 0;

while ($acumulador < 1000) {
    $acumulador += $i;
    if ($acumulador < 1000) {
        echo $acumulador . " " . $i . "<br><br>";
        $cantidad++;
    }
    $i++;
}

echo "Se han sumado " . $cantidad . " números";


/* #endregion */

/* #region  Aplicación 05: Número del medio */
echo "<br><br>" . "Ejercicio 05" . "<br><br>";

$a = 1;
$b = 100;
$c = 1002;
$flag = 0;

$numeros = array($a, $b, $c);

$minimo = min($numeros);
$maximo = max($numeros);

foreach ($numeros as $aux) {
    if ($aux != $minimo && $aux != $maximo) {
        echo "El numero del medio es: " . $aux;
        $flag = 1;
        break;
    }
}
if (!$flag)
    echo "No hay valores para mostrar";
/* #endregion */

/* #region  Aplicación 06: Calculadora */
echo "<br><br>" . "Ejercicio 06" . "<br><br>";

$simbolos = array('+', '-', '*', '/');
$operadorDeEntrada = '*';
$op1 = 10;
$op2 = 5;
$resultado = 0;

foreach ($simbolos as $item) {
    switch ($item) {
        case '+':
            $resultado = $op1 + $op2;
            break;
        case '-':
            $resultado = $op1 - $op2;
            break;
        case '*':
            $resultado = $op1 * $op2;
            break;
        case '/':
            $resultado = $op1 / $op2;
            break;
    }

    echo "El resultado es: " . $resultado . "<br>";
}



/* #endregion */

/* #region  Aplicación 7: Fecha */
echo "<br><br>" . "Ejercicio 07" . "<br><br>";

echo date("l jS \of F Y h:i:s A");

/* #endregion */

/* #region  Aplicación 08: Números en palabras */

echo "<br><br>" . "Ejercicio 08" . "<br><br>";
$numero = 55;

//convierte int a string
function DescomprimirNumeros($numeroIngresado)
{
    $string = (string)$numeroIngresado;
    return $string;
}

$decimales = array(
    'cero',
    'uno',
    'dos',
    'tres',
    'cuatro',
    'cinco',
    'seis',
    'siete',
    'ocho',
    'nueve',
);

$decenas = array(
    'veinte',
    'treinta',
    'cuarenta',
    'cincuenta',
    'sesenta'
);

$decenasCombinadas = array(
    'veinti',
    'treinta y ',
    'cuarenta y ',
    'cincuenta y ',
    'sesenta'

);


//guarda cadena del número ingresado.
$cadena = DescomprimirNumeros($numero);

//Devuelve la cantidad de caracteres.
$cantidad = strlen($cadena);

///Devuelve el primer caracter
// echo $string[0];

//En arrayNumeros se encuentran todos los numeros convertidos a string.
$arrayNumeros = array();

$i = 0;
//Agrega al arrayNumeros los valores que tiene la cadena de string del número
//ingresado.
for ($i; $i < $cantidad; $i++) {
    array_push($arrayNumeros, $cadena[$i]);
}

echo "El numero es: <br>";

if ($cantidad == 1) {
    $numero = $arrayNumeros[0];
    echo $decimales[$numero];
} else {
    $decena = $arrayNumeros[0];
    $unidad = $arrayNumeros[1];

    if ($unidad == 0)
        echo $decenas[$decena - 2];
    else {
        echo $decenasCombinadas[$decena - 2];
        echo $decimales[$unidad];
    }
}




/* #endregion */

/* #endregion */

/* #region PARTE 2: Arrays */

/* #region  Aplicación 09: Carga aleatoria */
echo "<br><br>Ejercicio 09" . "<br><br>";

//Array numeros vacio.
$numeros = array();
$suma = 0;
$promedio = 0;

for ($i = 0; $i < 5; $i++) {
    array_push($numeros, rand(1, 10));
}

var_dump($numeros);

foreach ($numeros as $item) {
    $suma += $item;
}

$promedio = $suma / count($numeros);
echo "Promedio " . $promedio . "<br>";

if ($promedio > 6)
    echo "El promedio es mayor que 6";
else if ($promedio == 6)
    echo "El promedio es 6";
else
    echo "El promedio es menor que 6";
/* #endregion */

/* #region  Aplicacion 11 */

echo "<br><br>Ejercicio 11" . "<br><br>";
$v[1] = 90;
$v[30] = 7;
$v['e'] = 99;
$v['hola'] = 'mundo';

foreach ($v as $item) {
    echo $item . "<br>";
}
/* #endregion */

/* #region  Aplicación 13: Arrays asociativos */
echo "<br><br>Ejercicio 13" . "<br><br>";

$lapicera = array(
    "Color",
    "Marca",
    "Trazo",
    "Precio"

);

$lapicera[0] = "Azul";
$lapicera[1] = "Azul";

foreach($lapicera as $item)
{
    echo $item."<br>";
}






/* #endregion */




/* #endregion */

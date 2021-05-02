<?php
// Muestre en pantalla los números del 1 al 100,
// sustituyendo los múltiplos de 3 por el palabro “Fizz” y, a su vez,
// los múltiplos de 5 por “Buzz”. Para los guarismos que, al tiempo,
// son múltiplos de 3 y 5, utiliza el combinado “FizzBuzz”.



$i = 1;
for ($i; $i < 101; $i++) {
  if ($i % 5 == 0 && $i % 3 == 0)
    echo "FizzBuzz<br>";
  else if ($i % 3 == 0 && $i % 5 != 0)
    echo "Fizz<br>";
  else if ($i % 5 == 0 && $i % 3 != 0)
    echo "Buzz<br>";
  else
    echo $i . "<br>";
}

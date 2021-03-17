<?php
$a=1;
$b=1000000;
$c=9999;

echo "El valor medio es: ".valorMedio($a,$b,$c);




function valorMedio($numeroUno, $numeroDos, $numeroTres):int
{
  $retorno=-1;

  $maximo=valorMaximo($numeroUno,$numeroDos,$numeroTres);
  $minimo=valorMinimo($numeroUno,$numeroDos,$numeroTres);

  if($numeroUno!=$maximo&&$numeroUno!=$minimo)
    $retorno=$numeroUno;
  else if($numeroDos!=$maximo&&$numeroDos!=$minimo)
    $retorno=$numeroDos;
  else
    $retorno = $numeroTres;

  return $retorno;

}



function valorMaximo($numeroUno, $numeroDos, $numeroTres):int
{
  $retorno = -1;
  if($numeroUno>$numeroDos && $numeroUno>$numeroTres)
    $retorno=$numeroUno;
  else if($numeroDos>$numeroUno && $numeroDos>$numeroTres)
    $retorno=$numeroDos;
  else
    $retorno=$numeroTres;

    return $retorno;
}


function valorMinimo($numeroUno, $numeroDos, $numeroTres):int
{
  $retorno = -1;
  if($numeroUno<$numeroDos && $numeroUno<$numeroTres)
    $retorno=$numeroUno;
  else if($numeroDos<$numeroUno && $numeroDos<$numeroTres)
    $retorno=$numeroDos;
  else
    $retorno=$numeroTres;

    return $retorno;
}







 ?>

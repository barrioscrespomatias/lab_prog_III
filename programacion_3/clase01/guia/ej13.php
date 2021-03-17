<?php
$animales = array("Perro","Gato","Raton","Araña","Mosca");
$anios = array("1986","1996","2015","78","86");
$lenguajes = array("php","mysql","html5","typescript","ajax");

$mezcla = array();

//Carga los elementos de los arrays pasados por parámetros dentro de un nuevo
//array
$mezcla=array_merge($animales,$anios,$lenguajes);

foreach ($mezcla as $item)
{
  echo $item."<br>";

}


 ?>

<?php
include 'Auto.php';

$primerAuto = Auto::__constructConPrecio("Ford","Negro",150000);
$segundoAuto = Auto::__constructConPrecio("Ford","Negro",500000);
$tercerAuto = Auto::__constructConPrecio("Ford","Bordó",100000);

$primerAuto->AgregarImpuesto(1500);
$segundoAuto->AgregarImpuesto(1500);
$tercerAuto->AgregarImpuesto(1500);

$sumaPrimeroSegundo = Auto::Add($primerAuto,$segundoAuto);
$compararPrimeroSegundo = $primerAuto->Equals($primerAuto,$segundoAuto);
$compararPrimerTercero = $primerAuto->Equals($primerAuto,$tercerAuto);

echo Auto::MostrarAuto($primerAuto);
echo Auto::MostrarAuto($segundoAuto);
echo Auto::MostrarAuto($tercerAuto);

echo "Suma: ".$sumaPrimeroSegundo."<br>";
echo "Comparación ".$compararPrimeroSegundo."<br>";
echo "Comparación ".$compararPrimerTercero."<br>";









?>
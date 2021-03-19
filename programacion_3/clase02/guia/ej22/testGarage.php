<?php
include 'Garage.php';

$auto1 = new Auto("Citroen","Negro");
$auto2 = new Auto("Ford","Blanco");
$auto3 = new Auto("Citroen","Negro");
$auto4 = new Auto("Citroen","Negro");

$garage = new Garage("Pirulito");

$garage->Add($auto1);

$garage->Remove($auto1);

$garage->Add($auto2);
$garage->Add($auto3);
$garage->Add($auto4);




echo $garage->MostrarGarage();





?>
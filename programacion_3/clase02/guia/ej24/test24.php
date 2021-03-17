<?php
include 'operario.php';
include 'fabrica.php';

$operario1 = new Operario(1, "Pedro", "Gomez");
$operario1->salario = 15000;

$operario2 = new Operario(2, "Marcos", "Montero");
$operario2->salario = 10000;

$operario3 = new Operario(3, "Juan", "Franco");
$operario3->salario = 15000;

$operario4 = new Operario(4, "Maria", "Gomez");
$operario4->salario = 15000;

$operario5 = new Operario(5, "Carlos", "Montero");
$operario5->salario = 10000;

$operario6 = new Operario(6, "Fernando", "Franco");
$operario6->salario = 15000;

$fabrica = new Fabrica("Pirulito");

$retorno = $fabrica->Add($operario1);
$retorno = $fabrica->Add($operario2);
$retorno = $fabrica->Add($operario3);
$retorno = $fabrica->Add($operario4);
$retorno = $fabrica->Add($operario5);
$retorno = $fabrica->Remove($operario1);
$retorno = $fabrica->Remove($operario1);
$retorno = $fabrica->Add($operario6);

echo $fabrica->MostrarOperarios();
echo Fabrica::MostrarCosto($fabrica);


 ?>

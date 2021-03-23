<?php
include_once '../parte_01/entidades/empleado.php';
include_once '../parte_01/entidades/fabrica.php';


$fabrica = new Fabrica("La fabriquita");
$idiomas = array("Inglés","Italiano","Chino");
$idiomaVacio=array();

$emp1 = new Empleado("Daniel","Pérez",1111,'M',1111,15000,"Mañana");
$emp2 = new Empleado("Cata","Díaz",2222,'M',2222,10000,"Tarde");



$retorno=$fabrica->AgregarEmpleado($emp1);
$retorno=$fabrica->AgregarEmpleado($emp1);
$retorno=$fabrica->AgregarEmpleado($emp1);
$retorno=$fabrica->AgregarEmpleado($emp2);
$retorno=$fabrica->AgregarEmpleado($emp2);

echo $fabrica->ToString();

$fabrica->EliminarEmpleadosRepetidos();

echo $fabrica->ToString();

// $retorno=$fabrica->EliminarEmpleado($emp1);
// echo $emp1->GetNombre()."<br>";
// echo $emp1->GetSueldo()."<br>";
// echo $emp1->Hablar($idiomaVacio);
// echo $emp1->ToString();
// echo "<br>Sueldos: $".$fabrica->CalcularSueldos();


?>
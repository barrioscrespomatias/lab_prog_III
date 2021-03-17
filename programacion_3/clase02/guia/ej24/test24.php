<?php
include 'operario.php';

$operario1 = new Operario(1,"Juan","Gomez");
$nombreApellido=$operario1->GetNombreApellido();
$salario = $operario1->GetSalario();


// echo $nombreApellido."<br>"."Su salario es: ".$salario;

echo Operario::MostrarOp($operario1);



 ?>

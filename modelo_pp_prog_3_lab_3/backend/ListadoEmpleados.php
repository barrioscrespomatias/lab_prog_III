<?php
include_once '../backend/clases/Empleado.php';

$tabla = Empleado::TomarDato('tabla','$_GET');
if($tabla == 'mostrar'){

}
else{
    $listaEmpleados=Empleado::TraerTodos();
}







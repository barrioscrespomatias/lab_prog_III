<?php
include_once '../backend/clases/Usuario.php';
include_once '../backend/clases/Empleado.php';

$tabla = Empleado::TomarDato('tabla','$_GET');

if($tabla == 'mostrar'){
    var_dump($listadoUsuarios=Usuario::TraerTodos());
}
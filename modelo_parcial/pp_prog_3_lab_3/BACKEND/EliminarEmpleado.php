<?php
include_once './clases/Empleado.php';

$idEliminar = Empleado::TomarDato('id','$_POST');


if(isset($idEliminar)){
    $usuarioEliminado = Empleado::Eliminar($idEliminar);
    echo Usuario::Mensaje($usuarioEliminado,"Se ha eliminado al empleado!","No se pudo eliminar. Corrobore los datos!");
}
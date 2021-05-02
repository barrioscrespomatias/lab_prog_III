<?php
include_once './clases/Usuario.php';

$idEliminar = isset($_POST['id']) ? $_POST['id'] : "Error";
$accion = isset($_POST['accion']) ? $_POST['accion'] : "Error";

if($accion != "Error"){
    $usuarioEliminado = Usuario::Eliminar($idEliminar);
    echo Usuario::Mensaje($usuarioEliminado,"Se ha eliminado al usuario!","No se pudo eliminar. Corrobore los datos!");
}



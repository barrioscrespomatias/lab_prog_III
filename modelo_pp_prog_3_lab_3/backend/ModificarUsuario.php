<?php
include_once './clases/Usuario.php';

$usuario_json = $_POST['usuario_json'] ? $_POST['usuario_json'] : "Error";

$userStd = json_decode($usuario_json);
$user = Usuario::ToUserClass($userStd);

$seModifico = $user->Modificar(11);
echo Usuario::Mensaje($seModifico,"Se ha modificado el usuario!","Error. Corrobore los datos!");










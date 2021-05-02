<?php

include_once 'Usuario.php';

$usuario_json = $_POST['usuario_json'] ? $_POST['usuario_json'] : 'Error';

if ($usuario_json != 'Error') {
    $user = Usuario::TraerUno($usuario_json);
    
    $userStd = new stdClass();
    $userStd->exito = false;
    $userStd->mensaje = "Error. Corrobore los datos ingresados!";

    if ($user->nombre != null) {
        $userStd->exito = true;
        $userStd->mensaje = "Usuario encontrado!";
    }
    $retorno = json_encode($userStd);
    echo $retorno;
}

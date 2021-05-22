<?php


$miDato = "esto es un JSON";

$retorno = new stdClass();
$retorno->exito = false;
$retorno->mensaje = "Algo ha salido mal";

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : null;

if(isset($opcion))
{

    $retorno->exito = true;
    $retorno->mensaje = $miDato;

    $salida = json_encode($retorno);
    echo $salida;
}


<?php

include_once './clases/Usuario.php';

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$correo = isset($_POST['correo']) ? $_POST['correo'] : null;
$clave = isset($_POST['clave']) ? $_POST['clave'] : null;



$usuario = new Usuario();
$usuario->nombre = $nombre;
$usuario->correo = $correo;
$usuario->clave = $clave;

$usuarioGuardado = false;
$retorno = stdClass();

$retorno->exito = $usuarioGuardado;
$retorno->mensaje = "No se ha podido guardar";


if($nombre != null && $clave != null && $correo != null)
{
    $usuarioGuardado = $usuario->GuardarEnArchivo();
    $retorno->exito = $usuarioGuardado;
    $retorno->mensaje = "Se ha podido guardar el usuario";
}

$jsonSalida = json_encode($retorno);
echo $retorno;





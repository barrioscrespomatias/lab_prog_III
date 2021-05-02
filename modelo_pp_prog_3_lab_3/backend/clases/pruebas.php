<?php

include 'Usuario.php';

$accion = isset($_POST['accion']) ? $_POST['accion'] : "Error";

$user = new Usuario();
$user->nombre = "Jeremias";
$user->correo = "jere.r@gmail.com";
$user->clave = "jere_123";
//Prueba Guardar en archivo
// echo $user->GuardarEnArchivo();

//Prueba del TraerTodosJSON
// var_dump(Usuario::TraerTodosJSON()); 

//Prueba Agregar(DB)
// echo $user->Agregar();

//Probar TraerTodos(); ->DB
// var_dump(Usuario::TraerTodos());
// $listaUsuarios = Usuario::TraerTodos();
// Usuario::TraerTodos();
// foreach($listaUsuarios as $item){
//     echo $item->id . "-" . $item->nombre . "-" . $item->correo . "-" . $item->clave . "-" . $item->descripcion . "-" . $item->id . "<br>";
//     // var_dump($item);
// }


//Prueba TraerUno
// $params = $_POST['datosValidos'];
// var_dump(Usuario::TraerUno($params)); 








<?php 
// Aplicación Nº 5 (Recibir Json por Ajax)
// Diseñar una aplicación que reciba por Ajax un producto desde la página recibirJson.php.
// Crear una instancia de stdClass y asignarle los atributos y valores correspondientes.
// Desde javascript, mostrar el valor recibido utilizando la función alert() y en el console.log() .

$producto = new stdClass();
$producto->id = 1111;
$producto->nombre='Mate';
$producto->precio = 600;

$productoJson = json_encode($producto);

var_dump($productoJson);



?>

<form action=""></form>
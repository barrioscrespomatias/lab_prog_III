<?php
include 'Producto.php';
include 'Ojota.php';

// $productoUno = new Producto('Mate Pampa', 490, 'Negro');

$productos = array(
    $productoUno = new Producto('Mate Pampa', 490, 'Negro'),
    $productoDos = new Producto('Tupper', 200, 'Transparente'),
    $productoTres = new Producto('Mantel', 1000, 'Navidad'),
);

// $ojota = new Ojota('Havaiana',2000,'Azul',40);


foreach($productos as $aux)
{
    echo $aux->MostrarProducto();    
}



echo "<br><br>";



// $productoUno->CambiarUnColor('ROJO!!!');
// $productos[1]->CambiarUnColor('VERDE!!!');

//Método estático de clase Producto.
Producto::CambiarTodosColores($productos);

foreach($productos as $aux)
{
    echo $aux->MostrarProducto();    
}


$ojota = new Ojota('Havaiana',2000,'Azul',40);
// echo $ojota->PrecioVentaOjota();

$ojota->MostrarProducto();

echo "<br><br>"."Aumentó la ojota y cambió de color"."<br><br>";

$ojota->CambiarUnColor('Brasil');
$ojota->PrecioOjota(50);

$ojota->MostrarProducto();

?>
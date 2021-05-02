<?php

class Producto
{
    public $nombre;
    public $codigoBarra;
    public $precio;

    function __construct($nombre, $_codigoBarra, $precio)
    {
        $this->nombre = $nombre;
        $this->codigoBarra = $_codigoBarra;
        $this->precio = $precio;
    }
}

$productoJson = isset($_POST['productos']) ? $_POST['productos'] : "Error";
$listaProductos = json_decode($productoJson);


foreach ($listaProductos as $producto) {
    if ($producto->codigoBarra  == 3333)
        var_dump($producto);
}

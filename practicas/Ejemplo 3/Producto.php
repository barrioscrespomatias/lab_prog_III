<?php

class Producto
{
    public $nombreProducto;
    public $precio;
    public $color;

      

    function __construct($nombre,$precio,$color)
    {
        $this->nombreProducto = $nombre;
        $this->precio = $precio;
        $this->color = $color;        
    }

    function MostrarProducto()
    {      
        
        echo "Producto: ".$this->nombreProducto."<br>";
        echo "Precio: $".$this->precio."<br>";
        echo "Color: ".$this->color."<br>";
        echo "Precio venta $".$this->CalcularPrecioVenta()."<br><br>";
        
    }

    function CalcularPrecioVenta()
    {
        return $this->precio*1.50;
    }

    function CambiarUnColor($color)
    {
        $this->color = $color;
    }

    public static function CambiarTodosColores($listaProductos)
    {
        foreach($listaProductos as $producto)
        {
            $producto->CambiarUnColor('Sin color');
        }

    }


    

}


?>
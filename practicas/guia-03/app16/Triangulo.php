<?php
include 'FiguraGeometrica.php';

class Triangulo extends FiguraGeometrica
{
    public $altura;
    public $base;

    public function __construct($altura, $base)
    {
        parent::__construct();
        $this->CalcularDatos();
    }

    public function CalcularDatos()
    {
        $this->perimetro = $this->base+($this->altura*2);
        $this->superficie = $this->base * $this->altura/2;
    }

    public function Dibujar()
    {
        
        
    }

}




?>
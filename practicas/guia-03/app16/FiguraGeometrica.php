<?php

abstract class FiguraGeometrica
{
    protected $color;
    public $perimetro;
    public $superficie;

    abstract public function Dibujar();
    abstract public function CalcularDatos();

   public function __construct()
   {
       
   }
    

    function GetColor()
    {
        return $this->color;
    }

    function SetColor($color)
    {
        $this->color = $color;
    }

    function ToString()
    {
        

    }



}


?>
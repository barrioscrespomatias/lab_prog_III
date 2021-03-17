<?php

abstract class FiguraGeometrica
{
    protected color;
    protected perimetro;
    protected superficie;

    public __construct()
    {

    } 

    function GetColor()
    {
        //RETORNA STRING
    }

    function SetColor($color)
    {
        //CAMBIA EL COLOR
    }

    function ToString()
    {

    }

    public abstract function Dibujar();
    protected abstract function CalcularDatos();

}


?>
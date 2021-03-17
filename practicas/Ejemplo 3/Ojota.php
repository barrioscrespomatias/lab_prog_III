<?php

class Ojota extends Producto
{
    public $talle;

    public function __construct($nombre,$precio,$color,$talleOjota)
    {
        parent::__construct($nombre,$precio,$color);
        $this->talle = $talleOjota;        
    }

    public function PrecioOjota($porcentaje)    
    {        
        $valorAumento = $this->precio*$porcentaje/100;
        return $this->precio +=$valorAumento; 
        

        
    }


}

?>
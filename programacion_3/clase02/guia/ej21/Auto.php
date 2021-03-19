<?php

class Auto
{
    public $color;
    public $precio;
    public $marca;
    public $fecha;
    
    /* #region  CONSTRUCTORES */

    
    public function __construct($marca, $color)
    {
        $this->marca = $marca;
        $this->color = $color;        
    }

     public static function __constructConPrecio($marca, $color,$precio)
    {        
        $auto = new Auto($marca,$color);
        $auto->precio = $precio;
        return $auto;       
        
    }

    public static function __constructConPrecioFecha($marca, $color,$precio, $fecha)
    {
        $auto = new Auto($marca,$precio,$color);
        $auto->fecha = $fecha;  
        return $auto;              
    }
    /* #endregion */


    //Agrega impuesto al valor del auto.
    public function AgregarImpuesto(float $impuesto)
    {
        $this->precio+=$impuesto;
    }

    //Retorna string con los datos del auto.
    public static function MostrarAuto(Auto $auto):string
    {
        $datos="";
        $datos.="Marca: ".$auto->marca."<br>";
        $datos.="Color: ".$auto->color."<br>";
        $datos.="Precio: ".$auto->precio."<br>";
        $datos.="<br>";
        // $datos.="Fecha: ".$auto->fecha."<br>";

        return $datos;
    }

    public function Equals(Auto $a1, Auto $a2):bool
    {
        $retorno = false;      
        if($a1->marca == $a2->marca)
        {
            $retorno = true;           
        }

        return $retorno;       
    }

    //DEBERIA SER DOUBLE.
    public static function Add(Auto $a1, Auto $a2):float
    {
        $importe=0;      

        if($a1->Equals($a1,$a2) && $a1->color == $a2->color)
            $importe = $a1->precio+$a2->precio;     
        

        return $importe;                
    }



   
}

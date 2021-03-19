<?php
include '../app21/Auto.php';

class Garage
{
    private $razonSocial;
    private $precioPorHora;
    private $autos;

 /* #region  Constructores */
    //Constructor por defecto.
    public function __construct($razonSocial)
    {
        $this->razonSocial = $razonSocial;
        $this->autos = array();      
                
    }

    //Constructor con precioPorHora
    public static function __construcPrecioPorHora($razonSocial, $precioPorHora)
    {
        $garage = new Garage($razonSocial);
        $garage->precioPorHora = $precioPorHora;
        return $garage;
        
    }
 /* #endregion */

    //Muestra el garage con todos sus autos.
    public function MostrarGarage():string
    {
        $string = "";
        $string.="Razón Social: ".$this->razonSocial."<br>";
        $string.="Precio por hora: ".$this->precioPorHora."<br>";        
        $string.="Listado de autos: <br><br>";
        foreach($this->autos as $item)
        {
            $string.= Auto::MostrarAuto($item);
        }
        return $string;
    }

    //Solo entra al TRUE cuando encuentra un auto igual.
    public function Equals(Garage $garage, Auto $auto):bool
    {
        $retorno = false;         
        foreach($garage->autos as $item) 
        {
            if ($auto->Equals($auto, $item)) 
            {             
                $retorno = true;
                break;
            }
        }
        return $retorno;
    }

    public function Add(Auto $auto):void
    {
        if (!$this->Equals($this, $auto))
            array_push($this->autos, $auto);
        else
            echo "El auto ".$auto->marca." ".$auto->color." ya se encontraba en el garage.<br>";
    }

    public function Remove(Auto $auto):void
    {
        if($this->Equals($this,$auto))
        {
            $indice = array_search($auto,$this->autos);
            // if($indice != false)
            unset($this->autos[$indice]);
        }
        else
            echo "No se ha podido borrar. El auto NO está en el garage.<br>";
    }
}

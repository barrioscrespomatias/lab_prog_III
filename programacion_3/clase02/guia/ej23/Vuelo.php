<?php
include 'Pasajero.php';

class Vuelo
{
    private $fecha;
    private $empresa;
    private $precio;
    private $listaDePasajeros;
    private $cantMaxima;


    public function __construct($empresa, $precio)
    {
        $this->empresa = $empresa;
        $this->precio = $precio;
        $this->fecha = date("l");
        //Inicializar el array.
        $this->listaDePasajeros = array();    
    }

    public static function __constructConCantMaxima($empresa,$precio,$cantidadMaxima)
    {
        $vuelo = new Vuelo($empresa,$precio);
        $vuelo->cantMaxima = $cantidadMaxima;
        return $vuelo;
    }

    public function GetVuelo():string
    {
        $informacionVuelo = "";
        $informacionVuelo.="Fecha: ".$this->fecha."<br>";
        $informacionVuelo.="Empresa: ".$this->empresa."<br>";
        $informacionVuelo.="Precio: ".$this->precio."<br>";
        $informacionVuelo.="Cantidad máxima de pasajeros: ".$this->cantMaxima."<br>";
        $informacionVuelo.="Lista de pasajeros: <br><br>";
        foreach($this->listaDePasajeros as $item)
        {
            $informacionVuelo.= Pasajero::MostrarPasajero($item);
        }
        return $informacionVuelo;
    }

    public function AgregarPasajero(Pasajero $pasajero):void
    {        
        if(!$this->PasajeroExiste($pasajero)) 
        {
            if (count($this->listaDePasajeros) < $this->cantMaxima)
                array_push($this->listaDePasajeros, $pasajero);                                   
            
        }
        else
        echo "No se ha podido agregar al pasajero.<br>";                     

    }

    //Si el pasajero está, retorna true. sino false
    private function PasajeroExiste(Pasajero $pasajero):bool
    {
                
        $retorno = false;
        foreach($this->listaDePasajeros as $item)
        {
            if($pasajero->Equals($item,$pasajero))
            {
                $retorno = true;
                break;
            }            
        }
        return $retorno;
    }

    public static function Add(Vuelo $primerVuelo, Vuelo $segundoVuelo):float
    {
        $acumulador = 0;
        $acumulador+=Vuelo::RecaudarVuelos($primerVuelo);
        $acumulador+=Vuelo::RecaudarVuelos($segundoVuelo);
        return $acumulador;
    }

    private static function RecaudarVuelos(Vuelo $vuelo):float
    {
        $acumulador = 0;
        $valor = $vuelo->precio;
        foreach($vuelo->listaDePasajeros as $item)
        {
            if (Pasajero::esPlus($item))
                $acumulador += $valor * 0.8;
            else
                $acumulador += $valor;
        }
        return $acumulador;

    }

    public static function Remove(Vuelo $vuelo, Pasajero $pasajero):Vuelo
    {
        if($vuelo->PasajeroExiste($pasajero))
        {
            $indice = array_search($pasajero,$vuelo->listaDePasajeros);
            unset($vuelo->listaDePasajeros[$indice]);
        } else
            echo "No se pudo eliminar al pasajero del vuelo<br>";

        return $vuelo;
    }
}
?>
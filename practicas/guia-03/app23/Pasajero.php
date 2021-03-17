<?php
class Pasajero
{
    private $apellido;
    private $nombre;
    private $dni;
    private $esPlus;

   

    public function __construct($apellido,$nombre,$dni,$esPlus)
    {
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->esPlus = $esPlus;
    }

    public function Equals(Pasajero $p1, Pasajero $p2): bool
    {
        $retorno = false;
        if ($p1->dni == $p2->dni)
            $retorno = true;

        return $retorno;
    }

    public function GetInfoPasajero():string
    {
        $string="";
        $string.="Nombre: ".$this->nombre."<br>";
        $string.="Apellido: ".$this->apellido."<br>";
        $string.="Dni: ".$this->dni."<br>";
        if ($this->esPlus)
        $string .= "Es plus: Si" . "<br>";
        else
        $string .= "Es plus: No" . "<br>";
        $string .= "<br>";

        return $string;
    }

    public static function MostrarPasajero(Pasajero $pasajero1):string
    {
        $informacion = $pasajero1->GetInfoPasajero();
        return $informacion;
    }

    //Método creado para obtener valor de atributo privado 'esPlus'.
    public static function esPlus(Pasajero $pasajero):bool
    {
        $retorno = false;
        if ($pasajero->esPlus)
            $retorno = true;
        
        return $retorno;

    }





}



?>
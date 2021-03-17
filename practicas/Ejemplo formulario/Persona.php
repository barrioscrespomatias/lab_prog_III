<?php
class Persona
{
    public $nombre;
    public $apellido;
    
    public function __construct($nombre, $apellido)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public static function MostrarPersona(Persona $person):string
    {
        $string = "";
        $string .= "Nombre: " . $person->nombre . "<br>";
        $string .= "Apellido: " . $person->apellido . "<br><br>";
        return $string;
    }
    public static function MostrarNombre(Persona $person):string
    {
       return $person->nombre;
    }
}

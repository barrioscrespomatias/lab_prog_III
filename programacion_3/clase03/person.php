<?php

class Persona
{
    public $legajo;
    public $apellido;
    public $nombre;

    public function __construct($legajo,$apellido,$nombre)
    {
        $this->legajo = $legajo;
        $this->apellido = $apellido;
        $this->nombre = $nombre;       
    }    

    public function ToString()
    {
        echo $this->legajo ." -- ". $this->nombre ." -- ". $this->apellido;
    }

}
?>
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

    public function buscarPorId(Persona $persona, $id):string
    {
        $strInfo = "";
        if($persona != null && $id != null)
        {
            if($persona->legajo == $id) 
            {
                $strInfo .= "Legajo: " . $persona->legajo;
                $strInfo .= "Nombre: " . $persona->nombre;
                $strInfo .= "Apellido: " . $persona->apellido;
            }
        }
        return $strInfo;
    }

    public function ToString()
    {
        echo $this->legajo ." -- ". $this->nombre ." -- ". $this->apellido;
    }

}
?>
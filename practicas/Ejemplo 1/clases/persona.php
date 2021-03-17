<?php
    class Persona
    {
        public $nombre;
        public $apellido;


        function __construct($nombrecito,$apellidito)
        {
            $this->nombre = $nombrecito;
            $this->apellido = $apellidito;
        }

        function Mostrar()
        {
            echo $this->nombre." ".$this->apellido;
            
        }
    }


?>
<?php

abstract class Persona
{
    public $apellido;
    public $dni;
    public $nombre;
    public $sexo;

    public function __construct($nombre, $apellido, $dni, $sexo)
    // public function __construct()
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->sexo = $sexo;
    }

    /* #region  METODOS GETTERS */
    //Retorna el valor del atributo Apellido.
    public function GetApellido(): string
    {
        $retorno = "No se ha cargado ningun apellido.\n";
        if (strlen($this->apellido) > 0)
            $retorno = $this->apellido;

        return $retorno;
    }

    //Retorna el valor del atributo Dni.
    public function GetDni(): int
    {
        $retorno = -1;
        if ($this->dni > 0 && $this->dni < 100000000)
            $retorno = $this->dni;

        return $retorno;
    }

    //Retorna el valor del atributo nombre.
    public function GetNombre(): string
    {
        $retorno = $this->nombre;

        return $retorno;
    }

    //Retorna el valor el atributo sexo.
    public function GetSexo(): string
    {
        $retorno = '-';
        if ($this->sexo === 'm' || $this->sexo === 'f' || $this->sexo === 'M' || $this->sexo === 'F')
            $retorno = $this->sexo;

        return $retorno;
    }
    /* #endregion */

    //Método abstracto que recibe por parámetro un array de idiomas.
    public abstract function Hablar($idioma): string;

    //Muestra toda la informacion de la Persona con todos sus atributos.
    public function ToString(): string
    {
        $strSalida = "";
        if ($this != null)
            $strSalida .= $this->nombre . "-" . $this->apellido . "-" . $this->dni . "-" . $this->sexo . "-";
        else
            $strSalida = "No se pudo mostrar la persona.<br>";

        return $strSalida;
    }
}

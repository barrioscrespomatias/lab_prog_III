<?php

abstract class Persona
{
    private $_apellido;
    private $_dni;
    private $_nombre;
    private $_sexo;

    public function __construct($nombre, $apellido, $dni, $sexo)
    {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_dni = $dni;
        $this->_sexo = $sexo;
    }

    /* #region  METODOS GETTERS */
    //Retorna el valor del atributo Apellido.
    public function GetApellido(): string
    {
        $retorno = "No se ha cargado ningun apellido.\n";
        if (strlen($this->_apellido) > 0)
            $retorno = $this->_apellido;

        return $retorno;
    }

    //Retorna el valor del atributo Dni.
    public function GetDni(): int
    {
        $retorno = -1;
        if ($this->_dni > 0 && $this->_dni < 100000000)
            $retorno = $this->_dni;

        return $retorno;
    }

    //Retorna el valor del atributo nombre.
    public function GetNombre(): string
    {
        $retorno = "No se ha cargado ningun nombre.\n";
        if (strlen($this->_nombre) > 0)
            $retorno = $this->_nombre;

        return $retorno;
    }

    //Retorna el valor el atributo sexo.
    public function GetSexo(): char
    {
        $retorno = '-';
        if ($this->_sexo === 'm' || $this->_sexo === 'f')
            $retorno = $this->_nombre;

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
            $strSalida .= $this->_apellido . "-" . $this->_nombre . "-" . $this->_dni . "-" . $this->_sexo . "-";
        else
        $strSalida = "No se pudo mostrar la persona.<br>";
        return $strSalida;
    }
}

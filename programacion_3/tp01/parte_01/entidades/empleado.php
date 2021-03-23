<?php
include_once 'persona.php';

class Empleado extends Persona
{
    protected $_legajo;
    protected $_sueldo;
    protected $_turno;

    //Constructor de clase que llama a la clase padre.
    public function __construct($nombre, $apellido, $dni, $sexo, $legajo, $sueldo, $turno)
    {
        parent::__construct($nombre, $apellido, $dni, $sexo);
        $this->_legajo = $legajo;
        $this->_sueldo = $sueldo;
        $this->_turno = $turno;
    }

    /* #region  METODOS GETTERS */

    //Retorna el valor del atributo Legajo.
    public function GetLegajo(): string
    {
        $retorno = "No se ha cargado ningun legajo en el empleado.\n";
        if ($this->_legajo > 0)
            $retorno = $this->_legajo;

        return $retorno;
    }

    //Retorna el valor del atributo Sueldo.
    public function GetSueldo(): string
    {
        $retorno = "No se ha cargado el sueldo del empleado.\n";
        if ($this->_sueldo > 0)
            $retorno = $this->_sueldo;

        return $retorno;
    }

    //Retorna el valor del atributo Turno.
    public function GetTurno(): string
    {
        $retorno = "No se ha cargado el turno del empleado.\n";
        if (strlen($this->_turno) > 0)
            $retorno = $this->_turno;

        return $retorno;
    }
    /* #endregion */

    //Recibe un array de idiomas. Muestra los idiomas
    // que habla un empleado
    public function Hablar($idioma): string
    {
        $strSalida="";
        if ($idioma != null)
        {
            $strSalida .= "El empleado habla ";
            foreach ($idioma as $item)
            {
                $strSalida .= $item . ", ";
            }
            $cantidadLetras=strlen($strSalida);
            
            // Se modifica la última "," agregada.
            // en la posición cantidad de str -2
            // se utiliza "-2" ya que el último es el caracter de escape.
            $strSalida[$cantidadLetras-2] =".";
            $strSalida .= "<br>";
        }
        else
        $strSalida = "Sólo habla su idioma nativo.<br>";
        return $strSalida;
    }

    // Muestra toda la informacion del empleado. 
    // Reutiliza método Tostring de la clase padre.
    public function ToString(): string
    {
        $strSalida = "";
        if ($this != null) {
            $strSalida = parent::ToString();
            $strSalida .= $this->_legajo . "-" . $this->_sueldo . "-" . $this->_turno . ".\n";
        }
        else
        $strSalida = "No se ha podido mostrar la información del empleado.\n";

        return $strSalida;
    }
}

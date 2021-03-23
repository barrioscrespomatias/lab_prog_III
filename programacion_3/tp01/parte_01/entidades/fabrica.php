<?php

use function PHPSTORM_META\type;

include_once 'empleado.php';

class Fabrica
{
    private $_cantidadMaxima;
    public $_empleados;
    private $_razonSocial;

    //Constructor por defecto.
    public function __construct($razonSocial)
    {
        $this->_cantidadMaxima = 5;
        $this->_razonSocial = $razonSocial;
        $this->_empleados = array();
    }

    //Agrega a la fábrica el empleado pasado como parámetro.
    //En caso de poder agregarlo devuelve true.
    // Sino pude agregarlo retorna false y lo notifica por echo.
    public function AgregarEmpleado(Empleado $emp): bool
    {
        $retorno = false;
        $cantidadEmpleados = count($this->_empleados);  

        if ($emp != null && $cantidadEmpleados < $this->_cantidadMaxima)
        {
            array_push($this->_empleados, $emp);
            $retorno = true;
        } else
            echo ("No se pudo agregar al empleado.\n");

        return $retorno;
    }
    
    ///Calcula la cantidad de dinero que la fábrica debe gastar en sus empleados.    
    public function CalcularSueldos():float 
    {
        $sueldos = 0;
        if (count($this->_empleados)>0) 
        {
            foreach ($this->_empleados as $item) 
            {                               
                $sueldos += $item->GetSueldo();
            }
        }
        else
        echo "No hay ningun empleado cargado";
                
        return $sueldos;
    }

    //Recibe un empleado pasado por parámetro y si se encuentra en la lista de empleados
    // de la fábrica, lo elimina.
    public function EliminarEmpleado(Empleado $emp): bool
    {
        $retorno = false;
        $index = -1;
        foreach ($this->_empleados as $item) 
        {
            if ($item->GetDni() == $emp->GetDni()) 
            {
                $index = array_search($emp, $this->_empleados);                
                if ($index != -1) 
                {
                    unset($this->_empleados[$index]);
                    $retorno = true;
                    echo "Se ha eliminado el empleado ".$item->GetNombre()."<br><br>";
                    break;
                }                 
            }
            else
            echo "El empleado no existe!!<br>";
        }
        return $retorno;
    }

    public function EliminarEmpleadosRepetidos(): void
    {
        print_r(array_unique($this->_empleados));
    }

    public function ToString():string
    {
        $strSalida="";
        $strSalida.="Razón social: ".$this->_razonSocial."<br>";
        $strSalida.="Cantidad máxima empleados: ".$this->_cantidadMaxima."<br>";
        $strSalida.="Cantidad actual de empleados: ".count($this->_empleados)."<br>";
        $strSalida.="Lista de empleados: "."<br><br>";
        foreach($this->_empleados as $item)
        {
            $strSalida.=$item->ToString()."<br>";
        }
        $strSalida.="<br>"; 

        
        return $strSalida;

    }




}

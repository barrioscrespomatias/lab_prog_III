<?php

include_once 'empleado.php';

class Fabrica
{
    private $_cantidadMaxima;
    private $_empleados;
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
    //Sino pude agregarlo retorna false y lo notifica por echo.
    //Luego de agregarlo corrobora que el mismo no se encuentre repetido en
    //la lista de empleados. En caso de estar repetido, lo borra y retorna false.
    public function AgregarEmpleado(Empleado $emp): bool
    {
        $retorno = false;
        $cantidadInicialEmpleados = count($this->_empleados);
        $cantidadActualEmpleados=0;  

        if ($emp != null && $cantidadInicialEmpleados < $this->_cantidadMaxima)
        {
            array_push($this->_empleados, $emp);
            $cantidadActualEmpleados=count($this->_empleados);
            if($cantidadInicialEmpleados<$cantidadActualEmpleados)
            {
                $this->EliminarEmpleadosRepetidos();
                if (count($this->_empleados) > $cantidadInicialEmpleados)
                    $retorno = true;
                else
                echo "Se eliminó el registro repetido de ".$emp->GetNombre()."<br>";
            }
        } 
        else
            echo ("No se pudo agregar al empleado.\n");

        if($retorno)
            $this->EliminarEmpleadosRepetidos();

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

        $index = array_search($emp, $this->_empleados);
        //Analiza de una forma precisa. !==
        if ($index !== false) 
        {            
            unset($this->_empleados[$index]);
            $retorno = true;
            echo "Se ha eliminado el empleado " . $emp->GetNombre() . "<br>";
        }
        else
        echo "El empleado no existe!!<br>";
        return $retorno;
    }

    private function EliminarEmpleadosRepetidos(): void
    {
        //SORT_REGULAR - compara ítems normalmente (no cambia los tipos)
        $this->_empleados=array_unique($this->_empleados,SORT_REGULAR);
    }

    //Muestra todos los atributos de la clase Fábrica.
    public function ToString():string
    {
        $strSalida="";
        $strSalida.="Razón social: ".$this->_razonSocial."<br>";
        $strSalida.="Cantidad máxima empleados: ".$this->_cantidadMaxima."<br>";
        $strSalida.="Cantidad actual de empleados: ".count($this->_empleados)."<br>";
        $strSalida.="Lista de empleados: "."<br><br>";
        foreach($this->_empleados as $item)
        {
            $strSalida.=$item->ToString();
        }
        $strSalida.="<br>";         
        return $strSalida;

    }

    
}

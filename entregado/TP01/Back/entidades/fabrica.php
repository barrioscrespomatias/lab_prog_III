<?php
const CANT_ATRIBUTOS = 9;
include_once 'empleado.php';
include_once 'interfaces.php';


class Fabrica implements IArchivo
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
        $cantidadActualEmpleados = 0;

        if ($emp != null && $cantidadInicialEmpleados < $this->_cantidadMaxima) {
            // if (!$this->EmpleadoExiste($emp)) {
            array_push($this->_empleados, $emp);
            $cantidadActualEmpleados = count($this->_empleados);
            if ($cantidadInicialEmpleados < $cantidadActualEmpleados) {
                $this->EliminarEmpleadosRepetidos();
                if (count($this->_empleados) > $cantidadInicialEmpleados)
                    $retorno = true;
                else
                    echo "Se eliminó el registro repetido de " . $emp->GetNombre() . "<br>";
            }
            // } 
            else
                echo ("No se pudo agregar al empleado.\n");
        }

        return $retorno;
    }

    ///Calcula la cantidad de dinero que la fábrica debe gastar en sus empleados.    
    public function CalcularSueldos(): float
    {
        $sueldos = 0;
        if (count($this->_empleados) > 0) {
            foreach ($this->_empleados as $item) {
                $sueldos += $item->GetSueldo();
            }
        } else
            echo "No hay ningun empleado cargado";

        return $sueldos;
    }

    //Recibe un empleado pasado por parámetro y si se encuentra en la lista de empleados
    // de la fábrica, lo elimina.
    public function EliminarEmpleado(Empleado $emp): bool
    {
        $retorno = false;
        $index = false;
        $contador = 0;

        foreach ($this->_empleados as $item) {
            if ($item->GetLegajo() == $emp->GetLegajo() && $item->GetNombre() == $emp->GetNombre()) {
                $index = $contador;
                break;
            }
            $contador++;
        }

        //Analiza de una forma precisa. !==
        if ($index !== false) {
            unset($this->_empleados[$index]);
            $retorno = true;
            echo "Se ha eliminado el empleado " . $emp->GetNombre() . "<br>";
        } else
            echo "El empleado no existe!!<br>";
        return $retorno;
    }

    private function EliminarEmpleadosRepetidos(): void
    {
        //SORT_REGULAR - compara ítems normalmente (no cambia los tipos)        
        $this->_empleados = array_unique($this->_empleados, SORT_REGULAR);
    }

    //Muestra todos los atributos de la clase Fábrica.
    public function ToString(): string
    {
        $strSalida = "";
        $strSalida .= "Razón social: " . $this->_razonSocial . "<br>";
        $strSalida .= "Cantidad máxima empleados: " . $this->_cantidadMaxima . "<br>";
        $strSalida .= "Cantidad actual de empleados: " . count($this->_empleados) . "<br>";
        $strSalida .= "Lista de empleados: " . "<br><br>";
        foreach ($this->_empleados as $item) {
            $strSalida .= $item->ToString() . "<br>";
        }
        $strSalida .= "<br>";
        return $strSalida;
    }

    /* #region  INTERFACES */

    // Recibe el nombre del archivo de texto donde se guardarán los
    // empleados de la fábrica (empleados.txt). Recorre el array de Empleados y sobreescribe en
    // el archivo de texto, utilizando el método ToString 
    public function GuardarEnArchivo($nombreArchivo): void
    {
        $archivo = fopen($nombreArchivo, "w");
        $contadorEmpleadosGuardados = 0;
        foreach ($this->_empleados as $item) {
            //Aca tengo que guardar el empleado con su path.
            if ($item->GetNombre() != "") {
                fwrite($archivo, $item->ToString() . "\r\n");
                $contadorEmpleadosGuardados++;
            }
        }
        if ($contadorEmpleadosGuardados == count($this->_empleados))
            echo "Se han guardado los empleados en el archivo!!";

        fclose($archivo);
    }

    // Recibe el nombre del archivo de texto donde se encuentran los empleados
    // (empleados.txt). Por cada registro leído, genera un objeto de tipo Empleado y lo agrega a la
    // fábrica (utilizando el método AgregarEmpleado)
    public function TraerDeArchivo($nombreArchivo): void
    {

        $archivo = fopen($nombreArchivo, "r");
        $cantidadAnteriorEmpleados = count($this->_empleados);
        $contador = 0;


        if ($archivo !== false) {
            while (!feof($archivo)) {
                $renglon = fgets($archivo);
                $cantidad= strlen($renglon);

                //Renglon
                $empleado = explode("-", $renglon);
                $cantidad = count($empleado);
                if ($renglon != false && count($empleado) == CANT_ATRIBUTOS ) {
                    $variableTipoEmpleado = new Empleado($empleado[0], $empleado[1], $empleado[2], $empleado[3], $empleado[4], $empleado[5], $empleado[6]);
                    $variableTipoEmpleado->SetPathFoto($empleado[7] . "-" . $empleado[8]);
                    if ($this->AgregarEmpleado($variableTipoEmpleado))
                        $contador++;
                }
            }
            $cantidadActualDeEmpleados = count($this->_empleados);
            if ($cantidadAnteriorEmpleados + $contador == $cantidadActualDeEmpleados);
            echo "Se han obtenido los empleados del archivo de texto.<br>";
        }
        else
        echo "Todavía no se han cargado empleados<br>";
    }

    //Hace públicos los empleados.
    public function GetEmpleados(): array
    {
        return $this->_empleados;
    }




    /* #endregion */

    /* #region  FUNCIONES PROPIAS */

    // Setea la cantidad máxima en el numero pasado como parámetro
    public function SetCantidadMaxima($cantidad)
    {
        $this->_cantidadMaxima = $cantidad;
    }

    //Si el empleado existe que recibe como parámetro tiene el mismo legajo
    // que alguno de los empleados existentes en la lista de empleados, retorna
    // false, sino true.
    public function EmpleadoExiste(Empleado $emp): bool
    {
        $retorno = false;
        foreach ($this->_empleados as $item) {
            if ($item->GetLegajo() == $emp->GetLegajo()) {
                $retorno = true;
                break;
            }
        }
        return $retorno;
    }
    /* #endregion */
}

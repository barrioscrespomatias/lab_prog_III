<?php
include_once 'persona.php';
include_once '../pdo/AccesoDatos.php';

class Empleado extends Persona
{
    public $id;
    public $legajo;
    public $sueldo;
    public $turno;
    public $pathFoto;

    /* #region  Clase Empleado Original */
    //Constructor de clase que llama a la clase padre.
    public function __construct($nombre=null, $apellido=null, $dni=null, $sexo=null, $legajo=null, $sueldo=null, $turno=null)
    // public function __construct()
    {

        parent::__construct($nombre, $apellido, $dni, $sexo);
        $this->legajo = $legajo;
        $this->sueldo = $sueldo;
        $this->turno = $turno;
    }

    /* #region  MÉTODOS GETTER */


    //Retorna el valor del atributo Legajo.
    public function GetLegajo(): string
    {
        $retorno = "No se ha cargado ningun legajo en el empleado.\n";
        if ($this->legajo > 0)
            $retorno = $this->legajo;

        return $retorno;
    }

    //Retornoa el Path de la foto del empleado
    public function GetPathFoto(): string
    {
        $retorno = "No se ha cargado el path";
        if (strlen($this->pathFoto) > 0)
            $retorno = $this->pathFoto;

        return $retorno;
    }

    //Retorna el valor del atributo Sueldo.
    public function GetSueldo(): string
    {
        $retorno = "No se ha cargado el sueldo del empleado.\n";
        if ($this->sueldo > 0)
            $retorno = $this->sueldo;

        return $retorno;
    }

    //Retorna el valor del atributo Turno.
    public function GetTurno(): string
    {
        $retorno = "No se ha cargado el turno del empleado.\n";
        if (strlen($this->turno) > 0)
            $retorno = $this->turno;

        return $retorno;
    }
    /* #endregion */

    /* #region  MÉTODOS SETTER */
    public function SetPathFoto($foto): void
    {
        if (strlen($foto) > 0)
            $this->pathFoto = $foto;
    }
    /* #endregion */

    //Recibe un array de idiomas. Muestra los idiomas
    // que habla un empleado
    public function Hablar($idioma): string
    {
        $strSalida = "";
        if ($idioma != null) {
            $strSalida .= "El empleado habla ";
            foreach ($idioma as $item) {
                $strSalida .= $item . ", ";
            }
            $cantidadLetras = strlen($strSalida);

            // Se modifica la última "," agregada.
            // en la posición cantidad de str -2
            // se utiliza "-2" ya que el último es el caracter de escape.
            $strSalida[$cantidadLetras - 2] = ".";
            $strSalida .= "<br>";
        } else
            $strSalida = "Sólo habla su idioma nativo.<br>";
        return $strSalida;
    }

    /**
     * Muestra la informacion del empleado.
     */
    public function ToString(): string
    {
        $strSalida = "";
        if ($this != null) {
            $strSalida = parent::ToString();
            $strSalida .= $this->legajo . "-" . $this->sueldo . "-" . $this->turno . "-" . $this->pathFoto;
        } else
            $strSalida = "No se ha podido mostrar la información del empleado.";

        return $strSalida;
    }
    /* #endregion */

    /* #region  PDO */

    /**
     * Inserta usuarios en la base de datos.
     * Matchea los datos mediante bindValue
     * Permite asociar un tipo de dato mediante PDO::PARAM_INT
     */
    public function InsertarUsuario(): bool
    {
        $retorno = false;
        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO empleados (nombre,apellido,dni,sexo,legajo,sueldo,turno,pathFoto)"
            . " VALUES(:nombre, :apellido, :dni, :sexo,:legajo,:sueldo,:turno,:pathFoto)");

        //bindValue asocia un valor con la clave del insert.
        // $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->GetNombre(), PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->GetApellido(), PDO::PARAM_STR);
        $consulta->bindValue(':dni', $this->GetDni(), PDO::PARAM_INT);
        $consulta->bindValue(':sexo', $this->GetSexo(), PDO::PARAM_STR);
        $consulta->bindValue(':legajo', $this->GetLegajo(), PDO::PARAM_INT);
        $consulta->bindValue(':sueldo', $this->GetSueldo(), PDO::PARAM_STR);
        $consulta->bindValue(':turno', $this->GetTurno(), PDO::PARAM_STR);
        $consulta->bindValue(':pathFoto', $this->GetPathFoto(), PDO::PARAM_STR);
        $retorno = $consulta->execute();

        return $retorno;
    }

    /**
     * Actualiza los usuarios por medio de consulta UPDATE
     * Utiliza bindValue para matchear los valores de los atributos con la consulta.
     * Atributo ID es el que va a modificarse
     * El resto de los datos son los valores a actualizar
     */
    public static function ModificarEmpleado($id, $nombre, $apellido,$sexo, $legajo, $sueldo, $turno, $pathFoto)
    {
        $retorno = false;
        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        // $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET correo = :correo, clave = :clave, nombre = :nombre, perfil = :perfil,  WHERE id = :id");
        $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE `empleados` SET `nombre`='$nombre',`apellido`='$apellido',"
        ."`sexo`='$sexo',`legajo`='$legajo',`sueldo`='$sueldo',`turno`='$turno',`pathFoto`='$pathFoto' WHERE `id`='$id'");


        // $consulta->bindValue(':correo', $_correo, PDO::PARAM_STR);
        // $consulta->bindValue(':clave', $_clave, PDO::PARAM_STR);
        // $consulta->bindValue(':nombre', $_nombre, PDO::PARAM_STR);
        // $consulta->bindValue(':perfil', $_perfil, PDO::PARAM_INT);
        // $consulta->bindValue(':id', $_id, PDO::PARAM_INT);

        $consulta->execute();
        $filasAfectadas = $consulta->rowCount();
        if ($filasAfectadas > 0)

            $retorno = true;

        return $retorno;
    }

    /**
     * Elimina usuarios por medio de un ID especÃ­fico pasado como parÃĄmetro.
     */
    public static function EliminarEmpleado($empleado): bool
    {
        $retorno = false;

        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM empleados WHERE id = :id");

        $consulta->bindValue(':id', $empleado->id, PDO::PARAM_INT);

        $retorno = $consulta->execute();
        return $retorno;
    }

    public static function EliminarEmpleadoPorDni($dni): bool
    {

        $retorno = false;

        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM empleados WHERE dni = :dni");


        $consulta->bindValue(':dni', $dni, PDO::PARAM_INT);

        $retorno = $consulta->execute();


        return $retorno;
    }

    /**
     * Trae todos los usuarios de la base de datos, mediante mÃĐtodo PDO::FETCH_INTO
     * Cada uno de los datos obtenidos es traÃ­do en forma de Usuario.
     * La consulta tiene como retorno una lista de usuarios que se encuentra en la base de datos.
     */
    public static function TraerTodos()
    {
        $objetoAccesoDatos = AccesoDatos::RetornarObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta('SELECT * FROM empleados');        
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_INTO, new Empleado);

        return $consulta;
    }

        /**
     * Trae un los usuarios de la base de datos, mediante mÃĐtodo PDO::FETCH_INTO
     * Cada uno de los datos obtenidos es traÃ­do en forma de Usuario.
     * La consulta tiene como retorno una lista de usuarios que se encuentra en la base de datos.
     */
    public static function BuscarPorDni($dni):Empleado
    {
        $empleado = new Empleado();
        $objetoAccesoDatos = AccesoDatos::RetornarObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta('SELECT * FROM empleados WHERE dni = :dni');
        $consulta->bindValue(':dni', $dni, PDO::PARAM_INT);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_INTO, new Empleado);

        foreach ($consulta as $item) {
            $empleado = $item;
            break;
        }

        return $empleado;
    }


    /* #endregion */
}

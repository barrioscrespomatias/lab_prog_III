<?php

use Empleado as GlobalEmpleado;

include_once 'Usuario.php';
include_once 'ICRUD.php';


class Empleado extends Usuario implements ICRUD
{

    public $foto;
    public $sueldo;

    public function __construct($id="",$nombre = "", $correo = "", $clave = "", $id_perfil = "",$perfil="", $foto = "", $sueldo = 0)
    {
        parent::__construct($id,$nombre, $correo, $clave, $id_perfil,$perfil);
        $this->foto = $foto;
        $this->sueldo = $sueldo;
    }



    //Retorna un array de EMPLEADOS desde la DB con la descripcion
    //del perfil y su foto.

    public static function TraerTodos(): array
    {
        $listaEmpleados = array();

        $objetoAccesoDatos = AccesoDatos::RetornarObjetoAcceso();
        $tablaUno = 'empleados';
        $tablaDos = 'perfiles';

        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT $tablaUno.id,$tablaUno.nombre,
        $tablaUno.correo,$tablaUno.clave,$tablaDos.descripcion AS perfil,$tablaUno.id_perfil,$tablaUno.foto,
        $tablaUno.sueldo

        FROM $tablaUno
        INNER JOIN $tablaDos
        ON $tablaUno.id_perfil = $tablaDos.id");


        $consulta->execute();
        while($fila = $consulta->fetch(PDO::FETCH_OBJ)){
            $empleado = new Empleado($fila->id,
                                   $fila->nombre,
                                   $fila->correo,
                                   $fila->clave,
                                   $fila->id_perfil,
                                   $fila->perfil,
                                   $fila->foto,
                                   $fila->sueldo);

            array_push($listaEmpleados,$empleado);
        }

      
        return $listaEmpleados;
    }






    //A partir de la instancia actual, agrega un nuevo registro en la DB
    //TABLA EMPLEADOS. Si pudo agregar retorna TRUE.
    public function Agregar(): bool
    {

        $retorno = false;
        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO empleados (nombre,correo,clave,id_perfil,foto,sueldo)"
            . " VALUES(:nombre, :correo, :clave, :id_perfil, :foto, :sueldo)");

        //bindValue asocia un valor con la clave del insert.
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':id_perfil', $this->id_perfil, PDO::PARAM_INT);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        $consulta->bindValue(':sueldo', $this->sueldo, PDO::PARAM_STR);



        $retorno = $consulta->execute();

        return $retorno;
    }

    //Modifica en la DB el registro que coincide con la instancia actual
    //Compara por ID. Retorna true, si modifica.
    public function Modificar(): bool
    {
        $retorno = false;
        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();


        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE empleados SET nombre = :nombre,
            correo = :correo,clave = :clave, id_perfil = :id_perfil, foto = :foto, sueldo = :sueldo
            WHERE empleados.id = :id");

            // $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` SET `nombre`='$this->nombre',`correo`='$this->correo',"
            //     . "`clave`='$this->clave',`id_perfil`='$this->id_perfil' WHERE `id`='$this->id'");

            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindParam(':correo', $this->correo, PDO::PARAM_STR);
            $consulta->bindParam(':clave', $this->clave, PDO::PARAM_STR);            
            $consulta->bindParam(':id_perfil', $this->id_perfil, PDO::PARAM_INT);
            $consulta->bindParam(':foto', $this->foto, PDO::PARAM_STR);
            $consulta->bindParam(':sueldo', $this->sueldo, PDO::PARAM_STR);

            

        $consulta->execute();
        $filasAfectadas = $consulta->rowCount();
        if ($filasAfectadas > 0)
            $retorno = true;

        return $retorno;
    }

    //Elimina DB el registro que coincida con el parámetro.
    public static function Eliminar($id): bool
    {
        $retorno = false;

        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM empleados WHERE id = :id");

        $consulta->bindValue(':id', $id, PDO::PARAM_INT);

        $consulta->execute();

        $eliminado = $consulta->rowCount();
        if($eliminado>0)
        $retorno=true;

        return $retorno;
    }
    /**
     * Guarda las fotos mediante en la direccion pasada como parámetro.
     * Necesita el Name del HTML, nombre del empleado y la ruta de carpetas ../backend/empleado/fotos.
     * Retorna un stdClass con los datos de la foto y un booleano con true o false.
     */
    public static function CapturarFoto($htmlName, $nombreEmpleado, $rutaCarpetaFotos): stdClass
    {

        $retorno = new stdClass();
        $retorno->exito = false;

        if (isset($_FILES[$htmlName])) {

            $nombreFoto = isset($_FILES[$htmlName]['name']) ? $_FILES[$htmlName]['name'] : null;
            $tamanioFoto = isset($_FILES[$htmlName]['size']) ? $_FILES[$htmlName]['size'] : null;
            $tmpNombreFoto = isset($_FILES[$htmlName]['tmp_name']) ? $_FILES[$htmlName]['tmp_name'] : null;
            $array = explode(".", $_FILES[$htmlName]['name']);
            $extension = end($array);
            $nombreFotoSinExtension = pathinfo($nombreFoto, PATHINFO_FILENAME);

            $horaGuardado = date("his");

            //PATH MODIFICABLE -> NombreEmpleado.Hora.Extension
            $pathFoto =  $rutaCarpetaFotos . $nombreEmpleado . "." . "$horaGuardado" . "." . $extension;


            $retorno->nombre = $nombreFoto;
            $retorno->tamanio = $tamanioFoto;
            $retorno->extension = $extension;
            $retorno->horaGuardado = $horaGuardado;
            $retorno->path = $pathFoto;
            $retorno->tmpNombre = $tmpNombreFoto;
            $retorno->nombreSinExtension = $nombreFotoSinExtension;
            $retorno->exito = true;
        }

        return $retorno;
    }
    /**
     * Captura el empleado por un método específico.
     * Si todo todos los isset son distintos de null, entonces retorna el empleado (stdClass) con
     * todos sus datos y un booleano TRUE.
     */
    public static function CapturarEmpleadoPost($nombre, $correo, $clave, $id_perfil, $sueldo): stdClass
    {
        $retorno = new stdClass();
        $retorno->exito = false;

        $nombreEmpleado = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $correoEmpleado = isset($_POST['correo']) ? $_POST['correo'] : null;
        $claveEmpleado = isset($_POST['clave']) ? $_POST['clave'] : null;
        $id_perfilEmpleado = isset($_POST['id_perfil']) ? $_POST['id_perfil'] : null;
        $sueldoEmpleado = isset($_POST['sueldo']) ? $_POST['sueldo'] : null;

        if (
            isset($nombreEmpleado) &&
            isset($correoEmpleado) &&
            isset($claveEmpleado) &&
            isset($id_perfilEmpleado) &&
            isset($sueldoEmpleado)
        ) {
            $retorno->nombre = $nombreEmpleado;
            $retorno->correo = $correoEmpleado;
            $retorno->clave = $claveEmpleado;
            $retorno->id_perfil = $id_perfilEmpleado;
            $retorno->sueldo = $sueldoEmpleado;
            $retorno->exito = true;
        }
        return $retorno;
    }

    /**
     * Toma cualquier tipo de dato por GET o POST.
     */
    public static function TomarDato($htmlName, $metodo)
    {
        $dato = "";
        switch ($metodo) {
            case '$_POST':
                $dato = isset($_POST[$htmlName]) ? $_POST[$htmlName] : null;
                break;

            case '$_GET':
                $dato = isset($_GET[$htmlName]) ? $_GET[$htmlName] : null;
                break;
        }
        return $dato;
    }

    /**
     *
     */
    public static function GuardarFoto($nombre, $extension, $tamanio, $tmpNombre, $path, $nombreSinExtension): bool
    {
        $uploadOk = false;
        if ($nombre) {

            $uploadOk = false;
            switch ($extension) {
                case "jpg":
                case "bmp":
                case "gif":
                case "png":
                case "jpeg":
                    //1MB
                    if ($tamanio <= 1000000)
                        $uploadOk = true;
                    break;
            }
            if (!$uploadOk)
                echo "<br>Error al subir el archivo " . $nombre . ". Su tamanio excede lo permitido. Su tamaño es: " . $tamanio . " bytes";
            else {
                move_uploaded_file($tmpNombre, $path);
                // echo "<br>Upload correcto " . basename($nombreSinExtension) . ". Extensión " . $extension . ". Tamanio " . $tamanio . "bytes";
            }
        }
        return $uploadOk;
    }

    public static function ToEmpleadoClass($empleadoStd): Empleado
    {
        $empleado = new Empleado();

        $empleado->id = $empleadoStd->id;
        $empleado->nombre = $empleadoStd->nombre;
        $empleado->correo = $empleadoStd->correo;
        $empleado->clave = $empleadoStd->clave;
        $empleado->id_perfil = $empleadoStd->id_perfil;
        $empleado->sueldo = $empleadoStd->sueldo;
        $empleado->foto = $empleadoStd->pathFoto;

        return $empleado;
    }
}

<?php
class Usuario
{

    public $id;
    public $correo;
    public $clave;
    public $nombre;
    public $perfil;

    public function __construct()
    {
                
    }


    /**
     * Muestra todos los atributos de clase
     */
    public function MostrarDatos()
    {
        return $this->correo . "-" . $this->clave;
    }

    /**
     * Trae todos los usuarios de la base de datos, mediante método PDO::FETCH_INTO
     * Cada uno de los datos obtenidos es traído en forma de Usuario.
     * La consulta tiene como retorno una lista de usuarios que se encuentra en la base de datos.
     */
    public static function TraerTodos()
    {
        $objetoAccesoDatos = AccesoDatos::RetornarObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta('SELECT * FROM usuarios');
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_INTO, new Usuario);

        return $consulta;
    }

    /**
     * Inserta usuarios en la base de datos.
     * Matchea los datos mediante bindValue
     * Permite asociar un tipo de dato mediante PDO::PARAM_INT
     */
    public function InsertarUsuario(): bool
    {
        $retorno = false;
        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios (correo, clave, nombre, perfil) VALUES(:correo, :clave, :nombre, :perfil)");

        //bindValue asocia un valor con la clave del insert.
        // $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_INT);

        $retorno = $consulta->execute();

        return $retorno;
    }

    /**
     * Actualiza los usuarios por medio de consulta UPDATE
     * Utiliza bindValue para matchear los valores de los atributos con la consulta.
     * Atributo ID es el que va a modificarse
     * El resto de los datos son los valores a actualizar
     */
    public static function ModificarUsuario($id, $correo, $clave, $nombre, $perfil)
    {
        $retorno = false;
        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        // $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET correo = :correo, clave = :clave, nombre = :nombre, perfil = :perfil,  WHERE id = :id");
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` SET `correo`='$correo',`clave`='$clave',`nombre`='$nombre',`perfil`='$perfil' WHERE `id`='$id'");
        
        
        // $consulta->bindValue(':correo', $_correo, PDO::PARAM_STR);
        // $consulta->bindValue(':clave', $_clave, PDO::PARAM_STR);
        // $consulta->bindValue(':nombre', $_nombre, PDO::PARAM_STR);
        // $consulta->bindValue(':perfil', $_perfil, PDO::PARAM_INT);
        // $consulta->bindValue(':id', $_id, PDO::PARAM_INT);
        
        $consulta->execute();
        $filasAfectadas = $consulta->rowCount();
        if($filasAfectadas>0)

        $retorno = true;

        return $retorno;

       

       
    }

    /**
     * Elimina usuarios por medio de un ID específico pasado como parámetro.
     */
    public static function EliminarUsuario($usuario): bool
    {
        $retorno = false;

        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE id = :id");

        $consulta->bindValue(':id', $usuario->id, PDO::PARAM_INT);

        $retorno = $consulta->execute();
        return $retorno;
    }

    public static function EliminarUsuarioPorId($id): bool
    {

        $retorno = false;

        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE id = :id");


        $consulta->bindValue(':id', $id, PDO::PARAM_INT);

        $retorno = $consulta->execute();


        return $retorno;
    }
}

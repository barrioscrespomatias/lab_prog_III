<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once 'IAPPI.php';
include_once 'AccesoDatos.php';

class Usuario implements IAPI
{
    public $id;
    public $nombre;
    public $apellido;
    public $correo;
    public $foto;
    public $id_perfil;
    public $clave;


    static function TraerTodos(Request $request, Response $response, array $args): Response
    {

        $listaDeUsuarios = Usuario::TraerTodosUsuarios();

        if ($listaDeUsuarios != false) {

            $newResponse = $response->withStatus(200, 'OK');
            $newResponse->getBody()->write(json_encode($listaDeUsuarios));
        }

        return $newResponse->withHeader('Content-Type', 'application/json');

        return $newResponse;


    }

    static function TraerTodosUsuarios()
    {
        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios");

        $consulta->execute();
        $listaUsuarios = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");

        return $listaUsuarios;

    }


    static function TraerUno(Request $request, Response $response, array $args): Response
    {

        $arrayDeParametros = $request->getParsedBody();

        $objeto = new stdClass();
        $objeto->exito = false;
        $objeto->mensaje = "No se ha validado su autenticacion!!";

        //Datos del usuario recuperados por getParsedBody
        $correo = $args['correo'];
        $clave = $args['clave'];

        $usuarioLogueado = Usuario::TraerUnUsuario($correo, $clave);

        if ($usuarioLogueado != false) {
            $objeto->exito = true;
            $objeto->mensaje = "Bienvenido $correo!! <br>Se ha validado su autenticacion!";
        }

        $newResponse = $response->withStatus(200, 'OK');
        $newResponse->getBody()->write(json_encode($objeto));

        return $newResponse->withHeader('Content-Type', 'application/json');

        return $newResponse;
    }

    static function TraerUnUsuario($correo, $clave)
    {

        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE 
                                                    usuarios.correo LIKE :correo
                                                    AND usuarios.clave LIKE :clave");

        $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);

        $consulta->execute();
        $usuario = $consulta->fetchObject('usuarios');

        return $usuario;
    }


    static function AgregarUno(Request $request, Response $response, array $args): Response
    {
        $arrayDeParametros = $request->getParsedBody();

        $objeto = new stdClass();
        $objeto->exito = false;
        $objeto->mensaje = "No se pudo agregar!!";
        $newResponse = $response->withStatus(200, 'FALSE');

        $usuarioAuxiliar = new Usuario();
        $usuarioAuxiliar->nombre = $arrayDeParametros['nombre'];
        $usuarioAuxiliar->apellido = $arrayDeParametros['apellido'];
        $usuarioAuxiliar->correo = $arrayDeParametros['correo'];
        $usuarioAuxiliar->foto = $arrayDeParametros['foto'];
        $usuarioAuxiliar->id_perfil = $arrayDeParametros['id_perfil'];
        $usuarioAuxiliar->clave = $arrayDeParametros['clave'];


        $agregado = $usuarioAuxiliar->AgregarUnUsuario();

        if ($agregado != false) {
            $objeto->exito = true;
            $objeto->mensaje = "Se ha agregado!!";
            $newResponse = $response->withStatus(200, 'OK');
        }


        $newResponse->getBody()->write(json_encode($objeto));

        return $newResponse->withHeader('Content-Type', 'application/json');

        return $newResponse;

    }

    function AgregarUnUsuario(): bool
    {
        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,apellido,correo,foto,id_perfil,clave)values(:nombre,:apellido,:correo,:foto,:id_perfil,:clave)");

        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        $consulta->bindValue(':id_perfil', $this->id_perfil, PDO::PARAM_INT);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);

        $consulta->execute();

        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    static function ModificarUno(Request $request, Response $response, array $args): Response
    {
        $obj = json_decode(($args["cadenaJson"]));

        $usuarioAuxiliar = new Usuario();

        $usuarioAuxiliar->id = $obj->id;
        $usuarioAuxiliar->nombre = $obj->nombre;
        $usuarioAuxiliar->apellido = $obj->apellido;
        $usuarioAuxiliar->correo = $obj->correo;
        $usuarioAuxiliar->foto = $obj->foto;
        $usuarioAuxiliar->id_perfil = $obj->id_perfil;
        $usuarioAuxiliar->clave = $obj->clave;

        $modificado = $usuarioAuxiliar->ModificarUnUsuario();

        $retorno = new stdclass();
        $retorno->resultado = $modificado;

        $newResponse = $response->withStatus(200, "OK");
        $newResponse->getBody()->write(json_encode($retorno));

        return $newResponse->withHeader('Content-Type', 'application/json');

    }

    function ModificarUnUsuario(): bool
    {
        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("
				update usuarios 
				set nombre=:nombre,
				apellido=:apellido,
				correo=:correo,
				clave=:clave,
                foto=:foto,
				id_perfil=:id_perfil							    
				WHERE id=:id");


        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        $consulta->bindValue(':id_perfil', $this->id_perfil, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);


        return $consulta->execute();

    }

    static function BorrarUno(Request $request, Response $response, array $args): Response
    {
        $id = json_decode(($args["id"]));

        $borrado = Usuario::BorrarUnUsuario($id);

        $retorno = new stdclass();
        $retorno->resultado = $borrado;

        $newResponse = $response->withStatus(200, "OK");
        $newResponse->getBody()->write(json_encode($retorno));

        return $newResponse->withHeader('Content-Type', 'application/json');

    }

    static function BorrarUnUsuario($id)
    {
        $retorno = false;

        $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE id=:id");

        $cantidadInicial = $consulta->rowCount();

        $consulta->bindValue(':id', $id, PDO::PARAM_INT);

        $consulta->execute();

        $cantidadFinal = $consulta->rowCount();

        if($cantidadInicial<$cantidadFinal)
            $retorno = true;

        return $retorno;
    }


}


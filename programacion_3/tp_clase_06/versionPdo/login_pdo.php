<?php
include_once 'usuarios.php';
include_once 'AccesoDatos.php';

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : "Error";
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "Error";
$id = isset($_POST['id']) ? intval($_POST['id']) : "Error";


// LOCALHOST
$host = "localhost";
$user = "root";
$pass = "";
$db = "usuarios_test";


// //https://www.000webhost.com/
// $host = "localhost";
// $user = "id16603197_root";  
// $pass = "vw]&ZM<*yUO%hk9-";
// $db = "id16603197_usuarios_test";



// *---SI OPCION = 'LOGIN' => SE CONECTA CON LA BD Y VERIFICA EXISTENCIA DEL USUARIO.
// *--->>>SI USUARIO NO COINCIDE => INFORMARLO, CASO CONTRARIO MOSTRAR: NOMBRE Y PERFIL
//  (DESCRIPCION)


switch ($opcion) {

    case "alta":

        $userStd = json_decode($usuario);
        // $user = new Usuario($userStd->correo, $userStd->clave, $userStd->nombre, $userStd->perfil);
        $user = new Usuario();
        $user->correo = $userStd->correo;
        $user->clave = $userStd->clave;
        $user->nombre = $userStd->nombre;
        $user->perfil = $userStd->perfil;

        $ingresado = $user->InsertarUsuario();
        if ($ingresado)
            echo "Se ha ingresado un nuevo registro";
        else
            echo "Error al ingresar el nuevo registro";
        break;


    case "modificacion":
        // *-- *-MODIFICACION-> RECIBE UN ID Y UN JSON (OBJ_JSON). 
        // EL ID CORRESPONDE AL REGISTRO A SER MODIFICADO,
        // MIENTRAS QUE EL JSON TENDRÁ LOS DATOS NUEVOS DE ESE REGISTRO.
        $userStd = json_decode($usuario);
        // $user = new Usuario($userStd->correo, $userStd->clave, $userStd->nombre, $userStd->perfil);
        $user = new Usuario();
        $user->correo = $userStd->correo;
        $user->clave = $userStd->clave;
        $user->nombre = $userStd->nombre;
        $user->perfil = $userStd->perfil;

        $retorno = Usuario::ModificarUsuario($id, $user->correo, $user->clave, $user->nombre, $user->perfil);
        if ($retorno)
            echo "Se ha modificado al usuario $id";
        else
            echo "No se ha modificado";
        break;

    case "baja":
        // *-- *-BAJA-> RECIBE EL ID DEL REGISTRO A SER BORRADO.

        $eliminar = Usuario::EliminarUsuarioPorId($id);
        if ($eliminar)
            echo "Se ha eliminado el usuario id $id";
        else
            echo "No se ha podido eliminar el usuario id $id";
        break;
  
    case "traerTodos":
        // *-- *-BAJA-> RECIBE EL ID DEL REGISTRO A SER BORRADO.

        $usuarios = Usuario::TraerTodos();
        if($usuarios)
        foreach($usuarios as $item){
            echo $item->MostrarDatos()."<br>";
        }
        break;

    case "Error":
        echo "No hay nada para mostrar";
        break;
}

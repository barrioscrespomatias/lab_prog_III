<?php

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : "Error";
$correo = isset($_POST['correo']) ? $_POST['correo'] : "Error";
$clave = isset($_POST['clave']) ? $_POST['clave'] : "Error";

// LOCALHOST
$host = "localhost";
$user = "root";
$pass = "";
$db = "usuarios_test";


//INFINITE FREE .NET
// $host = "sql312.epizy.com";
// $user = "epiz_28391210";
// $pass = "kFZJSerdMnGso";
// $db = "epiz_28391210_usuarios_test";


// //https://www.000webhost.com/
// $host = "localhost";
// $user = "id16603197_root";  
// $pass = "vw]&ZM<*yUO%hk9-";
// $db = "id16603197_usuarios_test";

$conexion = "";
$consulta = "";
$resultado = "";
$arrayObtenido = array();
$fila = "";

// *---SI OPCION = 'LOGIN' => SE CONECTA CON LA BD Y VERIFICA EXISTENCIA DEL USUARIO.
// *--->>>SI USUARIO NO COINCIDE => INFORMARLO, CASO CONTRARIO MOSTRAR: NOMBRE Y PERFIL
//  (DESCRIPCION)


switch ($opcion) {

    case "login":
        $conexion = @mysqli_connect($host, $user, $pass, $db);
        if (!$conexion) {
            echo "Error de conexion " . mysqli_connect_error() . "<br>";
        } else {
            echo "Se ha conectado correctamente a la base de datos!.<br>";
            echo "Informacion del host: " . mysqli_get_host_info($conexion) . "<br>";


            $consulta = "SELECT usuarios.nombre, perfiles.descripcion
            FROM usuarios
            INNER JOIN perfiles ON perfiles.id = usuarios.perfil
            WHERE usuarios.clave LIKE '{$clave}'AND usuarios.correo LIKE '{$correo}'";

            $resultado = $conexion->query($consulta);


            if ($resultado->num_rows > 0) {
                while ($obj = $resultado->fetch_object()) {
                    // echo "<br>Nombre: {$fila->nombre} - Perfil: {$fila->descripcion}\n";
                    printf("<br>Nombre: %s - Perfil: %s", $obj->nombre, $obj->descripcion);
                }
            } else
                echo "<br>No hay resultados para mostrar";
            mysqli_close($conexion);
        }
        break;

        // *---SI OPCION = 'MOSTRAR' => MOSTRARA EL LISTADO COMPLETO DE LOS USUARIOS
        // (ID, CORREO, CLAVE, NOMBRE, PERFIL (CODIGO) Y PERFIL (DESCRIPCION))

    case "mostrar":
        $conexion = @mysqli_connect($host, $user, $pass, $db);
        if (!$conexion) {
            echo "Error de conexion " . mysqli_connect_error() . "<br>";
        } else {
            echo "Se ha conectado correctamente a la base de datos!.<br>";
            echo "Informacion del host: " . mysqli_get_host_info($conexion) . "<br>";
        }

        $consulta = "SELECT usuarios.id, usuarios.correo, usuarios.clave, usuarios.nombre, usuarios.perfil, perfiles.descripcion
        FROM usuarios
        INNER JOIN perfiles ON perfiles.id = usuarios.perfil";

        $resultado = $conexion->query($consulta);
        if ($resultado->num_rows > 0) {
            while ($obj = $resultado->fetch_object()) {
                printf("<br>Id: %s - Correo: %s - Clave: %s - Nombre: %s - Perfil: %d - Descripción: %s",$obj->id, $obj->correo, $obj->clave, $obj->nombre, $obj->perfil, $obj->descripcion);
            }
        }
        else
        printf("<br>No hay resultados para mostrar");
        mysqli_close($conexion);
        break;
    case "Error":
        echo "No hay nada para mostrar";
}

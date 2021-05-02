<?php

$accion = isset($_POST['accion']) ? $_POST['accion'] : "Error";

$host = "localhost";
$user = "root";
$pass = "";
$db = "administracion";

$conexion = "";
$consulta = "";
$resultado = "";
$fila = "";
$arrayObtenido = array();
$cantidadFilasAfectadas="";


switch ($accion) {

    case "establecerConexion":
        //Retorna la conexion o false
        $conexion = @mysqli_connect($host, $user, $pass);

        if (!$conexion) {
            echo "Erno de conexion " . mysqli_connect_errno();
            echo "Error de conexion " . mysqli_connect_error();
        } else {
            echo "Se realizó la conexion correctamente!";
            echo "Informacion del host: " . mysqli_get_host_info($conexion);
            mysqli_close($conexion);
        }
        break;
    case "ejecutarConsulta":
        $conexion = @mysqli_connect($host, $user, $pass);
        $consulta = "SELECT * FROM administracion.profesionales";
        $resultado = $conexion->query($consulta);
        echo "Cantidad de filas " . mysqli_num_rows($resultado);
        mysqli_close($conexion);
        break;

    case "mostrarConsulta":
        $conexion = @mysqli_connect($host, $user, $pass);
        $consulta = "SELECT * FROM administracion.pacientes";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_object()) {
            array_push($arrayObtenido, $fila);            
        }
        
        var_dump($arrayObtenido);
        mysqli_close($conexion);
        break;
    case "ejecutarInsert":
        $conexion = @mysqli_connect($host, $user, $pass);
        $consulta = "INSERT INTO administracion.pacientes (nombre, apellido) 
        VALUES ('Nikanor','De Olivera')";

        $resultado = $conexion->query($consulta);
        $cantidadFilasAfectadas = mysqli_affected_rows($conexion);

        // if ($resultado != false) {
        //     echo "Se ha agregado un paciente!!";
        // }
        if ($cantidadFilasAfectadas>0)
            echo "Se ha agregado un paciente!!";
        
        mysqli_close($conexion);
        break;
    case "ejecutarDelete":
        $conexion = @mysqli_connect($host, $user, $pass);
        $consulta = "DELETE FROM administracion.pacientes WHERE id=1";
        $resultado = $conexion->query($consulta);

        $cantidadEliminados = mysqli_affected_rows($conexion);
        if ($cantidadEliminados > 0)
            echo "Se ha eliminado un paciente!";
        else
            echo "Nadie ha sido eliminado";
        mysqli_close($conexion);
        break;
    case "ejecutarModificar":
        $conexion = @ mysqli_connect($host,$user,$pass);
        $consulta = "UPDATE administracion.pacientes SET nombre='Diego',apellido='Vega' WHERE id=5";
        $resultado = $conexion->query($consulta);     
        

        if($resultado!==false)
            "Se ha modificado un paciente!";
        mysqli_close($conexion);
        break;
}

// foreach($arrayObtenido as $item){
//     $item->
// }

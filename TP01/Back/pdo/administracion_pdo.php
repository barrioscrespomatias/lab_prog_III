<?php

include_once '../entidades/empleado.php';


$empleado = isset($_POST['empleado']) ? $_POST['empleado'] : "Error";
$dniEliminar = isset($_POST['dniEliminar']) ? $_POST['dniEliminar'] : "Error";

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : "Error";
$dniModificar = isset($_POST['dniModificar']) ? $_POST['dniModificar'] : "Error";

$valorDniEmpleado = isset($_POST['inputHidden']) ? $_POST['inputHidden'] : "Error";

//Guardar la foto
if(isset($_FILES['txtFoto'])){

    $nombreFoto = isset($_FILES['txtFoto']['name']) ? $_FILES['txtFoto']['name'] : "Error";
    $tamanioFoto = isset($_FILES['txtFoto']['size']) ? $_FILES['txtFoto']['size'] : "Error";
    $tmpNameFoto = isset($_FILES['txtFoto']['tmp_name']) ? $_FILES['txtFoto']['tmp_name'] : "Error";
    $array = explode(".", $_FILES['txtFoto']['name']);
    $extension = end($array);
    $nombreFotoSinExtension = pathinfo($nombreFoto, PATHINFO_FILENAME);
}


switch ($opcion) {
    case  "Enviar":
        $empleado = isset($_POST['empleado']) ? $_POST['empleado'] : "Error";
        //Recibir al empleado y transformarlo a objeto de tipo StdClass
        $empleadoStd = json_decode($empleado);

        //Recibir el file foto.

        //utilizar clase empleado para recibir datos, y setear al objeto.
        $empleadoClass = new Empleado(
            $empleadoStd->nombre,
            $empleadoStd->apellido,
            $empleadoStd->dni,
            $empleadoStd->sexo,
            $empleadoStd->legajo,
            $empleadoStd->sueldo,
            $empleadoStd->turno
        );
        
        $destino = "fotos/" .$empleadoStd->dni . "-" . $empleadoStd->apellido . "." . $extension;
        
        $empleadoClass->SetPathFoto($destino);

        $foto =  $empleadoClass->GetPathFoto();

       

        //Mediante clase empleado, guardar el objeto en PDO.
        $retorno = $empleadoClass->InsertarUsuario();
        //Guardar la foto // Corrobora que el nombre exista y que el tamaño sea un numero.
        //Si es false no ingresa.
        if ($nombreFoto && $tamanioFoto)
            GuardarFoto($nombreFoto, $extension, $tamanioFoto, $tmpNameFoto, $destino, $nombreFotoSinExtension);
        
        echo CargarEmpleados();
        break;

    case "EnviarDatos":
        $empleadoClass = Empleado::BuscarPorDni($dniModificar);
        //envia el dato en forma de JSON para se capturado en JS.
        $jsonCodificado = json_encode($empleadoClass);       
        echo $jsonCodificado;
       
        break;
    case "Modificar":
        /**
         * Modifica mediante Id recibido como parámetro desde el HTML dinámico
         * recibe como parámetro el DNI del empleado.
         */
        $empleado = isset($_POST['empleado']) ? $_POST['empleado'] : "Error";
        //Recibir al empleado y transformarlo a objeto de tipo StdClass
        $empleadoStd = json_decode($empleado);

        //utilizar clase empleado para recibir datos, y setear al objeto.
        $empleado = new Empleado(
            $empleadoStd->nombre,
            $empleadoStd->apellido,
            $empleadoStd->dni,
            $empleadoStd->sexo,
            $empleadoStd->legajo,
            $empleadoStd->sueldo,
            $empleadoStd->turno
        );
        $empleado->SetPathFoto($empleadoStd->foto);

        
        //Recibir el file foto.

        //Mediante clase empleado, guardar el objeto en PDO.
        //Se debe recibir el ID del empleado por medio de la peticion ajax.
        
        $empleado->ModificarEmpleado($empleado->dni,$empleado->nombre,$empleado->apellido,$empleado->sexo,$empleado->legajo,$empleado->sueldo,$empleado->turno,$empleado->GetPathFoto());
        echo CargarEmpleados();


        break;

    case "Eliminar":

        //Elimina la foto de manera local
        $empleado = Empleado::BuscarPorDni($dniEliminar);
        unlink($empleado->GetPathFoto());

        //Elimina el empleado DB
        Empleado::EliminarEmpleadoPorDni($dniEliminar);

        //Refresca la lista de empleados de la página principal.
        echo CargarEmpleados();
        break;

    case "TraerTodos":
        echo CargarEmpleados();
        break;
}

// Etiqueta <img> que muestre la foto de cada empleado. 
// Nota: recordar establecer el valor del atributo “src” con el valor obtenido del método de instancia
// GetPathFoto de la clase empleado. Establecer el valor de los atributos “width” y “height” en
// ‘90px’.

function CargarEmpleados(): string
{
    $retorno = "";            
    $retorno .= '<table>';
    $listaEmpleados = Empleado::TraerTodos();
       

    foreach ($listaEmpleados as $item) {
        $retorno .= '<tr>';
        $retorno .= '<td colspan=6>';
        $retorno .= $item->ToString();
        $retorno .= '</td>';
        $retorno .= '<td colspan=2>';
        $retorno .= '<img src=../Back/pdo/'.$item->GetPathFoto().' alt="fotoEmpleado" width=90px height=90px>';
        $retorno .= '</td>';
        $retorno .= '<td colspan=2>';
        $retorno .= '<input type="button" value="Modificar" onclick="Main.PedirDatos('.$item->dni.')">';
        $retorno .= '</td>';
        $retorno .= '<td colspan=2>';
        $retorno .= '<input type="button" value="Eliminar" onclick="Main.EliminarEmpleado('.$item->dni.')">';
        $retorno .= '</td>';
        $retorno .= '</tr>';
    }
    $retorno .= '</table>';
    return $retorno;
}

function GuardarFoto($nombreFoto, $extension, $tamanioFoto, $tmpNameFoto, $destino, $nombreFotoSinExtension): bool
{
    $uploadOk = false;
    if ($nombreFoto) {

        $uploadOk = false;
        switch ($extension) {
            case "jpg":
            case "bmp":
            case "gif":
            case "png":
            case "jpeg":
                //1MB
                if ($tamanioFoto <= 1000000)
                    $uploadOk = true;
                break;
        }
        if (!$uploadOk)
            echo "<br>Error al subir el archivo " . $nombreFoto . ". Su tamanio excede lo permitido. Su tamaño es: " . $tamanioFoto . " bytes";
        else {
            move_uploaded_file($tmpNameFoto, $destino);
            echo "<br>Upload correcto " . basename($nombreFotoSinExtension) . ". Extensión " . $extension . ". Tamanio " . $tamanioFoto . "bytes";
        }
    }
    return $uploadOk;
}


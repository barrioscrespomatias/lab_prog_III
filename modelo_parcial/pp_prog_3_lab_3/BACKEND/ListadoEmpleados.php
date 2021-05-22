<?php
include_once '../backend/clases/Empleado.php';

$tabla = Empleado::TomarDato('tabla', '$_GET');
$listaEmpleados = Empleado::TraerTodos();

if ($tabla != 'mostrar'){
     $jsonEmpleados=json_encode( $listaEmpleados);
     echo $jsonEmpleados;
}
    
else {
    $tabla = FormularTabla($listaEmpleados);    
    echo $tabla;
}


    



function FormularTabla($arrayDeEmpleados): string
{
    $tabla = "";
    $tabla.= '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>    
        <table border=1px >
        <thead>
            <tr>        
            <th >ID</th>
            <th >Nombre</th>
            <th >Correo</th>
            <th >Clave</th>
            <th >Perfil</th>            
            <th >Sueldo</th>
            <th >Foto</th>
            <tr/>
        </thead>';
    $tabla .=
        '<tbody>';
    foreach ($arrayDeEmpleados as $item) {
        $tabla .= 
            '<tr>
                <td>' . $item->id . '</td>
                <td>' . $item->nombre . '</td>
                <td>' . $item->correo . '</td>
                <td>' . $item->clave . '</td>
                <td>' . $item->perfil . '</td>                
                <td>' . $item->sueldo . '</td>
                <td> <img src='.$item->foto.' alt="img_empleado" width="50px" heigth="50px"></td>
            </tr>';
    }
    $tabla.= 
        '</tbody>        
        </table>
        
        </body>
        </html>';

    return $tabla;
}

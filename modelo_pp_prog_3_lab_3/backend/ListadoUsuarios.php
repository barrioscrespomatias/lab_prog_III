<?php
include_once '../backend/clases/Usuario.php';
include_once '../backend/clases/Empleado.php';

$tabla = Empleado::TomarDato('tabla','$_GET');
$listadoUsuarios=Usuario::TraerTodos();

if($tabla != 'mostrar'){
    var_dump($listadoUsuarios);
}
else {
    $tabla = FormularTabla($listadoUsuarios);    
    echo $tabla;
}


function FormularTabla($arrayDeUsuarios): string
{
    $tabla = "";
    $tabla .=
        '<table border=1px >
        <thead>
            <tr>        
            <th >ID</th>
            <th >Nombre</th>
            <th >Correo</th>
            <th >Clave</th>
            <th >Perfil</th>
            <tr/>
        </thead>';
    $tabla .=
        '<tbody>';
    foreach ($arrayDeUsuarios as $item) {
        $tabla .= 
            '<tr>
                <td>' . $item->id . '</td>
                <td>' . $item->nombre . '</td>
                <td>' . $item->correo . '</td>
                <td>' . $item->clave . '</td>
                <td>' . $item->perfil . '</td>
            </tr>';
    }
    $tabla.= 
        '</tbody>        
        </table>';

    return $tabla;
}

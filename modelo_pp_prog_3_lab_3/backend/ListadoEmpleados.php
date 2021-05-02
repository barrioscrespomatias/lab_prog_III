<?php
include_once '../backend/clases/Empleado.php';

$tabla = Empleado::TomarDato('tabla', '$_GET');
$listaEmpleados = Empleado::TraerTodos();

if ($tabla != 'mostrar')
    var_dump($listaEmpleados);
else {
    $tabla = FormularTabla($listaEmpleados);    
    echo $tabla;
}


function FormularTabla($arrayDeEmpleados): string
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
                <td> <img src="$item->foto" alt="img_empleado" width="50px" heigth="50px"></td>
            </tr>';
    }
    $tabla.= 
        '</tbody>        
        </table>';

    return $tabla;
}

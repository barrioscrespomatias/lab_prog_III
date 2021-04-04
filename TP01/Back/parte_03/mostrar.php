<?php

include '../parte_01/entidades/empleado.php';

$path="./archivos/empleados.txt";
$archivo = fopen($path,"r");
$listaEmpleados = array();

while (!feof($archivo)) {
    $lineaDeArchivo = fgets($archivo);
    $persona = explode("-", $lineaDeArchivo);

    if ($persona[0] != NULL) {
        $empleado = new Empleado($persona[0], $persona[1], $persona[2], $persona[3], $persona[4], $persona[5], $persona[6]);
        array_push($listaEmpleados, $empleado);
    }
}
    
    echo "<table border=1px>";  
    echo "<thead>";
    echo "<th colspan=10> Empleado</th>";
    echo "<th colspan=2>Opcion</th>";
    echo "</thead>";
foreach ($listaEmpleados as $unEmpleado) {  
    
    echo "<tr>";
        echo "<td colspan=10>";     
            echo $unEmpleado->ToString();
        echo "</td>";
        echo "<td colspan=2>";
            //De acá salen los name para recibir en eliminar.php. Variables pasadas por GET en URL.     
            echo "<a href='eliminar.php?legajo={$unEmpleado->GetLegajo()}&nombre={$unEmpleado->GetNombre()}' name='delete'>Eliminar</a>";
        echo "</td>";
    echo "</tr>";
    
}
echo "</table>";
echo "<form>";
echo "<br><td><a href='../../../TP01/Front/parte_02/index.html'>Volver al inicio</a></td></tr>";

?>
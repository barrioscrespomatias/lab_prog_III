<?php

require_once __DIR__ . '/vendor/autoload.php';
header('Content-Type: application/pdf');

$mpdf = new \Mpdf\Mpdf();

$table = "";
$table.=

'<table class="table" border="1">
<thead>
<tr>
    <th>
        Nombre
    </th>
    <th>
        Apellido
    </th>
    <th>
        DNI
    </th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>Matías</td>
        <td>Barrios Crespo</td>
        <td>35394757</td>
    </tr>
    <tr>
        <td>Juan</td>
        <td>Pérez</td>
        <td>22569874</td>
    </tr>
</tbody>
</table>';    

$mpdf->WriteHTML($table);

$mpdf->Output();
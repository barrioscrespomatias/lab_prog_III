<?php
include_once '../backend/clases/Empleado.php';

//Empleado
$empleado_json = Empleado::TomarDato('empleado_json', '$_POST');
$empleadoStd = json_decode($empleado_json);

//Foto
$fotoStd = Empleado::CapturarFoto('foto', $empleadoStd->nombre, '../backend/empleados/fotos/');

if ($fotoStd->exito) {
    $empleadoClass = new Empleado(
        $empleadoStd->nombre,
        $empleadoStd->correo,
        $empleadoStd->clave,
        $empleadoStd->id_perfil,
        //OJO!!!  Si la foto no es cargada, paso la foto del empleado anterior.
        $fotoStd->path,
        $empleadoStd->sueldo
    );
} else
    $empleadoClass = Empleado::ToEmpleadoClass($empleadoStd);

//Cargar en DB
$modificado = $empleadoClass->Modificar($empleadoClass->id);
echo Empleado::Mensaje($modificado, "Se ha modificado al empleado!", "No se ha modificado. Corrobore los datos!!");

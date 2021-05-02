<?php
require_once './clases/Empleado.php';


$empleadoStd = Empleado::CapturarEmpleadoPost('nombre', 'correo', 'clave', 'id_perfil', 'sueldo');
$fotoStd = Empleado::CapturarFoto('foto', $empleadoStd->nombre, '../backend/empleados/fotos/');

$fotoGuardada = Empleado::GuardarFoto(
    $fotoStd->nombre,
    $fotoStd->extension,
    $fotoStd->tamanio,
    $fotoStd->tmpNombre,
    $fotoStd->path,
    $fotoStd->nombreSinExtension
);

if ($fotoGuardada) {
    $employee = new Empleado(
        $empleadoStd->nombre,
        $empleadoStd->correo,
        $empleadoStd->clave,
        $empleadoStd->id_perfil,
        $fotoStd->path,
        $empleadoStd->sueldo
    );



    $altaEmpleado=$employee->Agregar();
    //No olvidarme del echo.    
    echo Empleado::Mensaje($altaEmpleado,"Se ha dado de alta a un nuevo empleado!","Error al dar de alta. Corrobore los datos!");
}

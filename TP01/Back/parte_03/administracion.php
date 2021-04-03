<?php

include '../parte_01/entidades/empleado.php';
include '../parte_01/entidades/fabrica.php';
// include '../../../TP01/Front/index.html';

$btnEnviar = isset($_POST["btnEnviar"]) ? $_POST["btnEnviar"] : "Error";
$nombre = isset($_POST["txtNombre"]) ? $_POST["txtNombre"] : "Error";
$apellido = isset($_POST["txtApellido"]) ? $_POST["txtApellido"] : "Error";
$dni = isset($_POST["txtDni"]) ? $_POST["txtDni"] : "Error";
$sexo = isset($_POST["cboSexo"]) ? $_POST["cboSexo"] : "Error";
$legajo = isset($_POST["txtLegajo"]) ? $_POST["txtLegajo"] : "Error";
$sueldo = isset($_POST["txtSueldo"]) ? $_POST["txtSueldo"] : "Error";
$turno = isset($_POST["rdoTurno"]) ? $_POST["rdoTurno"] : "Error";

$archivo;
//ERROR. El archivo debe ir el la carpeta archivos/empleados.txt
$path = '../parte_03/archivos/empleados.txt';


if($btnEnviar == "Enviar")
{
   // $archivo = fopen($path,"a");
   // $datosEmpleado = $empleado->ToString();
   // $cantidadEscrita  = fwrite($archivo,$datosEmpleado."\r\n");
   // if($cantidadEscrita>0)
   // {
   //    echo "Se ha guardado el empleado " . $empleado->GetNombre() . " en el archivo de texto.<br>";
   //    echo "<td><a href='./mostrar.php'>Ir mostrar</a></td></tr>";
   // }
   // else
   // {
   //    echo "<td><a href='../parte_01/index.php'>Volver al inicio</a></td></tr>";    
   // }

   $empleado = new Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo,$turno);
   $fabrica = new Fabrica("La fabrica");
   $fabrica->SetCantidadMaxima(7);
   
   // ---------------------------------Cargar la fábrica--------------------------
   
   $fabrica->TraerDeArchivo('../parte_03/archivos/empleados.txt');
  
   // ---------------------------------Agregar nuevo empleado----------------------
   if($fabrica->AgregarEmpleado($empleado))
   {
      $fabrica->GuardarEnArchivo('../parte_03/archivos/empleados.txt');
      echo "<br><td><a href='mostrar.php'>Mostrar la lista de empleados</a></td></tr>";
   }
   else
   {
      echo "<br>No se pudo agregar el empleado " . $empleado->GetNombre();
      echo "<br><td><a href='../../../TP01/Front/parte_02/index.html'>Ir a la página principal</a></td></tr>";
   }
   

      
   

   

    
}

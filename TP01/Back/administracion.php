<?php
session_start();

include_once './entidades/empleado.php';
include_once './entidades/fabrica.php';

$btnEnviar = isset($_POST["btnEnviar"]) ? $_POST["btnEnviar"] : "Error";
$nombre = isset($_POST["txtNombre"]) ? $_POST["txtNombre"] : "Error";
$apellido = isset($_POST["txtApellido"]) ? $_POST["txtApellido"] : "Error";
$dni = isset($_POST["txtDni"]) ? $_POST["txtDni"] : "Error";
$sexo = isset($_POST["cboSexo"]) ? $_POST["cboSexo"] : "Error";
$legajo = isset($_POST["txtLegajo"]) ? $_POST["txtLegajo"] : "Error";
$sueldo = isset($_POST["txtSueldo"]) ? $_POST["txtSueldo"] : "Error";
$turno = isset($_POST["rdoTurno"]) ? $_POST["rdoTurno"] : "Error";

$dniEmpleadoModificado = isset($_POST["hdnModificar"]) ? $_POST["hdnModificar"] : "Error";

$archivo;
$banderaFabrica = false;
$path = './archivos/empleados.txt';

$nombreFoto = isset($_FILES['txtFoto']['name']) ? $_FILES['txtFoto']['name'] : "Error";
$tamanioFoto = isset($_FILES['txtFoto']['size']) ? $_FILES['txtFoto']['size'] : "Error";
$tmpNameFoto = isset($_FILES['txtFoto']['tmp_name']) ? $_FILES['txtFoto']['tmp_name'] : "Error";
$array = explode(".", $_FILES['txtFoto']['name']);
$extension = end($array);
$destino = "./fotos/" . $dni . "-" . $apellido . "." . $extension;
$nombreFotoSinExtension = pathinfo($nombreFoto, PATHINFO_FILENAME);

$fabrica = new Fabrica("La fabrica");
$fabrica->SetCantidadMaxima(7);


switch ($btnEnviar) {   
   case 'Enviar':

   if ($nombre) {
      $empleado = new Empleado($nombre, $apellido, $dni, $sexo, $legajo, $sueldo, $turno);
      //Destino se construye mediante $_FILES['name'].
      //$destino = "./fotos/" . $dni . "-" . $apellido . "." . $extension;
      $empleado->SetPathFoto($destino);
      // ---------------------------------Cargar la fábrica--------------------------   
      $fabrica->TraerDeArchivo($path);
      // ---------------------------------Agregar nuevo empleado----------------------
      if ($fabrica->AgregarEmpleado($empleado)) {
         $fabrica->GuardarEnArchivo($path);

         //Guardar la foto.
         if ($nombreFoto)
         GuardarFoto($nombreFoto,$extension,$tamanioFoto,$tmpNameFoto,$destino,$nombreFotoSinExtension);
         
         echo "<br><td><a href='mostrar.php'>Mostrar la lista de empleados</a></td></tr>";
      } else {
         echo "<br>No se pudo agregar al empleado {$empleado->Getnombre()}.<br>La fábrica está completa<br>";
         echo "<br><td><a href='../Front/index.html'>Ir a la página principal</a></td></tr>";
      }
   } else {
      header('location: ../Front/index.html');
   }

   break;

   case "Modificar":
      $fabrica->TraerDeArchivo($path);
      $empleadoModificado = BuscarEmpleado($fabrica,$dniEmpleadoModificado);
      $fabrica->EliminarEmpleado($empleadoModificado);
      $nuevoEmpleado = new Empleado($nombre,$apellido,$dni,$sexo,$legajo, $sueldo, $turno);
      $nuevoEmpleado->SetPathFoto($destino);
      $fabrica->AgregarEmpleado($nuevoEmpleado);
      $fabrica->GuardarEnArchivo($path);
      if($nombreFoto)
      GuardarFoto($nombreFoto,$extension,$tamanioFoto,$tmpNameFoto,$destino,$nombreFotoSinExtension);
      echo "Se ha modificado el empleado!!";


      break;
}

//Busca dentro de la fábrica por dni
//El empleado siempre debería estar ya que es un dni que no se puede modificar
// porque su atributo es input es readOnly.

function BuscarEmpleado ($fabrica, $dni):Empleado{
   $empleadoEncontrado = array();
   foreach ($fabrica->GetEmpleados() as $item){
      if($item->GetDni() == $dni){
         $empleadoEncontrado = $item;         
         break;
      }      
   }
   return $empleadoEncontrado;
}

function GuardarFoto($nombreFoto,$extension, $tamanioFoto, $tmpNameFoto, $destino,$nombreFotoSinExtension){
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
}
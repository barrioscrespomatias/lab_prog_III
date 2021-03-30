<?php
include './person.php';

$accion = $_POST["accion"];
$legajo = $_POST["legajo"];

$path="./archivos/alumnos.txt";
$archivo = fopen($path,"r");

$contadorPersonas = 0;
$auxArchivo="";
$auxNombre = "";
$auxApellido = "";
$auxLegajo = "";
$listaPersonas = array();


if ($accion == "verificar")
{
    do{
        $auxArchivo.=  fgets($archivo)."<br>";        
    }while(!feof($archivo));
    
}
else
    echo "No se ha podido obtener el valor de name.<br>";

$datos = explode("- ",$auxArchivo);


//Salta de a tres porque es la cantidad de datos que tiene una persona
//Sino saltara de a 3, repetiría los datos de la persona 1 en la persona 2, etc.
for($i=1;$i<count($datos);$i+=3)
{  
    $auxLegajo = trim($datos[$i]);     
    $auxApellido = trim($datos[$i+1]);     
    $auxNombre = trim($datos[$i+2]);   
      
    $personaAux = new Persona($auxLegajo,$auxNombre,$auxApellido);    
    array_push($listaPersonas,$personaAux);
    $contadorPersonas++;           
}


$flag = false;
foreach($listaPersonas as $item)
{
    if ($item->legajo == $legajo) 
    {        
        echo $item->ToString();
        $flag = true;
    }    
}
if(!$flag)
    echo "El legajo ${legajo} no coincide con ninguna persona";  

fclose($archivo);

?>
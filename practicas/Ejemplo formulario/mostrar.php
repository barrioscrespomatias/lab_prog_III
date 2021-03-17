<?php
include 'Persona.php';

$persona = new Persona($_POST['nombre'], $_POST['apellido']);


echo Persona::MostrarPersona($persona);


?>

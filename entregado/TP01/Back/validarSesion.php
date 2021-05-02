<?php
session_start();

$sesionDNIEmpleado = isset($_SESSION['DNIEmpleado']) ? $_SESSION['DNIEmpleado'] : "Error";
if($sesionDNIEmpleado == "Error")
    header('location: ../Front/login.html');


//Acá hay un error. Si se valida que el usuario corresponda, hacia donde me tendría
// que llevar ? Mostrar.php?

//Mostrar.php envía nuevamente a validar sesión.
//TENEMOS UN ERROR.
// LO MISMO ESTá pasando con index.php


?>
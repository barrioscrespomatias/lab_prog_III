<?php
session_start();

$sesionDNIEmpleado = isset($_SESSION['DNIEmpleado']) ? $_SESSION['DNIEmpleado'] : "Error";
if($sesionDNIEmpleado == "Error")
    header('location: ../Front/login.html');

?>
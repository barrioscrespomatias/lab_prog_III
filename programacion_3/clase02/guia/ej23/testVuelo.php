<?php
include 'Vuelo.php';

$p1 = new Pasajero("Perez","Juan",1111,true);
$p2 = new Pasajero("Gomez","Teo",2222,false);
$p3 = new Pasajero("Tito","El bambino",3333,false);
$p4 = new Pasajero("Daddy","Gomez",4444,true);

$vuelo = Vuelo::__constructConCantMaxima("Latam",1000,3);
$vueloDos = Vuelo::__constructConCantMaxima("Aerolineas",2000,3);
// echo $p1->MostrarPasajero($p1);

$vuelo->AgregarPasajero($p1);
$vuelo->AgregarPasajero($p2);
$vuelo->AgregarPasajero($p3);
$vueloDos->AgregarPasajero($p3);
$vueloDos->AgregarPasajero($p4);

echo $vuelo->GetVuelo();
echo $vueloDos->GetVuelo();

Vuelo::Remove($vueloDos,$p4);
echo $vueloDos->GetVuelo();

echo "Total recaudado por vuelos: $".Vuelo::Add($vuelo,$vueloDos);

?>


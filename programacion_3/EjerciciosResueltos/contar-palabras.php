<?php

//Contar palabras
$cadena = "Hola mundo";
$contador=0;
$flag=false;
for($i=0; $i<strlen($cadena);$i++){
    if(strlen($cadena)>0 && $flag==false){
        $contador++;
        $flag=true;
    }        
    if($cadena[$i]==" " && $flag==true){
        $contador++;
    }
}

echo "La cadena tiene ${contador} palabaras";

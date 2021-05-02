<?php

interface IBM{
    // La instancia del usuario creado, recibido o modificado servirá para 
    // modificar en la DB según el id enviado como parámetro.
    public function Modificar($id):bool;


    //Elimina de la DB el registro del ID pasado como parámetro.
    public static function Eliminar($id):bool;
    
}


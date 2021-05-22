<?php

interface ICRUD{

    //Retorna un array de EMPLEADOS desde la DB con la descripcion
    //del perfil y su foto.
    public static function TraerTodos():array;

    
    //A partir de la instancia actual, agrega un nuevo registro en la DB
    //TABLA EMPLEADOS. Si pudo agregar retorna TRUE.        
    public function Agregar():bool;

    //Modifica en la DB el registro que coincide con la instancia actual
    //Compara por ID. Retorna true, si modifica.
    public function Modificar(): bool;

    //Elimina DB el registro que coincida con el parámetro.
    public static function Eliminar($id):bool;





}
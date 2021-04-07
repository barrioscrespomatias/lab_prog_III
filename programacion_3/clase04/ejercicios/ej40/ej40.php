<?php
session_start();

//[name]
//[type]
//[tmp_name]
//[error]
//[size]

//PATHINFO_DIRNAME -> Retorna el nombre del directorio
//PATHINFO_BASENAME -> Retorna nombre del archivo con la extension
//PATHINFO_EXTENSION -> Retorna extension
//PATHINFO_FILENAME -> Retorna nombre del archivo sin la extension


$archivo;
$pathArchivo = './archivos/clubes.txt';
$lineas = array();
$cantidadLineasArchivo = 0;







?>

<form action>
    <table border="1px">
        <thead>
            <th colspan="12">Listado clubes sudamericanos</th>
        </thead>
        <tbody>
            <tr>
                <?php
                // acá debería estar el archivo con los path
                $archivo = fopen($pathArchivo, "a+");                
                if ($archivo != NULL) 
                {
                    if (filesize($pathArchivo) > 0)
                    {
                        while(!feof($archivo))
                        {
                            $lineaArchivo = fgets($archivo, filesize($pathArchivo));
                            if($lineaArchivo!=NULL) 
                            {
                                array_push($lineas, $lineaArchivo);
                                $cantidadLineasArchivo++;                            
                            }
                            
                        }
                    }             
                }                         
                    
                // var_dump($lineas);die();

                ?>
                    <!-- El for recorre la cantidad de líneas del path -->
                    <?php for ($i = 0; $i < $cantidadLineasArchivo; $i++) { ?>
                        <td colspan="3">

                            <!-- mando por get la ruta de la foto -->
                            <a href="./principal.php?path=<?php echo $lineas[$i]?>">
                                <img src="<?php echo $lineas[$i] ?>"  alt="" width="100" height="100">
                            </a>
                        </td>
                        <!-- IDEA: Si el contador de las columnas llega a 4, hacer una nueva fila. -->

                    <?php } ?>
          
            </tr>
        </tbody>
    </table>
</form>

<form action="ej40.php" method="POST" enctype="multipart/form-data">
    <table border="1px">
        <tr>
            <td colspan="6">
                <label for="foto"></label>
            <td>
                <input type="file" name="foto">
            </td>
            </td>
            <td colspan="6">
                <input type="submit" name="enviarDatos" value="Enviar">
            </td>
        </tr>
    </table>
</form>




<?php

$club = "";
$destino = "";
$extension = "";


if (isset($_FILES['foto']['name'])) {

    $array = explode(".", $_FILES['foto']['name']);
    $extension = end($array);
    $club = $array[0];
    $destino = './socios/' . $club . "." . $extension;
    //Guardo el archivo en la sesión.
    
}

// if (isset($_SESSION['archivo'])) {
    if (isset($_FILES['foto']['name'])) {
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino))
    {
        echo "Se ha guardado el archivo " . basename($_FILES['foto']['name']);
        header('location: ej40.php');
    }
        

    $archivo = fopen($pathArchivo, "a");
    if ($archivo != NULL) {

        session_unset();
        fwrite($archivo, $destino . "\n");
        fclose($archivo);
    }

    
    

}



?>
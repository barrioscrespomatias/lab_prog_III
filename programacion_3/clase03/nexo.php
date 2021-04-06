<?php

session_start();

//Se vincula con el name del formulario
$accion = isset($_GET["btnEnviar"]) ? $_GET["btnEnviar"] : "Error";
$accion = isset($_POST["btnEnviar"]) ? $_POST["btnEnviar"] : "Error";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "Error";
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "Error";
$legajo = isset($_POST["legajo"]) ? $_POST["legajo"] : "Error";

//Confirmo login.
if(strlen($nombre)>0)
    $_SESSION['nombre'] = $nombre;


//IMAGENES

if (isset($_FILES["foto"]["name"])) {    
    
    $array = explode(".", $_FILES["foto"]["name"]);
    $extension = end($array);
    $direccionImg = './fotos/' . $legajo . '_' . $nombre . "." . $extension;
    $cadena = $legajo . " - " . $apellido . " - " . $nombre . " - " . $direccionImg . "\n";

}

$path = "./archivos/alumnos.txt";

switch ($accion) {
    case "alta":

        $login = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "Error";        
        if ($login != "Error") {

            echo "Bienvenido ".$login."!!";
            $archivo = fopen($path, "a");
            fwrite($archivo, $cadena);

            //Muevo el archivo a un lugar específico. Sino se pierde
            move_uploaded_file($_FILES["foto"]["tmp_name"], $direccionImg);
            echo "Se ha guardado correctamente el registro de ${nombre}";
            session_unset();
            ?>
            <a href="index.html"><br>Ir a la pagina principal</a>
            <?php
            fclose($archivo);
        }
        else
        header('location: index.html');
        
        break;
    case "listado":
        $archivo = fopen($path, "r");
        do {
            echo fgets($archivo) . "<br>";
        } while (!feof($archivo));
        fclose($archivo);
        break;
    case "verificar":
        $archivo = fopen($path, "r");
        while (!feof($archivo)) {

            $renglon = fgets($archivo);
            $persona = explode(" - ", $renglon);
            
            //Legajo apellido nombre path
            if ($persona[0] == $legajo) {
                $_SESSION["legajo"] = $persona[0];
                $_SESSION["apellido"] = $persona[1];
                $_SESSION["nombre"] = $persona[2];
                $_SESSION["path"] = $persona[3];                          
                break;
            }
        }

        foreach ($persona as $item) {
            echo $item . " ";
        }

        ?>
                <a href="principal.php"><h2>Ir a pagina principal</h2></a>                
        <?php  
        

        fclose($archivo);
        break;
}

<?php

$noticia = isset($_POST['noticia']) ? $_POST['noticia'] : 0;

switch ($noticia) {

    case 1:
        echo "Noticia 1";
        break;
    case 2:
        echo "Noticia 2";
        break;
    case 3:
        echo "Noticia 3";
        break;
    case 4:
        echo "Noticia 4";
        break;
    case 5:
        echo "Noticia 5";
        break;
    default:
        echo "No hay noticias";
        break;
}

<?php
//header('Content-Type: text/plain');

$palabra_ingles = $_POST['variable_php'];

if ($palabra_ingles == "help") {
    $traduccion = "Ayuda";
} else if ($palabra_ingles == "suny") {
    $traduccion = "Sol";
} else if ($palabra_ingles == "hello") {
    $traduccion = "Hola";
} else if ($palabra_ingles == "book") {
    $traduccion = "Libro";
} else if ($palabra_ingles == "computer") {
    $traduccion = "Computadora";
} else if ($palabra_ingles == "pink") {
    $traduccion = "Rosa";
} else if ($palabra_ingles == "sky") {
    $traduccion = "Cielo";
} else if ($palabra_ingles == "moon") {
    $traduccion = "Luna";
} else if ($palabra_ingles == "red") {
    $traduccion = "Rojo";
} else if ($palabra_ingles == "green") {
    $traduccion = "Verde";
} else {
    $traduccion = "No hay traducción";
}

echo $traduccion;
?>
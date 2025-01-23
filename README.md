<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traductor</title>
<head>
    <script type="text/javascript">
        var conexion;

        agregarEvento(window, 'load', cargar, false);

        function agregarEvento(ele, eve, fun, cap) {
            if (ele.addEventListener) {
                ele.addEventListener(eve, fun, cap);
            } else if (ele.attachEvent) {
                ele.attachEvent('on' + eve, fun);
            }
        }

        function cargar() {
            
            agregarEvento(document.getElementById("palabra"), 'keypress', validarInput, false);
           
            agregarEvento(document.getElementById("btnTraducir"), 'click', leerValor, false);
            agregarEvento(document.getElementById("btnLimpiar"), 'click', limpiar, false);
        }

        function validarInput(event) {
            var charCode = event.which || event.keyCode; 
            // Permitir solo letras minúsculas (a-z)
            if (charCode < 97 || charCode > 122) {
                event.preventDefault(); 
            }
        }

        function leerValor() {
            var palabra = document.getElementById("palabra").value;

            if (palabra.trim() === "") {
                alert("Por favor, ingresa una palabra.");
                return;
            }

            enviarValorServidor(palabra);
        }

        function enviarValorServidor(palabra) {
            conexion = xmlhttprequest();
            conexion.onreadystatechange = mostrarResultado;
            conexion.open("POST", "traductor.php", true);
            conexion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            conexion.send("variable_php=" + encodeURIComponent(palabra));
        }

        function mostrarResultado() {
            if (conexion.readyState === 4 && conexion.status === 200) {
                document.getElementById("resultado").value = conexion.responseText;
            }
        }

        function xmlhttprequest() {
            return new XMLHttpRequest();
        }
        function limpiar(){
            document.getElementById("palabra").value="";
            document.getElementById("resultado").value="";
        }
    </script>
</head>
<body>
    <h1>Traductor de Palabras</h1>
    <form name="frmTraductor">
        Palabra a traducir<br>
        Disponibles: help, suny, book, computer, pink, sky, moon, red y green.
        <input type="text" name="txtPalabra" id="palabra"><br>
        <input type="button" value="Traducir" id="btnTraducir"><br>
        Traduccion: <input type="text" name="txtResultado" id="resultado" readonly><br>
        <input type="button" value="Limpiar" id="btnLimpiar"><br>
    </form>
</body>
</html>
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

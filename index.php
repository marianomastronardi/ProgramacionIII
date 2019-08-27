<?php
include 'funciones.php';
//include 'funciones1.php'; //warning
//require 'funciones1.php'; //error [si no encuentra el archivo]
require_once 'funciones.php'; //si ya estaba incluido, no lo agrega
include 'personas.php';
include 'alumno.php';

    echo "Hola PHP" , "<br/>";

    saludar('pepe');

//Clases

$persona = new persona('pepe', 12);

$persona->saludar();

$alumno = new alumno('pepito', 120);

$alumno->saludar();

?>
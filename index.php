<?php
session_start();
include 'funciones.php';
//include 'funciones1.php'; //warning
//require 'funciones1.php'; //error [si no encuentra el archivo]
require_once 'funciones.php'; //si ya estaba incluido, no lo agrega
include 'personas.php';
include 'alumno.php';


    //echo "Hola PHP" , "<br/>";

    //saludar('pepe');

//Clases

//$persona = new persona('persona1', 44551122);

//$persona->saludar();

$alumno = new alumno('pepito', 120);

//$alumno->saludar();

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    //listar
$persona = new persona($_GET["nombre"], $_GET["dni"]);
$persona->ShowPeople();
}
else if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //guardar
$persona = new persona($_POST["nombre"], $_POST["dni"]);
$persona->GuardarPersona();
}
else if($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    //modificar
parse_str(file_get_contents("php://input"),$post_vars);
$persona = new persona($post_vars['nombre'], $post_vars['dni']);
$persona->EditPerson();
}
else if($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
$persona->Deletear($_DELETE["dni"]);
}
//session_unset();
//session_destroy();
?>
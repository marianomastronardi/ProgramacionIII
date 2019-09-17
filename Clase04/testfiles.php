<?php
include 'fileshandle.php';
include 'personas.php';

$archivoTemporal = $_FILES["imagen"]["tmp_name"];
$archivobkp = $_FILES["imagenbkp"]["tmp_name"];
var_dump($archivobkp);
$partes_ruta = pathinfo($archivoTemporal);
//echo $partes_ruta['dirname'], "\n";
//echo $partes_ruta['basename'], "\n";
//echo $partes_ruta['extension'], "\n";
//echo $partes_ruta['filename'], "\n";
//backupear con copy 
$extension = explode('/', $_FILES["imagen"]["type"]);
$extensionbkp = explode('/', $_FILES["imagenbkp"]["type"]);
$rta = move_uploaded_file($archivoTemporal, "./imgTemp/".$_POST["legajo"].".".$extension[count($extension)-1]);
$rtabkp = move_uploaded_file($archivobkp, "./imgTemp/bkp/".$_POST["legajo"].".".$extensionbkp[count($extensionbkp)-1]);
$persona = new persona($_POST["nombre"], $_POST["dni"], $_POST["legajo"], "./imgTemp/".$_POST["legajo"].".".$extension[count($extension)-1]);

fileshandle::Escribir("personas.json", $persona);

//1. 
//Postamn: en POST -> Body el parametro "imagen", lo defino como Files y selecciono una imagen

//2.
//$_FILES es un array de archivos
//[0] nombre del parametro q puse en Body
//[1] nombre del indice, en este caso, la carpeta donde se aloja el archivo en forma temporal
//$archivoTemporal = $_FILES["imagen"]["tmp_name"]; //array de archivos
//echo "<br/> $archivoTemporal";

//3.
//lee el archivo temporal y lo mueve a la carpeta indicada y le pongo el nombre que le indico en el segundo parametro
//$rta = move_uploaded_file($archivoTemporal, "./imgTemp/foto.jpg"); 

//4.
//saco el type del archivo 
//var_dump($_FILES["imagen"]["type"]);

//5.
//saco por array
//explode('/', $archivoTemporal);
//var_dump(pathinfo($archivoTemporal, ))

?>
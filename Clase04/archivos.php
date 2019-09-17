<?php
include 'personas.php';

$archivo = fopen("personas.txt", "a");
$persona = new persona("mariano", "23423454");
$rta = fwrite($archivo, $persona->nombre.PHP_EOL);
$rta = fwrite($archivo, $persona->dni.PHP_EOL);
// $rta = fwrite($archivo, "otra cpsa".PHP_EOL);

//echo fgets($archivo); //nos devuelve un string
// echo fgets($archivo);
// echo "hola";
$archivo = fopen("personas.txt", "r");
while(!feof($archivo))
{
   $linea = fgets($archivo);
   $array = explode(";", $linea);
   //var_dump(explode(";", $linea));
   $MyJOSN = json_encode($array); //para devolver
   echo str_replace("\r\n", " ", $MyJOSN);
    //json_decode()
        echo "<br/>";
}

fclose($archivo);

?>

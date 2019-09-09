<?php

class fileshandle
{

static function Leer($nombreArchivo)
{
    $archivo = fopen($nombreArchivo, "r");

    while(!feof($archivo))
    {
        $linea = fgets($archivo);
        $array = explode(";", $linea);
        $MyJOSN = json_encode($array); //para devolver
        return $MyJOSN; 
    }
}

static function Escribir($nombreArchivo, $str)
{
    $archivo = fopen($nombreArchivo, "a");
    $rta = fwrite($archivo, $str);
}

}

?>
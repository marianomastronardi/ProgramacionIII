<?php

class fileshandle
{

    static function Leer($nombreArchivo)
    {
        $archivo = fopen($nombreArchivo, "r");
        $lista = array();

        while(!feof($archivo))
        {
            $obj = json_decode(fgets($archivo));
            if($obj != null)
            {
                array_push($lista, $obj);
            }
            //$linea = fgets($archivo);
            //$array = explode(";", $linea);
            //$MyJOSN = json_encode($array); //para devolver
            //return $MyJOSN; 
            fclose($archivo);
            return $lista;
        }
    }

    static function Escribir($nombreArchivo, $str)
    {
        $archivo = fopen($nombreArchivo, "a");
        $rta = fwrite($archivo, json_encode($str).PHP_EOL);
        fclose($archivo);
    }   

}

?>
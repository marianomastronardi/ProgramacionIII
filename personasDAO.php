<?php
//si los atributos son privados
//GET_OBJECT_VARS($this)
//despues la variable se declara ..
//$alumno->toobject(GET_OBJECT_VARS($this))
class personaDAO 
{
    public static $personaList  = array();

    public function __construct()
    {
        // self::$personaList = array();
    }

    public static function Guardar($persona)
    {
        if(!isset($_SESSION["lista"]))
        {
            $_SESSION["lista"] = self::$personaList;
        }
        else
        {
            self::$personaList = $_SESSION["lista"];
        }
        array_push(self::$personaList,$persona);
        $_SESSION["lista"] = self::$personaList;
    }

    public static function Borrar($dni)
    {
        foreach (self::$personaList as $key => $value) {
            if($value->dni == $dni);
                unset($key);
        } 
    }

    public static function Mosdificar($persona)
    {
        $i = 0;
        array_values(self::$personaList);
        foreach (self::$personaList as $key => $value) {
            if($value->dni == $persona->dni)
            {
                self::$personaList[$i] = $persona;
                $i++;
            }
        } 
    }

    public static function Listar()
    {
        //$MyJOSN = json_encode(self::$personaList); //para devolver
        $MyJOSN = json_encode($_SESSION["lista"]); //para devolver
    //json_decode()
        echo $MyJOSN; 
        echo "<br/>";
    }
}
?>



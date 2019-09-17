<?php
//include 'persona.php';

class alumno extends persona 
{
    public $cuatrimestre;
    public $legajo;

    public function __contruct ($nombre, $dni, $cuatrimestre, $legajo)
    {
        parent::__contruct($nombre, $dni);
        $this->cuatrimestre = $cuatrimestre;
        $this->legajo = $legajo;
    }

    public function inscribirse()
    {

    }

    public function rendir()
    {
        
    }
}


?>
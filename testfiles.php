<?php
include 'fileshandle.php';
include 'personas.php';

$persona = new persona("mariano", "11224455");

fileshandle::Escribir("personas.txt", $persona);



?>
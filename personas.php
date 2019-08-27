<?php
class persona 
{
    public $nombre;
    public $dni;
    
    public function __construct($nombre, $dni)
    {
        $this->nombre = $nombre;
        $this->dni = $dni;
    }
    
    public function saludar()
    {
        echo 'Hola'.$this->nombre; //el . concatena en comilla simple
        echo "<br/>";
    }

    //new persona();
    //new persona('pepe');
    //new persona('pepe', 0);

}


?>
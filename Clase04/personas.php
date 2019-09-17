<?php
include 'personasDAO.php';
class persona 
{
    public $nombre;
    public $dni;
    public $legajo;
    public $archivofoto;
    public $personaList=array();

    public function __construct($nombre, $dni, $legajo, $archivofoto)
    {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->legajo = $legajo;
        $this->archivofoto = $archivofoto;
    }
    
    public function saludar()
    {
        echo $this->nombre; //el . concatena en comilla simple
        echo "<br/>";
        echo $this->dni; //el . concatena en comilla simple
        echo "<br/>";
    }

    function GuardarPersona()
    {
        //$personaDAO = new personaDAO();
        personaDAO::Guardar($this);
    }

    function ShowPeople()
    {
        personaDAO::Listar();
    }

    function EditPerson()
    {
        personaDAO::Modificar($this);
    }

    function Deletear()
    {
        personaDAO::Borrar($this->dni);
    }

    function CrearArchivo()
    {
            
    }

    function LeerArchivo()
    {

    }

    //new persona();
    //new persona('pepe');
    //new persona('pepe', 0);

}


?>
<?php

class Producto{

    public $id;
    public $nombreProducto;
    public $marca;
    public $precio;
    public $dietetico;
    public $imagen;

    public function __construct($id,$nombreProducto,$marca,$precio,$dietetico,$imagen=null){

        $this->id=$id;
        $this->nombreProducto=$nombreProducto;
        $this->marca=$marca;
        $this->precio=$precio;
        $this->dietetico=$dietetico;
        $this->imagen=$imagen;
        
    }

}
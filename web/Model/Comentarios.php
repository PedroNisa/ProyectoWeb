<?php

class Comentarios{
    protected $id;
    protected $id_cliente;
    protected $fermentador;
    protected $texto;
    protected $fecha;
    
    
    function getId() {
        return $this->id;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getFermentador() {
        return $this->fermentador;
    }

    function getTexto() {
        return $this->texto;
    }

    function getFecha() {
        return $this->fecha;
    }

    function __construct($row) {
        $this->id = $row['id'];
        $this->id_cliente =$row['id_cliente'];
        $this->fermentador =$row['fermentador'];
        $this->texto = $row['texto'];
        $this->fecha =$row['fecha'];
    }

    
    
    
    
}
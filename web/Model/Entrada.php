<?php
class Entrada {
    protected $idEntrada;
    protected $kilogramos;
    protected $cliente;
    protected $fecha;
    protected $escandallo;
   
    
    function getIdEntrada() {
        return $this->idEntrada;
    }

    function getKilogramos() {
        return $this->kilogramos;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getEscandallo() {
        return $this->escandallo;
    }

    
         
            
    public function muestra() { print "<p>" . $this->idEntrada . "</p>"; }
   
    
    public function __construct($row) {
        $this->idEntrada = $row['idEntrada'];
        $this->kilogramos = $row['kilogramos'];
        $this->cliente = $row['cliente'];
        $this->fecha = $row['fecha'];
        $this->escandallo = $row['escandallo'];
      
    }
}


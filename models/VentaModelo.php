<?php
require_once __DIR__ . "/../database/libroswap.sql";

class Venta{
   private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function crear(){
        
    }
}
?>
<?php
const HOST = "";
const USER = "root";
const PASS = "";
const DB = "final"; 
// REMOTO
// const HOST = "localhost"; 
// const USER = "u379646107_AdminA";
// const PASS = "00000Davids";
// const DB = "u379646107_final"; 

function conectar() {
    $conexion = new mysqli(HOST, USER, PASS, DB);
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    return $conexion;
}
?>
<?php
const HOST = "";
const USER = "root";
const PASS = "";
const DB = "final"; // nombre exacto de tu base de datos

function conectar() {
    $conexion = new mysqli(HOST, USER, PASS, DB);
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    return $conexion;
}
?>
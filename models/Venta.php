<?php
require_once __DIR__ . '/../config/config.php';

class Venta {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function registrar($id_usuario, $id_libro, $precio) {
        $stmt = $this->conexion->prepare("INSERT INTO ventas (id_usuario, id_libro, precio) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("❌ Error en prepare: " . $this->conexion->error);
        }
        $stmt->bind_param("iid", $id_usuario, $id_libro, $precio);
        return $stmt->execute();
    }

    public function obtenerPorUsuario($id_usuario) {
        $stmt = $this->conexion->prepare("
            SELECT v.*, l.titulo, l.autor 
            FROM ventas v 
            JOIN libros l ON v.id_libro = l.id 
            WHERE v.id_usuario = ?
            ORDER BY v.fecha DESC
        ");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerTodas() {
        $stmt = $this->conexion->prepare("
            SELECT v.*, u.nombre AS comprador, l.titulo 
            FROM ventas v 
            JOIN usuarios u ON v.id_usuario = u.id 
            JOIN libros l ON v.id_libro = l.id
            ORDER BY v.fecha DESC
        ");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function contarVentas() {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM ventas");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado->fetch_row();
        return $row[0];
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM ventas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM ventas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getError() {
        return $this->conexion->error;
    }
}
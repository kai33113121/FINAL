<?php
require_once __DIR__ . '/../config/config.php';

class Compra {
    private $db;

    public function __construct() {
        $this->db = conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function obtenerConDetalles() {
        $sql = "SELECT c.id, u.nombre AS usuario, l.titulo AS libro, c.fecha
                FROM compras c
                JOIN usuarios u ON c.usuario_id = u.id
                JOIN libros l ON c.libro_id = l.id
                ORDER BY c.fecha DESC";
        $resultado = $this->db->query($sql);
        $detalles = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
        if ($resultado) $resultado->free();
        return $detalles;
    }
}
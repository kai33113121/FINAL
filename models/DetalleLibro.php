<?php
require_once __DIR__ . "/../config/config.php";

class DetalleLibro
{
    private $db;

    public function __construct()
    {
        $this->db = conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function obtenerLibroPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM libros WHERE id = ?");
        if (!$stmt) return null;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libro = $result ? $result->fetch_assoc() : null;
        $stmt->close();
        return $libro;
    }

    public function obtenerResenasPorLibro($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM resenas WHERE libro_id = ?");
        if (!$stmt) return [];
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resenas = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $resenas;
    }
}


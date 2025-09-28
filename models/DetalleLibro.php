<?php
require_once __DIR__ . '/../config/config.php';
class DetalleLibro {
    private $db;
    public function __construct() {
        $this->db = conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos");
        }
    }
    public function obtenerLibroPorId($id) {
        $stmt = $this->db->prepare("
            SELECT l.*, u.nombre as nombre_usuario 
            FROM libros l 
            LEFT JOIN usuarios u ON l.id_usuario = u.id 
            WHERE l.id = ?
        ");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $libro = $result ? $result->fetch_assoc() : null;
            $stmt->close();
            if ($libro) {
                return $libro;
            }
        }
        $stmt = $this->db->prepare("
            SELECT lv.id, lv.titulo, lv.autor, 
                   '' as genero, lv.estado, lv.descripcion,
                   lv.imagen, COALESCE(lv.modo, 'ambos') as modo, lv.precio,
                   'usuario' as tipo_catalogo, lv.id_usuario,
                   u.nombre as nombre_usuario
            FROM libros_venta lv
            LEFT JOIN usuarios u ON lv.id_usuario = u.id
            WHERE lv.id = ?
        ");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $libro = $result ? $result->fetch_assoc() : null;
            $stmt->close();
            return $libro;
        }
        return null;
    }
    public function obtenerResenasPorLibro($id) {
        $stmt = $this->db->prepare("
            SELECT r.*, u.nombre as usuario_nombre 
            FROM resenas r 
            LEFT JOIN usuarios u ON r.usuario_id = u.id 
            WHERE r.libro_id = ? 
            ORDER BY r.fecha DESC
        ");
        if (!$stmt) return [];
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resenas = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $resenas;
    }
}
<?php
require_once __DIR__ . '/../config/config.php';
class ComentarioEvento
{
    private $db;

    public function __construct()
    {
        $this->db = conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function agregar($id_evento, $id_usuario, $comentario)
    {
        $stmt = $this->db->prepare("INSERT INTO comentarios_evento (id_evento, id_usuario, comentario) VALUES (?, ?, ?)");
        if (!$stmt) return false;
        $stmt->bind_param("iis", $id_evento, $id_usuario, $comentario);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function obtenerPorEvento($id_evento)
    {
        $stmt = $this->db->prepare("
            SELECT c.*, u.nombre AS usuario 
            FROM comentarios_evento c
            JOIN usuarios u ON c.id_usuario = u.id
            WHERE c.id_evento = ?
            ORDER BY c.fecha DESC
        ");
        if (!$stmt) return [];
        $stmt->bind_param("i", $id_evento);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $comentarios = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $comentarios;
    }
}
<?php
require_once __DIR__ . '/../config/config.php';
class ComentarioEvento
{
    private $db;

    public function __construct()
    {
        $this->db = conectar();
    }

    public function agregar($id_evento, $id_usuario, $comentario)
    {
        $stmt = $this->db->prepare("INSERT INTO comentarios_evento (id_evento, id_usuario, comentario) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $id_evento, $id_usuario, $comentario);
        $stmt->execute();
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
        $stmt->bind_param("i", $id_evento);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
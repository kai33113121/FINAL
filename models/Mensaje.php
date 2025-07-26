<?php
require_once __DIR__ . '/../config/config.php';
class Mensaje
{
    private $db;

    public function __construct()
    {
        $this->db = conectar();
    }

    public function enviar($emisor_id, $receptor_id, $mensaje)
    {
        $sql = "INSERT INTO mensajes (emisor_id, receptor_id, mensaje) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iis", $emisor_id, $receptor_id, $mensaje);
        $stmt->execute();
    }

    public function obtenerConversacion($usuario1, $usuario2)
    {
        $sql = "SELECT * FROM mensajes 
                WHERE (emisor_id = ? AND receptor_id = ?) 
                   OR (emisor_id = ? AND receptor_id = ?)
                ORDER BY fecha_envio ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iiii", $usuario1, $usuario2, $usuario2, $usuario1);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerUsuariosConConversaciones($usuario_id)
    {
        $sql = "SELECT DISTINCT u.id, u.nombre, u.foto
            FROM mensajes m
            JOIN usuarios u ON (
                (m.emisor_id = ? AND u.id = m.receptor_id) OR
                (m.receptor_id = ? AND u.id = m.emisor_id)
            )
            WHERE m.emisor_id = ? OR m.receptor_id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iiii", $usuario_id, $usuario_id, $usuario_id, $usuario_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function obtenerUltimoMensaje($usuario_id, $otro_id)
    {
        $sql = "SELECT mensaje FROM mensajes 
            WHERE (emisor_id = ? AND receptor_id = ?) 
               OR (emisor_id = ? AND receptor_id = ?) 
            ORDER BY fecha_envio DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iiii", $usuario_id, $otro_id, $otro_id, $usuario_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        return $fila ? $fila['mensaje'] : null;
    }
    public function contarNoLeidos($usuario_id, $otro_id)
    {
        $sql = "SELECT COUNT(*) AS total FROM mensajes 
            WHERE receptor_id = ? AND emisor_id = ? AND leido = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $usuario_id, $otro_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        return $fila['total'] ?? 0;
    }
}
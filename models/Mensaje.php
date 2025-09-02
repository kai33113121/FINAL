<?php
require_once __DIR__ . '/../config/config.php';
class Mensaje
{
    private $db;

    public function __construct()
    {
        $this->db = conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function enviar($emisor_id, $receptor_id, $mensaje)
    {
        $sql = "INSERT INTO mensajes (emisor_id, receptor_id, mensaje) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("iis", $emisor_id, $receptor_id, $mensaje);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function obtenerConversacion($usuario1, $usuario2)
    {
        $sql = "SELECT * FROM mensajes 
                WHERE (emisor_id = ? AND receptor_id = ?) 
                   OR (emisor_id = ? AND receptor_id = ?)
                ORDER BY fecha_envio ASC";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return [];
        $stmt->bind_param("iiii", $usuario1, $usuario2, $usuario2, $usuario1);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $mensajes = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $mensajes;
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
        if (!$stmt) return [];
        $stmt->bind_param("iiii", $usuario_id, $usuario_id, $usuario_id, $usuario_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuarios = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $usuarios;
    }

    public function obtenerUltimoMensaje($usuario_id, $otro_id)
    {
        $sql = "SELECT mensaje FROM mensajes 
            WHERE (emisor_id = ? AND receptor_id = ?) 
               OR (emisor_id = ? AND receptor_id = ?) 
            ORDER BY fecha_envio DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return null;
        $stmt->bind_param("iiii", $usuario_id, $otro_id, $otro_id, $usuario_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado ? $resultado->fetch_assoc() : null;
        $stmt->close();
        return $fila ? $fila['mensaje'] : null;
    }

    public function contarNoLeidos($usuario_id, $otro_id)
    {
        $sql = "SELECT COUNT(*) AS total FROM mensajes 
            WHERE receptor_id = ? AND emisor_id = ? AND leido = 0";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return 0;
        $stmt->bind_param("ii", $usuario_id, $otro_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado ? $resultado->fetch_assoc() : null;
        $stmt->close();
        return $fila ? $fila['total'] : 0;
    }
}
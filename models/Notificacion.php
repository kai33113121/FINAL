<?php
require_once __DIR__ . '/../config/config.php';

class Notificacion {
    private $db;

    public function __construct() {
        $this->db = conectar();
    }

    public function obtenerPorUsuario($usuarioId) {
        $sql = "SELECT mensaje, link, fecha FROM notificaciones WHERE usuario_id = ? ORDER BY fecha DESC LIMIT 10";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute();
        $result = $stmt->get_result();

        $notificaciones = [];
        while ($row = $result->fetch_assoc()) {
            $notificaciones[] = $row;
        }

        return $notificaciones;
    }
    public function insertar($usuarioId, $mensaje, $link = '', $tipo = 'info') {
    $sql = "INSERT INTO notificaciones (usuario_id, mensaje, link, tipo, fecha) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $this->db->prepare($sql);

    if (!$stmt) {
        die("❌ Error en prepare(): " . $this->db->error);
    }

    $stmt->bind_param("isss", $usuarioId, $mensaje, $link, $tipo);
    return $stmt->execute();
}
}
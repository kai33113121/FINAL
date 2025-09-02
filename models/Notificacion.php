<?php
require_once __DIR__ . '/../config/config.php';

class Notificacion {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
        if (!$this->conexion) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function obtenerPorUsuario($usuario_id) {
        $stmt = $this->conexion->prepare("SELECT id, mensaje, link, fecha FROM notificaciones WHERE usuario_id = ? ORDER BY fecha DESC");
        if (!$stmt) return [];
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $notificaciones = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                // Asegura que los campos sean los que espera el layout
                $notificaciones[] = [
                    'mensaje' => $row['mensaje'],
                    'link' => $row['link'] ?? 'index.php?c=IntercambioController&a=notificaciones',
                    'fecha' => isset($row['fecha']) ? date('d/m/Y H:i', strtotime($row['fecha'])) : ''
                ];
            }
            $result->free();
        }
        $stmt->close();
        return $notificaciones;
    }

    public function crear($usuario_id, $mensaje, $link = null) {
        $stmt = $this->conexion->prepare("INSERT INTO notificaciones (usuario_id, mensaje, link) VALUES (?, ?, ?)");
        if (!$stmt) return false;
        $stmt->bind_param("iss", $usuario_id, $mensaje, $link);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
        
    }
}
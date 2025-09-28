<?php
require_once __DIR__ . '/../config/config.php';

class Notificacion
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = conectar();
        if (!$this->conexion) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }
            while ($row = $result->fetch_assoc()) {
                $notificaciones[] = [
                    'id'      => $row['id'],
                    'mensaje' => $row['mensaje'],
                    'link'    => $row['link'],
                    'intercambio_id' => $row['intercambio_id'],
                    'fecha'   => isset($row['fecha']) ? date('d/m/Y H:i', strtotime($row['fecha'])) : '',
                    'leida'   => $row['leida']
                ];
            }
            $result->free();
        }
        $stmt->close();
        return $notificaciones;
    }

    // Marcar una notificación como leída
    public function marcarComoLeida($notificacion_id, $usuario_id)
    {
        $stmt = $this->conexion->prepare("UPDATE notificaciones SET leida = 1 WHERE id = ? AND usuario_id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("ii", $notificacion_id, $usuario_id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function crear($usuario_id, $mensaje, $link = null, $intercambio_id = null)
    {
        $stmt = $this->conexion->prepare("INSERT INTO notificaciones (usuario_id, mensaje, link, intercambio_id) VALUES (?, ?, ?, ?)");
        if (!$stmt) return false;
        $stmt->bind_param("issi", $usuario_id, $mensaje, $link, $intercambio_id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }
}

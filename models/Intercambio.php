<?php
require_once __DIR__ . '/../config/config.php';

class Intercambio
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = conectar();
        if (!$this->conexion) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function solicitar($libro_id_1, $libro_id_2, $usuario_1, $usuario_2) {
        // Validar que usuario_2 sea válido
        if (empty($usuario_2) || intval($usuario_2) <= 0) {
            throw new Exception("❌ El usuario destino del intercambio no es válido.");
        }

        $stmt = $this->conexion->prepare("INSERT INTO intercambios (libro_id_1, libro_id_2, usuario_1, usuario_2, estado) VALUES (?, ?, ?, ?, 'pendiente')");
        if (!$stmt) return false;
        $stmt->bind_param("iiii", $libro_id_1, $libro_id_2, $usuario_1, $usuario_2);
        $exito = $stmt->execute();
        $stmt->close();

        if ($exito) {
            require_once __DIR__ . '/Notificacion.php';
            $notificacion = new Notificacion();
            $mensaje = "Tienes una nueva solicitud de intercambio.";
            $link = "index.php?c=IntercambioController&a=notificaciones";
            $notificacion->crear($usuario_2, $mensaje, $link);
        }
        return $exito;
    }

    public function obtenerPorUsuario($usuario_id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM intercambios WHERE usuario_1 = ? OR usuario_2 = ?");
        if (!$stmt) return [];
        $stmt->bind_param("ii", $usuario_id, $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $intercambios = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $intercambios;
    }

    public function obtenerDetallado($usuario_id) {
        $sql = "SELECT i.*, 
                       l1.titulo AS libro_ofrecido, 
                       l2.titulo AS libro_solicitado,
                       u1.nombre AS nombre_ofrece,
                       u2.nombre AS nombre_recibe
                FROM intercambios i
                JOIN libros l1 ON i.libro_id_1 = l1.id
                JOIN libros l2 ON i.libro_id_2 = l2.id
                JOIN usuarios u1 ON i.usuario_1 = u1.id
                JOIN usuarios u2 ON i.usuario_2 = u2.id
                WHERE i.usuario_1 = ? OR i.usuario_2 = ?";
        $stmt = $this->conexion->prepare($sql);
        if (!$stmt) return [];
        $stmt->bind_param("ii", $usuario_id, $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $detallado = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $detallado;
    }

    public function obtenerTodosDetallado() {
        $sql = "SELECT i.*, 
                       l1.titulo AS libro_ofrecido, 
                       l2.titulo AS libro_solicitado,
                       u1.nombre AS nombre_ofrece,
                       u2.nombre AS nombre_recibe
                FROM intercambios i
                JOIN libros l1 ON i.libro_id_1 = l1.id
                JOIN libros l2 ON i.libro_id_2 = l2.id
                JOIN usuarios u1 ON i.usuario_1 = u1.id
                JOIN usuarios u2 ON i.usuario_2 = u2.id";
        $resultado = $this->conexion->query($sql);
        return $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM intercambios WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function contarIntercambios() {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM intercambios");
        if (!$stmt) return 0;
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result ? $result->fetch_row() : [0];
        $stmt->close();
        return $row[0];
    }

    public function contarPorEstado() {
        $stmt = $this->conexion->prepare("SELECT estado, COUNT(*) as total FROM intercambios GROUP BY estado");
        if (!$stmt) return [];
        $stmt->execute();
        $result = $stmt->get_result();
        $resultados = [];
        while ($row = $result->fetch_assoc()) {
            $resultados[$row['estado']] = $row['total'];
        }
        $stmt->close();
        return $resultados;
    }

    public function obtenerPendientes($usuario_id) {
        $stmt = $this->conexion->prepare("SELECT * FROM intercambios WHERE usuario_2 = ? AND estado = 'pendiente'");
        if (!$stmt) return [];
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $pendientes = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $pendientes;
    }

    public function actualizarEstado($intercambio_id, $accion) {
        $estado = ($accion == 'aceptar') ? 'aceptado' : 'rechazado';
        $stmt = $this->conexion->prepare("UPDATE intercambios SET estado = ? WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("si", $estado, $intercambio_id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }
}
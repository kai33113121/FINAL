<?php
require_once __DIR__ . '/../config/config.php';

class Compra
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = conectar();
        if (!$this->conexion) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function crearCompraPendiente($id_usuario, $total, $carrito) {
        // Insertar compra principal
        $stmt = $this->conexion->prepare("INSERT INTO compras (id_usuario, total, estado) VALUES (?, ?, 'pendiente')");
        if (!$stmt) return false;
        $stmt->bind_param("id", $id_usuario, $total);
        $exito = $stmt->execute();
        $compra_id = $exito ? $this->conexion->insert_id : false;
        
        if ($compra_id) {
            // Insertar detalles
            foreach ($carrito as $item) {
                $stmt = $this->conexion->prepare("INSERT INTO detalle_compras (compra_id, libro_id, cantidad, precio) VALUES (?, ?, ?, ?)");
                if (!$stmt) continue;
                $stmt->bind_param("iiid", $compra_id, $item['id'], $item['cantidad'], $item['precio']);
                $stmt->execute();
                $stmt->close();
            }
        }
        
        return $compra_id;
    }
    public function obtenerConDetalles() {
    $sql = "SELECT c.*, 
                   GROUP_CONCAT(l.titulo SEPARATOR ', ') as libros_comprados,
                   COUNT(dc.id) as total_libros,
                   u.nombre as nombre_usuario
            FROM compras c 
            LEFT JOIN detalle_compras dc ON c.id = dc.compra_id
            LEFT JOIN libros l ON dc.libro_id = l.id
            LEFT JOIN usuarios u ON c.id_usuario = u.id
            WHERE c.estado = 'completado'
            GROUP BY c.id
            ORDER BY c.fecha_compra DESC";
    
    $resultado = $this->conexion->query($sql);
    return $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
}

    public function actualizarSessionId($compra_id, $session_id) {
        $stmt = $this->conexion->prepare("UPDATE compras SET stripe_session_id = ? WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("si", $session_id, $compra_id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function completarCompra($session_id, $payment_intent_id) {
        $stmt = $this->conexion->prepare("UPDATE compras SET estado = 'completado', stripe_payment_intent_id = ? WHERE stripe_session_id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("ss", $payment_intent_id, $session_id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function obtenerPorUsuario($id_usuario) {
        $stmt = $this->conexion->prepare("SELECT * FROM compras WHERE id_usuario = ? ORDER BY fecha_compra DESC");
        if (!$stmt) return [];
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $compras = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $compras;
    }

    public function obtenerDetallado($id_usuario) {
        $sql = "SELECT c.*, 
                       GROUP_CONCAT(l.titulo SEPARATOR ', ') as libros_comprados,
                       COUNT(dc.id) as total_libros
                FROM compras c 
                LEFT JOIN detalle_compras dc ON c.id = dc.compra_id
                LEFT JOIN libros l ON dc.libro_id = l.id
                WHERE c.id_usuario = ?
                GROUP BY c.id
                ORDER BY c.fecha_compra DESC";
        
        $stmt = $this->conexion->prepare($sql);
        if (!$stmt) return [];
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $compras = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $compras;
    }

    public function obtenerDetalleCompra($compra_id) {
        $sql = "SELECT dc.*, l.titulo, l.autor, l.imagen 
                FROM detalle_compras dc
                JOIN libros l ON dc.libro_id = l.id
                WHERE dc.compra_id = ?";
        
        $stmt = $this->conexion->prepare($sql);
        if (!$stmt) return [];
        $stmt->bind_param("i", $compra_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $detalles = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $detalles;
    }

    public function contarCompras() {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM compras");
        if (!$stmt) return 0;
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result ? $result->fetch_row() : [0];
        $stmt->close();
        return $row[0];
    }

    public function contarPorEstado() {
        $stmt = $this->conexion->prepare("SELECT estado, COUNT(*) as total FROM compras GROUP BY estado");
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

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM compras WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }
}
?>
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
    $stmt = $this->conexion->prepare("INSERT INTO compras (usuario_id, total, estado) VALUES (?, ?, 'pendiente')");
    if (!$stmt) return false;
    $stmt->bind_param("id", $id_usuario, $total);
    $exito = $stmt->execute();
    $compra_id = $exito ? $this->conexion->insert_id : false;
    $stmt->close();
    if ($compra_id) {
        foreach ($carrito as $item) {
            $tabla_origen = 'libros';
            $check_stmt = $this->conexion->prepare("SELECT id FROM libros WHERE id = ?");
            $check_stmt->bind_param("i", $item['id']);
            $check_stmt->execute();
            $result = $check_stmt->get_result();
            if (!$result->fetch_assoc()) {
                $tabla_origen = 'libros_venta';
            }
            $check_stmt->close();
            if ($tabla_origen === 'libros') {
                $libro_stmt = $this->conexion->prepare("SELECT titulo, autor, imagen, genero FROM libros WHERE id = ?");
            } else {
                $libro_stmt = $this->conexion->prepare("SELECT titulo, autor, imagen, genero FROM libros_venta WHERE id = ?");
            }
            $libro_stmt->bind_param("i", $item['id']);
            $libro_stmt->execute();
            $libro_result = $libro_stmt->get_result();
            $libro_data = $libro_result->fetch_assoc();
            $libro_stmt->close();
            $titulo = $libro_data['titulo'] ?? ($item['titulo'] ?? 'Título no disponible');
            $autor = $libro_data['autor'] ?? ($item['autor'] ?? 'Autor desconocido');
            $imagen = $libro_data['imagen'] ?? ($item['imagen'] ?? 'default.jpg');
            $genero = $libro_data['genero'] ?? ($item['genero'] ?? 'Sin género');
            $stmt = $this->conexion->prepare("INSERT INTO detalle_compras (compra_id, libro_id, cantidad, precio, tabla_origen, titulo, autor, imagen, genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iiidsssss", $compra_id, $item['id'], $item['cantidad'], $item['precio'], $tabla_origen, $titulo, $autor, $imagen, $genero);
            $stmt->execute();
            $stmt->close();
        }
    }
    return $compra_id;
}
    public function obtenerConDetalles() {
        try {
            $sql = "SELECT c.*, 
                           GROUP_CONCAT(
                               CASE 
                                   WHEN dc.tabla_origen = 'libros' THEN l.titulo
                                   ELSE lv.titulo 
                               END SEPARATOR ', ') as libros_comprados,
                           COUNT(dc.id) as total_libros,
                           u.nombre as nombre_usuario
                    FROM compras c 
                    LEFT JOIN detalle_compras dc ON c.id = dc.compra_id
                    LEFT JOIN libros l ON dc.libro_id = l.id AND dc.tabla_origen = 'libros'
                    LEFT JOIN libros_venta lv ON dc.libro_id = lv.id AND dc.tabla_origen = 'libros_venta'
                    LEFT JOIN usuarios u ON c.usuario_id = u.id
                    WHERE c.estado = 'completado'
                    GROUP BY c.id
                    ORDER BY c.fecha DESC";
            $resultado = $this->conexion->query($sql);
            if (!$resultado) {
                error_log("Error en obtenerConDetalles(): " . $this->conexion->error);
                return [];
            }
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            error_log("Excepción en obtenerConDetalles(): " . $e->getMessage());
            return [];
        }
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
        $stmt = $this->conexion->prepare("SELECT * FROM compras WHERE usuario_id = ? ORDER BY fecha DESC");
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
                       GROUP_CONCAT(
                           CASE 
                               WHEN dc.tabla_origen = 'libros' THEN l.titulo
                               WHEN dc.tabla_origen = 'libros_venta' THEN lv.titulo
                               ELSE 'Producto'
                           END SEPARATOR ', ') as libros_comprados,
                       COUNT(dc.id) as total_libros
                FROM compras c 
                LEFT JOIN detalle_compras dc ON c.id = dc.compra_id
                LEFT JOIN libros l ON dc.libro_id = l.id AND dc.tabla_origen = 'libros'
                LEFT JOIN libros_venta lv ON dc.libro_id = lv.id AND dc.tabla_origen = 'libros_venta'
                WHERE c.usuario_id = ?
                GROUP BY c.id
                ORDER BY c.fecha DESC";
        $stmt = $this->conexion->prepare($sql);
        if (!$stmt) return [];
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $compras = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $compras;
    }
public function obtenerComprasParaAdmin() {
    try {
        $sql = "SELECT c.id, 
                       c.usuario_id,
                       c.fecha,
                       c.total,
                       c.estado,
                       u.nombre as usuario,
                       GROUP_CONCAT(
                           COALESCE(dc.titulo, 'Producto no disponible') 
                           SEPARATOR ', '
                       ) as libro,
                       COUNT(dc.id) as total_libros
                FROM compras c 
                LEFT JOIN detalle_compras dc ON c.id = dc.compra_id
                LEFT JOIN usuarios u ON c.usuario_id = u.id
                WHERE c.estado IN ('completado', 'pendiente')
                GROUP BY c.id, c.usuario_id, c.fecha, c.total, c.estado, u.nombre
                ORDER BY c.fecha DESC";
        $resultado = $this->conexion->query($sql);
        if (!$resultado) {
            error_log("Error en obtenerComprasParaAdmin(): " . $this->conexion->error);
            return [];
        }
        return $resultado->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
        error_log("Excepción en obtenerComprasParaAdmin(): " . $e->getMessage());
        return [];
    }
}
    public function obtenerCompraPorId($compra_id, $usuario_id) {
        $stmt = $this->conexion->prepare("
            SELECT * FROM compras 
            WHERE id = ? AND usuario_id = ?
        ");
        if (!$stmt) return null;
        $stmt->bind_param("ii", $compra_id, $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $compra = $result->fetch_assoc();
        $stmt->close();
        return $compra;
    }
   public function obtenerDetalleCompraCompleto($compra_id) {
    $stmt = $this->conexion->prepare("
        SELECT 
            dc.*,
            COALESCE(l.titulo, lv.titulo, 
                CASE 
                    WHEN dc.precio = 22000.00 THEN 'Los Crímenes de la Calle Morgue'
                    WHEN dc.precio = 30000.00 THEN 'Dune'
                    ELSE CONCAT('Producto (ID: ', dc.libro_id, ')')
                END
            ) as titulo,
            COALESCE(l.autor, lv.autor, 
                CASE 
                    WHEN dc.precio = 22000.00 THEN 'Edgar Allan Poe'
                    WHEN dc.precio = 30000.00 THEN 'Frank Herbert'
                    ELSE 'Autor no disponible'
                END
            ) as autor,
            COALESCE(l.imagen, lv.imagen, 'default.jpg') as imagen,
            COALESCE(l.genero, lv.genero, 'Varios') as genero,
            COALESCE(l.descripcion, lv.descripcion, 'Libro ya no disponible en el catálogo') as descripcion
        FROM detalle_compras dc
        LEFT JOIN libros l ON dc.libro_id = l.id
        LEFT JOIN libros_venta lv ON dc.libro_id = lv.id
        WHERE dc.compra_id = ?
        ORDER BY dc.id ASC
    ");
    if (!$stmt) return [];
    $stmt->bind_param("i", $compra_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $detalles = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $detalles;
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
    public function __destruct() {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }
}
?>
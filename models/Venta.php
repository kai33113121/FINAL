<?php
require_once __DIR__ . '/../config/config.php';
class Venta
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = conectar();
    }
    public function contarVentas()
    {
        try {
            $stmt1 = $this->conexion->query("SELECT COUNT(*) as total FROM libros_venta");
            $usuarios = $stmt1->fetch_assoc()['total'] ?? 0;
            $stmt2 = $this->conexion->query("SELECT COUNT(*) as total FROM libros WHERE tipo_catalogo = 'oficial' AND modo = 'venta'");
            $oficiales = $stmt2->fetch_assoc()['total'] ?? 0;
            return $usuarios + $oficiales;
        } catch (Exception $e) {
            return 0;
        }
    }
    public function obtenerTodosCompleto()
    {
        try {
            $libros = [];
            $stmt1 = $this->conexion->query("
                SELECT 
                    lv.*,
                    u.nombre as nombre_usuario,
                    'libros_venta' as tabla_origen
                FROM libros_venta lv
                LEFT JOIN usuarios u ON lv.id_usuario = u.id
                ORDER BY lv.fecha_publicacion DESC
            ");
            while ($libro = $stmt1->fetch_assoc()) {
                $libros[] = $libro;
            }
            $stmt2 = $this->conexion->query("
                SELECT 
                    l.*,
                    'Admin' as nombre_usuario,
                    l.id as fecha_publicacion,
                    'libros' as tabla_origen
                FROM libros l
                WHERE l.tipo_catalogo = 'oficial' AND l.modo = 'venta'
                ORDER BY l.id DESC
            ");
            while ($libro = $stmt2->fetch_assoc()) {
                $libros[] = $libro;
            }
            return $libros;
        } catch (Exception $e) {
            error_log("Error en obtenerTodosCompleto: " . $e->getMessage());
            return [];
        }
    }
    public function obtenerPorIdAdmin($id)
    {
        try {
            $stmt = $this->conexion->prepare("
                SELECT 
                    lv.*,
                    u.nombre as nombre_usuario,
                    'libros_venta' as tabla_origen
                FROM libros_venta lv
                LEFT JOIN usuarios u ON lv.id_usuario = u.id
                WHERE lv.id = ?
            ");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $libro = $result->fetch_assoc();
            if ($libro) {
                return $libro;
            }
            $stmt2 = $this->conexion->prepare("
                SELECT 
                    l.*,
                    'Admin' as nombre_usuario,
                    'libros' as tabla_origen
                FROM libros l
                WHERE l.id = ? AND l.tipo_catalogo = 'oficial' AND l.modo = 'venta'
            ");
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            return $result2->fetch_assoc();
        } catch (Exception $e) {
            error_log("Error en obtenerPorIdAdmin: " . $e->getMessage());
            return false;
        }
    }
    public function contarLibrosUsuarios() {
    $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM libros_venta");
    if (!$stmt) return 0;
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result ? $result->fetch_row() : [0];
    $stmt->close();
    return $row[0];
}
    public function actualizarAdmin($id, $titulo, $autor, $descripcion, $precio, $estado, $imagen = null)
    {
        try {
            $libro = $this->obtenerPorIdAdmin($id);
            if (!$libro) return false;
            if ($libro['tabla_origen'] === 'libros_venta') {
                if ($imagen) {
                    $stmt = $this->conexion->prepare("
                        UPDATE libros_venta 
                        SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ?, imagen = ?
                        WHERE id = ?
                    ");
                    $stmt->bind_param("sssdssi", $titulo, $autor, $descripcion, $precio, $estado, $imagen, $id);
                } else {
                    $stmt = $this->conexion->prepare("
                        UPDATE libros_venta 
                        SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ?
                        WHERE id = ?
                    ");
                    $stmt->bind_param("sssdsi", $titulo, $autor, $descripcion, $precio, $estado, $id);
                }
                $stmt->execute();
            } else {
                if ($imagen) {
                    $stmt = $this->conexion->prepare("
                        UPDATE libros 
                        SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ?, imagen = ?
                        WHERE id = ? AND tipo_catalogo = 'oficial'
                    ");
                    $stmt->bind_param("sssdssi", $titulo, $autor, $descripcion, $precio, $estado, $imagen, $id);
                } else {
                    $stmt = $this->conexion->prepare("
                        UPDATE libros 
                        SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ?
                        WHERE id = ? AND tipo_catalogo = 'oficial'
                    ");
                    $stmt->bind_param("sssdsi", $titulo, $autor, $descripcion, $precio, $estado, $id);
                }
                $stmt->execute();
            }
            return true;
        } catch (Exception $e) {
            error_log("Error en actualizarAdmin: " . $e->getMessage());
            return false;
        }
    }
    public function eliminarPorId($id)
    {
        try {
            $libro = $this->obtenerPorIdAdmin($id);
            if (!$libro) return false;
            if ($libro['tabla_origen'] === 'libros_venta') {
                $stmt = $this->conexion->prepare("DELETE FROM libros_venta WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
            } else {
                $stmt = $this->conexion->prepare("DELETE FROM libros WHERE id = ? AND tipo_catalogo = 'oficial'");
                $stmt->bind_param("i", $id);
                $stmt->execute();
            }
            return true;
        } catch (Exception $e) {
            error_log("Error en eliminarPorId: " . $e->getMessage());
            return false;
        }
    }
    public function obtenerLibrosUsuarios()
{
    try {
        $libros = [];
        $stmt = $this->conexion->query("
            SELECT 
                lv.*,
                u.nombre as nombre_usuario
            FROM libros_venta lv
            LEFT JOIN usuarios u ON lv.id_usuario = u.id
            ORDER BY lv.fecha_publicacion DESC
        ");
        while ($libro = $stmt->fetch_assoc()) {
            $libros[] = $libro;
        }
        return $libros;
    } catch (Exception $e) {
        return [];
    }
}
public function crear($id_usuario, $titulo, $autor, $descripcion, $genero, $precio, $estado, $imagen)
{
    try {
        $stmt = $this->conexion->prepare("
            INSERT INTO libros_venta (id_usuario, titulo, autor, genero, descripcion, precio, estado, imagen, fecha_publicacion, modo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), 'venta')
        ");
        $stmt->bind_param("issssdss", $id_usuario, $titulo, $autor, $genero, $descripcion, $precio, $estado, $imagen);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    } catch (Exception $e) {
        error_log("Error en crear venta: " . $e->getMessage());
        return false;
    }
}
public function obtenerPorUsuario($id_usuario)
{
    try {
        $libros = [];
        $stmt = $this->conexion->prepare("
            SELECT * FROM libros_venta 
            WHERE id_usuario = ? 
            ORDER BY fecha_publicacion DESC
        ");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($libro = $result->fetch_assoc()) {
            $libros[] = $libro;
        }
        $stmt->close();
        return $libros;
    } catch (Exception $e) {
        error_log("Error en obtenerPorUsuario: " . $e->getMessage());
        return [];
    }
}
public function obtenerPorId($id)
{
    try {
        $stmt = $this->conexion->prepare("
            SELECT lv.*, u.nombre as nombre_usuario
            FROM libros_venta lv
            LEFT JOIN usuarios u ON lv.id_usuario = u.id
            WHERE lv.id = ?
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libro = $result->fetch_assoc();
        $stmt->close();
        return $libro;
    } catch (Exception $e) {
        error_log("Error en obtenerPorId: " . $e->getMessage());
        return false;
    }
}
public function actualizar($id, $id_usuario, $titulo, $autor, $genero, $descripcion, $precio, $estado, $imagen)
{
    try {
        $stmt = $this->conexion->prepare("
            UPDATE libros_venta 
            SET titulo = ?, autor = ?, genero = ?, descripcion = ?, precio = ?, estado = ?, imagen = ?
            WHERE id = ? AND id_usuario = ?
        ");
        $stmt->bind_param("ssssdssii", $titulo, $autor, $genero, $descripcion, $precio, $estado, $imagen, $id, $id_usuario);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    } catch (Exception $e) {
        error_log("Error en actualizar venta: " . $e->getMessage());
        return false;
    }
}
    public function obtenerLibrosOficiales()
    {
        try {
            $libros = [];
            $stmt = $this->conexion->query("
                SELECT * FROM libros 
                WHERE tipo_catalogo = 'oficial' AND modo = 'venta'
                ORDER BY id DESC
            ");
            while ($libro = $stmt->fetch_assoc()) {
                $libros[] = $libro;
            }
            return $libros;
        } catch (Exception $e) {
            return [];
        }
    }
}
?>
<?php
require_once __DIR__ . '/../config/config.php';
class Inventario {
    private $db;
    public function __construct() {
        $this->db = conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos");
        }
    }
    public function obtenerTodos() {
        try {
            $sql = "SELECT 
                        id,
                        isbn,
                        titulo,
                        autor,
                        genero,
                        precio_compra,
                        precio_venta,
                        stock_actual,
                        stock_minimo,
                        descripcion,
                        imagen,
                        fecha_ingreso,
                        activo,
                        CASE 
                            WHEN stock_actual <= stock_minimo THEN 'Bajo'
                            WHEN stock_actual > stock_minimo * 2 THEN 'Alto'
                            ELSE 'Normal'
                        END as nivel_stock
                    FROM inventario_oficial
                    WHERE activo = 1
                    ORDER BY fecha_ingreso DESC";
            if ($this->db instanceof PDO) {
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $result = $this->db->query($sql);
                return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
            }
        } catch (Exception $e) {
            error_log("Error al obtener inventario: " . $e->getMessage());
            return [];
        }
    }
    public function obtenerPorId($id) {
        try {
            $sql = "SELECT * FROM inventario_oficial WHERE id = ? AND activo = 1";
            
            if ($this->db instanceof PDO) {
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $item = $result ? $result->fetch_assoc() : false;
                $stmt->close();
                return $item;
            }
        } catch (Exception $e) {
            error_log("Error al obtener item de inventario: " . $e->getMessage());
            return false;
        }
    }
    public function crear($datos) {
        try {
            $sql = "INSERT INTO inventario_oficial (isbn, titulo, autor, genero, precio_compra, precio_venta, stock_actual, stock_minimo, descripcion, imagen) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            if ($this->db instanceof PDO) {
                $stmt = $this->db->prepare($sql);
                return $stmt->execute([
                    $datos['isbn'] ?? '',
                    $datos['titulo'],
                    $datos['autor'],
                    $datos['genero'],
                    $datos['precio_compra'],
                    $datos['precio_venta'],
                    $datos['stock_actual'],
                    $datos['stock_minimo'],
                    $datos['descripcion'] ?? '',
                    $datos['imagen'] ?? 'default.jpg'
                ]);
            } else {
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("ssssddiiis", 
                    $datos['isbn'],
                    $datos['titulo'],
                    $datos['autor'],
                    $datos['genero'],
                    $datos['precio_compra'],
                    $datos['precio_venta'],
                    $datos['stock_actual'],
                    $datos['stock_minimo'],
                    $datos['descripcion'],
                    $datos['imagen']
                );
                $resultado = $stmt->execute();
                $stmt->close();
                return $resultado;
            }
        } catch (Exception $e) {
            error_log("Error al crear item de inventario: " . $e->getMessage());
            return false;
        }
    }
    public function actualizar($id, $datos) {
        try {
            $sql = "UPDATE inventario_oficial SET 
                        isbn = ?, titulo = ?, autor = ?, genero = ?, 
                        precio_compra = ?, precio_venta = ?, stock_actual = ?, 
                        stock_minimo = ?, descripcion = ?, imagen = ?
                    WHERE id = ?";
            if ($this->db instanceof PDO) {
                $stmt = $this->db->prepare($sql);
                return $stmt->execute([
                    $datos['isbn'] ?? '',
                    $datos['titulo'],
                    $datos['autor'],
                    $datos['genero'],
                    $datos['precio_compra'],
                    $datos['precio_venta'],
                    $datos['stock_actual'],
                    $datos['stock_minimo'],
                    $datos['descripcion'] ?? '',
                    $datos['imagen'] ?? 'default.jpg',
                    $id
                ]);
            } else {
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("ssssddiiisi", 
                    $datos['isbn'],
                    $datos['titulo'],
                    $datos['autor'],
                    $datos['genero'],
                    $datos['precio_compra'],
                    $datos['precio_venta'],
                    $datos['stock_actual'],
                    $datos['stock_minimo'],
                    $datos['descripcion'],
                    $datos['imagen'],
                    $id
                );
                $resultado = $stmt->execute();
                $stmt->close();
                return $resultado;
            }
        } catch (Exception $e) {
            error_log("Error al actualizar item de inventario: " . $e->getMessage());
            return false;
        }
    }
    public function eliminar($id) {
        try {
            $sql = "UPDATE inventario_oficial SET activo = 0 WHERE id = ?";
            if ($this->db instanceof PDO) {
                $stmt = $this->db->prepare($sql);
                return $stmt->execute([$id]);
            } else {
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("i", $id);
                $resultado = $stmt->execute();
                $stmt->close();
                return $resultado;
            }
        } catch (Exception $e) {
            error_log("Error al eliminar item de inventario: " . $e->getMessage());
            return false;
        }
    }
    public function actualizarStock($id, $nuevoStock) {
        try {
            $sql = "UPDATE inventario_oficial SET stock_actual = ? WHERE id = ?";
            if ($this->db instanceof PDO) {
                $stmt = $this->db->prepare($sql);
                return $stmt->execute([$nuevoStock, $id]);
            } else {
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("ii", $nuevoStock, $id);
                $resultado = $stmt->execute();
                $stmt->close();
                return $resultado;
            }
        } catch (Exception $e) {
            error_log("Error al actualizar stock: " . $e->getMessage());
            return false;
        }
    }
    public function obtenerBajoStock() {
        try {
            $sql = "SELECT * FROM inventario_oficial 
                    WHERE stock_actual <= stock_minimo AND activo = 1
                    ORDER BY stock_actual ASC";
            if ($this->db instanceof PDO) {
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $result = $this->db->query($sql);
                return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
            }
        } catch (Exception $e) {
            error_log("Error al obtener items con bajo stock: " . $e->getMessage());
            return [];
        }
    }
}
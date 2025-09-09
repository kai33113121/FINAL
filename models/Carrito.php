<?php
require_once __DIR__ . '/../config/config.php';

class Carrito {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
        if (!$this->conexion) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function agregar($usuario_id, $libro_id) {
        $stmt = $this->conexion->prepare("INSERT INTO carrito (usuario_id, libro_id) VALUES (?, ?)");
        if (!$stmt) return false;
        $stmt->bind_param("ii", $usuario_id, $libro_id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function obtener($usuario_id) {
    $sql = "SELECT c.*, l.titulo, l.autor, l.precio 
            FROM carrito c 
            JOIN libros l ON c.libro_id = l.id 
            WHERE c.usuario_id = ?";
    $stmt = $this->conexion->prepare($sql);
    if (!$stmt) return [];
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    $stmt->close();
    return $items;
}

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM carrito WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function confirmarCompra($usuario_id) {
        $items = $this->obtener($usuario_id);
        $exito = true;
        foreach ($items as $item) {
            $stmt = $this->conexion->prepare("INSERT INTO compras (usuario_id, libro_id) VALUES (?, ?)");
            if (!$stmt) {
                $exito = false;
                continue;
            }
            $stmt->bind_param("ii", $usuario_id, $item['libro_id']);
            if (!$stmt->execute()) {
                $exito = false;
            }
            $stmt->close();
        }
        $stmt = $this->conexion->prepare("DELETE FROM carrito WHERE usuario_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $usuario_id);
            if (!$stmt->execute()) {
                $exito = false;
            }
            $stmt->close();
        } else {
            $exito = false;
        }
        return $exito;
    }

    public function obtenerCompras() {
        $sql = "SELECT c.*, u.nombre AS nombre_usuario, l.titulo AS titulo_libro
                FROM compras c
                JOIN usuarios u ON c.usuario_id = u.id
                JOIN libros l ON c.libro_id = l.id";
        $resultado = $this->conexion->query($sql);
        return $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
    }
}
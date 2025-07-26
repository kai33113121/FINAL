<?php
require_once __DIR__ . '/../config/config.php';

class Carrito {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function agregar($usuario_id, $libro_id) {
        $stmt = $this->conexion->prepare("INSERT INTO carrito (usuario_id, libro_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $usuario_id, $libro_id);
        return $stmt->execute();
    }

    public function obtener($usuario_id) {
        $sql = "SELECT c.*, l.titulo, l.autor FROM carrito c JOIN libros l ON c.libro_id = l.id WHERE c.usuario_id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM carrito WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function confirmarCompra($usuario_id) {
        $items = $this->obtener($usuario_id);
        foreach ($items as $item) {
            $stmt = $this->conexion->prepare("INSERT INTO compras (usuario_id, libro_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $usuario_id, $item['libro_id']);
            $stmt->execute();
        }
        $stmt = $this->conexion->prepare("DELETE FROM carrito WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
    }
    public function obtenerCompras() {
    $sql = "SELECT c.*, u.nombre AS nombre_usuario, l.titulo AS titulo_libro
            FROM compras c
            JOIN usuarios u ON c.usuario_id = u.id
            JOIN libros l ON c.libro_id = l.id";
    $resultado = $this->conexion->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}
}
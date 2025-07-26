<?php
require_once __DIR__ . '/../config/config.php';

class Resena {
    private $db;

    public function __construct() {
        $this->db = conectar(); // ✅ Usamos tu función personalizada
    }

    // ✅ Obtener reseñas de un libro (vista usuario)
    public function obtenerPorLibro($libro_id) {
        $sql = "SELECT r.*, u.nombre AS nombre_usuario
                FROM resenas r
                JOIN usuarios u ON r.usuario_id = u.id
                WHERE r.libro_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $libro_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // ✅ Agregar reseña
    public function agregar($libro_id, $usuario_id, $calificacion, $comentario) {
        $sql = "INSERT INTO resenas (libro_id, usuario_id, calificacion, comentario)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iiis", $libro_id, $usuario_id, $calificacion, $comentario);
        return $stmt->execute();
    }

    // ✅ Promedio de calificación por libro
    public function promedio($libro_id) {
        $sql = "SELECT AVG(calificacion) AS promedio FROM resenas WHERE libro_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $libro_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        return $fila['promedio'] ?? null;
    }

    // ✅ Obtener todas las reseñas (vista admin)
    public function obtenerTodas() {
        $sql = "SELECT r.*, u.nombre AS nombre_usuario, l.titulo AS titulo_libro
                FROM resenas r
                JOIN usuarios u ON r.usuario_id = u.id
                JOIN libros l ON r.libro_id = l.id
                ORDER BY r.fecha DESC";

        $resultado = $this->db->query($sql);

        if (!$resultado) {
            die("Error en la consulta: " . $this->db->error);
        }

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // ✅ Eliminar reseña (admin)
    public function eliminar($id) {
        $sql = "DELETE FROM resenas WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // ✅ Contar todas las reseñas (admin)
    public function contarTodas() {
        $sql = "SELECT COUNT(*) AS total FROM resenas";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch_assoc();
        return $fila['total'] ?? 0;
    }

    // ✅ Verificar si el usuario ya reseñó ese libro
    public function yaResenado($libro_id, $usuario_id) {
        $sql = "SELECT COUNT(*) AS existe FROM resenas WHERE libro_id = ? AND usuario_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $libro_id, $usuario_id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        return $resultado['existe'] > 0;
    }
    public function obtenerPorUsuario($usuario_id, $limite = 5) {
    $sql = "SELECT r.*, l.titulo AS titulo_libro
            FROM resenas r
            JOIN libros l ON r.libro_id = l.id
            WHERE r.usuario_id = ?
            ORDER BY r.fecha DESC
            LIMIT ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $limite);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}
public function contarResenas() {
    $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM resenas");
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    return $fila['total'] ?? 0;
}
public function contarPorLibro() {
    $sql = "
        SELECT l.titulo, COUNT(r.id) as total
        FROM resenas r
        JOIN libros l ON r.libro_id = l.id
        GROUP BY l.titulo
        ORDER BY total DESC
        LIMIT 5
    ";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) {
        die('❌ Error en la consulta SQL de contarPorLibro: ' . $this->db->error);
    }

    $stmt->execute();
    $resultado = $stmt->get_result();
    $resultados = [];
    while ($row = $resultado->fetch_assoc()) {
        $resultados[$row['titulo']] = $row['total'];
    }
    return $resultados;
}
}
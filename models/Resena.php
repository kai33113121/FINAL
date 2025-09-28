<?php
require_once __DIR__ . '/../config/config.php';

class Resena {
    private $db;

    public function __construct() {
        $this->db = conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    // ✅ Obtener reseñas de un libro (vista usuario)
    public function obtenerPorLibro($libro_id) {
        $sql = "SELECT r.*, u.nombre AS nombre_usuario
                FROM resenas r
                JOIN usuarios u ON r.usuario_id = u.id
                WHERE r.libro_id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return [];
        $stmt->bind_param("i", $libro_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $resenas = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $resenas;
    }

    // ✅ Agregar reseña
    public function agregar($libro_id, $usuario_id, $calificacion, $comentario) {
        $sql = "INSERT INTO resenas (libro_id, usuario_id, calificacion, comentario)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("iiis", $libro_id, $usuario_id, $calificacion, $comentario);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    // ✅ Promedio de calificación por libro
    public function promedio($libro_id) {
        $sql = "SELECT AVG(calificacion) AS promedio FROM resenas WHERE libro_id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return null;
        $stmt->bind_param("i", $libro_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado ? $resultado->fetch_assoc() : null;
        $stmt->close();
        return $fila ? $fila['promedio'] : null;
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
        $resenas = $resultado->fetch_all(MYSQLI_ASSOC);
        $resultado->free();
        return $resenas;
    }

    // ✅ Eliminar reseña (admin)
    public function eliminar($id) {
        $sql = "DELETE FROM resenas WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    // ✅ Contar todas las reseñas (admin)
    public function contarTodas() {
        $sql = "SELECT COUNT(*) AS total FROM resenas";
        $resultado = $this->db->query($sql);
        $fila = $resultado ? $resultado->fetch_assoc() : null;
        if ($resultado) $resultado->free();
        return $fila ? $fila['total'] : 0;
    }

    // ✅ Verificar si el usuario ya reseñó ese libro
    public function yaResenado($libro_id, $usuario_id) {
        $sql = "SELECT COUNT(*) AS existe FROM resenas WHERE libro_id = ? AND usuario_id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("ii", $libro_id, $usuario_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado ? $resultado->fetch_assoc() : null;
        $stmt->close();
        return $row ? $row['existe'] > 0 : false;
    }

    public function obtenerPorUsuario($usuario_id, $limite = 5) {
        $sql = "SELECT r.*, l.titulo AS titulo_libro
                FROM resenas r
                JOIN libros l ON r.libro_id = l.id
                WHERE r.usuario_id = ?
                ORDER BY r.fecha DESC
                LIMIT ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return [];
        $stmt->bind_param("ii", $usuario_id, $limite);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $resenas = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $resenas;
    }

    public function contarResenas() {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM resenas");
        if (!$stmt) return 0;
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado ? $resultado->fetch_assoc() : null;
        $stmt->close();
        return $fila ? $fila['total'] : 0;
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
        $stmt
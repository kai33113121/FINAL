<?php
require_once __DIR__ . '/../config/config.php';

class Libro {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
        if (!$this->conexion) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function obtenerTodos() {
        $sql = "SELECT l.*, u.nombre FROM libros l LEFT JOIN usuarios u ON l.id_usuario = u.id";
        $resultado = $this->conexion->query($sql);
        return $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function obtenerPorUsuario($usuarioId) {
        $stmt = $this->conexion->prepare("SELECT * FROM libros WHERE id_usuario = ?");
        if (!$stmt) return [];
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute();
        $result = $stmt->get_result();
        $libros = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $libros;
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM libros WHERE id = ?");
        if (!$stmt) return null;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libro = $result ? $result->fetch_assoc() : null;
        $stmt->close();
        return $libro;
    }

    public function obtenerDeOtrosUsuarios($usuario_id) {
        $stmt = $this->conexion->prepare("SELECT l.*, u.nombre FROM libros l JOIN usuarios u ON l.id_usuario = u.id WHERE l.id_usuario != ?");
        if (!$stmt) return [];
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libros = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $libros;
    }

    public function obtenerTodosConUsuario() {
        $sql = "SELECT l.*, u.nombre AS nombre_usuario 
                FROM libros l 
                LEFT JOIN usuarios u ON l.id_usuario = u.id";
        $resultado = $this->conexion->query($sql);
        return $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM libros WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function actualizar($id, $datos) {
        $stmt = $this->conexion->prepare("UPDATE libros SET titulo = ?, autor = ?, genero = ?, estado = ?, descripcion = ?, imagen = ?, modo = ?, precio = ? WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("sssssssdi", 
            $datos['titulo'], 
            $datos['autor'], 
            $datos['genero'], 
            $datos['estado'], 
            $datos['descripcion'], 
            $datos['imagen'], 
            $datos['modo'], 
            $datos['precio'], 
            $id
        );
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function obtenerPorGenero($genero) {
    $stmt = $this->conexion->prepare("SELECT l.*, u.nombre FROM libros l LEFT JOIN usuarios u ON l.id_usuario = u.id WHERE l.genero = ?");
    if (!$stmt) return [];
    $stmt->bind_param("s", $genero);
    $stmt->execute();
    $result = $stmt->get_result();
    $libros = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    $stmt->close();
    return $libros;
}

    public function contarLibros() {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM libros");
        if (!$stmt) return 0;
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result ? $result->fetch_row() : [0];
        $stmt->close();
        return $row[0];
    }

    public function contarPorGenero() {
        $stmt = $this->conexion->prepare("SELECT genero, COUNT(*) as total FROM libros GROUP BY genero");
        if (!$stmt) return [];
        $stmt->execute();
        $result = $stmt->get_result();
        $resultados = [];
        if ($result) {
            foreach ($result->fetch_all(MYSQLI_ASSOC) as $row) {
                $resultados[$row['genero']] = $row['total'];
            }
        }
        $stmt->close();
        return $resultados;
    }

    public function crear($datos)
    {
        $stmt = $this->conexion->prepare("
            INSERT INTO libros (titulo, autor, genero, estado, descripcion, modo, precio, imagen, id_usuario)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        if (!$stmt) {
            die("❌ Error al preparar la consulta: " . $this->conexion->error);
        }
        $stmt->bind_param(
            "ssssssdsi",
            $datos['titulo'],
            $datos['autor'],
            $datos['genero'],
            $datos['estado'],
            $datos['descripcion'],
            $datos['modo'],
            $datos['precio'],
            $datos['imagen'],
            $datos['id_usuario']
        );
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "✅ Libro creado correctamente.";
        } else {
            echo "❌ No se insertó ningún libro. Error: " . $stmt->error;
        }
        $stmt->close();
    }
}


<?php
require_once __DIR__ . '/../config/config.php';

class LibroCatalogo
{
    private $db;

    public function __construct($conexion = null)
    {
        // Permite pasar la conexión o crearla si no se pasa
        $this->db = $conexion ?: conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function obtenerTodos()
    {
        $sql = "SELECT lc.*, u.nombre 
                FROM libros_catalogo lc
                LEFT JOIN usuarios u ON lc.id_usuario = u.id
                ORDER BY lc.id DESC";
        $result = $this->db->query($sql);
        $libros = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        if ($result) $result->free();
        return $libros;
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM libros_catalogo WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return null;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libro = $result ? $result->fetch_assoc() : null;
        $stmt->close();
        return $libro;
    }

    public function crear($datos)
    {
        $sql = "INSERT INTO libros_catalogo (titulo, autor, descripcion, imagen, precio, estado, genero, id_usuario)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param(
            "ssssdssi",
            $datos['titulo'],
            $datos['autor'],
            $datos['descripcion'],
            $datos['imagen'],
            $datos['precio'],
            $datos['estado'],
            $datos['genero'],
            $datos['id_usuario']
        );
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function actualizar($id, $datos)
    {
        $sql = "UPDATE libros_catalogo SET titulo=?, autor=?, descripcion=?, imagen=?, precio=?, estado=?, genero=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param(
            "ssssdssi",
            $datos['titulo'],
            $datos['autor'],
            $datos['descripcion'],
            $datos['imagen'],
            $datos['precio'],
            $datos['estado'],
            $datos['genero'],
            $id
        );
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM libros_catalogo WHERE id=?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }
}


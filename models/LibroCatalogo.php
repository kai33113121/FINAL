<?php
require_once __DIR__ . '/../config/config.php';

class LibroCatalogo
{
    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

    public function obtenerTodos()
{
    $sql = "SELECT lc.*, u.nombre 
            FROM libros_catalogo lc
            LEFT JOIN usuarios u ON lc.id_usuario = u.id
            ORDER BY lc.id DESC";
    return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
}

    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM libros_catalogo WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function crear($datos)
{
    $sql = "INSERT INTO libros_catalogo (titulo, autor, descripcion, imagen, precio, estado, genero, id_usuario)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->db->prepare($sql);
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
    return $stmt->execute();
}

    public function actualizar($id, $datos)
    {
        $sql = "UPDATE libros_catalogo SET titulo=?, autor=?, descripcion=?, imagen=?, precio=?, estado=?
                WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param(
            "ssssdsi",
            $datos['titulo'],
            $datos['autor'],
            $datos['descripcion'],
            $datos['imagen'],
            $datos['precio'],
            $datos['estado'],
            $id
        );
        return $stmt->execute();
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM libros_catalogo WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
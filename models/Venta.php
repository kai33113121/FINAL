<?php
require_once __DIR__ . '/../config/config.php';

class Venta
{
    private $db;

    public function __construct()
    {
        $this->db = conectar();
    }

    public function crear($id_usuario, $titulo, $autor, $descripcion, $precio, $estado, $imagen)
    {
        $stmt = $this->db->prepare("INSERT INTO libros_venta (id_usuario, titulo, autor, descripcion, precio, estado, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssdss", $id_usuario, $titulo, $autor, $descripcion, $precio, $estado, $imagen);
        return $stmt->execute();
    }

    public function obtenerPorUsuario($id_usuario)
    {
        $stmt = $this->db->prepare("SELECT id, titulo, autor, descripcion, precio, estado, imagen FROM libros_venta WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function eliminar($id, $id_usuario)
    {
        $stmt = $this->db->prepare("DELETE FROM libros_venta WHERE id = ? AND id_usuario = ?");
        $stmt->bind_param("ii", $id, $id_usuario);
        return $stmt->execute();
    }

    public function obtenerPorId($id, $id_usuario)
    {
        $stmt = $this->db->prepare("SELECT * FROM libros_venta WHERE id = ? AND id_usuario = ?");
        $stmt->bind_param("ii", $id, $id_usuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $id_usuario, $titulo, $autor, $descripcion, $precio, $estado, $imagen = null)
    {
        // Aseguramos que precio sea float
        $precio = floatval($precio);

        if ($imagen) {
            $stmt = $this->db->prepare("UPDATE libros_venta SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ?, imagen = ? WHERE id = ? AND id_usuario = ?");
            if (!$stmt) {
                die("Error en prepare con imagen: " . $this->db->error);
            }
            $stmt->bind_param("ssssdsii", $titulo, $autor, $descripcion, $precio, $estado, $imagen, $id, $id_usuario);
        } else {
            $stmt = $this->db->prepare("UPDATE libros_venta SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ? WHERE id = ? AND id_usuario = ?");
            if (!$stmt) {
                die("Error en prepare sin imagen: " . $this->db->error);
            }
            $stmt->bind_param("ssssdii", $titulo, $autor, $descripcion, $precio, $estado, $id, $id_usuario);
        }

        if (!$stmt->execute()) {
            die("Error en execute: " . $stmt->error);
        }

        return true;
    }
   public function obtenerTodos()
{
    $sql = "
        SELECT lv.id, lv.titulo, lv.autor, lv.descripcion, lv.precio, lv.estado, lv.imagen,
               u.nombre AS nombre,
               g.nombre AS genero
        FROM libros_venta lv
        JOIN usuarios u ON lv.id_usuario = u.id
        LEFT JOIN generos g ON lv.id_genero = g.id
        ORDER BY lv.id DESC
    ";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) {
        die('❌ Error en prepare: ' . $this->db->error);
    }

    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}
    public function eliminarPorId($id)
    {
        $stmt = $this->db->prepare("DELETE FROM libros_venta WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function obtenerPorIdAdmin($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM libros_venta WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function actualizarAdmin($id, $titulo, $autor, $descripcion, $precio, $estado, $imagen = null)
{
    $precio = floatval($precio);

    if ($imagen) {
        $stmt = $this->db->prepare("UPDATE libros_venta SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ?, imagen = ? WHERE id = ?");
        if (!$stmt) {
            die("Error en prepare con imagen (admin): " . $this->db->error);
        }
        $stmt->bind_param("ssssdsi", $titulo, $autor, $descripcion, $precio, $estado, $imagen, $id);
    } else {
        $stmt = $this->db->prepare("UPDATE libros_venta SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ? WHERE id = ?");
        if (!$stmt) {
            die("Error en prepare sin imagen (admin): " . $this->db->error);
        }
        $stmt->bind_param("sssdsi", $titulo, $autor, $descripcion, $precio, $estado, $id);
    }

    if (!$stmt->execute()) {
        die("Error en execute (admin): " . $stmt->error);
    }

    return true;
}
}
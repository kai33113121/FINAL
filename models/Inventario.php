<?php
require_once __DIR__ . '/../config/config.php';

class Venta
{
    private $db;

    public function __construct()
    {
        $this->db = conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    // Crear libro en venta
    public function crear($id_usuario, $titulo, $autor, $descripcion, $genero, $precio, $estado, $imagen)
    {
        $stmt = $this->db->prepare("
            INSERT INTO libros 
            (id_usuario, titulo, autor, descripcion, genero, precio, estado, imagen) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        if (!$stmt) return false;
        $stmt->bind_param("isssssds", 
            $id_usuario, 
            $titulo, 
            $autor, 
            $descripcion, 
            $genero,
            $precio, 
            $estado, 
            $imagen
        );
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    // Obtener todos los libros
    public function obtenerTodos()
    {
        $sql = "SELECT * FROM libros_venta";
        $result = $this->db->query($sql);
        $libros = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        if ($result) $result->free();
        return $libros;
    }

    // Obtener por ID (para detalle)
    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM libros WHERE id = ?");
        if (!$stmt) return null;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libro = $result ? $result->fetch_assoc() : null;
        $stmt->close();
        return $libro;
    }

    // Actualizar libro
    public function actualizar($id, $id_usuario, $titulo, $autor, $descripcion, $precio, $estado, $imagen)
    {
        $precio = floatval($precio);
        $stmt = $this->db->prepare("
            UPDATE libros 
            SET id_usuario = ?, titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ?, imagen = ?
            WHERE id = ?
        ");
        if (!$stmt) return false;
        $stmt->bind_param("isssdssi",
            $id_usuario,
            $titulo,
            $autor,
            $descripcion,
            $precio,
            $estado,
            $imagen,
            $id
        );
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    // Obtener libros por usuario
    public function obtenerPorUsuario($id_usuario)
    {
        $sql = "SELECT * FROM libros WHERE id_usuario = ?";  
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return [];
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $libros = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $libros;
    }

    // Eliminar libro
    public function eliminarPorId($id)
    {
        $stmt = $this->db->prepare("DELETE FROM libros WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    // Obtener por ID para Admin
    public function obtenerPorIdAdmin($id)
    {
        $stmt = $this->db->prepare("
            SELECT id, titulo, autor, descripcion, precio, estado, imagen 
            FROM libros 
            WHERE id = ?
        ");
        if (!$stmt) return null;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libro = $result ? $result->fetch_assoc() : null;
        $stmt->close();
        return $libro;
    }

    // Actualizar libro (modo Admin)
    public function actualizarAdmin($id, $titulo, $autor, $descripcion, $precio, $estado, $imagen = null)
    {
        if ($imagen) {
            $stmt = $this->db->prepare("
                UPDATE libros
                SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ?, imagen = ?
                WHERE id = ?
            ");
            if (!$stmt) return false;
            $stmt->bind_param("sssdssi", $titulo, $autor, $descripcion, $precio, $estado, $imagen, $id);
        } else {
            $stmt = $this->db->prepare("
                UPDATE libros
                SET titulo = ?, autor = ?, descripcion = ?, precio = ?, estado = ?
                WHERE id = ?
            ");
            if (!$stmt) return false;
            $stmt->bind_param("sssdsi", $titulo, $autor, $descripcion, $precio, $estado, $id);
        }
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }
}

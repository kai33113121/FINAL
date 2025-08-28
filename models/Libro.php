<?php
require_once __DIR__ . '/../config/config.php';

class Libro {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

//     public function subir($datos) {
//     $stmt = $this->conexion->prepare("INSERT INTO libros (titulo, autor, genero, estado, descripcion, imagen, usuario_id, modo, precio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssssssisd", 
//         $datos['titulo'], 
//         $datos['autor'], 
//         $datos['genero'], 
//         $datos['estado'], 
//         $datos['descripcion'], 
//         $datos['imagen'], 
//         $datos['usuario_id'], 
//         $datos['modo'], 
//         $datos['precio']
//     );
//     return $stmt->execute();
// }

    public function obtenerTodos() {
        $sql = "SELECT l.*, u.nombre FROM libros l LEFT JOIN usuarios u ON l.id_usuario = u.id";
        $resultado = $this->conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function obtenerPorUsuario($usuario_id) {
    $stmt = $this->conexion->prepare("SELECT * FROM libros WHERE usuario_id = ?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
public function obtenerPorId($id) {
    $stmt = $this->conexion->prepare("SELECT * FROM libros WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


public function obtenerDeOtrosUsuarios($usuario_id) {
    $stmt = $this->conexion->prepare("SELECT l.*, u.nombre FROM libros l JOIN usuarios u ON l.usuario_id = u.id WHERE l.usuario_id != ?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}


public function obtenerTodosConUsuario() {
    $sql = "SELECT l.*, u.nombre AS nombre_usuario 
            FROM libros l 
            LEFT JOIN usuarios u ON (l.id_usuario = u.id OR l.usuario_id = u.id)";
    $resultado = $this->conexion->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}
public function eliminar($id) {
    $stmt = $this->conexion->prepare("DELETE FROM libros WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
public function actualizar($id, $datos) {
    $stmt = $this->conexion->prepare("UPDATE libros SET titulo = ?, autor = ?, genero = ?, estado = ?, descripcion = ?, imagen = ?, modo = ?, precio = ? WHERE id = ?");
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
    return $stmt->execute();
}

public function obtenerPorGenero($genero) {
    $stmt = $this->conexion->prepare("SELECT * FROM libros WHERE genero = ?");
    $stmt->bind_param("s", $genero);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
public function contarLibros() {
    $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM libros");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_row();
    return $result[0];
}
public function contarPorGenero() {
    $stmt = $this->conexion->prepare("SELECT genero, COUNT(*) as total FROM libros GROUP BY genero");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $resultados = [];
    foreach ($result as $row) {
        $resultados[$row['genero']] = $row['total'];
    }
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
}
}

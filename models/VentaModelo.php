<?php
require_once __DIR__ . "/../config/config.php";

class Venta{
   private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function crear($datos)
{
    $stmt = $this->conexion->prepare("
        INSERT INTO venta_libros (titulo, autor,precio,sinopsis, descripcion,stock,genero,imagen)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        die("❌ Error al preparar la consulta: " . $this->conexion->error);
    }

    $stmt->bind_param(
        "ssssssds",
        $datos['titulo'],
        $datos['autor'],
        $datos['precio'],
        $datos['sinopsis'],
        $datos['descripcion'],
        $datos['stock'],
        $datos['genero'],
        $datos['imagen'],
    );

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
    echo "✅ Libro creado correctamente.";
} else {
    echo "❌ No se insertó ningún libro. Error: " . $stmt->error;
}
}
}
?>





    

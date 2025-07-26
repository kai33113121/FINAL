<?php
require_once __DIR__ . '/../config/config.php';

class Intercambio
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = conectar();
    }

    public function solicitar($libro_id_1, $libro_id_2, $usuario_1, $usuario_2)
    {
        $stmt = $this->conexion->prepare("INSERT INTO intercambios (libro_id_1, libro_id_2, usuario_1, usuario_2) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiii", $libro_id_1, $libro_id_2, $usuario_1, $usuario_2);
        return $stmt->execute();
    }

    public function obtenerPorUsuario($usuario_id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM intercambios WHERE usuario_1 = ? OR usuario_2 = ?");
        $stmt->bind_param("ii", $usuario_id, $usuario_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
   public function obtenerDetallado($usuario_id) {
    $sql = "SELECT i.*, 
                   l1.titulo AS libro_ofrecido, 
                   l2.titulo AS libro_solicitado,
                   u1.nombre AS nombre_ofrece,
                   u2.nombre AS nombre_recibe
            FROM intercambios i
            JOIN libros l1 ON i.libro_id_1 = l1.id
            JOIN libros l2 ON i.libro_id_2 = l2.id
            JOIN usuarios u1 ON i.usuario_1 = u1.id
            JOIN usuarios u2 ON i.usuario_2 = u2.id
            WHERE i.usuario_1 = ? OR i.usuario_2 = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $usuario_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
public function obtenerTodosDetallado() {
    $sql = "SELECT i.*, 
                   l1.titulo AS libro_ofrecido, 
                   l2.titulo AS libro_solicitado,
                   u1.nombre AS nombre_ofrece,
                   u2.nombre AS nombre_recibe
            FROM intercambios i
            JOIN libros l1 ON i.libro_id_1 = l1.id
            JOIN libros l2 ON i.libro_id_2 = l2.id
            JOIN usuarios u1 ON i.usuario_1 = u1.id
            JOIN usuarios u2 ON i.usuario_2 = u2.id";
    $resultado = $this->conexion->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}
public function actualizarEstado($id, $estado) {
    $stmt = $this->conexion->prepare("UPDATE intercambios SET estado = ? WHERE id = ?");
    $stmt->bind_param("si", $estado, $id);
    return $stmt->execute();
}
public function eliminar($id) {
    $stmt = $this->conexion->prepare("DELETE FROM intercambios WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
public function contarIntercambios() {
    $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM intercambios");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_row();
    return $result[0];
}
public function contarPorEstado() {
    $stmt = $this->conexion->prepare("SELECT estado, COUNT(*) as total FROM intercambios GROUP BY estado");
    $stmt->execute();
    $result = $stmt->get_result();
    $resultados = [];
    while ($row = $result->fetch_assoc()) {
        $resultados[$row['estado']] = $row['total'];
    }
    return $resultados;
}
}
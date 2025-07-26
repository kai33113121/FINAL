<?php
class Evento
{
    private $db;

    public function __construct()
    {
        $this->db = conectar();
    }

    public function crear($titulo, $descripcion, $creado_por)
{
    $sql = "INSERT INTO eventos (titulo, descripcion, creado_por, activo) VALUES (?, ?, ?, 1)";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("ssi", $titulo, $descripcion, $creado_por);
    $stmt->execute();
}

    public function obtenerActivos()
    {
        $resultado = $this->db->query("SELECT * FROM eventos WHERE activo = 1 ORDER BY fecha_creacion DESC");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM eventos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
    public function actualizar($id, $titulo, $descripcion)
{
    $sql = "UPDATE eventos SET titulo = ?, descripcion = ? WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("ssi", $titulo, $descripcion, $id);
    $stmt->execute();
}
public function eliminar($id)
{
    // Eliminación lógica: desactivar el evento
    $sql = "UPDATE eventos SET activo = 0 WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
public function contarEventos() {
    $stmt = $this->db->prepare("SELECT COUNT(*) FROM eventos");
    $stmt->execute();
    $resultado = $stmt->get_result();
    $row = $resultado->fetch_row();
    return $row[0];
}
public function contarPorGenero() {
    $resultado = $this->db->query("SELECT genero, COUNT(*) as total FROM libros GROUP BY genero");
    $result = [];
    while ($row = $resultado->fetch_assoc()) {
        $result[$row['genero']] = $row['total'];
    }
    return $result;
}
}
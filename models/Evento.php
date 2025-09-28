<?php
class Evento
{
    private $db;

    public function __construct()
    {
        $this->db = conectar();
        if (!$this->db) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function crear($titulo, $descripcion, $creado_por)
{
    $sql = "INSERT INTO eventos (titulo, descripcion, creado_por, activo) VALUES (?, ?, ?, 1)";
    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;
    $stmt->bind_param("ssi", $titulo, $descripcion, $creado_por);
    $exito = $stmt->execute();
    $stmt->close();
    return $exito;
}

    public function obtenerActivos()
    {
        $resultado = $this->db->query("SELECT * FROM eventos WHERE activo = 1 ORDER BY fecha_creacion DESC");
        return $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM eventos WHERE id = ?");
        if (!$stmt) return null;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $evento = $resultado ? $resultado->fetch_assoc() : null;
        $stmt->close();
        return $evento;
    }

    public function actualizar($id, $titulo, $descripcion)
    {
        $sql = "UPDATE eventos SET titulo = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("ssi", $titulo, $descripcion, $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function eliminar($id)
    {
        $sql = "UPDATE eventos SET activo = 0 WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function contarEventos()
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM eventos");
        if (!$stmt) return 0;
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado ? $resultado->fetch_row() : [0];
        $stmt->close();
        return $row[0];
    }

    public function contarPorGenero()
    {
        $resultado = $this->db->query("SELECT genero, COUNT(*) as total FROM libros GROUP BY genero");
        $result = [];
        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                $result[$row['genero']] = $row['total'];
            }
            $resultado->free();
        }
        return $result;
    }
}
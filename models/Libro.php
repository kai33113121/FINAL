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

    // MÉTODOS EXISTENTES MANTENIDOS PARA COMPATIBILIDAD
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

    // NUEVOS MÉTODOS PARA LA ORGANIZACIÓN

    // Obtener solo libros oficiales (catálogo admin)
    public function obtenerLibrosOficiales() {
    $stmt = $this->conexion->prepare("
        SELECT l.*, 
               COALESCE(u.nombre, 'Sistema') as nombre_usuario 
        FROM libros l 
        LEFT JOIN usuarios u ON l.id_usuario = u.id 
        WHERE l.tipo_catalogo = 'oficial' OR l.id_usuario IS NULL
    ");
    if (!$stmt) return [];
    $stmt->execute();
    $result = $stmt->get_result();
    $libros = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    $stmt->close();
    return $libros;
}

    // Obtener solo libros de usuarios
    public function obtenerLibrosUsuarios() {
        $stmt = $this->conexion->prepare("SELECT l.*, u.nombre FROM libros l LEFT JOIN usuarios u ON l.id_usuario = u.id WHERE l.tipo_catalogo = 'usuario'");
        if (!$stmt) return [];
        $stmt->execute();
        $result = $stmt->get_result();
        $libros = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $libros;
    }
public function obtenerDisponiblesParaUsuario($usuario_id, $genero = null) {
    $sql = "SELECT l.id, l.titulo, l.autor, l.genero, l.estado, l.descripcion, 
                   l.imagen, l.modo, l.precio, l.tipo_catalogo, l.id_usuario,
                   COALESCE(u.nombre, 'LibrosWap') as nombre,
                   'libros' as tabla_origen
            FROM libros l 
            LEFT JOIN usuarios u ON l.id_usuario = u.id 
            WHERE (
                (l.tipo_catalogo = 'oficial' AND l.modo = 'venta') OR 
                (l.id_usuario IS NOT NULL AND l.id_usuario != ?)
            )
            
            UNION ALL
            
            SELECT lv.id, lv.titulo, lv.autor, 
                   '' as genero, lv.estado, lv.descripcion,
                   lv.imagen, 'venta' as modo, lv.precio,
                   'usuario' as tipo_catalogo, lv.id_usuario,
                   COALESCE(u.nombre, 'Usuario') as nombre,
                   'libros_venta' as tabla_origen
            FROM libros_venta lv
            LEFT JOIN usuarios u ON lv.id_usuario = u.id
            WHERE lv.id_usuario != ?";
    
    $params = [$usuario_id, $usuario_id];
    
    if ($genero) {
        // Para filtro de género, solo aplicar a la primera consulta
        $sql = str_replace(
            "WHERE (", 
            "WHERE l.genero = ? AND (", 
            $sql
        );
        array_unshift($params, $genero);
    }
    
    $sql .= " ORDER BY id DESC";
    
    $stmt = $this->conexion->prepare($sql);
    if (!$stmt) return [];
    
    $tipos = str_repeat("s", count($params));
    $stmt->bind_param($tipos, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    $libros = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    $stmt->close();
    return $libros;
}
   public function crearLibroOficial($datos) {
    $stmt = $this->conexion->prepare("
        INSERT INTO libros (titulo, autor, genero, estado, descripcion, imagen, tipo_catalogo, id_usuario, modo, precio)
        VALUES (?, ?, ?, ?, ?, ?, 'oficial', NULL, 'venta', ?)
    ");
    if (!$stmt) {
        return ["success" => false, "message" => "Error al preparar la consulta: " . $this->conexion->error];
    }
    
    $precio = $datos['precio'] ?? 25000; // Precio por defecto
    
    $stmt->bind_param(
        "ssssssd",
        $datos['titulo'],
        $datos['autor'],
        $datos['genero'],
        $datos['estado'],
        $datos['descripcion'],
        $datos['imagen'],
        $precio
    );
    
    $exito = $stmt->execute();
    $libro_id = $exito ? $this->conexion->insert_id : null;
    $stmt->close();
    
    if ($exito) {
        return ["success" => true, "message" => "Libro oficial creado correctamente.", "libro_id" => $libro_id];
    } else {
        return ["success" => false, "message" => "Error al crear libro: " . $this->conexion->error];
    }
}
public function crear($datos) {
    // Determinar tipo según si tiene id_usuario
    $tipo_catalogo = empty($datos['id_usuario']) ? 'oficial' : 'usuario';
    
    // Preparar variables para bind_param (necesita referencias)
    $titulo = $datos['titulo'];
    $autor = $datos['autor'];
    $genero = $datos['genero'];
    $estado = $datos['estado'];
    $descripcion = $datos['descripcion'];
    $modo = $datos['modo'] ?? 'intercambio';
    $precio = $datos['precio'] ?? 0;
    $imagen = $datos['imagen'];
    $id_usuario = $datos['id_usuario'];
    
    $stmt = $this->conexion->prepare("
        INSERT INTO libros (titulo, autor, genero, estado, descripcion, modo, precio, imagen, id_usuario, tipo_catalogo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    if (!$stmt) {
        die("Error al preparar la consulta: " . $this->conexion->error);
    }
    
    $stmt->bind_param(
        "ssssssdsds",
        $titulo,
        $autor,
        $genero,
        $estado,
        $descripcion,
        $modo,
        $precio,
        $imagen,
        $id_usuario,
        $tipo_catalogo
    );
    
    $exito = $stmt->execute();
    if ($exito) {
        echo "Libro creado correctamente.";
    } else {
        echo "No se insertó ningún libro. Error: " . $stmt->error;
    }
    $stmt->close();
    return $exito;
}

    public function eliminar($id) {
        try {
            // Iniciar transacción
            $this->conexion->begin_transaction();
            
            // 1. Eliminar del carrito
            $stmt1 = $this->conexion->prepare("DELETE FROM carrito WHERE libro_id = ?");
            if ($stmt1) {
                $stmt1->bind_param("i", $id);
                $stmt1->execute();
                $stmt1->close();
            }
            
            // 2. Eliminar reseñas
            $stmt2 = $this->conexion->prepare("DELETE FROM resenas WHERE libro_id = ?");
            if ($stmt2) {
                $stmt2->bind_param("i", $id);
                $stmt2->execute();
                $stmt2->close();
            }
            
            // 3. Actualizar intercambios (cambiar por NULL o eliminar)
            $stmt3 = $this->conexion->prepare("DELETE FROM intercambios WHERE libro_id_1 = ? OR libro_id_2 = ?");
            if ($stmt3) {
                $stmt3->bind_param("ii", $id, $id);
                $stmt3->execute();
                $stmt3->close();
            }
            
            // 4. Eliminar de detalle_compras si existe
            $stmt4 = $this->conexion->prepare("DELETE FROM detalle_compras WHERE libro_id = ?");
            if ($stmt4) {
                $stmt4->bind_param("i", $id);
                $stmt4->execute();
                $stmt4->close();
            }
            
            // 5. Eliminar de inventario_oficial si es libro oficial
            $stmt5 = $this->conexion->prepare("DELETE FROM inventario_oficial WHERE libro_id = ?");
            if ($stmt5) {
                $stmt5->bind_param("i", $id);
                $stmt5->execute();
                $stmt5->close();
            }
            
            // 6. Finalmente eliminar el libro
            $stmt6 = $this->conexion->prepare("DELETE FROM libros WHERE id = ?");
            if (!$stmt6) {
                throw new Exception("Error preparando eliminación del libro: " . $this->conexion->error);
            }
            
            $stmt6->bind_param("i", $id);
            $exito = $stmt6->execute();
            $stmt6->close();
            
            if ($exito) {
                // Confirmar transacción
                $this->conexion->commit();
                return true;
            } else {
                throw new Exception("Error eliminando el libro: " . $this->conexion->error);
            }
            
        } catch (Exception $e) {
            // Revertir cambios si hay error
            $this->conexion->rollback();
            error_log("Error eliminando libro ID $id: " . $e->getMessage());
            return false;
        }
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

    public function contarLibrosOficiales() {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM libros WHERE tipo_catalogo = 'oficial'");
        if (!$stmt) return 0;
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result ? $result->fetch_row() : [0];
        $stmt->close();
        return $row[0];
    }

    public function contarLibrosUsuarios() {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM libros WHERE tipo_catalogo = 'usuario'");
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
}



<?php
require_once __DIR__ . '/../config/config.php';
class Usuario {
    private $conexion;
    private $error = '';

    public function __construct() {
        $this->conexion = conectar();
        if (!$this->conexion) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }
    public function registrar($nombre, $email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $rol = 'usuario'; 
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            $this->error = "Error en prepare: " . $this->conexion->error;
            return false;
        }
        $stmt->bind_param("ssss", $nombre, $email, $hash, $rol);
        try {
            $exito = $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                $this->error = 'El correo ya está en uso, por favor verifique o inicie sesión.';
            } else {
                $this->error = $e->getMessage();
            }
            return false;
        }
        return $exito;
    }
    public function verificar($email, $password) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($usuario = $resultado->fetch_assoc()) {
            if (password_verify($password, $usuario['password'])) {
                return $usuario;
            }
        }
        return false;
    }
    public function getError() {
        return $this->error;
    }
    public function obtenerTodos() {
        $resultado = $this->conexion->query("SELECT * FROM usuarios");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function actualizar($id, $datos) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET nombre = ?, email = ?, rol = ?, bio = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $datos['nombre'], $datos['email'], $datos['rol'], $datos['bio'], $id);
        return $stmt->execute();
    }
   public function eliminar($id) {
    try {
        $this->conexion->begin_transaction();
        $stmt1 = $this->conexion->prepare("DELETE FROM comentarios_evento WHERE id_usuario = ?");
        if ($stmt1) {
            $stmt1->bind_param("i", $id);
            $stmt1->execute();
            $stmt1->close();
        }
        $stmt2 = $this->conexion->prepare("DELETE FROM notificaciones WHERE usuario_id = ?");
        if ($stmt2) {
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
            $stmt2->close();
        }
        $stmt3 = $this->conexion->prepare("DELETE FROM mensajes WHERE emisor_id = ? OR receptor_id = ?");
        if ($stmt3) {
            $stmt3->bind_param("ii", $id, $id);
            $stmt3->execute();
            $stmt3->close();
        }
        $stmt4 = $this->conexion->prepare("DELETE FROM carrito WHERE usuario_id = ?");
        if ($stmt4) {
            $stmt4->bind_param("i", $id);
            $stmt4->execute();
            $stmt4->close();
        }
        $stmt5 = $this->conexion->prepare("DELETE FROM resenas WHERE usuario_id = ?");
        if ($stmt5) {
            $stmt5->bind_param("i", $id);
            $stmt5->execute();
            $stmt5->close();
        }
        $stmt6 = $this->conexion->prepare("DELETE FROM intercambios WHERE usuario_1 = ? OR usuario_2 = ?");
        if ($stmt6) {
            $stmt6->bind_param("ii", $id, $id);
            $stmt6->execute();
            $stmt6->close();
        }
        $stmt7 = $this->conexion->prepare("DELETE FROM compras WHERE usuario_id = ?");
        if ($stmt7) {
            $stmt7->bind_param("i", $id);
            $stmt7->execute();
            $stmt7->close();
        }
        $stmt8 = $this->conexion->prepare("DELETE FROM ventas WHERE id_usuario = ?");
        if ($stmt8) {
            $stmt8->bind_param("i", $id);
            $stmt8->execute();
            $stmt8->close();
        }
        $stmt9 = $this->conexion->prepare("DELETE FROM libros_venta WHERE id_usuario = ?");
        if ($stmt9) {
            $stmt9->bind_param("i", $id);
            $stmt9->execute();
            $stmt9->close();
        }
        $stmt10 = $this->conexion->prepare("DELETE FROM config_usuario WHERE id_usuario = ?");
        if ($stmt10) {
            $stmt10->bind_param("i", $id);
            $stmt10->execute();
            $stmt10->close();
        }
        $stmt11 = $this->conexion->prepare("DELETE FROM libros WHERE usuario_id = ?");
        if ($stmt11) {
            $stmt11->bind_param("i", $id);
            $stmt11->execute();
            $stmt11->close();
        }
        $stmt12 = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        if (!$stmt12) {
            throw new Exception("Error preparando eliminación del usuario: " . $this->conexion->error);
        }
        $stmt12->bind_param("i", $id);
        $exito = $stmt12->execute();
        $stmt12->close();
        if ($exito) {
            $this->conexion->commit();
            return true;
        } else {
            throw new Exception("Error eliminando el usuario: " . $this->conexion->error);
        }
    } catch (Exception $e) {
        $this->conexion->rollback();
        error_log("Error eliminando usuario ID $id: " . $e->getMessage());
        return false;
    }
}
    public function buscarPorEmail($email) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function guardarTokenRecuperacion($idUsuario, $token) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET token_recuperacion = ?, token_expira = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE id = ?");
        if (!$stmt) {
            die("❌ Error en prepare: " . $this->conexion->error);
        }
        $stmt->bind_param("si", $token, $idUsuario);
        return $stmt->execute();
    }
    public function buscarPorToken($token) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE token_recuperacion = ? AND token_expira > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function actualizarPassword($idUsuario, $nuevaPassword) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET password = ?, token_recuperacion = NULL, token_expira = NULL WHERE id = ?");
        $stmt->bind_param("si", $nuevaPassword, $idUsuario);
        return $stmt->execute();
    }
    public function borrarToken($id) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET token_recuperacion = NULL WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }
    public function obtenerTodosMenos($id_actual) {
        $stmt = $this->conexion->prepare("SELECT id, nombre FROM usuarios WHERE id != ?");
        if (!$stmt) return [];
        $stmt->bind_param("i", $id_actual);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuarios = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $usuarios;
    }
    public function contarUsuarios() {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM usuarios");
        if (!$stmt) return 0;
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado ? $resultado->fetch_row() : [0];
        $stmt->close();
        return $row[0];
    }
    public function actualizarPerfil($id, $nombre, $email, $bio, $foto, $direccion, $genero_preferido, $libro_favorito) 
{
    $stmt = $this->conexion->prepare("UPDATE usuarios SET nombre = ?, email = ?, bio = ?, foto = ?, direccion = ?, genero_preferido = ?, libro_favorito = ? WHERE id = ?");
    if (!$stmt) return false;
    $stmt->bind_param("sssssssi", $nombre, $email, $bio, $foto, $direccion, $genero_preferido, $libro_favorito, $id);
    $exito = $stmt->execute();
    $stmt->close();
    return $exito;
}
    public function obtenerConfiguracion($idUsuario) {
        $stmt = $this->conexion->prepare("SELECT * FROM config_usuario WHERE id_usuario = ?");
        if (!$stmt) return null;
        $stmt->bind_param("i", $idUsuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $config = $resultado ? $resultado->fetch_assoc() : null;
        $stmt->close();
        return $config;
    }
    public function guardarConfiguracion($idUsuario, $tema, $color, $vista, $notificaciones) {
        $stmt = $this->conexion->prepare("SELECT id FROM config_usuario WHERE id_usuario = ?");
        if (!$stmt) return false;
        $stmt->bind_param("i", $idUsuario);
        $stmt->execute();
        $existe = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        if ($existe) {
            $stmt = $this->conexion->prepare("UPDATE config_usuario SET tema = ?, color_acento = ?, vista_libros = ?, notificaciones = ? WHERE id_usuario = ?");
            if (!$stmt) return false;
            $stmt->bind_param("sssii", $tema, $color, $vista, $notificaciones, $idUsuario);
        } else {
            $stmt = $this->conexion->prepare("INSERT INTO config_usuario (id_usuario, tema, color_acento, vista_libros, notificaciones) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) return false;
            $stmt->bind_param("isssi", $idUsuario, $tema, $color, $vista, $notificaciones);
        }
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }
}
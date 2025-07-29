<?php
require_once __DIR__ . '/../config/config.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function registrar($nombre, $email, $password) {
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $rol = 'usuario'; // por defecto

    $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Error en prepare: " . $this->conexion->error);
    }
    $stmt->bind_param("ssss", $nombre, $email, $hash, $rol);
    return $stmt->execute();
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
    return $this->conexion->error;
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
    $stmt = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
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
    $sql = "UPDATE usuarios SET token_recuperacion = NULL WHERE id = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$id]);
}
public function obtenerTodosMenos($id_actual)
{
    $stmt = $this->conexion->prepare("SELECT id, nombre FROM usuarios WHERE id != ?");
    $stmt->bind_param("i", $id_actual);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}
public function contarUsuarios() {
    $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM usuarios");
    $stmt->execute();
    $resultado = $stmt->get_result();
    $row = $resultado->fetch_row();
    return $row[0];
}

public function actualizarPerfil($id, $nombre, $email, $bio, $foto)
{
    $stmt = $this->conexion->prepare("UPDATE usuarios SET nombre = ?, email = ?, bio = ?, foto = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nombre, $email, $bio, $foto, $id);
    return $stmt->execute();
}
public function obtenerConfiguracion($idUsuario) {
    $conn = conectar();
    $stmt = $conn->prepare("SELECT * FROM config_usuario WHERE id_usuario = ?");
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_assoc();
}

public function guardarConfiguracion($idUsuario, $tema, $color, $vista, $notificaciones) {
    $conn = conectar();

    // Verificar si ya existe
    $stmt = $conn->prepare("SELECT id FROM config_usuario WHERE id_usuario = ?");
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $existe = $stmt->get_result()->fetch_assoc();

    if ($existe) {
        $stmt = $conn->prepare("UPDATE config_usuario SET tema = ?, color_acento = ?, vista_libros = ?, notificaciones = ? WHERE id_usuario = ?");
        $stmt->bind_param("sssii", $tema, $color, $vista, $notificaciones, $idUsuario);
    } else {
        $stmt = $conn->prepare("INSERT INTO config_usuario (id_usuario, tema, color_acento, vista_libros, notificaciones) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssi", $idUsuario, $tema, $color, $vista, $notificaciones);
    }

    $stmt->execute();
}
}
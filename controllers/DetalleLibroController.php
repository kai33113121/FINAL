<?php
require_once __DIR__ . "/../models/DetalleLibro.php";
require_once __DIR__ . '/../config/config.php';
class DetalleLibroController {
    private $modelo;
    public function __construct() {
        $this->modelo = new DetalleLibro();
    }
    public function verDetalle() {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        if (!isset($_GET['id'])) {
            echo "⚠️ ID de libro no especificado.";
            return;
        }
        $id = $_GET['id'];
        $tabla = $_GET['tabla'] ?? null; 
        $libro = null;
        if ($tabla === 'libros_venta') {
            $libro = $this->obtenerLibroDeVenta($id);
        } elseif ($tabla === 'libros') {
            $libro = $this->obtenerLibroOficial($id);
        } else {
            $libro = $this->buscarLibroEnAmbasTablas($id);
        }
        if (!$libro) {
            echo "⚠️ Libro no encontrado.";
            return;
        }
        $resenas = $this->modelo->obtenerResenasPorLibro($id);
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . "/../views/usuario/detalle_libro.php";
        include __DIR__ . "/../views/layouts/layout_usuario.php";
    }
    private function buscarLibroEnAmbasTablas($id) {
        $libro = $this->obtenerLibroDeVenta($id);
        if ($libro) {
            $libro['tabla_origen'] = 'libros_venta';
            return $libro;
        }
        $libro = $this->obtenerLibroOficial($id);
        if ($libro) {
            $libro['tabla_origen'] = 'libros';
            return $libro;
        }
        return null;
    }
    private function obtenerLibroDeVenta($id) {
        $conexion = conectar();
        $stmt = $conexion->prepare("
            SELECT lv.*, u.nombre as nombre_usuario, 'libros_venta' as tabla_origen
            FROM libros_venta lv
            LEFT JOIN usuarios u ON lv.id_usuario = u.id
            WHERE lv.id = ?
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libro = $result->fetch_assoc();
        $stmt->close();
        $conexion->close();
        return $libro;
    }
    private function obtenerLibroOficial($id) {
        $conexion = conectar();
        $stmt = $conexion->prepare("
            SELECT l.*, 'LibrosWap' as nombre_usuario, 'libros' as tabla_origen
            FROM libros l
            WHERE l.id = ? AND l.tipo_catalogo = 'oficial'
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libro = $result->fetch_assoc();
        $stmt->close();
        $conexion->close();
        return $libro;
    }
}
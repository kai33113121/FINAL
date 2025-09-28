<?php
require_once __DIR__ . '/../models/Libro.php';
require_once __DIR__ . '/../models/Venta.php';
class LibroController {
    private $catalogoModel;
    private $ventaModel;
    public function __construct() {
        $this->catalogoModel = new Libro();
        $this->ventaModel = new Venta();
    }
    public function explorar() {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $usuario_id = $_SESSION['usuario']['id'];
        $libros = $this->catalogoModel->obtenerDisponiblesParaUsuario($usuario_id);
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . '/../views/usuario/explorar.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
}
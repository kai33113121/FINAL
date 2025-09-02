<?php
require_once __DIR__ . '/../models/Libro.php';
require_once __DIR__ . '/../models/Venta.php';

class LibroController {
    private $catalogoModel;
    private $ventaModel;

    public function __construct() {
        $this->catalogoModel = new Libro();
        $this->ventaModel = new Venta(); // Ya se conecta internamente
    }

    public function explorar() {
        // Verifica sesión si la vista lo requiere
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $libros = $this->catalogoModel->obtenerTodos();
        // Falta obtener los libros en venta si quieres mostrar ambos en la vista:
        $libros_venta = $this->ventaModel->obtenerTodos();

        // Notificaciones para el usuario
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/explorar.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

}
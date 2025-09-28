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
        // Verifica sesión si la vista lo requiere
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        // Verificar si hay filtro de género desde la página de géneros
        $genero_filtro = $_GET['genero'] ?? null;
        
        if ($genero_filtro) {
            // Si hay filtro de género, obtener solo libros de ese género
            $libros = $this->catalogoModel->obtenerPorGenero($genero_filtro);
        } else {
            // Si no hay filtro, obtener todos como antes
            $libros = $this->catalogoModel->obtenerTodos();
        }
        
        // Mantener tus libros en venta como antes
        $libros_venta = $this->ventaModel->obtenerTodos();

        // Notificaciones para el usuario
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/explorar.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
}
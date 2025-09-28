<?php
require_once __DIR__ . '/../models/Libro.php';
require_once __DIR__ . '/../models/Venta.php';
class Explorar_librosController
{
    private $libroModel;
    private $ventaModel;
    public function __construct()
    {
        $this->libroModel = new Libro();
        $this->ventaModel = new Venta();
    }
    public function explorar()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $usuario_id = $_SESSION['usuario']['id'];
        $libros = $this->libroModel->obtenerDisponiblesParaUsuario($usuario_id);
        foreach ($libros as &$libro) {
            if ($libro['tabla_origen'] === 'libros_venta') {
                $libro['origen'] = 'usuario';
            } else {
                $libro['origen'] = 'oficial';
            }
            $libro['genero'] = $libro['genero'] ?? 'Sin género';
        }
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . '/../views/libros/explorar.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
}
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

    // Explorar todos los libros (intercambio + venta)
    public function explorar()
    {
        // Verifica sesión si la vista lo requiere
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $libros = $this->libroModel->obtenerTodos();   // libros generales
        $ventas = $this->ventaModel->obtenerTodos();   // libros en venta

        // Notificaciones para el usuario
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/libros/explorar.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
}

// Este archivo solo se usa si en tu router o en los links de tu app llamas a:
// index.php?c=Explorar_librosController&a=explorar
// Si tus vistas, menús o rutas usan LibroController o VentaController para explorar libros,
// entonces este archivo no se está usando.
// Verifica en tu menú, router y links si usas "Explorar_librosController".
// Si no aparece en ningún lado, puedes eliminarlo o ignorarlo.

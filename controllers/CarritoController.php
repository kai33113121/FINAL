<?php
require_once __DIR__ . '/../models/Carrito.php';

class CarritoController {
    public function agregar() {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $carrito = new Carrito();
        $carrito->agregar($_SESSION['usuario']['id'], $_GET['id']);
        header("Location: index.php?c=CarritoController&a=ver");
        exit;
    }

    public function ver() {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $carrito = new Carrito();
        $items = $carrito->obtener($_SESSION['usuario']['id']);

        // Notificaciones para el usuario
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/carrito.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function eliminar() {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $carrito = new Carrito();
        $carrito->eliminar($_GET['id']);
        header("Location: index.php?c=CarritoController&a=ver");
        exit;
    }

    public function confirmar() {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $carrito = new Carrito();
        $carrito->confirmarCompra($_SESSION['usuario']['id']);
        echo "✅ Compra confirmada.";
    }
}
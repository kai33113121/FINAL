<?php
require_once __DIR__ . '/../models/Libro.php';
class GenerosController
{
    public function index()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $libroModel = new Libro();
        $libros = $libroModel->obtenerTodos();
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $usuario_id = $_SESSION['usuario']['id'];
        $notificaciones = obtenerNotificacionesUsuario($usuario_id);
        $contenido = __DIR__ . '/../views/usuario/generos.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
}
?>
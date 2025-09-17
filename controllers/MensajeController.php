<?php
require_once __DIR__ . '/../models/Mensaje.php';
require_once __DIR__ . '/../models/Usuario.php';

class MensajeController
{
    public function mensajes()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $usuario_id = $_SESSION['usuario']['id'];
        $usuarioModel = new Usuario();
        $mensajeModel = new Mensaje();

        // Usuarios disponibles para iniciar chat
        $usuarios = $usuarioModel->obtenerTodosMenos($usuario_id);

        // Usuarios con conversaciones activas
        $conversaciones = $mensajeModel->obtenerUsuariosConConversaciones($usuario_id);

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($usuario_id);

        $contenido = __DIR__ . '/../views/usuario/mensajes.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function chat()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $usuario_id = $_SESSION['usuario']['id'];
        $otro_id = $_GET['id'] ?? null;

        $mensaje = new Mensaje();
        $usuarioModel = new Usuario();

        $mensajes = $mensaje->obtenerConversacion($usuario_id, $otro_id);
        $otro_usuario = $usuarioModel->obtenerPorId($otro_id);

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($usuario_id);

        $contenido = __DIR__ . '/../views/usuario/chat.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    
    public function enviar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['usuario']['id'])) {
                header("Location: index.php?c=UsuarioController&a=login");
                exit;
            }
            $emisor_id = $_SESSION['usuario']['id'];
            $receptor_id = $_POST['receptor_id'];
            $mensaje_texto = $_POST['mensaje'];

            $mensaje = new Mensaje();
            $mensaje->enviar($emisor_id, $receptor_id, $mensaje_texto);

            header("Location: index.php?c=MensajeController&a=chat&id=" . $receptor_id);
            exit;
        }
    }

    // MÉTODO NUEVO - Eliminar conversación
    public function eliminarChat()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $usuarioActual = $_SESSION['usuario']['id'];
        $usuarioEliminar = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($usuarioEliminar > 0) {
            $mensajeModel = new Mensaje();
            $mensajeModel->eliminarConversacion($usuarioActual, $usuarioEliminar);
        }

        header("Location: index.php?c=MensajeController&a=mensajes");
        exit;
    }
}
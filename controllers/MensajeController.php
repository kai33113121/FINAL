<?php
require_once __DIR__ . '/../models/Mensaje.php';
require_once __DIR__ . '/../models/Usuario.php';

class MensajeController
{
    public function mensajes()
{
    $usuario_id = $_SESSION['usuario']['id'];
    $usuarioModel = new Usuario();
    $mensajeModel = new Mensaje();

    // Usuarios disponibles para iniciar chat
    $usuarios = $usuarioModel->obtenerTodosMenos($usuario_id);

    // Usuarios con conversaciones activas
    $conversaciones = $mensajeModel->obtenerUsuariosConConversaciones($usuario_id);

    $contenido = __DIR__ . '/../views/usuario/mensajes.php';
    include __DIR__ . '/../views/layouts/layout_usuario.php';
}

    public function chat()
    {
        $usuario_id = $_SESSION['usuario']['id'];
        $otro_id = $_GET['id'] ?? null;

        $mensaje = new Mensaje();
        $usuarioModel = new Usuario();

        $mensajes = $mensaje->obtenerConversacion($usuario_id, $otro_id);
        $otro_usuario = $usuarioModel->obtenerPorId($otro_id);

        $contenido = __DIR__ . '/../views/usuario/chat.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function enviar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $emisor_id = $_SESSION['usuario']['id'];
            $receptor_id = $_POST['receptor_id'];
            $mensaje_texto = $_POST['mensaje'];

            $mensaje = new Mensaje();
            $mensaje->enviar($emisor_id, $receptor_id, $mensaje_texto);

            header("Location: index.php?c=MensajeController&a=chat&id=" . $receptor_id);
        }
    }
}
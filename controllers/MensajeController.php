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
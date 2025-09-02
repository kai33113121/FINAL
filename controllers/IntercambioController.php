<?php
require_once __DIR__ . '/../models/Intercambio.php';
require_once __DIR__ . '/../models/Libro.php';

class IntercambioController {
    public function solicitar() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $libro = new Libro();
        $libroSolicitado = $libro->obtenerPorId($_GET['id']);

        // Validar que el libro exista y no sea del mismo usuario
        if (!$libroSolicitado || $libroSolicitado['id_usuario'] == $_SESSION['usuario']['id']) {
            echo "❌ No puedes solicitar tu propio libro o el libro no existe.";
            return;
        }

        $misLibros = $libro->obtenerPorUsuario($_SESSION['usuario']['id']);

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/solicitar_intercambio.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function enviarSolicitud()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        // Validar que los datos estén completos
        if (!isset($_POST['libro_id_1'], $_POST['libro_id_2'], $_POST['usuario_2'])) {
            echo "❌ Datos incompletos.";
            return;
        }
        $libro_id_1 = $_POST['libro_id_1'];
        $libro_id_2 = $_POST['libro_id_2'];
        $usuario_1 = $_SESSION['usuario']['id'];
        $usuario_2 = $_POST['usuario_2'];

        $intercambio = new Intercambio();
        $exito = $intercambio->solicitar($libro_id_1, $libro_id_2, $usuario_1, $usuario_2);

        if ($exito) {
            // Notificación para el usuario destinatario (usuario_2)
            require_once __DIR__ . '/../models/Notificacion.php';
            require_once __DIR__ . '/../models/Libro.php';
            $libroModel = new Libro();
            $libroSolicitado = $libroModel->obtenerPorId($libro_id_2);

            $mensaje = "🔄 Has recibido una solicitud de intercambio por tu libro \"{$libroSolicitado['titulo']}\".";
            $link = "index.php?c=IntercambioController&a=notificaciones";
            $notificacion = new Notificacion();
            $notificacion->crear($usuario_2, $mensaje, $link);

            header("Location: index.php?c=IntercambioController&a=solicitar&id=$libro_id_2&exito=1");
            exit;
        } else {
            echo "❌ Error al registrar el intercambio.";
        }
    }

    public function misIntercambios() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $intercambio = new Intercambio();
        $intercambios = $intercambio->obtenerDetallado($_SESSION['usuario']['id']);

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/intercambios.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function solicitarIntercambio() {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        // Obtener el ID del usuario logueado
        $usuarioId = $_SESSION['usuario']['id'];

        // Crear instancia del modelo Libro
        $libro = new Libro();

        // Obtener el libro solicitado (por ejemplo, por GET o POST)
        $libroSolicitadoId = $_GET['libro_id'];
        $libroSolicitado = $libro->obtenerPorId($libroSolicitadoId);

        // Obtener los libros del usuario logueado
        $misLibros = $libro->obtenerPorUsuario($usuarioId);

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($usuarioId);

        $contenido = __DIR__ . '/../views/usuario/solicitar_intercambio.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function notificaciones() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . '/../views/usuario/notificaciones.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function responderSolicitud() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        if (!isset($_POST['intercambio_id'], $_POST['accion'])) {
            echo "❌ Datos incompletos.";
            return;
        }
        $intercambio = new Intercambio();
        $exito = $intercambio->actualizarEstado($_POST['intercambio_id'], $_POST['accion']);
        if ($exito) {
            echo "✅ Solicitud actualizada.";
        } else {
            echo "❌ Error al actualizar la solicitud.";
        }
    }

    public function dashboard() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . '/../views/usuario/dashboard.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
}
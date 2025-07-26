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
        if (!$libroSolicitado || $libroSolicitado['usuario_id'] == $_SESSION['usuario']['id']) {
            echo "❌ No puedes solicitar tu propio libro o el libro no existe.";
            return;
        }

        $misLibros = $libro->obtenerPorUsuario($_SESSION['usuario']['id']);
        include __DIR__ . '/../views/usuario/solicitar_intercambio.php';
    }

    public function enviarSolicitud() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        // Validar que los datos estén completos
        if (!isset($_POST['libro_id_1'], $_POST['libro_id_2'], $_POST['usuario_2'])) {
            echo "❌ Datos incompletos.";
            return;
        }

        $intercambio = new Intercambio();
        $exito = $intercambio->solicitar(
            $_POST['libro_id_1'], // libro ofrecido
            $_POST['libro_id_2'], // libro solicitado
            $_SESSION['usuario']['id'], // quien ofrece
            $_POST['usuario_2'] // dueño del libro solicitado
        );

        if ($exito) {
            echo "✅ Solicitud enviada.";
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

    $contenido = __DIR__ . '/../views/usuario/intercambios.php';
    include __DIR__ . '/../views/layouts/layout_usuario.php';
}
}
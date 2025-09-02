<?php
require_once __DIR__ . "/../models/DetalleLibro.php";

class DetalleLibroController {
    private $modelo;

    public function __construct() {
        $this->modelo = new DetalleLibro();
    }

    // Método que se llama desde el botón
    public function verDetalle() {
        // Verifica sesión si la vista lo requiere
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Obtener datos del libro
            $libro = $this->modelo->obtenerLibroPorId($id);

            // Obtener reseñas del libro
            $resenas = $this->modelo->obtenerResenasPorLibro($id);

            if ($libro) {
                // Notificaciones para el usuario
                require_once __DIR__ . '/../helpers/notificaciones_helper.php';
                $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

                $contenido = __DIR__ . "/../views/usuario/detalle_libro.php";
                include __DIR__ . "/../views/layouts/layout_usuario.php";
            } else {
                echo "⚠️ Libro no encontrado.";
            }
        } else {
            echo "⚠️ ID de libro no especificado.";
        }
    }
}


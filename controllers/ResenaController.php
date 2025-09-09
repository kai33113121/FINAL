<?php
require_once __DIR__ . '/../models/Resena.php';

class ResenaController
{
    // ✅ Vista de reseñas por libro (usuario)
    public function ver()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $resena = new Resena();
        $resenas = $resena->obtenerPorLibro($_GET['id']);
        $promedio = $resena->promedio($_GET['id']);

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/resenas.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    // ✅ Agregar reseña (usuario)
    public function agregar()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resena = new Resena();
            $libro_id = $_POST['libro_id'];
            $usuario_id = $_SESSION['usuario']['id'];

            if ($resena->yaResenado($libro_id, $usuario_id)) {
                echo "<script>alert('Ya has dejado una reseña para este libro.'); window.history.back();</script>";
                exit;
            }

            // 📝 Guardar reseña
            $resena->agregar(
                $libro_id,
                $usuario_id,
                $_POST['calificacion'],
                $_POST['comentario']
            );

            // Redirigir sin crear notificación
            header("Location: index.php?c=ResenaController&a=ver&id=$libro_id");
            exit;
        }
    }

    // ✅ Vista de todas las reseñas (admin)
    public function admin()
    {
        $resena = new Resena();
        $resenas = $resena->obtenerTodas();
        $total = $resena->contarTodas();

        // Vista integrada al layout del admin
        $contenido = __DIR__ . '/../views/admin/resenas.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }

    // ✅ Eliminar reseña (admin)
    public function eliminar()
    {
        if (isset($_GET['id'])) {
            $resena = new Resena();
            $resena->eliminar($_GET['id']);
        }
        header("Location: index.php?c=ResenaController&a=admin");
        exit;
    }

    public function formulario()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/agregar_resena.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
}
<?php
require_once __DIR__ . '/../models/Resena.php';

class ResenaController
{
    // ✅ Vista de reseñas por libro (usuario)
    public function ver()
    {
        $resena = new Resena();
        $resenas = $resena->obtenerPorLibro($_GET['id']);
        $promedio = $resena->promedio($_GET['id']);

        $contenido = __DIR__ . '/../views/usuario/resenas.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    // ✅ Agregar reseña (usuario)
    public function agregar()
    {
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

            // 🔍 Obtener dueño del libro
            require_once __DIR__ . '/../models/Libro.php';
            $libro = new Libro();
            $datosLibro = $libro->obtenerPorId($libro_id);
            $id_dueño_libro = $datosLibro['usuario_id'];

            // 🔔 Insertar notificación
            require_once __DIR__ . '/../models/Notificacion.php';
            $notificacion = new Notificacion();
            $mensaje = "📖 ¡Tu libro recibió una nueva reseña!";
            $link = "index.php?c=ResenaController&a=ver&id=$libro_id";
            $notificacion->insertar($id_dueño_libro, $mensaje, $link, 'reseña');

            // ✅ Redirigir a vista de reseñas
            header("Location: index.php?c=ResenaController&a=ver&id=$libro_id");
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
    }
    public function formulario()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $contenido = __DIR__ . '/../views/usuario/agregar_resena.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
}
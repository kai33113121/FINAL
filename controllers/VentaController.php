<?php
class VentaController
{
    public function crearVista()
    {
        $contenido = __DIR__ . '/../views/usuario/crear_venta.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function crear()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();
        require_once __DIR__ . '/../models/Venta.php';

        $venta = new Venta();
        $id_usuario = $_SESSION['usuario']['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];
        $imagen = $_FILES['imagen']['name'];

        $ruta = __DIR__ . '/../public/img/libros/' . $imagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

        $venta->crear($id_usuario, $titulo, $autor, $descripcion, $precio, $estado, $imagen);
        header("Location: index.php?c=VentaController&a=misVentas");
    }

    public function misVentas()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();
        require_once __DIR__ . '/../models/Venta.php';

        $venta = new Venta();
        $libros = $venta->obtenerPorUsuario($_SESSION['usuario']['id']);
        extract(['libros' => $libros]);

        $contenido = __DIR__ . '/../views/usuario/mis_ventas.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function eliminar()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();
        require_once __DIR__ . '/../models/Venta.php';

        $venta = new Venta();
        $id = $_GET['id'] ?? null;

        if ($id) {
            $venta->eliminar($id, $_SESSION['usuario']['id']);
        }

        header("Location: index.php?c=VentaController&a=misVentas");
    }

    public function editarVista()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();
        require_once __DIR__ . '/../models/Venta.php';

        $venta = new Venta();
        $id = $_GET['id'] ?? null;
        $libro = $venta->obtenerPorId($id, $_SESSION['usuario']['id']);
        extract(['libro' => $libro]);

        $contenido = __DIR__ . '/../views/usuario/editar_venta.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function actualizar()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];
        $imagen = $_POST['imagen_actual'];
        $id_usuario = $_SESSION['usuario']['id'];

        if (!empty($_FILES['imagen']['name'])) {
            $nombreArchivo = uniqid() . "_" . basename($_FILES['imagen']['name']);
            $rutaDestino = __DIR__ . '/../public/img/' . $nombreArchivo;

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                $imagen = $nombreArchivo;
            } else {
                echo "⚠️ Error al subir la nueva imagen.";
                return;
            }
        }

        require_once __DIR__ . '/../models/Venta.php';
        $ventaModel = new Venta();
        $ventaModel->actualizar($id, $id_usuario, $titulo, $autor, $descripcion, $precio, $estado, $imagen);

        header("Location: index.php?c=VentaController&a=misVentas");
    }
    
}
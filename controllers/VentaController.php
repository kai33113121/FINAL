<?php
class VentaController
{
    public function crearVista()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/crear_venta.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function crear()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        require_once __DIR__ . '/../models/Venta.php';
        $venta = new Venta();

        // Validar que los campos requeridos no estén vacíos
    if (empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['descripcion']) || empty($_POST['precio']) || empty($_POST['estado']) || empty($_POST['genero'])) {
            $_SESSION['error'] = "Todos los campos son obligatorios.";
            header("Location: index.php?c=VentaController&a=crearVista");
            exit;
        }

        // Sanear y validar datos
        $id_usuario = $_SESSION['usuario']['id'];
        $titulo = htmlspecialchars($_POST['titulo']);
        $autor = htmlspecialchars($_POST['autor']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $precio = floatval($_POST['precio']);
    $genero = htmlspecialchars($_POST['genero']);
    $estado = htmlspecialchars($_POST['estado']);
        $fecha = date('Y-m-d');

        if ($precio <= 0) {
            $_SESSION['error'] = "El precio debe ser un número positivo.";
            header("Location: index.php?c=VentaController&a=crearVista");
            exit;
        }

        // Validar la imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $imagen = $_FILES['imagen']['name'];
            $target_dir = __DIR__ . '/../public/img/libros/';
            $target_file = $target_dir . uniqid() . "_" . basename($imagen);

            // Validar si es imagen
            $check = getimagesize($_FILES['imagen']['tmp_name']);
            if ($check === false) {
                $_SESSION['error'] = "El archivo no es una imagen válida.";
                header("Location: index.php?c=VentaController&a=crearVista");
                exit;
            }

            // Validar extensión
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (!in_array($file_extension, $allowed_extensions)) {
                $_SESSION['error'] = "Solo se permiten imágenes JPG, JPEG, PNG y GIF.";
                header("Location: index.php?c=VentaController&a=crearVista");
                exit;
            }

            // Crear carpeta si no existe
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Subir archivo
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
                $_SESSION['error'] = "Error al subir el archivo.";
                header("Location: index.php?c=VentaController&a=crearVista");
                exit;
            }
            $nombreImagen = basename($target_file);
        } else {
            $_SESSION['error'] = "Debe subir una imagen del libro.";
            header("Location: index.php?c=VentaController&a=crearVista");
            exit;
        }

        // Guardar en BD
    if ($venta->crear($id_usuario, $titulo, $autor, $descripcion, $genero, $precio, $estado, $nombreImagen)) {
            $_SESSION['success'] = "¡Libro publicado exitosamente!";
            header("Location: index.php?c=VentaController&a=misVentas");
            exit;
        } else {
            $_SESSION['error'] = "Hubo un error al intentar publicar el libro.";
            header("Location: index.php?c=VentaController&a=crearVista");
            exit;
        }
    }

    public function editarVista()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../models/Venta.php';
        $venta = new Venta();
        $id = $_GET['id'] ?? null;
        $libro = $venta->obtenerPorId($id);
        extract(['libro' => $libro]);

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/editar_venta.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function misVentas()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../models/Venta.php';
        $venta = new Venta();
        $libros = $venta->obtenerPorUsuario($_SESSION['usuario']['id']);
        extract(['libros' => $libros]);

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/mis_ventas.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function actualizar()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $descripcion = $_POST['descripcion'];
        $precio = floatval($_POST['precio']);
        $estado = $_POST['estado'];
        $imagen = $_POST['imagen_actual'];
        $id_usuario = $_SESSION['usuario']['id'];

        // Subir nueva imagen si existe
        if (!empty($_FILES['imagen']['name'])) {
            $nombreArchivo = uniqid() . "_" . basename($_FILES['imagen']['name']);
            $rutaDestino = __DIR__ . '/../public/img/libros/' . $nombreArchivo;

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                $imagen = $nombreArchivo;
            } else {
                $_SESSION['error'] = "⚠️ Error al subir la nueva imagen.";
                header("Location: index.php?c=VentaController&a=editarVista&id=$id");
                exit;
            }
        }

        require_once __DIR__ . '/../models/Venta.php';
        $ventaModel = new Venta();
        $ventaModel->actualizar($id, $id_usuario, $titulo, $autor, $descripcion, $precio, $estado, $imagen);

        $_SESSION['success'] = "Libro actualizado correctamente.";
        header("Location: index.php?c=VentaController&a=misVentas");
        exit;
    }

    public function eliminar()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../models/Venta.php';
        $id = $_GET['id'] ?? null;
        if ($id) {
            $venta = new Venta();
            $venta->eliminarPorId($id);
            $_SESSION['success'] = "Libro eliminado correctamente.";
        }
        header("Location: index.php?c=VentaController&a=misVentas");
        exit;
    }
}

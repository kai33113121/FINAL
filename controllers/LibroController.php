<?php
require_once __DIR__ . '/../models/Libro.php';

class LibroController
{
    public function subir()
{
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?c=UsuarioController&a=login");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // 🧼 Sanitizar nombre de imagen
        $imagenOriginal = $_FILES['imagen']['name'];
        $imagen = preg_replace('/[^a-zA-Z0-9\._-]/', '_', $imagenOriginal);

        $rutaCarpeta = 'public/img/';
        $ruta = $rutaCarpeta . $imagen;

        // ✅ Crear carpeta si no existe
        if (!is_dir($rutaCarpeta)) {
            mkdir($rutaCarpeta, 0777, true);
        }

        // ✅ Subir imagen
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
            $libro = new Libro();
            $libro->crear([
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'genero' => $_POST['genero'],
                'estado' => $_POST['estado'],
                'descripcion' => $_POST['descripcion'],
                'imagen' => $imagen,
                'usuario_id' => $_SESSION['usuario']['id'],
                'modo' => $_POST['modo'],
                'precio' => $_POST['modo'] === 'venta' ? floatval($_POST['precio']) : null
            ]);
            

            echo "✅ Libro subido correctamente.";
        } else {
            echo "❌ Error al subir la imagen.";
            return;
        }
    } else {
        $contenido = __DIR__ . '/../views/usuario/subir_libro.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
}
    public function biblioteca()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $libro = new Libro();
        $misLibros = $libro->obtenerPorUsuario($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/biblioteca.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function editar()
    {
        $libro = new Libro();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Si no se sube nueva imagen, conservar la anterior
            if (!empty($_FILES['imagen']['name'])) {
                $imagenOriginal = $_FILES['imagen']['name'];
                $imagen = preg_replace('/[^a-zA-Z0-9\._-]/', '_', $imagenOriginal);
                $ruta = 'public/img/' . $imagen;

                if (!is_dir('public/img/')) {
                    mkdir('public/img/', 0777, true);
                }

                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
            } else {
                $imagen = $_POST['imagen_actual']; // Campo oculto en el formulario
            }

            $libro->actualizar($_POST['id'], [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'genero' => $_POST['genero'],
                'estado' => $_POST['estado'],
                'descripcion' => $_POST['descripcion'],
                'imagen' => $imagen,
                'modo' => $_POST['modo'],
                'precio' => $_POST['modo'] === 'venta' ? floatval($_POST['precio']) : null
            ]);

            header("Location: index.php?c=LibroController&a=biblioteca");
        } else {
            $datos = $libro->obtenerPorId($_GET['id']);
            include __DIR__ . '/../views/usuario/editar_libro.php';
        }
    }

    public function eliminar()
    {
        $libro = new Libro();
        $libro->eliminar($_GET['id']);
        header("Location: index.php?c=LibroController&a=biblioteca");
    }
    public function explorar()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $libro = new Libro();
        $libros = $libro->obtenerDeOtrosUsuarios($_SESSION['usuario']['id']);

        $contenido = __DIR__ . '/../views/usuario/explorar_libros.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function publicos()
{
    $libro = new Libro();
    $libros = $libro->obtenerTodosConUsuario();

    include __DIR__ . '/../views/auth/libros_publicos.php';
}

}
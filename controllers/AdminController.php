<?php

require_once __DIR__ . '/../models/Libro.php';
// require_once __DIR__ . '/../models/Venta.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Intercambio.php';
require_once __DIR__ . '/../models/Evento.php';
require_once __DIR__ . '/../models/Resena.php';
require_once __DIR__ . '/../models/Carrito.php';

class AdminController
{
    private $libroModel;
    private $ventaModel;
    private $intercambioModel;
    private $usuarioModel;
    private $eventoModel;
    private $resenaModel;

    public function __construct()
    {
        $this->libroModel = new Libro();
        // $this->ventaModel = new Venta();
        $this->intercambioModel = new Intercambio();
        $this->usuarioModel = new Usuario();
        $this->eventoModel = new Evento();
        $this->resenaModel = new Resena();
    }

    public function dashboard()
    {
        // Obtener estadísticas reales
        $stats = [
            'libros' => $this->libroModel->contarLibros(),
            // 'ventas' => $this->ventaModel->contarVentas(),
            'intercambios' => $this->intercambioModel->contarIntercambios(),
            'usuarios' => $this->usuarioModel->contarUsuarios(),
            'eventos' => $this->eventoModel->contarEventos(),
            'resenas' => $this->resenaModel->contarResenas()
        ];
        $generos = $this->libroModel->contarPorGenero();
        $estadosIntercambio = $this->intercambioModel->contarPorEstado();
        $resenasPorLibro = $this->resenaModel->contarPorLibro();
        // Cargar vista
        $contenido = __DIR__ . '/../views/admin/dashboard.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }


    // Otros métodos del admin...
    public function libros()
    {
        require_once __DIR__ . '/../models/Libro.php';
        $libro = new Libro();
        $libros = $libro->obtenerTodosConUsuario();

        $contenido = __DIR__ . '/../views/admin/libros.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function eliminarLibro()
    {
        require_once __DIR__ . '/../models/Libro.php';
        $libro = new Libro();
        $libro->eliminar($_GET['id']);
        header("Location: index.php?c=AdminController&a=libros");
    }
    public function editarLibro()
    {
        require_once __DIR__ . '/../models/Libro.php';
        $libro = new Libro();
        $datos = $libro->obtenerPorId($_GET['id']);

        if (!$datos) {
            echo "❌ Libro no encontrado.";
            return;
        }

        $contenido = __DIR__ . '/../views/admin/editar_libro.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function guardarEdicionLibro()
    {
        require_once __DIR__ . '/../models/Libro.php';
        $libro = new Libro();

        $libro->actualizar($_POST['id'], [
            'titulo' => $_POST['titulo'],
            'autor' => $_POST['autor'],
            'genero' => $_POST['genero'],
            'estado' => $_POST['estado'],
            'descripcion' => $_POST['descripcion']
        ]);

        header("Location: index.php?c=AdminController&a=libros");
    }
    public function subirLibro()
    {
        $contenido = __DIR__ . '/../views/admin/subir_libro.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function usuarios()
    {
        require_once __DIR__ . '/../models/Usuario.php';
        $usuario = new Usuario();
        $usuarios = $usuario->obtenerTodos();

        $contenido = __DIR__ . '/../views/admin/usuarios.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function editarUsuario()
    {
        require_once __DIR__ . '/../models/Usuario.php';
        $usuario = new Usuario();
        $datos = $usuario->obtenerPorId($_GET['id']);

        $contenido = __DIR__ . '/../views/admin/editar_usuario.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function guardarUsuario()
    {
        require_once __DIR__ . '/../models/Usuario.php';
        $usuario = new Usuario();

        $usuario->actualizar($_POST['id'], [
            'nombre' => $_POST['nombre'],
            'email' => $_POST['email'],
            'rol' => $_POST['rol'],
            'bio' => $_POST['bio']
        ]);

        header("Location: index.php?c=AdminController&a=usuarios");
    }
    public function eliminarUsuario()
    {
        require_once __DIR__ . '/../models/Usuario.php';
        $usuario = new Usuario();
        $usuario->eliminar($_GET['id']);
        header("Location: index.php?c=AdminController&a=usuarios");
    }
    public function intercambios()
    {
        require_once __DIR__ . '/../models/Intercambio.php';
        $intercambio = new Intercambio();
        $intercambios = $intercambio->obtenerTodosDetallado();

        $contenido = __DIR__ . '/../views/admin/intercambios.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function cambiarEstadoIntercambio()
    {
        require_once __DIR__ . '/../models/Intercambio.php';
        $intercambio = new Intercambio();
        $intercambio->actualizarEstado($_GET['id'], $_GET['estado']);
        header("Location: index.php?c=AdminController&a=intercambios");
    }
    public function eliminarIntercambio()
    {
        require_once __DIR__ . '/../models/Intercambio.php';
        $intercambio = new Intercambio();
        $intercambio->eliminar($_GET['id']);
        header("Location: index.php?c=AdminController&a=intercambios");
    }
    public function graficas()
    {
        require_once __DIR__ . '/../models/Libro.php';
        require_once __DIR__ . '/../models/Usuario.php';
        require_once __DIR__ . '/../models/Intercambio.php';
        require_once __DIR__ . '/../models/Carrito.php';

        $libro = new Libro();
        $usuario = new Usuario();
        $intercambio = new Intercambio();
        $carrito = new Carrito();

        $stats = [
            'libros' => count($libro->obtenerTodosConUsuario()),
            'usuarios' => count($usuario->obtenerTodos()),
            'intercambios' => count($intercambio->obtenerTodosDetallado()),
            'ventas' => count($carrito->obtenerCompras())
        ];

        $contenido = __DIR__ . '/../views/admin/graficas.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function reportes()
    {
        require_once __DIR__ . '/../models/Libro.php';
        require_once __DIR__ . '/../models/Usuario.php';
        require_once __DIR__ . '/../models/Intercambio.php';
        require_once __DIR__ . '/../models/Carrito.php';

        $libro = new Libro();
        $usuario = new Usuario();
        $intercambio = new Intercambio();
        $carrito = new Carrito();

        // 🔍 Libros con filtros
        $libros = $libro->obtenerTodosConUsuario();

        if (!empty($_GET['autor'])) {
            $libros = array_filter($libros, function ($l) {
                return stripos($l['autor'], $_GET['autor']) !== false;
            });
        }

        if (!empty($_GET['genero'])) {
            $libros = array_filter($libros, function ($l) {
                return stripos($l['genero'], $_GET['genero']) !== false;
            });
        }

        if (!empty($_GET['estado'])) {
            $libros = array_filter($libros, function ($l) {
                return $l['estado'] === $_GET['estado'];
            });
        }

        // 🔄 Intercambios con filtro por estado
        $intercambios = $intercambio->obtenerTodosDetallado();

        if (!empty($_GET['estado_intercambio'])) {
            $intercambios = array_filter($intercambios, function ($i) {
                return $i['estado'] === $_GET['estado_intercambio'];
            });
        }

        // 💰 Ventas con filtros por usuario y fecha
        $ventas = $carrito->obtenerCompras();

        if (!empty($_GET['usuario_venta'])) {
            $ventas = array_filter($ventas, function ($v) {
                return stripos($v['nombre_usuario'], $_GET['usuario_venta']) !== false;
            });
        }

        if (!empty($_GET['fecha_venta'])) {
            $ventas = array_filter($ventas, function ($v) {
                return strpos($v['fecha'], $_GET['fecha_venta']) === 0;
            });
        }

        // ✅ Construir el array de reportes
        $reportes = [
            'libros' => $libros,
            'usuarios' => $usuario->obtenerTodos(),
            'intercambios' => $intercambios,
            'ventas' => $ventas
        ];

        $contenido = __DIR__ . '/../views/admin/reportes.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    
        public function guardarLibro()
{
    $libro = new Libro();

    $datos = [
    'titulo' => $_POST['titulo'],
    'autor' => $_POST['autor'],
    'genero' => $_POST['genero'],
    'estado' => $_POST['estado'],
    'descripcion' => $_POST['descripcion'],
    'modo' => $_POST['modo'] ?? 'intercambio',
    'precio' => $_POST['precio'] ?? 0,
    'imagen' => '',
    'id_usuario' => $_SESSION['usuario']['id'] // ✅ Este nombre debe coincidir con el modelo
];

    if (!empty($_FILES['imagen']['name'])) {
        $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], 'public/img/' . $nombreArchivo);
        $datos['imagen'] = $nombreArchivo;
    } else {
        $datos['imagen'] = 'default.jpg';
    }

    $libro->crear($datos);

    header("Location: index.php?c=AdminController&a=libros");
}
public function perfil()
{
    require_once __DIR__ . '/../models/Usuario.php';
    $usuarioModel = new Usuario();
    $usuario = $usuarioModel->obtenerPorId($_SESSION['usuario']['id']);

    $contenido = __DIR__ . '/../views/admin/perfil.php';
    include __DIR__ . '/../views/layouts/layout_admin.php';
}

public function actualizarPerfil()
{
    require_once __DIR__ . '/../models/Usuario.php';
    $usuarioModel = new Usuario();

    $id = $_SESSION['usuario']['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $bio = $_POST['bio'] ?? '';
    $foto = $_SESSION['usuario']['foto'] ?? 'default.jpg';

    if (!empty($_FILES['foto']['name'])) {
        $nombreArchivo = uniqid() . '_' . basename($_FILES['foto']['name']);
        $rutaDestino = __DIR__ . '/../public/img/usuarios/' . $nombreArchivo;
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
            $foto = $nombreArchivo;
        }
    }

    $usuarioModel->actualizarPerfil($id, $nombre, $email, $bio, $foto);

    // Actualizar sesión
    $_SESSION['usuario']['nombre'] = $nombre;
    $_SESSION['usuario']['email'] = $email;
    $_SESSION['usuario']['bio'] = $bio;
    $_SESSION['usuario']['foto'] = $foto;

    header("Location: index.php?c=AdminController&a=perfil");
}
}

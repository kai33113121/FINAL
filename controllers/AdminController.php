<?php
require_once __DIR__ . '/../models/Libro.php';
require_once __DIR__ . '/../models/Venta.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Intercambio.php';
require_once __DIR__ . '/../models/Evento.php';
require_once __DIR__ . '/../models/Resena.php';
require_once __DIR__ . '/../models/Carrito.php';
require_once __DIR__ . '/../models/Compra.php';
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
    $this->ventaModel = new Venta(); 
    $this->intercambioModel = new Intercambio();
    $this->usuarioModel = new Usuario();
    $this->eventoModel = new Evento();
    $this->resenaModel = new Resena();
}
   public function dashboard()
{
    require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
    $stats = [
        'libros_oficiales' => $this->libroModel->contarLibrosOficiales(),
        'libros_usuarios' => $this->libroModel->contarLibrosUsuarios(),
        'libros' => $this->libroModel->contarLibrosOficiales() + $this->libroModel->contarLibrosUsuarios(), 
        'ventas' => $this->ventaModel->contarVentas(),
        'intercambios' => $this->intercambioModel->contarIntercambios(),
        'usuarios' => $this->usuarioModel->contarUsuarios(),
        'eventos' => $this->eventoModel->contarEventos(),
        'resenas' => $this->resenaModel->contarResenas()
    ];
    $generos = $this->libroModel->contarPorGenero();
    $estadosIntercambio = $this->intercambioModel->contarPorEstado();
    $resenasPorLibro = $this->resenaModel->contarPorLibro();
    $contenido = __DIR__ . '/../views/admin/dashboard.php';
    include __DIR__ . '/../views/layouts/layout_admin.php';
}
    public function libros()
{
    require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
    require_once __DIR__ . '/../models/Libro.php';
    $libro = new Libro();
    $libros = $libro->obtenerLibrosOficiales();
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
        require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
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
        require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
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
    require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
    require_once __DIR__ . '/../models/Libro.php';
    require_once __DIR__ . '/../models/Venta.php';
    require_once __DIR__ . '/../models/Usuario.php';
    require_once __DIR__ . '/../models/Intercambio.php';
    require_once __DIR__ . '/../models/Compra.php';
    require_once __DIR__ . '/../models/Resena.php';
    $libro = new Libro();
    $venta = new Venta();
    $usuario = new Usuario();
    $intercambio = new Intercambio();
    $compra = new Compra();
    $resena = new Resena();
    $stats = [
        'libros_admin' => $libro->contarLibrosOficiales(),
        'libros_usuarios' => $venta->contarLibrosUsuarios(),
        'usuarios' => $usuario->contarUsuarios(),
        'intercambios' => $intercambio->contarIntercambios(),
        'compras' => $compra->contarCompras(),
        'resenas' => $resena->contarResenas(),
        'foros' => 0 
    ];
    $contenido = __DIR__ . '/../views/admin/graficas.php';
    include __DIR__ . '/../views/layouts/layout_admin.php';
}
public function reportes() {
    require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
    $conexion = conectar();
    $reportes = [];
    $sql = "SELECT id, nombre, email, rol FROM usuarios ORDER BY id DESC";
    $result = $conexion->query($sql);
    $reportes['usuarios'] = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    $sql = "SELECT id, titulo, autor, genero, precio FROM libros ORDER BY titulo";
    $result = $conexion->query($sql);
    $reportes['libros'] = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    $sql = "SELECT lv.id, lv.titulo, lv.autor, lv.estado, lv.precio, 
                   COALESCE(u.nombre, 'Usuario eliminado') as nombre_usuario
            FROM libros_venta lv 
            LEFT JOIN usuarios u ON lv.id_usuario = u.id 
            ORDER BY lv.titulo";
    $result = $conexion->query($sql);
    $reportes['libros_venta'] = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    $sql = "SELECT c.id, c.total, c.estado, c.fecha,
                   COALESCE(u.nombre, 'Usuario eliminado') as nombre_usuario
            FROM compras c 
            LEFT JOIN usuarios u ON c.usuario_id = u.id 
            ORDER BY c.fecha DESC";
    $result = $conexion->query($sql);
    $reportes['compras'] = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    $sql = "SELECT dc.id, dc.compra_id, dc.cantidad, dc.precio, 
                   COALESCE(dc.titulo, 'Título no disponible') as titulo
            FROM detalle_compras dc 
            ORDER BY dc.compra_id DESC LIMIT 100";
    $result = $conexion->query($sql);
    $reportes['detalle_compras'] = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
try {
    $sql = "SELECT COUNT(*) FROM intercambios LIMIT 1";
    $result = $conexion->query($sql);
    if ($result) {
        $sql = "SELECT id, estado, fecha FROM intercambios ORDER BY fecha DESC LIMIT 50";
        $result = $conexion->query($sql);
        $reportes['intercambios'] = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    } else {
        $reportes['intercambios'] = [];
    }
} catch (Exception $e) {
    $reportes['intercambios'] = [];
}
try {
    $sql = "SELECT COUNT(*) FROM resenas LIMIT 1";
    $result = $conexion->query($sql);
    if ($result) {
        $sql = "SELECT r.id, r.calificacion, r.comentario, r.fecha,
                       COALESCE(u.nombre, 'Usuario eliminado') as nombre_usuario,
                       'Libro reseñado' as titulo_libro
                FROM resenas r
                LEFT JOIN usuarios u ON r.usuario_id = u.id
                ORDER BY r.fecha DESC LIMIT 50";
        $result = $conexion->query($sql);
        $reportes['resenas'] = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    } else {
        $reportes['resenas'] = [];
    }
} catch (Exception $e) {
    $reportes['resenas'] = [];
}
    $conexion->close();
    $contenido = __DIR__ . "/../views/admin/reportes.php";
    include __DIR__ . "/../views/layouts/layout_admin.php";
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
        'modo' => 'venta', // SIEMPRE venta para libros del admin
        'precio' => $_POST['precio'] ?? 25000, // Precio obligatorio
        'imagen' => 'default.jpg'
    ];
    if (!empty($_FILES['imagen']['name'])) {
        $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
        $rutaDestino = __DIR__ . '/../public/img/libros/' . $nombreArchivo;
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            $datos['imagen'] = $nombreArchivo;
        }
    }
    $resultado = $libro->crearLibroOficial($datos);
    
    if ($resultado['success']) {
        header("Location: index.php?c=AdminController&a=libros");
    } else {
        echo "Error: " . $resultado['message'];
    }
}
public function inventario()
{
    require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
    require_once __DIR__ . '/../models/Inventario.php';
    $inventario = new Inventario();
    $items = $inventario->obtenerTodos();

    $contenido = __DIR__ . '/../views/admin/inventario.php';
    include __DIR__ . '/../views/layouts/layout_admin.php';
}
    public function perfil()
    {
        require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
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
        $usuarioModel->actualizarPerfil($id, $nombre, $email, $bio, $foto, '', '', '');
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['email'] = $email;
        $_SESSION['usuario']['bio'] = $bio;
        $_SESSION['usuario']['foto'] = $foto;
        header("Location: index.php?c=AdminController&a=perfil");
    }
public function ventas()
{
    require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
    $librosEnVenta = $this->ventaModel->obtenerLibrosUsuarios(); 
    $contenido = __DIR__ . '/../views/admin/ventas.php';
    include __DIR__ . '/../views/layouts/layout_admin.php';
}
public function crearLibroOficial()
{
    $contenido = __DIR__ . '/../views/admin/crear_libro_oficial.php';
    include __DIR__ . '/../views/layouts/layout_admin.php';
}
public function guardarLibroOficial()
{
    require_once __DIR__ . '/../models/Libro.php';
    $libro = new Libro();
    $datos = [
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'genero' => $_POST['genero'],
        'estado' => $_POST['estado'],
        'descripcion' => $_POST['descripcion'],
        'imagen' => 'default.jpg'
    ];
    if (!empty($_FILES['imagen']['name'])) {
        $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
        $rutaDestino = __DIR__ . '/../public/img/libros/' . $nombreArchivo;
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            $datos['imagen'] = $nombreArchivo;
        }
    }
    $resultado = $libro->crearLibroOficial($datos);
    if ($resultado['success']) {
        header("Location: index.php?c=AdminController&a=libros&msg=created");
    } else {
        header("Location: index.php?c=AdminController&a=libros&error=" . urlencode($resultado['message']));
    }
    exit;
}
    public function eliminarVenta()
    {
        require_once __DIR__ . '/../models/Venta.php';
        $venta = new Venta();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $venta->eliminarPorId($_GET['id']); // ✅ usa el nuevo método
        }
        header('Location: index.php?c=AdminController&a=ventas');
        exit;
    }
    public function editarVenta()
    {
        require_once __DIR__ . '/../models/Venta.php';
        $venta = new Venta();
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?c=AdminController&a=ventas');
            exit;
        }
    $libro = $venta->obtenerPorIdAdmin($_GET['id']);
        if (!$libro) {
            header('Location: index.php?c=AdminController&a=ventas');
            exit;
        }
        extract(['libro' => $libro]);
        $contenido = __DIR__ . '/../views/admin/editar_venta.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function actualizarVenta()
    {
        require_once __DIR__ . '/../models/Venta.php';
        $venta = new Venta();
        $id = $_POST['id'] ?? null;
        $titulo = $_POST['titulo'] ?? '';
        $autor = $_POST['autor'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $precio = $_POST['precio'] ?? 0;
        $estado = $_POST['estado'] ?? 'usado';
        if (!$id || !is_numeric($id)) {
            header('Location: index.php?c=AdminController&a=ventas');
            exit;
        }
        $imagen = null;
        if (!empty($_FILES['imagen']['name'])) {
            $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
            $rutaDestino = __DIR__ . '/../public/img/libros/' . $nombreArchivo;
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                $imagen = $nombreArchivo;
            }
        }
        $venta->actualizarAdmin($id, $titulo, $autor, $descripcion, $precio, $estado, $imagen);
        header('Location: index.php?c=AdminController&a=ventas');
        exit;
    }
public function guardarInventario() {
    require_once __DIR__ . '/../models/Inventario.php';
    $inventario = new Inventario();
    $datos = [
        'isbn' => $_POST['isbn'] ?? '',
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'genero' => $_POST['genero'] ?? '',
        'precio_compra' => $_POST['precio_compra'] ?? 0,
        'precio_venta' => $_POST['precio_venta'] ?? 0,
        'stock_actual' => $_POST['stock_actual'] ?? 0,
        'stock_minimo' => $_POST['stock_minimo'] ?? 5,
        'descripcion' => $_POST['descripcion'] ?? '',
        'imagen' => 'default.jpg'
    ];
    $resultado = $inventario->crear($datos);
    if ($resultado) {
        header("Location: index.php?c=AdminController&a=inventario&msg=created");
    } else {
        header("Location: index.php?c=AdminController&a=inventario&error=create_failed");
    }
    exit;
}
public function editarInventario() {
    require_once __DIR__ . '/../models/Inventario.php';
    $inventario = new Inventario();
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('Location: index.php?c=AdminController&a=inventario');
        exit;
    }
    $item = $inventario->obtenerPorId($_GET['id']);
    if (!$item) {
        header('Location: index.php?c=AdminController&a=inventario');
        exit;
    }
    extract(['item' => $item]);
    $contenido = __DIR__ . '/../views/admin/editar_inventario.php';
    include __DIR__ . '/../views/layouts/layout_admin.php';
}
public function actualizarInventario() {
    require_once __DIR__ . '/../models/Inventario.php';
    $inventario = new Inventario();
    $id = $_POST['id'] ?? null;
    if (!$id || !is_numeric($id)) {
        header('Location: index.php?c=AdminController&a=inventario');
        exit;
    }
    $datos = [
        'isbn' => $_POST['isbn'] ?? '',
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'genero' => $_POST['genero'] ?? '',
        'precio_compra' => $_POST['precio_compra'] ?? 0,
        'precio_venta' => $_POST['precio_venta'] ?? 0,
        'stock_actual' => $_POST['stock_actual'] ?? 0,
        'stock_minimo' => $_POST['stock_minimo'] ?? 5,
        'descripcion' => $_POST['descripcion'] ?? '',
        'imagen' => 'default.jpg'
    ];
    $inventario->actualizar($id, $datos);
    header('Location: index.php?c=AdminController&a=inventario&msg=updated');
    exit;
}
public function eliminarInventario() {
    require_once __DIR__ . '/../models/Inventario.php';
    $inventario = new Inventario();
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $inventario->eliminar($_GET['id']);
    }
    header('Location: index.php?c=AdminController&a=inventario&msg=deleted');
    exit;
}
    public function compras() {
        require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion() || $_SESSION['usuario']['rol'] !== 'admin') {
        cerrarSesionSegura();
    }
            $compraModel = new Compra();
            $compras = $compraModel->obtenerComprasParaAdmin();
            $contenido = __DIR__ . '/../views/admin/compras.php';
            require_once __DIR__ . '/../views/layouts/layout_admin.php';
        }
    }


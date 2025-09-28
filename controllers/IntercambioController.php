<?php
require_once __DIR__ . '/../models/Intercambio.php';
require_once __DIR__ . '/../models/Libro.php';
class IntercambioController
{
    public function marcarNotificacionYRedirigir()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $noti_id = isset($_GET['noti']) ? intval($_GET['noti']) : 0;
        if ($noti_id > 0) {
            require_once __DIR__ . '/../models/Notificacion.php';
            $notiModel = new Notificacion();
            $notiModel->marcarComoLeida($noti_id, $_SESSION['usuario']['id']);
        }
        header("Location: index.php?c=IntercambioController&a=misIntercambios");
        exit;
    }
    public function solicitar()
{
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?c=UsuarioController&a=login");
        exit;
    }
   $tabla = $_GET['tabla'] ?? 'libros_venta';  
    $libro_id = $_GET['id'];
    $usuario_actual = $_SESSION['usuario']['id'];
    if ($tabla === 'libros_venta') {
        require_once __DIR__ . '/../config/config.php';
        $conexion = conectar();
        if (!$conexion) {
            echo "❌ Error de conexión a la base de datos.";
            return;
        }
        $stmt = $conexion->prepare("SELECT * FROM libros_venta WHERE id = ?");
        if (!$stmt) {
            echo "❌ Error en la consulta.";
            $conexion->close();
            return;
        }
        $stmt->bind_param("i", $libro_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $libroSolicitado = $result->fetch_assoc();
        $stmt->close();
        $conexion->close();
        if (!$libroSolicitado || $libroSolicitado['id_usuario'] == $usuario_actual) {
            echo "❌ No puedes solicitar tu propio libro o el libro no existe.";
            return;
        }
    } else {
        echo "❌ Los libros oficiales no están disponibles para intercambio.";
        return;
    }
    $libro = new Libro();
    $misLibros = $libro->obtenerPorUsuario($usuario_actual);
    require_once __DIR__ . '/../helpers/notificaciones_helper.php';
    $notificaciones = obtenerNotificacionesUsuario($usuario_actual);
    $contenido = __DIR__ . '/../views/usuario/solicitar_intercambio.php';
    include __DIR__ . '/../views/layouts/layout_usuario.php';
}
    public function enviarSolicitud()
    {   
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        if (!isset($_POST['libro_id_1'], $_POST['libro_id_2'], $_POST['usuario_2'])) {
            echo "❌ Datos incompletos.";
            return;
        }
        $libro_id_1 = $_POST['libro_id_1'];
        $libro_id_2 = $_POST['libro_id_2'];
        $usuario_1 = $_SESSION['usuario']['id'];
        $usuario_2 = $_POST['usuario_2'];
        $intercambio = new Intercambio();
        $nuevo_id = $intercambio->solicitar($libro_id_1, $libro_id_2, $usuario_1, $usuario_2);
        if ($nuevo_id) {
            require_once __DIR__ . '/../models/Notificacion.php';
            require_once __DIR__ . '/../models/Libro.php';
            $libroModel = new Libro();
            $libroSolicitado = $libroModel->obtenerPorId($libro_id_2);
            if (is_array($libroSolicitado) && isset($libroSolicitado['titulo'])) {
                $mensaje = "🔄 Has recibido una solicitud de intercambio por tu libro \"{$libroSolicitado['titulo']}\".";
            } else {
                $mensaje = "🔄 Has recibido una solicitud de intercambio por uno de tus libros.";
            }
            $link = "index.php?c=IntercambioController&a=notificaciones";
            $notificacion = new Notificacion();
            $notificacion->crear($usuario_2, $mensaje, $link, $nuevo_id);
            header("Location: index.php?c=IntercambioController&a=solicitar&id=$libro_id_2&exito=1");
            exit;
        } else {
            echo "❌ Error al registrar el intercambio.";
        }
    }
    public function verSolicitud()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $noti_id = isset($_GET['noti']) ? intval($_GET['noti']) : 0;
        if ($id <= 0) {
            echo "❌ Solicitud no válida.";
            return;
        }
        if ($noti_id > 0 && isset($_SESSION['usuario']['id'])) {
            require_once __DIR__ . '/../models/Notificacion.php';
            $notiModel = new Notificacion();
            $notiModel->marcarComoLeida($noti_id, $_SESSION['usuario']['id']);
        }
        $intercambio = new Intercambio();
        $solicitudes = $intercambio->obtenerPorUsuario($_SESSION['usuario']['id']);
        $solicitud = null;
        foreach ($solicitudes as $s) {
            if ($s['id'] == $id) {
                $solicitud = $s;
                break;
            }
        }
        if ($solicitud) {
            require_once __DIR__ . '/../models/Libro.php';
            $libroModel = new Libro();
            $libro = $libroModel->obtenerPorId($solicitud['libro_id_2']);
            $solicitud['libro_titulo'] = $libro ? $libro['titulo'] : '';
            $solicitud['libro_imagen'] = $libro ? $libro['imagen'] : '';
            $usuario_nombre = '';
            if (isset($solicitud['usuario_1'])) {
                $conn = conectar();
                $stmt = $conn->prepare('SELECT nombre FROM usuarios WHERE id = ?');
                $stmt->bind_param('i', $solicitud['usuario_1']);
                $stmt->execute();
                $stmt->bind_result($usuario_nombre);
                $stmt->fetch();
                $stmt->close();
                $conn->close();
            }
            $solicitud['nombre_solicitante'] = $usuario_nombre;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'], $_POST['id_solicitud'])) {
            $accion = $_POST['accion'];
            $id_solicitud = intval($_POST['id_solicitud']);
            if ($solicitud && $intercambio->actualizarEstado($id_solicitud, $accion)) {
                require_once __DIR__ . '/../models/Notificacion.php';
                $noti = new Notificacion();
                $msg = $accion === 'aceptar' ? 'ha sido aceptada' : 'ha sido rechazada';
                $usuario_1 = isset($solicitud['usuario_1']) ? $solicitud['usuario_1'] : (isset($solicitud['usuario']) ? $solicitud['usuario'] : null);
                if ($usuario_1) {
                    $noti->crear($usuario_1, "Tu solicitud de intercambio $msg.", "index.php?c=IntercambioController&a=misIntercambios");
                }
                header("Location: index.php?c=UsuarioController&a=notificaciones");
                exit;
            } else {
                echo "<div class='alert alert-danger'>No se pudo actualizar el estado o la solicitud no existe.</div>";
            }
        }
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . '/../views/usuario/ver_solicitud_intercambio.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function misIntercambios()
    {
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
    public function solicitarIntercambio()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        $usuarioId = $_SESSION['usuario']['id'];
        $libro = new Libro();
        $libroSolicitadoId = $_GET['libro_id'];
        $libroSolicitado = $libro->obtenerPorId($libroSolicitadoId);
        $misLibros = $libro->obtenerPorUsuario($usuarioId);
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($usuarioId);
        $contenido = __DIR__ . '/../views/usuario/solicitar_intercambio.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function notificaciones()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../models/Notificacion.php';
        $notificacion = new Notificacion();
        $notificaciones = $notificacion->obtenerPorUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . '/../views/usuario/notificaciones.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function responderSolicitud()
    {
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
    public function dashboard()
    {
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

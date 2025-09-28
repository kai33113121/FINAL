<?php
require_once __DIR__ . '/../vendor/autoload.php'; 
require_once __DIR__ . '/../models/Libro.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class UsuarioController
{
    public function notificaciones()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../models/Notificacion.php';
        $notificacion = new Notificacion();
        $usuario_id = $_SESSION['usuario']['id'];
        $notificaciones = $notificacion->obtenerPorUsuario($usuario_id);
        if (isset($_GET['noti'])) {
            $noti_id = intval($_GET['noti']);
            if ($noti_id > 0) {
                $notificacion->marcarComoLeida($noti_id, $usuario_id);
                $notificaciones = $notificacion->obtenerPorUsuario($usuario_id);
            }
        }
        $contenido = __DIR__ . '/../views/usuario/notificaciones.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function landing()
    {
        include __DIR__ . '/../views/auth/landing.php';
    }
    public function register()
    {
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../models/Usuario.php';
            $usuario = new Usuario();
            $exito = $usuario->registrar($_POST['nombre'], $_POST['email'], $_POST['password']);
            if ($exito) {
                $mensaje = "✅ Usuario registrado correctamente.";
            } else {
                $error = $usuario->getError();
                if (strpos($error, 'correo ya está en uso') !== false || strpos($error, 'correo ya está en uso') !== false) {
                    $mensaje = "❌ El correo ya está en uso, por favor verifique o inicie sesión.";
                } else {
                    $mensaje = "❌ Error al registrar usuario: " . $error;
                }
            }
        }
        include __DIR__ . '/../views/auth/register.php';
    }
    public function login()
    {
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../models/Usuario.php';
            $usuario = new Usuario();
            $datos = $usuario->verificar($_POST['email'], $_POST['password']);
            if ($datos) {
                $_SESSION['usuario'] = $datos;
                $_SESSION['ultima_actividad'] = time();
                $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
                if ($datos['rol'] === 'admin') {
                    header("Location: index.php?c=AdminController&a=dashboard");
                    exit;
                } else {
                    header("Location: index.php?c=UsuarioController&a=dashboard");
                    exit;
                }
            } else {
                $mensaje = "❌ Credenciales incorrectas.";
            }
        }
        include_once __DIR__ . '/../views/auth/login.php';
    }
    public function dashboard()
{
    require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion()) {
        cerrarSesionSegura();
    }
    if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['id'])) {
        header("Location: index.php?c=UsuarioController&a=login");
        exit;
    }
    require_once __DIR__ . '/../models/Resena.php';
    $resena = new Resena();
    $idUsuario = $_SESSION['usuario']['id'];
    $mis_reseñas = $resena->obtenerPorUsuario($idUsuario);
    require_once __DIR__ . '/../models/Libro.php';
    $libroModel = new Libro();
    $libros = $libroModel->obtenerDisponiblesParaUsuario($idUsuario);
    require_once __DIR__ . '/../models/Intercambio.php';
    $intercambioModel = new Intercambio();
    $intercambios_recientes = $intercambioModel->obtenerTodosDetallado();
    $intercambios_recientes = array_slice($intercambios_recientes, 0, 5);
    require_once __DIR__ . '/../models/Compra.php';
    $compraModel = new Compra();
    $compras_recientes = $compraModel->obtenerConDetalles();
    $compras_recientes = array_slice($compras_recientes, 0, 5);
    $libros_recientes = $libroModel->obtenerTodosConUsuario();
    usort($libros_recientes, function($a, $b) {
        return strtotime($b['fecha_subida'] ?? $b['fecha'] ?? '1970-01-01') - strtotime($a['fecha_subida'] ?? $a['fecha'] ?? '1970-01-01');
    });
    $libros_recientes = array_slice($libros_recientes, 0, 5);
    require_once __DIR__ . '/../helpers/notificaciones_helper.php';
    $notificaciones = obtenerNotificacionesUsuario($idUsuario);
    $contenido = __DIR__ . '/../views/usuario/dashboard.php';
    include __DIR__ . '/../views/layouts/layout_usuario.php';
}
    public function logout()
    {
        session_destroy();
        header("Location: index.php");
    }
    public function forgotPassword()
    {
        include __DIR__ . '/../views/auth/forgot_password.php';
    }
    public function sendRecoveryEmail()
    {
        require_once __DIR__ . '/../models/Usuario.php';
        $usuario = new Usuario();
        $email = $_POST['email'];
        $datos = $usuario->buscarPorEmail($email);
        if ($datos) {
            $token = bin2hex(random_bytes(32));
            $usuario->guardarTokenRecuperacion($datos['id'], $token);
            $link = "https://LibrosWapcol.com/index.php?c=UsuarioController&a=resetPasswordForm&token=$token";
            $asunto = "Recuperación de contraseña - LibrosWap";
            $mensaje = "Hola {$datos['nombre']},\n\nHaz clic en el siguiente enlace para recuperar tu contraseña:\n$link\n\nSi no solicitaste esto, ignora este mensaje.";
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'libroswapgroup@gmail.com';
                $mail->Password = 'abrc kttg dzrx rnhr'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('libroswapgroup@gmail.com', 'LibrosWap');
                $mail->addAddress($email, $datos['nombre']);
                $mail->isHTML(true);
                $mail->Subject = $asunto;
                $mail->Body = "
                <div style='font-family:sans-serif;padding:20px;background:#f3f3f3;border-radius:10px;'>
                <h2 style='color:#6a1b9a;'>Hola {$datos['nombre']},</h2>
                <p>Haz clic en el siguiente botón para recuperar tu contraseña:</p>
                <a href='$link' style='display:inline-block;padding:10px 20px;background:#6a1b9a;color:white;text-decoration:none;border-radius:5px;'>Recuperar contraseña</a>
                <p style='margin-top:20px;font-size:12px;color:#555;'>Si no solicitaste esto, puedes ignorar este mensaje.</p>
                </div>";
                $mail->send();
                header("Location: index.php?c=UsuarioController&a=forgotPassword&status=ok");
                exit;
            } catch (Exception $e) {
                $msg = urlencode($mail->ErrorInfo);
                header("Location: index.php?c=UsuarioController&a=forgotPassword&status=error&msg=$msg");
                exit;
            }
        } else {
            $msg = urlencode('No se encontró el correo.');
            header("Location: index.php?c=UsuarioController&a=forgotPassword&status=error&msg=$msg");
            exit;
        }
    }
public function misLibrosAdquiridos()
{
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?c=UsuarioController&a=login");
        exit;
    }

    $usuario_id = $_SESSION['usuario']['id'];
    $librosAdquiridos = $this->obtenerLibrosAdquiridos($usuario_id);
    require_once __DIR__ . '/../helpers/notificaciones_helper.php';
    $notificaciones = obtenerNotificacionesUsuario($usuario_id);
    $contenido = __DIR__ . '/../views/usuario/libros_adquiridos.php';
    include __DIR__ . '/../views/layouts/layout_usuario.php';
}
private function obtenerLibrosAdquiridos($usuario_id)
{
    $conexion = conectar();
    $librosAdquiridos = [];
    $sqlCompras = "SELECT 
                  dc.libro_id,
                  dc.cantidad,
                  dc.precio,
                  dc.tabla_origen,
                  c.fecha as fecha_adquisicion,
                  c.id as compra_id,
                  'compra' as tipo_adquisicion,
                  c.estado as estado_transaccion,
                  COALESCE(dc.titulo, 'Título no disponible') as titulo,
                  COALESCE(dc.autor, 'Autor desconocido') as autor,
                  COALESCE(dc.imagen, 'default.jpg') as imagen,
                  COALESCE(dc.genero, 'Sin género') as genero,
                  'Compra completada' as vendedor
               FROM detalle_compras dc
               JOIN compras c ON dc.compra_id = c.id
               WHERE c.usuario_id = ? AND c.estado = 'completado'
               ORDER BY c.fecha DESC";
    $stmt = $conexion->prepare($sqlCompras);
    if ($stmt) {
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $row['titulo'] = $row['titulo'] ?? 'Título no disponible';
            $row['autor'] = $row['autor'] ?? 'Autor desconocido';
            $row['imagen'] = $row['imagen'] ?? 'default.jpg';
            $row['genero'] = $row['genero'] ?? 'Sin género';
            $row['vendedor'] = $row['vendedor'] ?? 'LibrosWap';
            $librosAdquiridos[] = $row;
        }
        $stmt->close();
    }
    $sqlIntercambios = "SELECT 
                           i.libro_id_2 as libro_id,
                           1 as cantidad,
                           0 as precio,
                           'libros_venta' as tabla_origen,
                           i.fecha as fecha_adquisicion,
                           i.id as intercambio_id,
                           'intercambio' as tipo_adquisicion,
                           i.estado as estado_transaccion,
                           COALESCE(lv.titulo, 'Título no disponible') as titulo,
                           COALESCE(lv.autor, 'Autor desconocido') as autor,
                           COALESCE(lv.imagen, 'default.jpg') as imagen,
                           COALESCE(lv.genero, 'Sin género') as genero,
                           COALESCE(u.nombre, 'Usuario') as vendedor
                        FROM intercambios i
                        JOIN libros_venta lv ON i.libro_id_2 = lv.id
                        JOIN usuarios u ON i.usuario_2 = u.id
                        WHERE i.usuario_1 = ? AND i.estado = 'aceptado'
                        ORDER BY i.fecha DESC";
    $stmt = $conexion->prepare($sqlIntercambios);
    if ($stmt) {
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $row['titulo'] = $row['titulo'] ?? 'Título no disponible';
            $row['autor'] = $row['autor'] ?? 'Autor desconocido';
            $row['imagen'] = $row['imagen'] ?? 'default.jpg';
            $row['genero'] = $row['genero'] ?? 'Sin género';
            $row['vendedor'] = $row['vendedor'] ?? 'Usuario';
            $librosAdquiridos[] = $row;
        }
        $stmt->close();
    }
    $conexion->close();
    usort($librosAdquiridos, function($a, $b) {
        return strtotime($b['fecha_adquisicion']) - strtotime($a['fecha_adquisicion']);
    });
    return $librosAdquiridos;
}
    public function resetPasswordForm()
    {
        if (!isset($_GET['token'])) {
            echo "Token no proporcionado.";
            return;
        }
        $token = $_GET['token'];
        require_once __DIR__ . '/../views/auth/reset_password.php';
    }
    public function resetPassword()
    {
        require_once __DIR__ . '/../models/Usuario.php';
        $usuario = new Usuario();
        if (!isset($_POST['token']) || !isset($_POST['password'])) {
            echo "❌ Datos incompletos.";
            return;
        }
        $token = $_POST['token'];
        $nuevaPassword = $_POST['password'];
        if (strlen($nuevaPassword) < 6) {
            echo "❌ La contraseña debe tener al menos 6 caracteres.";
            return;
        }
        $datos = $usuario->buscarPorToken($token);
        if ($datos) {
            $hash = password_hash($nuevaPassword, PASSWORD_BCRYPT);
            $usuario->actualizarPassword($datos['id'], $hash);
            include __DIR__ . '/../views/auth/password_updated.php';
        } else {
            echo "❌ Token inválido o expirado.";
        }
    }
    public function guardarLibro()
    {
        require_once __DIR__ . '/../models/Libro.php';
        $libro = new Libro();
        if (!isset($_SESSION['usuario']['id'])) {
            die('❌ Usuario no autenticado');
        }
        if (empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['estado'])) {
            die('❌ Faltan campos obligatorios');
        }
        $imagen = 'default.jpg';
        if (!empty($_FILES['imagen']['name'])) {
            $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
            $rutaDestino = __DIR__ . '/../public/img/libros/' . $nombreArchivo;
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                die('❌ Error al subir la imagen');
            }
            $imagen = $nombreArchivo;
        }
        $datos = [
            'titulo' => $_POST['titulo'],
            'autor' => $_POST['autor'],
            'genero' => $_POST['genero'] ?? '',
            'estado' => $_POST['estado'],
            'descripcion' => $_POST['descripcion'] ?? '',
            'modo' => $_POST['modo'] ?? 'intercambio',
            'precio' => floatval($_POST['precio'] ?? 0),
            'imagen' => $imagen,
            'id_usuario' => intval($_SESSION['usuario']['id'])
        ];
        ob_start(); 
        $libro->crear($datos);
        $resultado = ob_get_clean();
        if (str_contains($resultado, '✅')) {
            header("Location: index.php?c=UsuarioController&a=biblioteca");
            exit;
        } else {
            die($resultado); 
        }
    }
    public function biblioteca()
    {
        require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion()) {
        cerrarSesionSegura();
    }
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../models/Libro.php';
        $libro = new Libro();
        $misLibros = $libro->obtenerPorUsuario($_SESSION['usuario']['id']);
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . '/../views/usuario/biblioteca.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function perfil()
    {
        require_once __DIR__ . '/../helpers/session_security.php';
    if (!verificarSeguridadSesion()) {
        cerrarSesionSegura();
    }
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../models/Usuario.php';
        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->obtenerPorId($_SESSION['usuario']['id']);
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . '/../views/usuario/perfil.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function actualizarPerfil()
{
    require_once __DIR__ . '/../models/Usuario.php';
    $usuarioModel = new Usuario();
    $id = $_SESSION['usuario']['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $bio = $_POST['bio'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $genero_preferido = $_POST['genero_preferido'] ?? '';
    $libro_favorito = $_POST['libro_favorito'] ?? '';
    $foto = $_SESSION['usuario']['foto'] ?? 'default.jpg';
    if (!empty($_FILES['foto']['name'])) {
        $nombreArchivo = uniqid() . '_' . basename($_FILES['foto']['name']);
        $rutaDestino = __DIR__ . '/../public/img/usuarios/' . $nombreArchivo;
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
            $foto = $nombreArchivo;
        }
    }
    $usuarioModel->actualizarPerfil($id, $nombre, $email, $bio, $foto, $direccion, $genero_preferido, $libro_favorito);
    $_SESSION['usuario']['nombre'] = $nombre;
    $_SESSION['usuario']['email'] = $email;
    $_SESSION['usuario']['bio'] = $bio;
    $_SESSION['usuario']['foto'] = $foto;
    $_SESSION['usuario']['direccion'] = $direccion;
    $_SESSION['usuario']['genero_preferido'] = $genero_preferido;
    $_SESSION['usuario']['libro_favorito'] = $libro_favorito;
    header("Location: index.php?c=UsuarioController&a=perfil");
}
    public function obtenerPorId($id)
    {
        $conn = conectar();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
    public function configuracion()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../models/Usuario.php';
        $usuarioModel = new Usuario();
        $config = $usuarioModel->obtenerConfiguracion($_SESSION['usuario']['id']);
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        $contenido = __DIR__ . '/../views/usuario/configuracion.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function guardarConfiguracion()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
        require_once __DIR__ . '/../models/Usuario.php';
        $usuarioModel = new Usuario();
        $id = $_SESSION['usuario']['id'];
        $tema = $_POST['tema'] ?? 'claro';
        $color = $_POST['color_acento'] ?? 'morado';
        $vista = $_POST['vista_libros'] ?? 'grid';
        $notificaciones_activas = isset($_POST['notificaciones']) ? 1 : 0; 
        $usuarioModel->guardarConfiguracion($id, $tema, $color, $vista, $notificaciones_activas);
        header("Location: index.php?c=UsuarioController&a=configuracion");
        exit;
    }
}
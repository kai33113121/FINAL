<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Ajusta la ruta según tu estructura
require_once __DIR__ . '/../models/Libro.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UsuarioController
{
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
                $mensaje = "❌ Error al registrar usuario: " . $usuario->getError();
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
        if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        require_once __DIR__ . '/../models/Resena.php';
        $resena = new Resena();
        $idUsuario = $_SESSION['usuario']['id'];
        $mis_reseñas = $resena->obtenerPorUsuario($idUsuario);

        // Obtener libros de la tabla libros
        require_once __DIR__ . '/../models/Libro.php';
        $libroModel = new Libro();
        $libros = $libroModel->obtenerTodos();

        // Si quieres mostrar libros en venta también:
        require_once __DIR__ . '/../models/Venta.php';
        $ventaModel = new Venta();
        $libros_venta = $ventaModel->obtenerTodos();

        // Notificaciones
        require_once __DIR__ . '/../models/Notificacion.php';
        $notificacionModel = new Notificacion();
        $notificacionesRaw = $notificacionModel->obtenerPorUsuario($idUsuario);
        $notificaciones = [];
        foreach ($notificacionesRaw as $n) {
            $notificaciones[] = [
                'mensaje' => $n['mensaje'] ?? '',
                'link' => $n['link'] ?? 'index.php?c=IntercambioController&a=notificaciones',
                'fecha' => !empty($n['fecha']) ? date('d/m/Y H:i', strtotime($n['fecha'])) : ''
            ];
        }

        // Notificaciones de intercambios pendientes
        require_once __DIR__ . '/../models/Intercambio.php';
        $intercambio = new Intercambio();
        $pendientes = $intercambio->obtenerPendientes($idUsuario);
        foreach ($pendientes as $notif) {
            $libroOfrecido = $libroModel->obtenerPorId($notif['libro_id_1']);
            $libroSolicitado = $libroModel->obtenerPorId($notif['libro_id_2']);
            $tituloOfrecido = $libroOfrecido && isset($libroOfrecido['titulo']) ? $libroOfrecido['titulo'] : 'Libro ofrecido';
            $tituloSolicitado = $libroSolicitado && isset($libroSolicitado['titulo']) ? $libroSolicitado['titulo'] : 'Libro solicitado';

            $notificaciones[] = [
                'mensaje' => "Solicitud de intercambio #{$notif['id']}: \"{$tituloOfrecido}\" por \"{$tituloSolicitado}\"",
                'link' => "index.php?c=IntercambioController&a=notificaciones",
                'fecha' => !empty($notif['fecha']) ? date('d/m/Y H:i', strtotime($notif['fecha'])) : ''
            ];
        }

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

            $link = "http://localhost/FINAL/index.php?c=UsuarioController&a=resetPasswordForm&token=$token";
            $asunto = "Recuperación de contraseña - LibrosWap";
            $mensaje = "Hola {$datos['nombre']},\n\nHaz clic en el siguiente enlace para recuperar tu contraseña:\n$link\n\nSi no solicitaste esto, ignora este mensaje.";

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'libroswapgroup@gmail.com';
                $mail->Password = 'abrc kttg dzrx rnhr'; // Usa contraseña de aplicación si es Gmail
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

    public function resetPasswordForm()
    {
        if (!isset($_GET['token'])) {
            echo "Token no proporcionado.";
            return;
        }

        $token = $_GET['token'];

        // Aquí puedes validar el token si quieres

        require_once __DIR__ . '/../views/auth/reset_password.php';
    }

    public function resetPassword()
    {
        require_once __DIR__ . '/../models/Usuario.php';
        $usuario = new Usuario();

        // Validar que el token venga por POST
        if (!isset($_POST['token']) || !isset($_POST['password'])) {
            echo "❌ Datos incompletos.";
            return;
        }

        $token = $_POST['token'];
        $nuevaPassword = $_POST['password'];

        // Validación básica de contraseña
        if (strlen($nuevaPassword) < 6) {
            echo "❌ La contraseña debe tener al menos 6 caracteres.";
            return;
        }

        $datos = $usuario->buscarPorToken($token);

        if ($datos) {
            $hash = password_hash($nuevaPassword, PASSWORD_BCRYPT);
            $usuario->actualizarPassword($datos['id'], $hash);

            // Mostrar vista visual
            include __DIR__ . '/../views/auth/password_updated.php';
        } else {
            echo "❌ Token inválido o expirado.";
        }
    }
    public function guardarLibro()
    {
        require_once __DIR__ . '/../models/Libro.php';
        $libro = new Libro();

        // Validar sesión
        if (!isset($_SESSION['usuario']['id'])) {
            die('❌ Usuario no autenticado');
        }

        // Validar campos obligatorios
        if (empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['estado'])) {
            die('❌ Faltan campos obligatorios');
        }

        // Procesar imagen
        $imagen = 'default.jpg';
        if (!empty($_FILES['imagen']['name'])) {
            $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
            $rutaDestino = __DIR__ . '/../public/img/' . $nombreArchivo;

            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                die('❌ Error al subir la imagen');
            }

            $imagen = $nombreArchivo;
        }

        // Preparar datos
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

        // Guardar en la base de datos
        ob_start(); // Captura el echo del modelo
        $libro->crear($datos);
        $resultado = ob_get_clean();

        if (str_contains($resultado, '✅')) {
            header("Location: index.php?c=UsuarioController&a=biblioteca");
            exit;
        } else {
            die($resultado); // Muestra el error exacto del modelo
        }
    }
    public function biblioteca()
    {
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
        $notificaciones_activas = isset($_POST['notificaciones']) ? 1 : 0; // <-- cambio de nombre

        $usuarioModel->guardarConfiguracion($id, $tema, $color, $vista, $notificaciones_activas);

        header("Location: index.php?c=UsuarioController&a=configuracion");
        exit;
    }

}
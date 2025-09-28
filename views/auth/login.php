<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <?php
if (isset($_GET['msg']) && $_GET['msg'] === 'sesion_expirada') {
    echo '<div class="alert alert-warning">Tu sesión ha expirado. Inicia sesión nuevamente.</div>';
}
?>
    <div class="login-background"></div>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="login-wrapper">
            <div class="floating-elements">
                <div class="floating-book"></div>
                <div class="floating-book"></div>
                <div class="floating-book"></div>
                <div class="floating-book"></div>
            </div>
            <div class="login-left">
                <div class="logo">LIBROSWAP</div>
                <h2 class="login-title">Iniciar sesión</h2>
                <p class="subtitle">Usa tu correo electrónico y contraseña para acceder</p>
                <?php if (isset($mensaje)): ?>
                    <div class="alert alert-danger text-center">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?= $mensaje ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="index.php?c=UsuarioController&a=login" class="form-container">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" name="email" class="form-control" required placeholder="Correo Electrónico">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" name="password" class="form-control" required placeholder="Contraseña">
                    </div>
                    <div class="links-container">
                        <a href="index.php?c=UsuarioController&a=forgotPassword" class="auth-link">
                            <i class="bi bi-key me-1"></i>¿Olvidaste tu contraseña?
                        </a>
                        <a href="index.php" class="auth-link">
                            <i class="bi bi-house me-1"></i>Volver al Inicio
                        </a>
                    </div>
                    <button type="submit" class="btn btn-futuristic">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Iniciar sesión
                    </button>
                </form>
            </div>
            <div class="login-right">
                <div class="content">
                    <h3>Crea tu cuenta en LibrosWAP</h3>
                    <p>Conéctate para comprar, vender o intercambiar libros con una comunidad de lectores apasionados.</p>
                    <a href="index.php?c=UsuarioController&a=register" class="btn btn-outline-futuristic">
                        <i class="bi bi-person-plus me-2"></i>
                        Registrarse
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/login.js"></script>
</body>
</html>
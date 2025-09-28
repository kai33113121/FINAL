<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="public/css/register.css">
</head>
<body>
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
                <h2 class="login-title">Crear cuenta</h2>
                <p class="subtitle">Únete a la comunidad de lectores apasionados</p>
                <?php if (isset($mensaje)): ?>
                    <div class="alert <?= str_contains($mensaje, '✅') ? 'alert-success' : 'alert-danger' ?> text-center">
                        <i
                            class="bi <?= str_contains($mensaje, '✅') ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill' ?> me-2"></i>
                        <?= $mensaje ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="index.php?c=UsuarioController&a=register" class="form-container">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" name="nombre" class="form-control" required placeholder="Nombre completo">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" name="email" class="form-control" required placeholder="Correo electrónico">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" name="password" class="form-control" required placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-futuristic">
                        <i class="bi bi-person-plus me-2"></i>
                        Registrarse
                    </button>
                </form>
                <div class="links-container">
                    <span style="color: #666;">¿Ya tienes cuenta?</span>
                    <a href="index.php?c=UsuarioController&a=login" class="auth-link">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Iniciar sesión
                    </a>
                    <span style="color: #ccc;">|</span>
                    <a href="index.php" class="auth-link">
                        <i class="bi bi-house me-1"></i>Volver al Inicio
                    </a>
                </div>
            </div>
            <div class="login-right">
                <div class="content">
                    <h3>✨ Bienvenido a LibrosWAP</h3>
                    <p>Conéctate para comprar, vender o intercambiar libros con una comunidad de lectores apasionados.
                    </p>
                    <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-futuristic">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Iniciar sesión
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/register.js"></script>
</body>
</html>
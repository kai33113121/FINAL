<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="public/css/forgot.css">
</head>
<body>
    <div class="recovery-container" id="recoveryContainer">
        <div class="recovery-icon">
            <i class="bi bi-key"></i>
        </div>
        <h1 class="recovery-title">Recuperar Contraseña</h1>
        <p class="recovery-subtitle">
            No te preocupes, es normal olvidar las contraseñas. Ingresa tu correo electrónico y te enviaremos un enlace
            seguro para crear una nueva.
        </p>
        <form action="index.php?c=UsuarioController&a=sendRecoveryEmail" method="POST">
            <div class="input-group">
                <div class="position-relative w-100">
                    <input type="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico"
                        required>
                    <i class="bi bi-envelope position-absolute"
                        style="right: 15px; top: 50%; transform: translateY(-50%); color: #999;"></i>
                </div>
            </div>
            <button type="submit" class="btn-recovery">
                <span>
                    <i class="bi bi-send me-2"></i>
                    Enviar enlace de recuperación
                </span>
            </button>
        </form>
        <div class="features-info">
            <h6 class="fw-bold text-purple mb-3">¿Qué sucede después?</h6>
            <div class="feature-item">
                <i class="bi bi-envelope-check"></i>
                <span>Recibirás un correo con un enlace seguro</span>
            </div>
            <div class="feature-item">
                <i class="bi bi-clock"></i>
                <span>El enlace será válido por 1 hora</span>
            </div>
            <div class="feature-item">
                <i class="bi bi-shield-check"></i>
                <span>Tu cuenta permanece completamente segura</span>
            </div>
        </div>
        <div class="back-link">
            ¿Recordaste tu contraseña?
            <a href="index.php?c=UsuarioController&a=login">
                <i class="bi bi-arrow-left me-1"></i>
                Volver al inicio de sesión
            </a>
        </div>
    </div>
    <script src="public/js/forgot.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña Actualizada - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="public/css/updated.css">
</head>
<body>
    <div class="floating-elements">
        <div class="floating-element">
            <i class="bi bi-shield-check" style="color: rgba(76, 175, 80, 0.2);"></i>
        </div>
        <div class="floating-element">
            <i class="bi bi-key" style="color: rgba(255, 255, 255, 0.15);"></i>
        </div>
        <div class="floating-element">
            <i class="bi bi-lock-fill" style="color: rgba(106, 17, 203, 0.1);"></i>
        </div>
        <div class="floating-element">
            <i class="bi bi-check-circle" style="color: rgba(76, 175, 80, 0.15);"></i>
        </div>
    </div>
    <div class="success-container">
        <div class="success-icon">
            <i class="bi bi-check-lg checkmark"></i>
        </div>
        <h1 class="success-title">¡Contraseña Actualizada!</h1>
        <p class="success-message">
            Perfecto, tu nueva contraseña ha sido guardada correctamente y está completamente segura.
            Ya puedes iniciar sesión con ella en LibrosWap.
        </p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <div class="feature-title">Seguridad Garantizada</div>
                <div class="feature-text">Tu contraseña está encriptada con los más altos estándares de seguridad</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
                <div class="feature-title">Acceso Inmediato</div>
                <div class="feature-text">Puedes iniciar sesión ahora mismo con tu nueva contraseña</div>
            </div>
        </div>
        <a href="index.php?c=UsuarioController&a=login" class="btn-login">
            <span class="btn-text">
                <i class="bi bi-box-arrow-in-right"></i>
                Iniciar Sesión
            </span>
        </a>
        <div class="additional-info">
            <div class="info-title">
                <i class="bi bi-info-circle"></i>
                Información importante
            </div>
            <ul class="info-list">
                <li class="info-item">
                    <i class="bi bi-clock"></i>
                    <span>Tu sesión anterior ha sido cerrada automáticamente por seguridad</span>
                </li>
                <li class="info-item">
                    <i class="bi bi-device-ssd"></i>
                    <span>Tu nueva contraseña se ha sincronizado en todos los dispositivos</span>
                </li>
                <li class="info-item">
                    <i class="bi bi-envelope-check"></i>
                    <span>Recibirás un correo de confirmación en unos minutos</span>
                </li>
            </ul>
        </div>
    </div>
    <script src="public/js/updated.js"></script>
</body>
</html>
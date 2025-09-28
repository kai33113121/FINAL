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
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --purple: #6a11cb;
            --purple-light: #9c88ff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gradient-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('/FINAL/public/img/adminside.png') center/cover;
            opacity: 0.1;
            z-index: -1;
        }

        .recovery-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            padding: 50px 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.8s ease forwards;
            opacity: 0;
            transform: translateY(40px);
        }

        .recovery-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at top right, rgba(106, 17, 203, 0.1), transparent 50%);
            z-index: -1;
        }

        .recovery-container.show {
            opacity: 1;
            transform: translateY(0);
        }

        .recovery-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .recovery-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--purple);
            margin-bottom: 15px;
            background: var(--gradient-primary);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .recovery-subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 35px;
            line-height: 1.5;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 15px 20px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            margin-bottom: 25px;
        }

        .form-control:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
            background: white;
            outline: none;
        }

        .btn-recovery {
            background: var(--gradient-primary);
            border: none;
            color: white;
            border-radius: 15px;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .btn-recovery::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-secondary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-recovery:hover::before {
            opacity: 1;
        }

        .btn-recovery:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(106, 17, 203, 0.4);
            color: white;
        }

        .btn-recovery span {
            position: relative;
            z-index: 2;
        }

        .back-link {
            margin-top: 25px;
            font-size: 0.95rem;
            color: #888;
        }

        .back-link a {
            color: var(--purple);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-link a:hover {
            color: var(--purple-light);
            text-decoration: underline;
        }

        .features-info {
            margin-top: 30px;
            padding: 20px;
            background: linear-gradient(135deg, #f8f4ff 0%, #e8d5ff 100%);
            border-radius: 15px;
            text-align: left;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 0.9rem;
            color: #666;
        }

        .feature-item i {
            color: var(--purple);
            margin-right: 10px;
            font-size: 1.1rem;
        }

        @media (max-width: 480px) {
            .recovery-container {
                padding: 30px 25px;
                margin: 10px;
            }

            .recovery-title {
                font-size: 1.8rem;
            }

            .recovery-subtitle {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="recovery-container" id="recoveryContainer">
        <!-- Icono principal -->
        <div class="recovery-icon">
            <i class="bi bi-key"></i>
        </div>

        <!-- Título y descripción -->
        <h1 class="recovery-title">Recuperar Contraseña</h1>
        <p class="recovery-subtitle">
            No te preocupes, es normal olvidar las contraseñas. Ingresa tu correo electrónico y te enviaremos un enlace
            seguro para crear una nueva.
        </p>

        <!-- Formulario -->
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

        <!-- Información adicional -->
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

        <!-- Enlace de regreso -->
        <div class="back-link">
            ¿Recordaste tu contraseña?
            <a href="index.php?c=UsuarioController&a=login">
                <i class="bi bi-arrow-left me-1"></i>
                Volver al inicio de sesión
            </a>
        </div>
    </div>

    <script>
        // Animar entrada
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => {
                document.getElementById('recoveryContainer').classList.add('show');
            }, 100);
        });

        // Mostrar alerta si hay status en la URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        const msg = urlParams.get('msg');

        if (status === 'ok') {
            Swal.fire({
                icon: 'success',
                title: '¡Enlace enviado exitosamente!',
                text: 'Revisa tu correo electrónico (incluye la bandeja de spam) para restablecer tu contraseña.',
                confirmButtonColor: '#6a11cb',
                confirmButtonText: 'Entendido',
                customClass: {
                    popup: 'border-radius-15'
                }
            });
        } else if (status === 'error') {
            Swal.fire({
                icon: 'error',
                title: 'Error al enviar el enlace',
                text: decodeURIComponent(msg || 'No se pudo enviar el enlace. Verifica que el correo sea correcto.'),
                confirmButtonColor: '#6a11cb',
                confirmButtonText: 'Intentar de nuevo',
                customClass: {
                    popup: 'border-radius-15'
                }
            });
        }

        // Efecto en el botón
        document.querySelector('.btn-recovery').addEventListener('click', function () {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    </script>
</body>

</html>
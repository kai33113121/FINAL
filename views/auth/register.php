<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-dark: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            --gradient-cyber: linear-gradient(135deg, #0f3460 0%, #e94560 100%);
            --purple: #6a11cb;
            --purple-light: #f8f4ff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gradient-primary);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Fondo animado */
        .login-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-cyber);
            z-index: -2;
        }

        .login-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://i.pinimg.com/originals/a3/22/41/a3224124ee48cddde865ecff61c13fde.gif');
            background-size: cover;
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(2deg);
            }
        }

        .login-wrapper {
            max-width: 1200px;
            min-height: 85vh;
            margin: 5vh auto;
            display: flex;
            border-radius: 40px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 40px 100px rgba(106, 27, 154, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
        }

        /* Cambio: Ahora el fondo artístico está a la derecha */
        .login-left {
            flex: 1;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .login-right {
            flex: 1;
            background: url('/FINAL/public/img/loginf.png') no-repeat center center;
            background-size: cover;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(15, 52, 96, 0.8), rgba(233, 69, 96, 0.6));
            z-index: 1;
        }

        .login-right .content {
            position: relative;
            z-index: 2;
            padding: 40px;
        }

        .login-right h3 {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .login-right p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 900;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-align: center;
        }

        .login-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--purple);
            text-align: center;
            margin-bottom: 1rem;
        }

        .subtitle {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2.5rem;
            text-align: center;
            opacity: 0.8;
        }

        .form-container {
            position: relative;
        }

        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .input-group-text {
            background: rgba(106, 17, 203, 0.1);
            border: none;
            border-radius: 25px 0 0 25px;
            color: var(--purple);
            font-size: 1.1rem;
            padding: 15px 20px;
            border-right: none;
        }

        .form-control {
            border: 2px solid rgba(106, 17, 203, 0.1);
            border-radius: 0 25px 25px 0;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            border-left: none;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-control:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
            background: white;
        }

        .btn-futuristic {
            background: var(--gradient-primary);
            border: none;
            border-radius: 50px;
            padding: 18px 40px;
            font-weight: 700;
            color: white;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1rem;
            width: 100%;
            margin: 1.5rem 0;
        }

        .btn-futuristic::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .btn-futuristic:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(106, 27, 154, 0.4);
            color: white;
        }

        .btn-futuristic:hover::before {
            left: 100%;
        }

        .btn-outline-futuristic {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            padding: 15px 40px;
            font-weight: 700;
            color: white;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            backdrop-filter: blur(10px);
        }

        .btn-outline-futuristic:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: white;
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
        }

        .links-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 1.5rem;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .auth-link {
            color: var(--purple);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .auth-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-primary);
            transition: width 0.3s ease;
        }

        .auth-link:hover {
            color: var(--purple);
            transform: translateY(-1px);
        }

        .auth-link:hover::after {
            width: 100%;
        }

        .alert {
            border-radius: 20px;
            border: none;
            padding: 15px 25px;
            margin-bottom: 2rem;
            font-weight: 500;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ffebee, #fce4ec);
            color: #c62828;
            border-left: 4px solid #f44336;
        }

        .alert-success {
            background: linear-gradient(135deg, #e8f5e8, #f1f8e9);
            color: #2e7d32;
            border-left: 4px solid #4caf50;
        }

        /* Efectos flotantes */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-book {
            position: absolute;
            width: 40px;
            height: 60px;
            background: rgba(106, 17, 203, 0.1);
            border-radius: 5px;
            animation: floatBook 8s ease-in-out infinite;
        }

        .floating-book:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-book:nth-child(2) {
            top: 20%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-book:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-book:nth-child(4) {
            bottom: 15%;
            right: 25%;
            animation-delay: 6s;
        }

        @keyframes floatBook {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }

            50% {
                transform: translateY(-30px) rotate(5deg);
                opacity: 0.6;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-wrapper {
                margin: 2vh auto;
                min-height: 96vh;
                border-radius: 20px;
            }

            .login-right {
                display: none;
            }

            .login-left {
                padding: 40px 30px;
            }

            .logo {
                font-size: 2rem;
            }

            .login-title {
                font-size: 1.8rem;
            }

            .links-container {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .input-group {
                margin-bottom: 1.2rem;
            }
        }

        @media (max-width: 480px) {
            .login-left {
                padding: 30px 20px;
            }

            .input-group-text {
                padding: 12px 15px;
            }

            .form-control {
                padding: 12px 15px;
            }

            .btn-futuristic {
                padding: 15px 30px;
                font-size: 0.9rem;
            }
        }

        /* Animaciones de entrada */
        .login-left>* {
            animation: slideInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .login-left>*:nth-child(1) {
            animation-delay: 0.1s;
        }

        .login-left>*:nth-child(2) {
            animation-delay: 0.2s;
        }

        .login-left>*:nth-child(3) {
            animation-delay: 0.3s;
        }

        .login-left>*:nth-child(4) {
            animation-delay: 0.4s;
        }

        .login-left>*:nth-child(5) {
            animation-delay: 0.5s;
        }

        .login-left>*:nth-child(6) {
            animation-delay: 0.6s;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-right .content {
            animation: slideInRight 0.8s ease-out forwards;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <div class="login-background"></div>

    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="login-wrapper">
            <!-- Elementos flotantes decorativos -->
            <div class="floating-elements">
                <div class="floating-book"></div>
                <div class="floating-book"></div>
                <div class="floating-book"></div>
                <div class="floating-book"></div>
            </div>

            <!-- Formulario de Registro -->
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

            <!-- Fondo artístico con mensaje de bienvenida -->
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
    <script>
        // Efectos adicionales para mejorar la experiencia
        document.addEventListener('DOMContentLoaded', function () {
            // Efecto de focus en inputs
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function () {
                    this.parentElement.style.transform = 'translateY(-2px)';
                    this.parentElement.style.boxShadow = '0 8px 25px rgba(106, 17, 203, 0.15)';
                });

                input.addEventListener('blur', function () {
                    this.parentElement.style.transform = 'translateY(0)';
                    this.parentElement.style.boxShadow = 'none';
                });
            });

            // Efecto de typing en el título
            const title = document.querySelector('.login-title');
            const text = title.textContent;
            title.textContent = '';
            let i = 0;

            const typeWriter = () => {
                if (i < text.length) {
                    title.textContent += text.charAt(i);
                    i++;
                    setTimeout(typeWriter, 100);
                }
            };

            setTimeout(typeWriter, 1000);
        });
    </script>
</body>

</html>
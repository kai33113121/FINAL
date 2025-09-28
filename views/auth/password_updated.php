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

    <style>
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-success: linear-gradient(135deg, #4caf50 0%, #81c784 100%);
            --purple: #6a11cb;
            --purple-light: #9c88ff;
            --success: #4caf50;
            --success-light: #81c784;
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
            background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
            z-index: -1;
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
            font-size: 2rem;
        }

        .floating-element:nth-child(2) {
            top: 20%;
            right: 15%;
            animation-delay: 2s;
            font-size: 1.5rem;
        }

        .floating-element:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
            font-size: 2.5rem;
        }

        .floating-element:nth-child(4) {
            bottom: 30%;
            right: 25%;
            animation-delay: 6s;
            font-size: 1.8rem;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg) scale(1);
                opacity: 0.1;
            }

            25% {
                transform: translateY(-20px) rotate(90deg) scale(1.1);
                opacity: 0.15;
            }

            50% {
                transform: translateY(-40px) rotate(180deg) scale(1.2);
                opacity: 0.08;
            }

            75% {
                transform: translateY(-20px) rotate(270deg) scale(1.1);
                opacity: 0.12;
            }
        }

        .success-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 60px 50px;
            max-width: 550px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: slideInScale 1s ease forwards;
            opacity: 0;
            transform: translateY(50px) scale(0.9);
        }

        .success-container::before {
            content: '';
            position: absolute;
            top: -100%;
            left: -100%;
            width: 300%;
            height: 300%;
            background: conic-gradient(from 0deg, rgba(76, 175, 80, 0.05), rgba(129, 199, 132, 0.08), rgba(76, 175, 80, 0.05));
            animation: rotate 30s linear infinite;
            z-index: -1;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes slideInScale {
            0% {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }

            50% {
                opacity: 0.8;
                transform: translateY(-10px) scale(1.02);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .success-icon {
            width: 120px;
            height: 120px;
            background: var(--gradient-success);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 3.5rem;
            color: white;
            position: relative;
            animation: successPulse 2s ease-in-out infinite;
            box-shadow: 0 10px 30px rgba(76, 175, 80, 0.3);
        }

        .success-icon::before {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            background: var(--gradient-success);
            opacity: 0;
            z-index: -1;
            animation: ripple 2s infinite;
        }

        .success-icon::after {
            content: '';
            position: absolute;
            inset: -16px;
            border-radius: 50%;
            background: var(--gradient-success);
            opacity: 0;
            z-index: -2;
            animation: ripple 2s infinite 0.5s;
        }

        @keyframes successPulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 10px 30px rgba(76, 175, 80, 0.3);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 15px 40px rgba(76, 175, 80, 0.4);
            }
        }

        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 0.6;
            }

            100% {
                transform: scale(1.4);
                opacity: 0;
            }
        }

        .checkmark {
            animation: checkmarkDraw 0.8s ease-in-out 0.5s forwards;
            opacity: 0;
        }

        @keyframes checkmarkDraw {
            0% {
                opacity: 0;
                transform: scale(0.5) rotate(-45deg);
            }

            50% {
                opacity: 1;
                transform: scale(1.2) rotate(0deg);
            }

            100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }

        .success-title {
            font-size: 3rem;
            font-weight: 800;
            color: var(--success);
            margin-bottom: 20px;
            background: var(--gradient-success);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
            animation: titleFadeIn 1s ease 0.8s forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes titleFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-message {
            color: #555;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 40px;
            font-weight: 400;
            animation: messageFadeIn 1s ease 1s forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes messageFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .features-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 35px 0;
            animation: gridFadeIn 1s ease 1.2s forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes gridFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-card {
            background: linear-gradient(135deg, #e8f5e8 0%, #f1f8e9 100%);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(76, 175, 80, 0.2);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(76, 175, 80, 0.15);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-success);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 1.3rem;
        }

        .feature-title {
            font-weight: 700;
            color: var(--success);
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .feature-text {
            color: #666;
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .btn-login {
            background: var(--gradient-primary);
            border: none;
            color: white;
            border-radius: 20px;
            padding: 18px 50px;
            font-size: 1.2rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            transition: all 0.4s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            animation: buttonFadeIn 1s ease 1.4s forwards;
            opacity: 0;
            transform: translateY(20px);
            box-shadow: 0 8px 25px rgba(106, 17, 203, 0.3);
        }

        @keyframes buttonFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-login::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-secondary);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .btn-login:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(106, 17, 203, 0.4);
            color: white;
            text-decoration: none;
        }

        .btn-login:hover::before {
            opacity: 1;
        }

        .btn-login:active {
            transform: translateY(-1px) scale(1.02);
        }

        .btn-text {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .additional-info {
            margin-top: 30px;
            padding: 25px;
            background: linear-gradient(135deg, #f8f4ff 0%, #e8d5ff 100%);
            border-radius: 20px;
            border: 1px solid rgba(106, 17, 203, 0.1);
            animation: infoFadeIn 1s ease 1.6s forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes infoFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .info-title {
            color: var(--purple);
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #666;
            font-size: 0.9rem;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-item i {
            color: var(--purple);
            margin-right: 12px;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .success-container {
                padding: 40px 30px;
                margin: 20px;
            }

            .success-title {
                font-size: 2.2rem;
            }

            .success-message {
                font-size: 1.1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .btn-login {
                padding: 15px 40px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .success-container {
                padding: 30px 20px;
            }

            .success-icon {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }

            .success-title {
                font-size: 1.8rem;
            }
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: var(--gradient-success);
            animation: confetti-fall 3s linear infinite;
        }

        .confetti:nth-child(odd) {
            background: var(--gradient-primary);
            animation-delay: 0.5s;
        }

        @keyframes confetti-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Elementos flotantes decorativos -->
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
        <!-- Icono de éxito animado -->
        <div class="success-icon">
            <i class="bi bi-check-lg checkmark"></i>
        </div>

        <!-- Título principal -->
        <h1 class="success-title">¡Contraseña Actualizada!</h1>

        <!-- Mensaje principal -->
        <p class="success-message">
            Perfecto, tu nueva contraseña ha sido guardada correctamente y está completamente segura.
            Ya puedes iniciar sesión con ella en LibrosWap.
        </p>

        <!-- Características destacadas -->
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

        <!-- Botón principal -->
        <a href="index.php?c=UsuarioController&a=login" class="btn-login">
            <span class="btn-text">
                <i class="bi bi-box-arrow-in-right"></i>
                Iniciar Sesión
            </span>
        </a>

        <!-- Información adicional -->
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

    <script>
        // Animación de entrada del contenedor
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.success-container');

            // Trigger de animación
            setTimeout(() => {
                container.style.animationPlayState = 'running';
            }, 100);

            // Crear efecto de confetti opcional
            createConfetti();
        });

        // Efecto de confetti (opcional)
        function createConfetti() {
            const colors = ['#4caf50', '#81c784', '#6a11cb', '#9c88ff', '#f093fb'];

            for (let i = 0; i < 50; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                    confetti.style.animationDelay = Math.random() * 2 + 's';

                    document.body.appendChild(confetti);

                    setTimeout(() => {
                        confetti.remove();
                    }, 5000);
                }, i * 100);
            }
        }

        // Efecto hover mejorado en el botón
        document.querySelector('.btn-login').addEventListener('mouseenter', function () {
            this.style.transform = 'translateY(-3px) scale(1.05)';
        });

        document.querySelector('.btn-login').addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(0) scale(1)';
        });

        // Efecto de click en el botón
        document.querySelector('.btn-login').addEventListener('mousedown', function () {
            this.style.transform = 'translateY(-1px) scale(1.02)';
        });

        document.querySelector('.btn-login').addEventListener('mouseup', function () {
            this.style.transform = 'translateY(-3px) scale(1.05)';
        });

        // Auto-redirect opcional después de unos segundos
        let countdown = 10;
        const redirectTimer = setInterval(() => {
            countdown--;
            if (countdown <= 0) {
                clearInterval(redirectTimer);
                window.location.href = 'index.php?c=UsuarioController&a=login';
            }
        }, 1000);

        // Cancelar auto-redirect si el usuario interactúa
        document.addEventListener('click', () => {
            clearInterval(redirectTimer);
        });

        document.addEventListener('keydown', () => {
            clearInterval(redirectTimer);
        });
    </script>
</body>

</html>
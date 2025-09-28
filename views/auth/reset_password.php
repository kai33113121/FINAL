<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - LibrosWap</title>
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
            --purple-dark: #5a0fb8;
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
            opacity: 0.3;
            z-index: -1;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            bottom: 20%;
            left: 60%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .reset-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
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

        .reset-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(106, 17, 203, 0.05) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
            z-index: -1;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .reset-container.show {
            opacity: 1;
            transform: translateY(0);
        }

        .reset-icon {
            width: 90px;
            height: 90px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2.5rem;
            color: white;
            animation: pulse 2s infinite;
            position: relative;
        }

        .reset-icon::before {
            content: '';
            position: absolute;
            inset: -5px;
            border-radius: 50%;
            background: var(--gradient-secondary);
            opacity: 0;
            z-index: -1;
            animation: pulse-ring 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 0.5; }
            100% { transform: scale(1.3); opacity: 0; }
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

        .reset-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--purple);
            margin-bottom: 15px;
            background: var(--gradient-primary);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }

        .reset-subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 40px;
            line-height: 1.6;
            font-weight: 400;
        }

        .form-group {
            position: relative;
            margin-bottom: 30px;
            text-align: left;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--purple-dark);
            margin-bottom: 8px;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 18px 55px 18px 20px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.15);
            background: white;
            outline: none;
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .form-control:focus + .input-icon {
            color: var(--purple);
        }

        .password-strength {
            margin-top: 10px;
            font-size: 0.85rem;
            display: none;
        }

        .strength-bar {
            height: 4px;
            border-radius: 2px;
            background: #e9ecef;
            margin-bottom: 8px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .btn-reset {
            background: var(--gradient-primary);
            border: none;
            color: white;
            border-radius: 15px;
            padding: 18px 40px;
            font-size: 1.1rem;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .btn-reset::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-secondary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-reset:hover::before {
            opacity: 1;
        }

        .btn-reset:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(106, 17, 203, 0.4);
            color: white;
        }

        .btn-reset:active {
            transform: translateY(-1px);
        }

        .btn-reset span {
            position: relative;
            z-index: 2;
        }

        .back-link {
            font-size: 0.95rem;
            color: #888;
            line-height: 1.5;
        }

        .back-link a {
            color: var(--purple);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .back-link a:hover {
            color: var(--purple-light);
            text-decoration: underline;
            transform: translateX(-3px);
        }

        .security-info {
            margin: 30px 0;
            padding: 20px;
            background: linear-gradient(135deg, #e8f5e8 0%, #f0fff0 100%);
            border-radius: 15px;
            text-align: left;
            border: 1px solid rgba(76, 175, 80, 0.2);
        }

        .security-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            font-size: 0.9rem;
            color: #2e7d32;
        }

        .security-item:last-child {
            margin-bottom: 0;
        }

        .security-item i {
            color: #4caf50;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .password-requirements {
            background: linear-gradient(135deg, #fff3e0 0%, #ffeaa7 100%);
            border-radius: 12px;
            padding: 15px;
            margin-top: 15px;
            border: 1px solid rgba(255, 152, 0, 0.2);
        }

        .requirement {
            display: flex;
            align-items: center;
            font-size: 0.85rem;
            color: #e65100;
            margin-bottom: 8px;
        }

        .requirement:last-child {
            margin-bottom: 0;
        }

        .requirement i {
            margin-right: 8px;
            font-size: 0.9rem;
        }

        .requirement.valid {
            color: #2e7d32;
        }

        .requirement.valid i::before {
            content: '\f26b';
        }

        @media (max-width: 480px) {
            .reset-container {
                padding: 35px 25px;
                margin: 10px;
            }

            .reset-title {
                font-size: 2rem;
            }

            .reset-subtitle {
                font-size: 1rem;
            }

            .form-control {
                padding: 15px 45px 15px 18px;
                font-size: 1rem;
            }
        }

        .loading {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <!-- Formas flotantes decorativas -->
    <div class="floating-shapes">
        <div class="shape">
            <i class="bi bi-book" style="font-size: 3rem; color: rgba(255,255,255,0.1);"></i>
        </div>
        <div class="shape">
            <i class="bi bi-shield-lock" style="font-size: 2.5rem; color: rgba(255,255,255,0.1);"></i>
        </div>
        <div class="shape">
            <i class="bi bi-key" style="font-size: 2rem; color: rgba(255,255,255,0.1);"></i>
        </div>
    </div>

    <div class="reset-container" id="resetContainer">
        <!-- Icono principal -->
        <div class="reset-icon">
            <i class="bi bi-shield-lock-fill"></i>
        </div>

        <!-- Título y descripción -->
        <h1 class="reset-title">🔑 Nueva Contraseña</h1>
        <p class="reset-subtitle">
            Ingresa tu nueva contraseña para acceder nuevamente a LibrosWap. Asegúrate de crear una contraseña segura y fácil de recordar.
        </p>

        <!-- Información de seguridad -->
        <div class="security-info">
            <div class="security-item">
                <i class="bi bi-shield-check"></i>
                <span>Tu información está completamente protegida</span>
            </div>
            <div class="security-item">
                <i class="bi bi-clock"></i>
                <span>Esta sesión expirará por seguridad</span>
            </div>
            <div class="security-item">
                <i class="bi bi-key"></i>
                <span>Tu contraseña será encriptada automáticamente</span>
            </div>
        </div>

        <!-- Formulario -->
        <form action="index.php?c=UsuarioController&a=resetPassword" method="post" id="resetForm">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            
            <div class="form-group">
                <label class="form-label" for="password">Nueva Contraseña</label>
                <input type="password" 
                       name="password" 
                       id="password"
                       class="form-control" 
                       placeholder="Ingresa tu nueva contraseña"
                       required>
                <i class="bi bi-eye-slash input-icon" id="togglePassword"></i>
                
                <!-- Indicador de fuerza de contraseña -->
                <div class="password-strength" id="passwordStrength">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strengthFill"></div>
                    </div>
                    <span id="strengthText">Fortaleza de contraseña</span>
                </div>

                <!-- Requisitos de contraseña -->
                <div class="password-requirements">
                    <div class="requirement" id="req-length">
                        <i class="bi bi-circle"></i>
                        <span>Al menos 8 caracteres</span>
                    </div>
                    <div class="requirement" id="req-upper">
                        <i class="bi bi-circle"></i>
                        <span>Una letra mayúscula</span>
                    </div>
                    <div class="requirement" id="req-lower">
                        <i class="bi bi-circle"></i>
                        <span>Una letra minúscula</span>
                    </div>
                    <div class="requirement" id="req-number">
                        <i class="bi bi-circle"></i>
                        <span>Un número</span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-reset" id="submitBtn">
                <span id="btnText">
                    <i class="bi bi-shield-check me-2"></i>
                    Restablecer Contraseña
                </span>
                <div class="loading" id="loading">
                    <div class="spinner"></div>
                </div>
            </button>
        </form>

        <!-- Enlace de regreso -->
        <div class="back-link">
            ¿Necesitas ayuda? 
            <a href="index.php?c=UsuarioController&a=login">
                <i class="bi bi-arrow-left"></i>
                Volver al inicio de sesión
            </a>
        </div>
    </div>

    <script>
        // Animar entrada
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => {
                document.getElementById('resetContainer').classList.add('show');
            }, 100);
        });

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });

        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.getElementById('passwordStrength');
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');

            // Show strength indicator if there's input
            if (password.length > 0) {
                strengthIndicator.style.display = 'block';
            } else {
                strengthIndicator.style.display = 'none';
                return;
            }

            // Check requirements
            const requirements = {
                length: password.length >= 8,
                upper: /[A-Z]/.test(password),
                lower: /[a-z]/.test(password),
                number: /\d/.test(password)
            };

            // Update requirement indicators
            Object.keys(requirements).forEach(req => {
                const element = document.getElementById(`req-${req}`);
                if (requirements[req]) {
                    element.classList.add('valid');
                    element.querySelector('i').className = 'bi bi-check-circle-fill';
                } else {
                    element.classList.remove('valid');
                    element.querySelector('i').className = 'bi bi-circle';
                }
            });

            // Calculate strength
            const validCount = Object.values(requirements).filter(Boolean).length;
            let strength = 0;
            let strengthLabel = '';
            let strengthColor = '';

            switch(validCount) {
                case 0:
                case 1:
                    strength = 25;
                    strengthLabel = 'Muy débil';
                    strengthColor = '#f44336';
                    break;
                case 2:
                    strength = 50;
                    strengthLabel = 'Débil';
                    strengthColor = '#ff9800';
                    break;
                case 3:
                    strength = 75;
                    strengthLabel = 'Buena';
                    strengthColor = '#2196f3';
                    break;
                case 4:
                    strength = 100;
                    strengthLabel = 'Excelente';
                    strengthColor = '#4caf50';
                    break;
            }

            strengthFill.style.width = strength + '%';
            strengthFill.style.backgroundColor = strengthColor;
            strengthText.textContent = `Fortaleza: ${strengthLabel}`;
            strengthText.style.color = strengthColor;
        });

        // Form submission with loading state
        document.getElementById('resetForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const loading = document.getElementById('loading');

            submitBtn.disabled = true;
            btnText.style.display = 'none';
            loading.style.display = 'block';
        });

        // Button click effect
        document.querySelector('.btn-reset').addEventListener('mousedown', function() {
            this.style.transform = 'translateY(-1px) scale(0.98)';
        });

        document.querySelector('.btn-reset').addEventListener('mouseup', function() {
            this.style.transform = 'translateY(-3px) scale(1)';
        });

        // Auto-focus on password input
        document.getElementById('password').focus();

        // Handle form validation
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            
            if (password.length < 8) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Contraseña muy corta',
                    text: 'La contraseña debe tener al menos 8 caracteres.',
                    confirmButtonColor: '#6a11cb',
                    confirmButtonText: 'Entendido'
                });
                
                // Reset button state
                const submitBtn = document.getElementById('submitBtn');
                const btnText = document.getElementById('btnText');
                const loading = document.getElementById('loading');
                
                submitBtn.disabled = false;
                btnText.style.display = 'block';
                loading.style.display = 'none';
            }
        });

        // Show success/error messages if needed
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        const msg = urlParams.get('msg');

        if (status === 'success') {
            Swal.fire({
                icon: 'success',
                title: '¡Contraseña restablecida!',
                text: 'Tu contraseña ha sido actualizada exitosamente. Ya puedes iniciar sesión.',
                confirmButtonColor: '#6a11cb',
                confirmButtonText: 'Ir al login'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php?c=UsuarioController&a=login';
                }
            });
        } else if (status === 'error') {
            Swal.fire({
                icon: 'error',
                title: 'Error al restablecer',
                text: decodeURIComponent(msg || 'Hubo un problema al restablecer tu contraseña. Inténtalo de nuevo.'),
                confirmButtonColor: '#6a11cb',
                confirmButtonText: 'Reintentar'
            });
        }
    </script>
</body>

</html>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="public/css/reset.css">
</head>
<body>
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
        <div class="reset-icon">
            <i class="bi bi-shield-lock-fill"></i>
        </div>
        <h1 class="reset-title">🔑 Nueva Contraseña</h1>
        <p class="reset-subtitle">
            Ingresa tu nueva contraseña para acceder nuevamente a LibrosWap. Asegúrate de crear una contraseña segura y fácil de recordar.
        </p>
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
                <div class="password-strength" id="passwordStrength">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strengthFill"></div>
                    </div>
                    <span id="strengthText">Fortaleza de contraseña</span>
                </div>
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
        <div class="back-link">
            ¿Necesitas ayuda? 
            <a href="index.php?c=UsuarioController&a=login">
                <i class="bi bi-arrow-left"></i>
                Volver al inicio de sesión
            </a>
        </div>
    </div>
    <script>
        
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => {
                document.getElementById('resetContainer').classList.add('show');
            }, 100);
        });
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.getElementById('passwordStrength');
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            if (password.length > 0) {
                strengthIndicator.style.display = 'block';
            } else {
                strengthIndicator.style.display = 'none';
                return;
            }
            const requirements = {
                length: password.length >= 8,
                upper: /[A-Z]/.test(password),
                lower: /[a-z]/.test(password),
                number: /\d/.test(password)
            };
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
        document.getElementById('resetForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const loading = document.getElementById('loading');
            submitBtn.disabled = true;
            btnText.style.display = 'none';
            loading.style.display = 'block';
        });
        document.querySelector('.btn-reset').addEventListener('mousedown', function() {
            this.style.transform = 'translateY(-1px) scale(0.98)';
        });
        document.querySelector('.btn-reset').addEventListener('mouseup', function() {
            this.style.transform = 'translateY(-3px) scale(1)';
        });
        document.getElementById('password').focus();
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
                const submitBtn = document.getElementById('submitBtn');
                const btnText = document.getElementById('btnText');
                const loading = document.getElementById('loading');
                
                submitBtn.disabled = false;
                btnText.style.display = 'block';
                loading.style.display = 'none';
            }
        });
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
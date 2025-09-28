
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
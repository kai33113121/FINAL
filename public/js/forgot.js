
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => {
                document.getElementById('recoveryContainer').classList.add('show');
            }, 100);
        });
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
        document.querySelector('.btn-recovery').addEventListener('click', function () {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
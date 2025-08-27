<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div style="display:flex;justify-content:center;align-items:center;height:100vh;background:linear-gradient(135deg,#6a1b9a,#8e24aa);font-family:'Segoe UI',sans-serif;">
    <div style="background:white;padding:40px;border-radius:15px;box-shadow:0 0 20px rgba(0,0,0,0.2);max-width:400px;width:100%;text-align:center;">
        <h2 style="color:#6a1b9a;margin-bottom:20px;">¿Olvidaste tu contraseña?</h2>
        <p style="color:#555;margin-bottom:30px;">Ingresa tu correo electrónico y te enviaremos un enlace para recuperarla.</p>

        <form action="index.php?c=UsuarioController&a=sendRecoveryEmail" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required style="width:100%;padding:12px;border:2px solid #ccc;border-radius:8px;margin-bottom:20px;font-size:16px;">

            <button type="submit" style="width:100%;padding:12px;background:#6a1b9a;color:white;border:none;border-radius:8px;font-size:16px;cursor:pointer;transition:0.3s;">
                Enviar enlace
            </button>
        </form>

        <p style="margin-top:20px;font-size:14px;color:#888;">Volver al <a href="index.php?c=UsuarioController&a=login" style="color:#6a1b9a;text-decoration:none;">inicio de sesión</a></p>
    </div>
</div>

<script>
    // Mostrar alerta si hay status en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const msg = urlParams.get('msg');
    if (status === 'ok') {
        Swal.fire({
            icon: 'success',
            title: '¡Enlace enviado!',
            text: 'Revisa tu correo electrónico para restablecer tu contraseña.',
            confirmButtonColor: '#6a1b9a'
        });
    } else if (status === 'error') {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: decodeURIComponent(msg || 'No se pudo enviar el enlace.'),
            confirmButtonColor: '#6a1b9a'
        });
    }
</script>
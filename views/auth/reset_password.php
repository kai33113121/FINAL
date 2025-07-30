<div
    style="display:flex;justify-content:center;align-items:center;height:100vh;background:linear-gradient(135deg,#6a1b9a,#8e24aa);font-family:'Segoe UI',sans-serif;">
    <div
        style="background:white;padding:40px;border-radius:15px;box-shadow:0 0 20px rgba(0,0,0,0.2);max-width:400px;width:100%;text-align:center;">
        <h2 style="color:#6a1b9a;margin-bottom:20px;">🔑 Nueva contraseña</h2>
        <p style="color:#555;margin-bottom:30px;">Ingresa tu nueva contraseña para acceder nuevamente a LibrosWap.</p>

        <h2>Restablecer contraseña</h2>
        <form action="index.php?c=UsuarioController&a=resetPassword" method="post">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            <label>Nueva contraseña:</label>
            <input type="password" name="password" required>
            <button type="submit">Restablecer</button>
        </form>

        <p style="margin-top:20px;font-size:14px;color:#888;">Volver al <a href="index.php?c=UsuarioController&a=login"
                style="color:#6a1b9a;text-decoration:none;">inicio de sesión</a></p>
    </div>
</div>
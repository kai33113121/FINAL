<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f0ff;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .login-wrapper {
            max-width: 1100px;
            height: 90vh;
            margin: auto;
            display: flex;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            background-color: white;
        }

        .login-left,
        .login-right {
            flex: 1;
            padding: 40px;
        }

        .login-left {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right {
            background: url('/FINAL/public/img/loginf.png') no-repeat center center;
            background-size: cover;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .divider {
            width: 1px;
            background-color: #ccc;
            height: 80%;
            position: absolute;
            top: 10%;
            left: 0;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #6a0dad;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }

        .input-group-text {
            background-color: #eee;
            border: none;
        }

        .btn-purple {
            background-color: #6a0dad;
            color: white;
            font-weight: bold;
        }

        .btn-purple:hover {
            background-color: #4b0082;
        }

        a {
            color: #6a0dad;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-right {
                display: none;
            }

            .login-wrapper {
                height: auto;
                margin-top: 40px;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="login-wrapper">
            <!-- Login -->
            <div class="login-left">
                <div class="logo text-center"> LIBROSWAP</div>
                <h2 class="text-center">Iniciar sesión</h2>
                <p class="subtitle text-center"> usa tu correo electrónico y contraseña</p>
                <?php if (isset($mensaje)): ?>
                    <div class="alert alert-danger text-center">
                        <?= $mensaje ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="index.php?c=UsuarioController&a=login">
                    <div class="mb-3 input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" required placeholder="Correo Electrónico">
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" required placeholder="Contraseña">
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <a href="index.php?c=UsuarioController&a=forgotPassword">¿Olvidaste tu contraseña?</a>
                        <br>
                        <a href="index.php">Volver al Inicio</a>
                    </div>
                    <button type="submit" class="btn btn-purple w-100">Iniciar sesión</button>
                </form>
            </div>

            <!-- Fondo artístico -->
            <div class="login-right">
                <div class="divider"></div>
                <h3 class="mb-3">✨ Crea tu cuenta en LibrosWAP</h3>
                <p>Conéctate para comprar, vender o intercambiar libros con una comunidad de lectores apasionados.</p>
                <a href="index.php?c=UsuarioController&a=register" class="btn btn-outline-light mt-3">Registrarse</a>
            </div>
        </div>
    </div>
</body>

</html>
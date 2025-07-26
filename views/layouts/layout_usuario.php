<?php global $notificaciones; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LibrosWap - Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .navbar-purple {
            background: linear-gradient(to right, #6a1b9a, #8e24aa);
        }

        .navbar-purple .nav-link,
        .navbar-purple .navbar-brand {
            color: white;
        }

        .navbar-purple .nav-link:hover {
            color: #d1c4e9;
        }

        .btn-outline-purple {
            border-color: #9575cd;
            color: #6a1b9a;
        }

        .btn-outline-purple:hover {
            background-color: #9575cd;
            color: white;
        }

        .text-shadow {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-purple shadow-sm sticky-top py-3">
        <div class="container-fluid px-4">
            <!-- Logo -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php?c=UsuarioController&a=dashboard">
                <img src="/FINAL/public/img/logow.png" alt="Logo" style="height:40px;" class="me-2">
                <span class="text-white text-shadow">LibrosWap</span>
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Secciones centradas -->
                <ul class="navbar-nav gap-3 mx-auto">
                    <li class="nav-item"><a class="nav-link text-shadow" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#">Libros</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#">Comprar libros</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#">Vender libros</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#">Intercambiar libros</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#">Actualizaciones</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#">Gestionar</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow"
                            href="index.php?c=EventoController&a=listar">Foros</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow"
                            href="index.php?c=MensajeController&a=mensajes">Mensajes</a></li>
                </ul>

                <!-- Íconos y perfil -->
                <ul class="navbar-nav align-items-center gap-3">
                    <!-- Carrito -->
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="index.php?c=CarritoController&a=ver">
                            <i class="bi bi-cart3 fs-5 text-white"></i>
                        </a>
                    </li>

                    <!-- Notificaciones -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle position-relative" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bell fs-5 text-white"></i>
                            <?php if (!empty($notificaciones)): ?>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= count($notificaciones) ?>
                                </span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2"
                            style="width: 300px; max-height: 400px; overflow-y: auto;">
                            <li class="dropdown-header fw-bold text-purple">Notificaciones</li>
                            <?php if (!empty($notificaciones) && is_array($notificaciones)): ?>
                                <?php foreach ($notificaciones as $n): ?>
                                    <?php if (isset($n['mensaje'], $n['link'], $n['fecha'])): ?>
                                        <li>
                                            <a class="dropdown-item small" href="<?= htmlspecialchars($n['link']) ?>">
                                                <?= htmlspecialchars($n['mensaje']) ?>
                                                <br><span class="text-muted small"><?= htmlspecialchars($n['fecha']) ?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><span class="dropdown-item text-muted">Sin notificaciones nuevas</span></li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <!-- Perfil -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/FINAL/public/img/client2.jpg" alt="Perfil" class="rounded-circle" width="32"
                                height="32">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Configuración</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="index.php?c=UsuarioController&a=logout">Cerrar sesión</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item" href="index.php?c=UsuarioController&a=logout">Cerrar sesión</a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php include($contenido); ?>
    </div>

    <!-- ✅ Bootstrap JS al final -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
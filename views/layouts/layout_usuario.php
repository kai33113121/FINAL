<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LibrosWap - Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/FINAL/public/css/dashboardu.css">

    <style>
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-dark: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            --purple: #6a11cb;
            --purple-light: #f8f4ff;
            --shadow-epic: 0 20px 40px rgba(106, 17, 203, 0.15);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        /* Navbar Épico */
        .navbar-futuristic {
            background: var(--gradient-primary);
            backdrop-filter: blur(20px);
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 8px 32px rgba(106, 17, 203, 0.3);
        }

        .navbar-futuristic.scrolled {
            background: rgba(106, 17, 203, 0.95);
            backdrop-filter: blur(30px);
            box-shadow: 0 12px 40px rgba(106, 17, 203, 0.4);
        }

        .navbar-brand {
            font-weight: 800;
            color: white !important;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: translateY(-2px);
            text-shadow: 2px 4px 15px rgba(0, 0, 0, 0.4);
        }

        .navbar-brand img {
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
            transition: all 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.4));
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 12px 20px !important;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .navbar-nav .nav-link:hover::before {
            opacity: 1;
        }

        .navbar-nav .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
            text-shadow: 1px 2px 8px rgba(0, 0, 0, 0.3);
        }

        .navbar-toggler {
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            padding: 8px 12px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.3);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Iconos del navbar con efectos */
        .nav-link .bi {
            transition: all 0.3s ease;
        }

        .nav-link:hover .bi {
            transform: scale(1.1);
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.3));
        }

        /* Dropdown Épico */
        .dropdown-menu {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: var(--shadow-epic);
            padding: 1rem;
            z-index: 2100 !important;
        }

        .dropdown-menu.notificaciones {
            background: linear-gradient(145deg, #ffffff, #f8f4ff);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(106, 17, 203, 0.2);
            min-width: 350px;
            max-width: 95vw;
            padding: 1rem;
            border: 1px solid rgba(106, 17, 203, 0.1);
        }

        .dropdown-menu.notificaciones .dropdown-header {
            color: var(--purple);
            font-size: 1.2rem;
            font-weight: 700;
            background: none;
            border-bottom: 2px solid rgba(106, 17, 203, 0.1);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            text-align: center;
        }

        .dropdown-menu.notificaciones .dropdown-item {
            border-radius: 15px;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(106, 17, 203, 0.05);
            position: relative;
            overflow: hidden;
        }

        .dropdown-menu.notificaciones .dropdown-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-primary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .dropdown-menu.notificaciones .dropdown-item:hover::before {
            opacity: 0.05;
        }

        .dropdown-menu.notificaciones .dropdown-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(106, 17, 203, 0.15);
            color: var(--purple);
        }

        .dropdown-menu.notificaciones .icono-noti {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 1.5rem;
            flex-shrink: 0;
            position: relative;
            z-index: 2;
        }

        .dropdown-menu.notificaciones .fecha-noti {
            font-size: 0.85rem;
            color: rgba(106, 17, 203, 0.6);
            margin-top: 0.3rem;
            font-weight: 500;
        }

        .dropdown-menu.notificaciones .dropdown-divider {
            margin: 0.5rem 0;
            border-color: rgba(106, 17, 203, 0.1);
        }

        /* Perfil dropdown */
        .dropdown-menu:not(.notificaciones) .dropdown-item {
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 4px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .dropdown-menu:not(.notificaciones) .dropdown-item:hover {
            background: var(--gradient-primary);
            color: white;
            transform: translateX(5px);
        }

        /* Badge de notificaciones */
        .badge {
            background: var(--gradient-secondary) !important;
            border: 2px solid white;
            box-shadow: 0 4px 12px rgba(240, 147, 251, 0.4);
            font-weight: 600;
        }

        /* Foto de perfil mejorada */
        .rounded-circle {
            border: 3px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .dropdown-toggle:hover .rounded-circle {
            transform: scale(1.1);
            border-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        /* Efectos de hover para el navbar */
        .navbar-nav .nav-item:hover {
            transform: translateY(-1px);
        }

        /* Responsividad mejorada */
        @media (max-width: 991.98px) {
            .navbar-nav.gap-3.mx-auto {
                flex-direction: column !important;
                gap: 0.5rem !important;
                align-items: flex-start !important;
                margin-top: 1rem;
            }

            .navbar-nav.align-items-center.gap-3 {
                flex-direction: row !important;
                gap: 1rem !important;
                margin-top: 1rem;
                justify-content: center;
            }

            .navbar-collapse {
                background: rgba(106, 17, 203, 0.95);
                backdrop-filter: blur(20px);
                padding: 2rem;
                border-radius: 0 0 25px 25px;
                margin-top: 1rem;
                box-shadow: 0 10px 30px rgba(106, 17, 203, 0.3);
            }

            .dropdown-menu.notificaciones {
                min-width: 90vw;
                padding: 1rem 0.5rem;
            }

            .dropdown-menu.notificaciones .dropdown-item {
                padding: 0.8rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 575.98px) {
            .navbar-brand span {
                font-size: 1.1rem !important;
            }

            .navbar-brand img {
                height: 35px !important;
            }

            .navbar-nav .nav-link {
                padding: 10px 16px !important;
                font-size: 0.95rem;
            }

            .dropdown-menu.notificaciones .dropdown-item {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }

            .dropdown-menu.notificaciones .icono-noti {
                font-size: 2rem;
            }
        }

        /* Contenido principal con mejor espaciado */
        .container.mt-4 {
            padding-top: 2rem;
            position: relative;
            z-index: 1;
        }

        /* Efectos de entrada suaves */
        .container.mt-4>* {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Alertas mejoradas */
        .alert {
            border-radius: 20px;
            border: none;
            box-shadow: var(--shadow-epic);
            font-weight: 500;
        }

        .alert-danger {
            background: linear-gradient(145deg, #ffebee, #fce4ec);
            color: #c62828;
        }

        /* Mejoras adicionales para elementos específicos */
        .text-shadow {
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Loading animation para dropdowns */
        .dropdown-menu.show {
            animation: dropdownFadeIn 0.3s ease-out;
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-futuristic shadow-lg sticky-top py-3" id="mainNavbar">
        <div class="container-fluid px-4">
            <!-- Logo épico -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php?c=UsuarioController&a=dashboard">
                <img src="/FINAL/public/img/logow.png" alt="Logo" style="height:45px;" class="me-3">
                <span class="text-white text-shadow fs-4">LibrosWap</span>
            </a>

            <!-- Toggler mejorado -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido del navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Navegación principal -->
                <ul class="navbar-nav gap-2 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard">
                            <i class="bi bi-house-door me-2"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-shadow"
                            href="index.php?c=UsuarioController&a=dashboard#accesos-rapidos">
                            <i class="bi bi-journal-text me-2"></i>Accesos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#productos">
                            <i class="bi bi-book me-2"></i>Libros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#categorias">
                            <i class="bi bi-tags me-2"></i>Categorías
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#lanzamientos">
                            <i class="bi bi-star me-2"></i>Lanzamientos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#contacto">
                            <i class="bi bi-envelope me-2"></i>Contacto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-shadow" href="index.php?c=EventoController&a=listar">
                            <i class="bi bi-chat-dots me-2"></i>Foros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-shadow" href="index.php?c=MensajeController&a=mensajes">
                            <i class="bi bi-chat-left-text me-2"></i>Mensajes
                        </a>
                    </li>
                </ul>

                <!-- Iconos y perfil -->
                <ul class="navbar-nav align-items-center gap-3">
                    <!-- Carrito épico -->
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="index.php?c=CarritoController&a=ver"
                            title="Mi Carrito">
                            <i class="bi bi-cart3 fs-5 text-white"></i>
                        </a>
                    </li>

                    <!-- Notificaciones épicas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle position-relative" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" id="notificacionesDropdown"
                            title="Notificaciones">
                            <i class="bi bi-bell fs-5 text-white"></i>
                            <?php
                            if (!empty($notificaciones) && is_array($notificaciones)) {
                                $no_leidas = array_filter($notificaciones, function ($n) {
                                    return empty($n['leida']);
                                });
                                if (count($no_leidas) > 0) {
                                    ?>
                                    <span class="position-absolute top-1 start-1 translate-middle badge rounded-pill bg-danger">
                                        <?= count($no_leidas) ?>
                                        <span class="visually-hidden">notificaciones no leídas</span>
                                    </span>
                                    <?php
                                }
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end notificaciones"
                            aria-labelledby="notificacionesDropdown" style="max-height: 400px; overflow-y: auto;">
                            <li class="dropdown-header">
                                <i class="bi bi-bell-fill me-2"></i>Notificaciones
                            </li>
                            <?php if (!empty($notificaciones) && is_array($notificaciones)): ?>
                                <?php foreach ($notificaciones as $n): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= htmlspecialchars($n['link'] ?? '#') ?>">
                                            <span class="icono-noti">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </span>
                                            <div class="flex-grow-1">
                                                <div class="fw-semibold"><?= htmlspecialchars($n['mensaje'] ?? '') ?></div>
                                                <?php if (!empty($n['fecha'])): ?>
                                                    <div class="fecha-noti">
                                                        <i class="bi bi-clock me-1"></i><?= htmlspecialchars($n['fecha']) ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php if (!end($notificaciones) === $n): ?>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>
                                    <span class="dropdown-item text-muted text-center py-4">
                                        <i class="bi bi-bell-slash fs-1 d-block mb-2"></i>
                                        Sin notificaciones nuevas
                                    </span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <!-- Perfil épico -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" id="perfilDropdown" title="Mi Perfil">
                            <img src="/FINAL/public/img/usuarios/<?= !empty($_SESSION['usuario']['foto']) ? htmlspecialchars($_SESSION['usuario']['foto']) : 'default.jpg' ?>"
                                alt="Perfil" class="rounded-circle" width="38" height="38"
                                onerror="this.onerror=null;this.src='/FINAL/public/img/usuarios/default.jpg';">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                            <li class="dropdown-header text-center">
                                <i class="bi bi-person-circle fs-4 d-block mb-2"></i>
                                <strong><?= htmlspecialchars($_SESSION['usuario']['nombre'] ?? 'Usuario') ?></strong>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?c=UsuarioController&a=perfil">
                                    <i class="bi bi-person-gear me-2"></i>Mi Perfil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?c=VentaController&a=misVentas">
                                    <i class="bi bi-shop me-2"></i>Mis Publicaciones
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?c=IntercambioController&a=misIntercambios">
                                    <i class="bi bi-arrow-left-right me-2"></i>Mis Intercambios
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?c=CompraController&a=index">
                                    <i class="bi bi-bag-check me-2"></i>Mis Compras
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="index.php?c=UsuarioController&a=logout">
                                    <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4" style="position:relative; z-index:1;">
        <?php
        // Muestra errores de notificaciones si existen
        if (isset($notificaciones) && !is_array($notificaciones)) {
            echo '<div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Error al cargar notificaciones.
                  </div>';
        }
        ?>
        <?php include($contenido); ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Efectos del navbar al hacer scroll
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Inicialización Bootstrap cuando el DOM está listo
        document.addEventListener('DOMContentLoaded', function () {
            // Verificar que Bootstrap está cargado
            if (typeof bootstrap === 'undefined') {
                console.error('Bootstrap no está cargado correctamente');
                return;
            }

            // Inicializar todos los dropdowns explícitamente
            const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            const dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl, {
                    autoClose: true,
                    boundary: 'viewport'
                });
            });

            // Smooth scrolling para enlaces internos
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Mejorar la experiencia de hover
            const hoverElements = document.querySelectorAll('.nav-link, .dropdown-item');
            hoverElements.forEach(element => {
                element.addEventListener('mouseenter', function () {
                    if (!this.classList.contains('dropdown-toggle')) {
                        this.style.transform = 'translateY(-1px)';
                    }
                });

                element.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Cerrar dropdowns al hacer click en enlaces internos
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function () {
                    const dropdown = this.closest('.dropdown');
                    if (dropdown) {
                        const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
                        if (dropdownToggle) {
                            const bootstrapDropdown = bootstrap.Dropdown.getInstance(dropdownToggle);
                            if (bootstrapDropdown) {
                                bootstrapDropdown.hide();
                            }
                        }
                    }
                });
            });

            // Manejar el colapso del navbar en móviles
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');

            if (navbarToggler && navbarCollapse) {
                // Cerrar navbar al hacer click en cualquier enlace en móviles
                document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle)').forEach(link => {
                    link.addEventListener('click', function () {
                        if (window.innerWidth < 992) {
                            const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                            if (bsCollapse) {
                                bsCollapse.hide();
                            }
                        }
                    });
                });
            }
            // Debug para verificar que los dropdowns están funcionando
            console.log('Bootstrap dropdowns inicializados:', dropdownList.length);
        });
        // Manejo de errores global para dropdowns
        window.addEventListener('error', function (e) {
            if (e.message.includes('dropdown') || e.message.includes('Bootstrap')) {
                console.error('Error con Bootstrap dropdowns:', e.message);
            }
        });
    </script>

    </script>
</body>

</html>
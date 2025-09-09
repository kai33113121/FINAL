
<!-- Elimina el bloque de depuración -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LibrosWap - Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/FINAL/public/css/dashboardu.css">
    <!-- Elimina jQuery, no es necesario para Bootstrap 5 dropdowns -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        .dropdown-menu {
            z-index: 2000 !important;
        }
        /* Estilo especial para el dropdown de notificaciones */
        .dropdown-menu.notificaciones {
            background: #f8f5fc;
            border-radius: 1rem;
            box-shadow: 0 4px 24px 0 rgba(122, 85, 179, 0.12);
            min-width: 320px;
            max-width: 95vw;
            padding: 0.5rem 0.5rem 0.5rem 0.5rem;
        }
        .dropdown-menu.notificaciones .dropdown-header {
            color: #6a1b9a;
            font-size: 1.1rem;
            background: none;
            border-bottom: 1px solid #e1bee7;
            margin-bottom: 0.5rem;
        }
        .dropdown-menu.notificaciones .dropdown-item {
            border-radius: 0.5rem;
            margin-bottom: 0.2rem;
            transition: background 0.2s;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            padding: 0.7rem 0.8rem;
            background: #fff;
            box-shadow: 0 1px 2px 0 rgba(122, 85, 179, 0.04);
        }
        .dropdown-menu.notificaciones .dropdown-item:hover {
            background: #ede7f6;
        }
        .dropdown-menu.notificaciones .icono-noti {
            color: #7e57c2;
            font-size: 1.3rem;
            flex-shrink: 0;
        }
        .dropdown-menu.notificaciones .fecha-noti {
            font-size: 0.8rem;
            color: #b39ddb;
            margin-top: 0.2rem;
        }
        .dropdown-menu.notificaciones .dropdown-divider {
            margin: 0.2rem 0;
        }
        @media (max-width: 575.98px) {
            .dropdown-menu.notificaciones {
                min-width: 90vw;
                padding: 0.3rem;
            }
            .dropdown-menu.notificaciones .dropdown-item {
                font-size: 0.95rem;
                padding: 0.6rem 0.5rem;
            }
        }

        .navbar {
            z-index: 2100 !important;
        }

        /* Soluciona problemas de overflow en el contenedor principal */
        body,
        .container,
        .container-fluid {
            overflow: visible !important;
        }

        /* Mejoras de responsividad */
        @media (max-width: 991.98px) {
            .navbar-nav.gap-3.mx-auto {
                flex-direction: column !important;
                gap: 0 !important;
                align-items: flex-start !important;
            }

            .navbar-nav.align-items-center.gap-3 {
                flex-direction: row !important;
                gap: 1rem !important;
                margin-top: 1rem;
            }

            .navbar-collapse {
                background: linear-gradient(to right, #6a1b9a, #8e24aa);
                padding: 1rem;
                border-radius: 0 0 1rem 1rem;
            }
        }

        @media (max-width: 575.98px) {
            .navbar-brand span {
                font-size: 1rem !important;
            }

            .navbar-brand img {
                height: 32px !important;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-purple shadow-sm sticky-top py-3" style="z-index:2100;">
        <div class="container-fluid px-4">
            <!-- Logo -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php?c=UsuarioController&a=dashboard">
                <img src="/FINAL/public/img/logow.png" alt="Logo" style="height:40px;" class="me-2">
                <span class="text-white text-shadow">LibrosWap</span>
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Secciones centradas -->
                <ul class="navbar-nav gap-3 mx-auto">
                    <li class="nav-item"><a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#libros">Libros</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#categorias">Categorias</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#lanzamientos">Lanzamientos</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#blog">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="index.php?c=UsuarioController&a=dashboard#contacto">Contanctanos</a></li>
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
                            data-bs-toggle="dropdown" aria-expanded="false" id="notificacionesDropdown">
                            <i class="bi bi-bell fs-5 text-white"></i>
                            <?php 
                            if (!empty($notificaciones) && is_array($notificaciones)) {
                                $no_leidas = array_filter($notificaciones, function($n) { return empty($n['leida']); });
                                if (count($no_leidas) > 0) {
                            ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= count($no_leidas) ?>
                                </span>
                            <?php 
                                }
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end notificaciones" aria-labelledby="notificacionesDropdown" style="max-height: 400px; overflow-y: auto;">
                            <li class="dropdown-header fw-bold">Notificaciones</li>
                            <?php if (!empty($notificaciones) && is_array($notificaciones)): ?>
                                <?php foreach ($notificaciones as $n): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= htmlspecialchars($n['link'] ?? '#') ?>">
                                            <span class="icono-noti"><i class="bi bi-info-circle-fill"></i></span>
                                            <span>
                                                <?= htmlspecialchars($n['mensaje'] ?? '') ?>
                                                <?php if (!empty($n['fecha'])): ?>
                                                    <div class="fecha-noti"><?= htmlspecialchars($n['fecha']) ?></div>
                                                <?php endif; ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><span class="dropdown-item text-muted">Sin notificaciones nuevas</span></li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <!-- Perfil -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" id="perfilDropdown">
                            <img src="/FINAL/public/img/client2.jpg" alt="Perfil" class="rounded-circle" width="32"
                                height="32">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                            <li><a class="dropdown-item" href="index.php?c=UsuarioController&a=perfil">Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="index.php?c=UsuarioController&a=logout">Cerrar sesión</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4" style="position:relative; z-index:1;">
        <?php
        // Muestra errores de notificaciones si existen
        if (isset($notificaciones) && !is_array($notificaciones)) {
            echo '<div class="alert alert-danger">Error al cargar notificaciones.</div>';
        }
        ?>
        <?php include($contenido); ?>
    </div>

    <!--  Bootstrap JS al final -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        // Inicializa los dropdowns de Bootstrap 5 correctamente
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            dropdownElementList.map(function (dropdownToggleEl) {
                new bootstrap.Dropdown(dropdownToggleEl);
            });
        });
    </script> -->
</body>

</html>
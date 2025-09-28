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
    <link rel="stylesheet" href="public/css/layout_u.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-futuristic shadow-lg sticky-top py-3" id="mainNavbar">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php?c=UsuarioController&a=dashboard">
                <img src="public/img/logow.png" alt="Logo" style="height:45px;" class="me-3">
                <span class="text-white text-shadow fs-4">LibrosWap</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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
                <ul class="navbar-nav align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="index.php?c=CarritoController&a=ver"
                            title="Mi Carrito">
                            <i class="bi bi-cart3 fs-5 text-white"></i>
                        </a>
                    </li>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" id="perfilDropdown" title="Mi Perfil">
                            <img src="public/img/usuarios/<?= !empty($_SESSION['usuario']['foto']) ? htmlspecialchars($_SESSION['usuario']['foto']) : 'default.jpg' ?>"
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
                                <a class="dropdown-item" href="index.php?c=UsuarioController&a=misLibrosAdquiridos">
                                    <i class="bi bi-book me-2"></i>Mi Biblioteca
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
    <div class="container mt-4" style="position:relative; z-index:1;">
        <?php
        if (isset($notificaciones) && !is_array($notificaciones)) {
            echo '<div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Error al cargar notificaciones.
                  </div>';
        }
        ?>
        <?php include($contenido); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
            
            if (typeof bootstrap === 'undefined') {
                console.error('Bootstrap no está cargado correctamente');
                return;
            }
            const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            const dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl, {
                    autoClose: true,
                    boundary: 'viewport'
                });
            });
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
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            if (navbarToggler && navbarCollapse) {
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
            console.log('Bootstrap dropdowns inicializados:', dropdownList.length);
        });
        window.addEventListener('error', function (e) {
            if (e.message.includes('dropdown') || e.message.includes('Bootstrap')) {
                console.error('Error con Bootstrap dropdowns:', e.message);
            }
        });
    </script>
    </script>
    <script>
let tiempoInactivo = 0;
function reiniciarTiempo() { tiempoInactivo = 0; }
document.addEventListener('click', reiniciarTiempo);
document.addEventListener('mousemove', reiniciarTiempo);
document.addEventListener('keypress', reiniciarTiempo);
setInterval(function() {
    tiempoInactivo += 60000; 
    if (tiempoInactivo >= 1800000) { 
        alert('Sesión expirada por inactividad');
        window.location.href = 'index.php?c=UsuarioController&a=logout';
    }
}, 60000);
document.addEventListener('visibilitychange', function() {
    if (!document.hidden) {
        fetch('index.php?c=UsuarioController&a=dashboard')
            .then(response => {
                if (response.redirected) {
                    window.location.href = 'index.php?c=UsuarioController&a=login';
                }
            });
    }
});
</script>
</body>
</html>
<?php
$usuario = $_SESSION['usuario'];
// Helper para mostrar fechas relativas
if (!function_exists('fecha_relativa')) {
    function fecha_relativa($fecha)
    {
        if (empty($fecha))
            return '';
        $timestamp = strtotime($fecha);
        if (!$timestamp)
            return '';
        $diferencia = time() - $timestamp;
        if ($diferencia < 60)
            return 'Hace unos segundos';
        if ($diferencia < 3600)
            return 'Hace ' . floor($diferencia / 60) . ' minutos';
        if ($diferencia < 86400)
            return 'Hace ' . floor($diferencia / 3600) . ' horas';
        if ($diferencia < 172800)
            return 'Ayer';
        return 'Hace ' . floor($diferencia / 86400) . ' días';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LibrosWap Dashboard - Épico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-dark: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            --purple: #6a11cb;
            --purple-light: #f8f4ff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .hero-epic {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: var(--gradient-primary);
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            inset: 0;
            background-image: url('/FINAL/public/img/adminside.png');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: 0;
            background-size: cover;
            animation: float 20s ease-in-out infinite;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.1);
        }

        .hero-content {
            position: relative;
            z-index: 10;
            color: white;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            text-shadow: 2px 2px 20px rgba(0, 0, 0, 0.5);
            margin-bottom: 2rem;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            font-weight: 400;
            margin-bottom: 3rem;
            text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-hero-epic {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-hero-epic:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .collage-img {
            position: absolute;
            width: 80px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            opacity: 0.6;
            animation: float 10s ease-in-out infinite;
        }

        .collage-img:nth-child(even) {
            animation-delay: -5s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(2deg);
            }
        }

        .card-epic {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .card-epic:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .card-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-hover::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-primary);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .card-hover:hover::before {
            opacity: 0.1;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(106, 17, 203, 0.2);
        }

        .btn-futuristic {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-futuristic::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-secondary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-futuristic:hover::before {
            opacity: 1;
        }

        .btn-futuristic:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(106, 17, 203, 0.3);
            color: white;
        }

        .btn-futuristic * {
            position: relative;
            z-index: 2;
        }

        .section-epic {
            padding: 100px 0;
            position: relative;
        }

        .section-title-epic {
            font-size: 3rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 60px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-purple {
            color: var(--purple) !important;
        }

        .text-shadow {
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .bg-gradient-light-purple {
            background: linear-gradient(135deg, #f8f4ff 0%, #e8d5ff 100%);
        }

        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .quick-access-card {
            transition: all 0.4s ease;
            border: none;
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;
        }

        .quick-access-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(106, 17, 203, 0.15);
            background: linear-gradient(145deg, #fff, #f8f4ff);
        }

        .quick-access-card i {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.3s ease;
        }

        .quick-access-card:hover i {
            transform: scale(1.1);
        }

        .cube-card {
            transition: all 0.4s ease;
            border: none;
        }

        .cube-card:hover {
            transform: translateX(10px);
            box-shadow: 0 20px 40px rgba(106, 17, 203, 0.2);
        }

        .book-card {
            transition: all 0.4s ease;
            border: none;
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
        }

        .book-card:hover {
            transform: translateY(-15px) rotateY(5deg);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .footer-epic {
            background: var(--gradient-dark);
            padding: 60px 0 30px;
        }

        .hover-link {
            transition: all 0.3s ease;
        }

        .hover-link:hover {
            color: #f093fb !important;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-title-epic {
                font-size: 2rem;
            }

            .cube-card {
                flex-direction: column !important;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- Hero Section Dashboard -->
    <section class="hero-epic">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>

        <!-- Collage decorativo -->
        <div class="collage-container position-absolute w-100 h-100" style="z-index: 0;">
            <img src="/FINAL/public/img/1.jpg" class="collage-img" style="top: 4%; left: 6%;">
            <img src="/FINAL/public/img/2.jpg" class="collage-img" style="top: 12%; right: 8%;">
            <img src="/FINAL/public/img/3.png" class="collage-img" style="top: 22%; left: 18%;">
            <img src="/FINAL/public/img/4.jpg" class="collage-img" style="top: 30%; right: 20%;">
            <img src="/FINAL/public/img/5.jpg" class="collage-img" style="top: 42%; left: 10%;">
            <img src="/FINAL/public/img/6.jpg" class="collage-img" style="top: 50%; right: 12%;">
            <img src="/FINAL/public/img/1.jpg" class="collage-img" style="top: 60%; left: 25%;">
            <img src="/FINAL/public/img/2.jpg" class="collage-img" style="top: 70%; right: 18%;">
        </div>

        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title">
                        Bienvenido, <?= htmlspecialchars($usuario['nombre']) ?>
                        <br>
                        <span style="font-size: 0.6em; font-weight: 700;">Tu universo literario te espera</span>
                    </h1>
                    <p class="hero-subtitle">
                        Gestiona tus libros, intercambios y conecta con otros lectores.
                        Todo lo que necesitas para vivir la literatura está aquí.
                    </p>
                    <div class="hero-cta">
                        <a href="#accesos-rapidos" class="btn btn-hero-epic">
                            <i class="bi bi-rocket-takeoff me-3"></i>
                            Comenzar ahora
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Accesos Rápidos Épicos -->
    <section class="section-epic" id="accesos-rapidos">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">🚀 Tu Centro de Control</h2>
            <div class="row g-4">

                <!-- Publicar libro en venta -->
                <div class="col-lg-4 col-md-6">
                    <a href="index.php?c=VentaController&a=crearVista" class="text-decoration-none">
                        <div class="card quick-access-card card-epic h-100 scroll-reveal">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-cash-coin fs-1 mb-3 d-block"></i>
                                <h5 class="card-title fw-bold text-purple">Publicar libro </h5>
                                <p class="card-text text-muted">Ofrece libros nuevos o de segunda mano para que otros
                                    usuarios los compren o los intercambien.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Mis publicaciones -->
                <div class="col-lg-4 col-md-6">
                    <a href="index.php?c=VentaController&a=misVentas" class="text-decoration-none">
                        <div class="card quick-access-card card-epic h-100 scroll-reveal">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-journal-text fs-1 mb-3 d-block"></i>
                                <h5 class="card-title fw-bold text-purple">Mis publicaciones</h5>
                                <p class="card-text text-muted">Administra los libros que has puesto en venta en la
                                    plataforma.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Ver carrito -->
                <div class="col-lg-4 col-md-6">
                    <a href="index.php?c=CarritoController&a=ver" class="text-decoration-none">
                        <div class="card quick-access-card card-epic h-100 scroll-reveal">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-cart3 fs-1 mb-3 d-block"></i>
                                <h5 class="card-title fw-bold text-purple">Ver carrito</h5>
                                <p class="card-text text-muted">Consulta los libros que has agregado para comprar o
                                    intercambiar.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Explorar libros -->
                <div class="col-lg-4 col-md-6">
                    <a href="index.php?c=LibroController&a=explorar" class="text-decoration-none">
                        <div class="card quick-access-card card-epic h-100 scroll-reveal">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-search fs-1 mb-3 d-block"></i>
                                <h5 class="card-title fw-bold text-purple">Explorar libros</h5>
                                <p class="card-text text-muted">Descubre títulos nuevos, populares y recomendados por la
                                    comunidad.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Intercambios -->
                <div class="col-lg-4 col-md-6">
                    <a href="index.php?c=IntercambioController&a=misIntercambios" class="text-decoration-none">
                        <div class="card quick-access-card card-epic h-100 scroll-reveal">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-arrow-left-right fs-1 mb-3 d-block"></i>
                                <h5 class="card-title fw-bold text-purple">Mis intercambios</h5>
                                <p class="card-text text-muted">Revisa tus solicitudes, ofertas y el estado de tus
                                    intercambios activos.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Perfil -->
                <div class="col-lg-4 col-md-6">
                    <a href="index.php?c=UsuarioController&a=perfil" class="text-decoration-none">
                        <div class="card quick-access-card card-epic h-100 scroll-reveal">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-person-circle fs-1 mb-3 d-block"></i>
                                <h5 class="card-title fw-bold text-purple">Mi perfil</h5>
                                <p class="card-text text-muted">Edita tu información personal, preferencias y foto de
                                    perfil.</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Recomendaciones y Populares Épicas -->
    <section class="section-epic bg-gradient-light-purple">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">📚 Libros Destacados Para Ti</h2>
            <div class="row g-5">

                <!-- Recomendaciones -->
                <div class="col-lg-6">
                    <div class="card card-epic scroll-reveal">
                        <div class="card-header bg-transparent border-0 text-center">
                            <h3 class="text-purple fw-bold">⭐ Recomendaciones</h3>
                        </div>
                        <div class="card-body">
                            <div id="sliderRecomendaciones" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="5000">
                                <div class="carousel-inner">

                                    <!-- Slide 1 -->
                                    <div class="carousel-item active">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/recomendado1.jpg" class="card-img-top"
                                                        alt="Recomendación 1">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title fw-bold">El Susurro de las Páginas</h6>
                                                        <p class="text-muted small">Drama Contemporáneo</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/recomendado2.jpg" class="card-img-top"
                                                        alt="Recomendación 2">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title fw-bold">Misterios del Corazón</h6>
                                                        <p class="text-muted small">Romance & Misterio</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide 2 -->
                                    <div class="carousel-item">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/recomendado3.jpg" class="card-img-top"
                                                        alt="Recomendación 3">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title fw-bold">Senderos de Sabiduría</h6>
                                                        <p class="text-muted small">Filosofía Moderna</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/recomendado4.jpg" class="card-img-top"
                                                        alt="Recomendación 4">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title fw-bold">Voces del Futuro</h6>
                                                        <p class="text-muted small">Ciencia Ficción</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#sliderRecomendaciones" data-bs-slide="prev">
                                    <i class="bi bi-chevron-left text-primary fs-4"></i>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#sliderRecomendaciones" data-bs-slide="next">
                                    <i class="bi bi-chevron-right text-primary fs-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Populares -->
                <div class="col-lg-6">
                    <div class="card card-epic scroll-reveal">
                        <div class="card-header bg-transparent border-0 text-center">
                            <h3 class="text-purple fw-bold">🔥 Trending 2025</h3>
                        </div>
                        <div class="card-body">
                            <div id="sliderPopulares" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="5000">
                                <div class="carousel-inner">

                                    <!-- Slide 1 -->
                                    <div class="carousel-item active">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/20251.jpg" class="card-img-top"
                                                        alt="Popular 1">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title fw-bold">Revolución Digital</h6>
                                                        <p class="text-muted small">Tech & Sociedad</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/20252.jpg" class="card-img-top"
                                                        alt="Popular 2">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title fw-bold">Nuevos Horizontes</h6>
                                                        <p class="text-muted small">Aventura Moderna</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide 2 -->
                                    <div class="carousel-item">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/20254.jpg" class="card-img-top"
                                                        alt="Popular 3">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title fw-bold">Conexiones Humanas</h6>
                                                        <p class="text-muted small">Psicología Social</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/20253.jpg" class="card-img-top"
                                                        alt="Popular 4">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title fw-bold">Impulso Creativo</h6>
                                                        <p class="text-muted small">Arte & Inspiración</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#sliderPopulares"
                                    data-bs-slide="prev">
                                    <i class="bi bi-chevron-left text-primary fs-4"></i>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#sliderPopulares"
                                    data-bs-slide="next">
                                    <i class="bi bi-chevron-right text-primary fs-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Productos y Ofertas Épicos -->
    <section class="section-epic" id="productos">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">🎁 Catálogo Disponible</h2>
            <div class="overflow-auto pb-3">
                <div class="d-flex flex-nowrap gap-4 px-2" style="scroll-snap-type: x mandatory;">
                    <?php if (!empty($libros)): ?>
                        <?php foreach ($libros as $libro): ?>
                            <div class="card book-card shadow-lg border-0 scroll-reveal"
                                style="min-width: 220px; scroll-snap-align: start;">
                                <img src="public/img/libros/<?= htmlspecialchars($libro['imagen']) ?>"
                                    class="card-img-top mx-auto d-block" alt="<?= htmlspecialchars($libro['titulo']) ?>"
                                    style="height: 280px; width: 180px; object-fit: cover; object-position: center;">
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold"><?= htmlspecialchars($libro['titulo']) ?></h6>
                                    <p class="text-muted small"><?= htmlspecialchars($libro['genero'] ?? '') ?></p>
                                    <p class="text-muted small">Estado: <?= htmlspecialchars($libro['estado'] ?? 'N/A') ?></p>
                                    <a href="index.php?c=DetalleLibroController&a=verDetalle&id=<?= $libro['id'] ?>"
                                        class="btn btn-futuristic btn-sm w-100">
                                        <i class="bi bi-eye me-2"></i>Ver Detalles
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">No hay libros disponibles.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Categorías Épicas -->
    <section class="section-epic" id="categorias" style="background: var(--gradient-dark); color: white;">
        <div class="container">
            <h2 class="section-title-epic text-white scroll-reveal">📚 Universos Literarios</h2>

            <!-- Cubos horizontales -->
            <div class="d-flex flex-column gap-4 align-items-center">

                <!-- Cubo 1 - Fantasía -->
                <div class="cube-card d-flex flex-row align-items-center shadow-lg rounded-4 overflow-hidden card-epic"
                    style="background: white; color: #6a0dad; max-width: 900px;">
                    <img src="/FINAL/public/img/categoria1.jpg" alt="Fantasía" class="img-fluid"
                        style="width: 200px; height: 150px; object-fit: cover;">
                    <div class="p-4 flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="fs-3 me-2">🧙‍♂️</div>
                            <h5 class="fw-bold mb-0">Fantasía & Sci-Fi</h5>
                        </div>
                        <p class="mb-3">Universos épicos, magia ancestral, tecnología futurista y mundos que desafían la
                            realidad conocida.</p>
                        <a href="index.php?c=LibroController&a=explorar&genero=Ciencia Ficción"
                            class="btn btn-futuristic btn-sm">
                            <i class="bi bi-arrow-right me-2"></i>Resolver Misterios
                        </a>
                    </div>
                </div>

                <!-- Cubo 2 - Thriller -->
                <div class="cube-card d-flex flex-row align-items-center shadow-lg rounded-4 overflow-hidden card-epic"
                    style="background: white; color: #6a0dad; max-width: 900px;">
                    <img src="/FINAL/public/img/categoria2.jpg" alt="Thriller" class="img-fluid"
                        style="width: 200px; height: 150px; object-fit: cover;">
                    <div class="p-4 flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="fs-3 me-2">🕵️‍♀️</div>
                            <h5 class="fw-bold mb-0">Thriller & Misterio</h5>
                        </div>
                        <p class="mb-3">Suspenso que acelera el pulso, investigaciones fascinantes y giros que te
                            mantendrán despierto.</p>
                        <a href="index.php?c=LibroController&a=explorar&genero=Thriller"
                            class="btn btn-futuristic btn-sm">
                            <i class="bi bi-arrow-right me-2"></i>Resolver Misterios
                        </a>
                    </div>
                </div>

                <!-- Cubo 3 - Romance -->
                <div class="cube-card d-flex flex-row align-items-center shadow-lg rounded-4 overflow-hidden card-epic"
                    style="background: white; color: #6a0dad; max-width: 900px;">
                    <img src="/FINAL/public/img/categoria3.jpg" alt="Romance" class="img-fluid"
                        style="width: 200px; height: 150px; object-fit: cover;">
                    <div class="p-4 flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="fs-3 me-2">💖</div>
                            <h5 class="fw-bold mb-0">Romance</h5>
                        </div>
                        <p class="mb-3">Historias de amor que trascienden el tiempo, emociones intensas y conexiones que
                            transforman vidas.</p>
                        <a href="index.php?c=LibroController&a=explorar&genero=Romance"
                            class="btn btn-futuristic btn-sm">
                            <i class="bi bi-arrow-right me-2"></i>Vivir el Amor
                        </a>
                    </div>
                </div>

                <!-- Cubo 4 - Clásicos -->
                <div class="cube-card d-flex flex-row align-items-center shadow-lg rounded-4 overflow-hidden card-epic"
                    style="background: white; color: #6a0dad; max-width: 900px;">
                    <img src="/FINAL/public/img/categoria4.jpg" alt="Clásicos" class="img-fluid"
                        style="width: 200px; height: 150px; object-fit: cover;">
                    <div class="p-4 flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="fs-3 me-2">📜</div>
                            <h5 class="fw-bold mb-0">Literatura Clásica</h5>
                        </div>
                        <p class="mb-3">Obras inmortales que definieron épocas, sabiduría atemporal que sigue inspirando
                            generaciones.</p>
                        <a href="index.php?c=LibroController&a=explorar&genero=Clásicos"
                            class="btn btn-futuristic btn-sm">
                            <i class="bi bi-arrow-right me-2"></i>Descubrir Clásicos
                        </a>
                    </div>
                </div>

                <!-- Nuevo botón para ver todos los géneros -->
                <div class="text-center mt-4">
                    <a href="index.php?c=GenerosController&a=index" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-grid-3x3-gap me-2"></i>Ver Todos los Géneros
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- Nuestra Selección Épica -->
    <section class="section-epic bg-gradient-light-purple" id="seleccion">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">🌟 Colección Exclusiva</h2>
            <div class="overflow-auto pb-3">
                <div class="d-flex flex-nowrap gap-4 px-2" style="scroll-snap-type: x mandatory;">
                    <?php if (!empty($libros)): ?>
                        <?php foreach ($libros as $libro): ?>
                            <div class="card book-card shadow-lg border-0 scroll-reveal"
                                style="min-width: 200px; scroll-snap-align: start;">
                                <img src="public/img/libros/<?= htmlspecialchars($libro['imagen']) ?>"
                                    class="card-img-top mx-auto d-block" alt="<?= htmlspecialchars($libro['titulo']) ?>"
                                    style="height: 220px; width: 150px; object-fit: cover; object-position: center;">
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold"><?= htmlspecialchars($libro['titulo']) ?></h6>
                                    <p class="text-muted small mb-1">Autor: <?= htmlspecialchars($libro['autor'] ?? '') ?></p>
                                    <p class="text-muted small mb-1">Género: <?= htmlspecialchars($libro['genero'] ?? '') ?></p>
                                    <div class="d-grid gap-2">
                                        <a href="index.php?c=IntercambioController&a=solicitar&id=<?= $libro['id'] ?>"
                                            class="btn btn-futuristic btn-sm">Intercambiar</a>
                                        <a href="index.php?c=DetalleLibroController&a=verDetalle&id=<?= $libro['id'] ?>"
                                            class="btn"
                                            style="background: rgba(106, 17, 203, 0.1); color: var(--purple); border: 1px solid var(--purple);">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">No hay libros disponibles.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Actividad Reciente Épica -->
    <section class="section-epic">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">⚡ Actividad Reciente</h2>
            <div class="row g-4">
                <?php
                // Unificar y ordenar actividades recientes
                $actividades = [];
                if (!empty($libros_recientes)) {
                    foreach ($libros_recientes as $libro) {
                        $actividades[] = [
                            'tipo' => 'libro',
                            'titulo' => $libro['titulo'],
                            'usuario' => $libro['nombre_usuario'] ?? $libro['nombre'] ?? '',
                            'fecha' => $libro['fecha_subida'] ?? $libro['fecha'] ?? '',
                        ];
                    }
                }
                if (!empty($intercambios_recientes)) {
                    foreach ($intercambios_recientes as $inter) {
                        $actividades[] = [
                            'tipo' => 'intercambio',
                            'titulo' => $inter['libro_ofrecido'] . ' ↔ ' . $inter['libro_solicitado'],
                            'usuario' => $inter['nombre_ofrece'] . ' y ' . $inter['nombre_recibe'],
                            'fecha' => $inter['fecha'] ?? '',
                        ];
                    }
                }
                if (!empty($compras_recientes)) {
                    foreach ($compras_recientes as $compra) {
                        $actividades[] = [
                            'tipo' => 'compra',
                            'titulo' => $compra['libros_comprados'] ?? 'Compra realizada',  // Campo correcto
                            'usuario' => $compra['nombre_usuario'] ?? 'Usuario',             // Campo correcto
                            'fecha' => $compra['fecha_compra'] ?? '',                        // Campo correcto
                        ];
                    }
                }
                // Ordenar por fecha descendente
                if (!empty($actividades)) {
                    usort($actividades, function ($a, $b) {
                        return strtotime($b['fecha']) - strtotime($a['fecha']);
                    });
                    $actividades = array_slice($actividades, 0, 6);
                }
                ?>

                <?php if (!empty($actividades)): ?>
                    <?php foreach ($actividades as $actividad): ?>
                        <div class="col-md-6">
                            <div class="card card-epic h-100 scroll-reveal">
                                <div class="card-body">
                                    <?php if ($actividad['tipo'] === 'libro'): ?>
                                        <h5 class="card-title text-purple fw-bold">📚 Libro subido</h5>
                                        <p class="card-text">"<?= htmlspecialchars($actividad['titulo']) ?>" por
                                            <?= htmlspecialchars($actividad['usuario']) ?>
                                        </p>
                                    <?php elseif ($actividad['tipo'] === 'intercambio'): ?>
                                        <h5 class="card-title text-purple fw-bold">🔄️ Intercambio realizado</h5>
                                        <p class="card-text">Entre <?= htmlspecialchars($actividad['usuario']) ?>: <br><span
                                                class="fw-bold"><?= htmlspecialchars($actividad['titulo']) ?></span></p>
                                    <?php elseif ($actividad['tipo'] === 'compra'): ?>
                                        <h5 class="card-title text-purple fw-bold">🛒 Compra realizada</h5>
                                        <p class="card-text">"<?= htmlspecialchars($actividad['titulo']) ?>" por
                                            <?= htmlspecialchars($actividad['usuario']) ?>
                                        </p>
                                    <?php endif; ?>
                                    <small
                                        class="text-muted"><?= htmlspecialchars(fecha_relativa($actividad['fecha'])) ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="card card-epic scroll-reveal">
                            <div class="card-body text-center">
                                <h5 class="text-purple fw-bold">🌟 ¡Comienza tu aventura!</h5>
                                <p class="text-muted">Aún no hay actividad reciente. Explora libros, haz intercambios y
                                    conecta con otros lectores.</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Lanzamiento Exclusivo Épico -->
    <section class="section-epic bg-gradient-light-purple" id="lanzamientos">
        <div class="container">
            <div class="card card-epic scroll-reveal">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-6">
                        <img src="/FINAL/public/img/6.jpg" class="img-fluid rounded-start" alt="Lanzamiento Exclusivo"
                            style="height: 400px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body p-5">
                            <div class="badge bg-warning text-dark mb-3 px-4 py-2 fs-6">
                                <i class="bi bi-star-fill me-2"></i>LANZAMIENTO EXCLUSIVO
                            </div>
                            <h1 class="display-6 fw-bold mb-4 text-purple">La joya literaria del año</h1>
                            <p class="lead text-muted mb-4">Una memoria cruda y poética sobre viajes, identidad y los
                                encuentros que nos marcan para siempre.</p>
                            <p class="text-muted mb-4">Desde un hostel en Marruecos, Alina K. documenta 3 años de viajes
                                en cuadernos manchados de té y polvo del desierto.</p>
                            <div class="d-flex gap-3">
                                <a href="#" class="btn btn-futuristic btn-lg">
                                    <i class="bi bi-rocket-takeoff me-2"></i>Pre-ordenar ahora
                                </a>
                                <a href="#" class="btn"
                                    style="background: rgba(106, 17, 203, 0.1); color: var(--purple); border: 1px solid var(--purple); padding: 12px 30px; border-radius: 50px;">
                                    <i class="bi bi-play-circle me-2"></i>Vista previa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mis últimas reseñas -->
    <section class="section-epic">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">📝 Mis Últimas Reseñas</h2>
            <div class="row g-4">
                <?php if (!empty($mis_reseñas)): ?>
                    <?php foreach ($mis_reseñas as $r): ?>
                        <div class="col-md-6">
                            <div class="card card-epic h-100 scroll-reveal">
                                <div class="card-body">
                                    <h5 class="fw-bold text-purple"><?= htmlspecialchars($r['titulo_libro']) ?></h5>
                                    <div class="mb-2">
                                        <span
                                            class="text-warning fs-5"><?= str_repeat('★', $r['calificacion']) ?><?= str_repeat('☆', 5 - $r['calificacion']) ?></span>
                                    </div>
                                    <p class="card-text"><?= nl2br(htmlspecialchars($r['comentario'])) ?></p>
                                    <small class="text-muted"><?= date("d M Y", strtotime($r['fecha'])) ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="card card-epic scroll-reveal">
                            <div class="card-body text-center">
                                <h5 class="text-purple fw-bold">📖 Comparte tu opinión</h5>
                                <p class="text-muted">Aún no has dejado reseñas. Compra un libro y comparte tu experiencia
                                    con otros lectores.</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Autores Colombianos Épicos -->
    <section class="section-epic" style="background: var(--gradient-dark); color: white;">
        <div class="container">
            <h2 class="section-title-epic text-white scroll-reveal">🇨🇴 Autores Colombianos</h2>

            <div class="row g-4">
                <!-- García Márquez -->
                <div class="col-lg-4">
                    <div class="card card-epic h-100 scroll-reveal"
                        style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); color: white;">
                        <img src="/FINAL/public/img/top1.png" class="card-img-top" alt="García Márquez"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h4 class="fw-bold text-white">Gabriel García Márquez</h4>
                            <ul class="list-unstyled text-light">
                                <li>🌪️ <strong>Cien años de soledad</strong></li>
                                <li>💔 <strong>El amor en los tiempos del cólera</strong></li>
                                <li>🕊️ <strong>Crónica de una muerte anunciada</strong></li>
                            </ul>
                            <p class="mt-3 text-light small">📰 Última novedad: reedición ilustrada de <em>El coronel no
                                    tiene quien le escriba</em></p>
                        </div>
                    </div>
                </div>

                <!-- Laura Restrepo -->
                <div class="col-lg-4">
                    <div class="card card-epic h-100 scroll-reveal"
                        style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); color: white;">
                        <img src="/FINAL/public/img/top2.png" class="card-img-top" alt="Laura Restrepo"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h4 class="fw-bold text-white">Laura Restrepo</h4>
                            <ul class="list-unstyled text-light">
                                <li>🧠 <strong>Delirio</strong></li>
                                <li>🕊️ <strong>La multitud errante</strong></li>
                                <li>🌎 <strong>Hot Sur</strong></li>
                            </ul>
                            <p class="mt-3 text-light small">📰 Última novedad: charla en la FIL Bogotá sobre literatura
                                y resistencia</p>
                        </div>
                    </div>
                </div>

                <!-- William Ospina -->
                <div class="col-lg-4">
                    <div class="card card-epic h-100 scroll-reveal"
                        style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); color: white;">
                        <img src="/FINAL/public/img/top3.png" class="card-img-top" alt="William Ospina"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h4 class="fw-bold text-white">William Ospina</h4>
                            <ul class="list-unstyled text-light">
                                <li>🔥 <strong>Ursúa</strong></li>
                                <li>🌿 <strong>El país de la canela</strong></li>
                                <li>🧭 <strong>La serpiente sin ojos</strong></li>
                            </ul>
                            <p class="mt-3 text-light small">📰 Última novedad: ensayo sobre Colombia postconflicto en
                                <em>El Espectador</em>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sección de Contacto -->
    <section class="py-5" style="background: linear-gradient(135deg, #f8f4ff 0%, #e8d5ff 100%); margin-top: 100px;"
        id="contacto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card"
                        style="border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h2 class="fw-bold mb-3" style="color: #6a11cb;">📞 Contáctanos</h2>
                                <p class="text-muted">¿Tienes preguntas, sugerencias o necesitas ayuda? Estamos aquí
                                    para ti</p>
                            </div>

                            <form method="POST" action="procesar_contacto.php">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label fw-semibold">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required
                                            style="border-radius: 10px; border: 2px solid #e9ecef;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required
                                            style="border-radius: 10px; border: 2px solid #e9ecef;">
                                    </div>
                                    <div class="col-12">
                                        <label for="asunto" class="form-label fw-semibold">Asunto</label>
                                        <select class="form-select" id="asunto" name="asunto" required
                                            style="border-radius: 10px; border: 2px solid #e9ecef;">
                                            <option value="">Selecciona un asunto</option>
                                            <option value="soporte">Soporte Técnico</option>
                                            <option value="sugerencia">Sugerencia</option>
                                            <option value="problema">Reportar Problema</option>
                                            <option value="cuenta">Problemas con mi cuenta</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="mensaje" class="form-label fw-semibold">Mensaje</label>
                                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required
                                            placeholder="Cuéntanos en qué podemos ayudarte..."
                                            style="border-radius: 10px; border: 2px solid #e9ecef;"></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-lg px-5"
                                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                                                       border: none; color: white; border-radius: 25px; font-weight: 600;">
                                            Enviar Mensaje
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Sobre Nosotros -->
    <section
        style="background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%); color: white; padding: 100px 0; margin-top: 100px;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">🌟 Sobre LibrosWap</h2>
                <p class="lead">Transformando la experiencia de lectura desde 2025</p>
            </div>

            <div class="row g-5">
                <!-- Información Principal -->
                <div class="col-lg-6">
                    <div
                        style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); border-radius: 20px; padding: 30px;">
                        <h4 class="fw-bold mb-3">📚 Nuestra Misión</h4>
                        <p class="mb-4">LibrosWap es un ecosistema digital que transforma la forma en que las personas
                            acceden a libros. A través de un sistema intuitivo de transacciones e intercambios, buscamos
                            crear una comunidad activa de lectores que comparten tanto libros como experiencias
                            literarias.</p>

                        <h5 class="fw-bold mb-3">🎯 Nuestros Objetivos</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">📖</div>
                                    <span>Fomentar la lectura mediante acceso fácil y económico a libros</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">🔄</div>
                                    <span>Facilitar intercambios equitativos entre usuarios</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">🌐</div>
                                    <span>Crear una comunidad global de lectores conectados</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">💬</div>
                                    <span>Promover la interacción mediante reseñas, foros y grupos de lectura</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Características y Equipo -->
                <div class="col-lg-6">
                    <div
                        style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); border-radius: 20px; padding: 30px;">
                        <h4 class="fw-bold mb-3">🚀 Características Principales</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">🛒</div>
                                    <span>Marketplace: Compra y venta de libros nuevos y usados</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">🔁</div>
                                    <span>Sistema de Intercambio: Algoritmo para intercambios justos</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">📚</div>
                                    <span>Biblioteca Virtual: Catálogo personal de libros</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">👥</div>
                                    <span>Comunidad: Reseñas, foros y grupos de lectura</span>
                                </div>
                            </div>
                        </div>

                        <h5 class="fw-bold mb-3">👥 Nuestro Equipo de Desarrolladores</h5>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="text-center p-2"
                                    style="background: rgba(255,255,255,0.1); border-radius: 10px;">
                                    <strong>Jair Santiago Guerra</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-2"
                                    style="background: rgba(255,255,255,0.1); border-radius: 10px;">
                                    <strong>Cristhian Giovanny Salgado</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-2"
                                    style="background: rgba(255,255,255,0.1); border-radius: 10px;">
                                    <strong>Ana Elizabeth Carreño</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-2"
                                    style="background: rgba(255,255,255,0.1); border-radius: 10px;">
                                    <strong>Ángel David Vanegas</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tecnologías -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="text-center"
                        style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); border-radius: 20px; padding: 30px;">
                        <h4 class="fw-bold mb-4">🛠️ Tecnologías Utilizadas</h4>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="p-3" style="background: rgba(255,255,255,0.1); border-radius: 10px;">
                                    <strong>Frontend</strong><br>
                                    <small>HTML5, CSS3, JavaScript</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3" style="background: rgba(255,255,255,0.1); border-radius: 10px;">
                                    <strong>Backend</strong><br>
                                    <small>PHP</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3" style="background: rgba(255,255,255,0.1); border-radius: 10px;">
                                    <strong>Base de datos</strong><br>
                                    <small>MySQL</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3" style="background: rgba(255,255,255,0.1); border-radius: 10px;">
                                    <strong>Arquitectura</strong><br>
                                    <small>MVC</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Épico Mejorado -->
    <footer
        style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); color: white; padding: 60px 0 30px; margin-top: 0;">
        <div class="container">
            <div class="row g-5">

                <!-- Información Principal -->
                <div class="col-lg-4">
                    <div class="mb-4">
                        <img src="public/img/logow.png" alt="LibrosWap" style="height: 60px;" class="mb-3">
                        <h4 class="fw-bold">LibrosWap</h4>
                        <p class="mb-3">Plataforma web para comprar, vender e intercambiar libros entre usuarios.
                            Fomentamos la lectura, conectamos personas y promovemos el conocimiento compartido.</p>
                    </div>

                    <!-- Redes Sociales -->
                    <div>
                        <h6 class="fw-bold mb-3">Síguenos</h6>
                        <div class="d-flex gap-3">
                            <a href="#" class="text-white" style="font-size: 1.5rem; transition: color 0.3s;">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="text-white" style="font-size: 1.5rem; transition: color 0.3s;">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="text-white" style="font-size: 1.5rem; transition: color 0.3s;">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="text-white" style="font-size: 1.5rem; transition: color 0.3s;">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Enlaces Útiles -->
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3">Enlaces Útiles</h6>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="index.php?c=UsuarioController&a=perfil"
                                        class="text-white text-decoration-none">Mi Perfil</a>
                                </li>
                                <li class="mb-2">
                                    <a href="index.php?c=CarritoController&a=ver"
                                        class="text-white text-decoration-none">Mi Carrito</a>
                                </li>
                                <li class="mb-2">
                                    <a href="index.php?c=IntercambioController&a=misIntercambios"
                                        class="text-white text-decoration-none">Intercambios</a>
                                </li>
                                <li class="mb-2">
                                    <a href="index.php?c=MensajeController&a=mensajes"
                                        class="text-white text-decoration-none">Mensajes</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="index.php?c=EventoController&a=index"
                                        class="text-white text-decoration-none">Foros</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#contacto" class="text-white text-decoration-none">Contacto</a>
                                </li>
                                <li class="mb-2">
                                    <a href="politicas/privacidad.pdf" target="_blank"
                                        class="text-white text-decoration-none">Privacidad</a>
                                </li>
                                <li class="mb-2">
                                    <a href="politicas/terminos.pdf" target="_blank"
                                        class="text-white text-decoration-none">Términos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contacto -->
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3">Contacto</h6>
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-envelope me-2"></i>
                            <a href="mailto:libroswapgroup@gmail.com" class="text-white text-decoration-none">
                                libroswapgroup@gmail.com
                            </a>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt me-2"></i>
                            <span>Colombia</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-clock me-2"></i>
                            <span>Soporte 24/7</span>
                        </div>
                    </div>

                    <div style="background: rgba(255,255,255,0.1); border-radius: 10px; padding: 15px;">
                        <h6 class="fw-bold mb-2">¿Necesitas ayuda?</h6>
                        <p class="small mb-0">Nuestro equipo está listo para ayudarte con cualquier pregunta o problema
                            que tengas.</p>
                    </div>
                </div>
            </div>

            <!-- Separador -->
            <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">

            <!-- Footer Bottom -->
            <div class="row align-items-center">
                <div class="col-md-8">
                    <p class="mb-0">© 2025 LibrosWap. Todos los derechos reservados. | Diseñado con 💜 por el equipo
                        LibrosWap</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="d-flex justify-content-md-end gap-3">
                        <a href="politicas/privacidad.pdf" target="_blank"
                            class="text-white text-decoration-none small">Privacidad</a>
                        <a href="politicas/terminos.pdf" target="_blank"
                            class="text-white text-decoration-none small">Términos</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animaciones de scroll reveal
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, observerOptions);

        // Observar todos los elementos con la clase scroll-reveal
        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });

        // Efecto de paralaje suave en el hero
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const background = document.querySelector('.hero-background');
            if (background) {
                const rate = scrolled * -0.2;
                background.style.transform = `translateY(${rate}px)`;
            }
        });

        // Smooth scrolling para links internos
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

        // Efectos adicionales para mejorar la experiencia
        document.addEventListener('DOMContentLoaded', function () {
            // Animar cards al hacer hover
            const cards = document.querySelectorAll('.card-epic, .quick-access-card, .book-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-5px) scale(1.02)';
                });

                card.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
</body>

</html>
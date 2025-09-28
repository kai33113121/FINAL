<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LibrosWap - Bienvenido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="public/css/landing.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-futuristic sticky-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="">
                <img src="public/img/logow.png" alt="Logo" class="me-3">
                <span>LibrosWap</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list text-white fs-3"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#productos">Catálogo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#categorias">Géneros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#seleccion">Intercambios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#comunidad">Comunidad</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                </ul>
            </div>
            <div class="d-flex gap-3">
                <a class="btn btn-outline-futuristic" href="index.php?c=UsuarioController&a=login">Ingresar</a>
                <a class="btn btn-futuristic" href="index.php?c=UsuarioController&a=register">Crear cuenta</a>
            </div>
        </div>
    </nav>
    <section class="hero-epic" id="inicio">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">
                        LibrosWap
                        <br>
                        <span style="font-size: 0.6em; font-weight: 700;">El futuro de la lectura</span>
                    </h1>
                    <p class="hero-subtitle">
                        Explora, intercambia y colecciona obras extraordinarias en una plataforma pensada para lectores exigentes. Publica tus libros, gestiona intercambios y accede a un catálogo diverso con herramientas seguras y fáciles de usar. LibrosWap transforma la lectura en una experiencia colaborativa, dinámica y personalizada.
                    </p>
                    <div class="hero-cta">
                        <a href="index.php?c=UsuarioController&a=register" class="btn btn-hero-epic">
                            <i class="bi bi-rocket-takeoff me-3"></i>
                            Explorar ahora
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="books-carousel-epic">
                        <div class="carousel-container-epic">
                            <div class="book-slide-epic active">
                                <img src="public/img/libros/case1.jpg" alt="Stephen King" class="book-image-epic">
                                <div class="book-info-epic">
                                    <div class="book-title-epic">Los libros despiertan tu proceso creativo</div>
                                    <div class="book-category-epic">Descúbrelos en Libros WAP</div>
                                </div>
                            </div>
                            <div class="book-slide-epic next">
                                <img src="public/img/libros/case2.jpg" alt="Orgullo y Prejuicio"
                                    class="book-image-epic">
                                <div class="book-info-epic">
                                    <div class="book-title-epic">Encuentra tu rincón perfecto de lectura</div>
                                    <div class="book-category-epic"> Libros WAP te acompaña</div>
                                </div>
                            </div>
                            <div class="book-slide-epic hidden">
                                <img src="public/img/libros/case3.jpg" alt="Fantasía" class="book-image-epic">
                                <div class="book-info-epic">
                                    <div class="book-title-epic">Tu momento de lectura ideal te espera</div>
                                    <div class="book-category-epic">Evocar comodidad y compañía en la lectura</div>
                                </div>
                            </div>
                            <div class="book-slide-epic hidden">
                                <img src="public/img/libros/case4.jpg" alt="Recomendado" class="book-image-epic">
                                <div class="book-info-epic">
                                    <div class="book-title-epic">Construye tu biblioteca de sueños. Compra e intercambia en Libros WAP</div>
                                    <div class="book-category-epic">Editor's Choice</div>
                                </div>
                            </div>
                            <div class="book-slide-epic hidden">
                                <img src="public/img/libros/art.jpg" alt="Popular 2025" class="book-image-epic">
                                <div class="book-info-epic">
                                    <div class="book-title-epic">Los libros que marcarán tendencia en 2025</div>
                                    <div class="book-category-epic">Lo Más Viral</div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-controls-epic carousel-prev-epic" onclick="previousSlideEpic()">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="carousel-controls-epic carousel-next-epic" onclick="nextSlideEpic()">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                        <div class="carousel-indicators-epic">
                            <span class="indicator-epic active" onclick="currentSlideEpic(0)"></span>
                            <span class="indicator-epic" onclick="currentSlideEpic(1)"></span>
                            <span class="indicator-epic" onclick="currentSlideEpic(2)"></span>
                            <span class="indicator-epic" onclick="currentSlideEpic(3)"></span>
                            <span class="indicator-epic" onclick="currentSlideEpic(4)"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-epic">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="recommendation-epic scroll-reveal">
                        <h3 class="carousel-title-epic">⭐ Staff Picks</h3>
                        <div id="sliderRecomendaciones" class="carousel slide" data-bs-ride="carousel"
                            data-bs-interval="5000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/recomendado1.jpg" class="card-img-top"
                                                    alt="Recomendación 1">
                                                <div class="card-body text-center">
                                                    <h6 class="card-title fw-bold">El Susurro de las Páginas</h6>
                                                    <p class="text-muted small">Drama Contemporáneo</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/recomendado2.jpg" class="card-img-top"
                                                    alt="Recomendación 2">
                                                <div class="card-body text-center">
                                                    <h6 class="card-title fw-bold">Misterios del Corazón</h6>
                                                    <p class="text-muted small">Romance & Misterio</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/recomendado3.jpg" class="card-img-top"
                                                    alt="Recomendación 3">
                                                <div class="card-body text-center">
                                                    <h6 class="card-title fw-bold">Senderos de Sabiduría</h6>
                                                    <p class="text-muted small">Filosofía Moderna</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/recomendado4.jpg" class="card-img-top"
                                                    alt="Recomendación 4">
                                                <div class="card-body text-center">
                                                    <h6 class="card-title fw-bold">Voces del Futuro</h6>
                                                    <p class="text-muted small">Ciencia Ficción</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/recomendado5.jpg" class="card-img-top"
                                                    alt="Recomendación 5">
                                                <div class="card-body text-center">
                                                    <h6 class="card-title fw-bold">Crónicas Perdidas</h6>
                                                    <p class="text-muted small">Historia Épica</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/recomendado6.jpg" class="card-img-top"
                                                    alt="Recomendación 6">
                                                <div class="card-body text-center">
                                                    <h6 class="card-title fw-bold">El Arte de Vivir</h6>
                                                    <p class="text-muted small">Desarrollo Personal</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#sliderRecomendaciones"
                                data-bs-slide="prev">
                                <i class="bi bi-chevron-left text-primary fs-4"></i>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#sliderRecomendaciones"
                                data-bs-slide="next">
                                <i class="bi bi-chevron-right text-primary fs-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="recommendation-epic scroll-reveal">
                        <h3 class="carousel-title-epic">🔥 Trending 2025</h3>
                        <div id="sliderPopulares" class="carousel slide" data-bs-ride="carousel"
                            data-bs-interval="5000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/20251.jpg" class="card-img-top"
                                                    alt="Popular 1">
                                                <div class="card-body text-center">
                                                    <h6 class="card-title fw-bold">Revolución Digital</h6>
                                                    <p class="text-muted small">Tech & Sociedad</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/20252.jpg" class="card-img-top"
                                                    alt="Popular 2">
                                                <div class="card-body text-center">
                                                    <h6 class="card-title fw-bold">Nuevos Horizontes</h6>
                                                    <p class="text-muted small">Aventura Moderna</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/20254.jpg" class="card-img-top"
                                                    alt="Popular 3">
                                                <div class="card-body text-center">
                                                    <h6 class="card-title fw-bold">Conexiones Humanas</h6>
                                                    <p class="text-muted small">Psicología Social</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card card-epic h-100">
                                                <img src="public/img/20253.jpg" class="card-img-top"
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
    </section>
    <section class="section-epic products-epic" id="productos">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">🛍️ Catálogo Premium</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card-epic card-epic h-100 scroll-reveal">
                        <img src="public/img/oferta1.jpg" class="card-img-top" alt="Harry Potter">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Harry Potter</h5>
                            <span class="category-badge mb-2 d-inline-block">Fantasía</span>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-badge">$25.99</span>
                                <span class="badge bg-warning text-dark">Bestseller</span>
                            </div>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic w-100">
                                <i class="bi bi-eye me-2"></i>Explorar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card-epic card-epic h-100 scroll-reveal">
                        <img src="public/img/oferta2.jpg" class="card-img-top" alt="Atomic Habits">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Atomic Habits</h5>
                            <span class="category-badge mb-2 d-inline-block">Autoayuda</span>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-badge">$19.99</span>
                                <span class="badge bg-info text-white">Popular</span>
                            </div>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic w-100">
                                <i class="bi bi-eye me-2"></i>Explorar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card-epic card-epic h-100 scroll-reveal">
                        <img src="public/img/oferta4.jpg" class="card-img-top" alt="El Alquimista">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">El Alquimista</h5>
                            <span class="category-badge mb-2 d-inline-block">Inspiracional</span>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-badge">$22.50</span>
                                <span class="badge bg-success text-white">Oferta</span>
                            </div>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic w-100">
                                <i class="bi bi-eye me-2"></i>Explorar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card-epic card-epic h-100 scroll-reveal">
                        <img src="public/img/oferta5.jpg" class="card-img-top" alt="Los Juegos del Hambre">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Los Juegos del Hambre</h5>
                            <span class="category-badge mb-2 d-inline-block">Distopía</span>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-badge">$18.75</span>
                                <span class="badge bg-danger text-white">Nuevo</span>
                            </div>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic w-100">
                                <i class="bi bi-eye me-2"></i>Explorar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card-epic card-epic h-100 scroll-reveal">
                        <img src="public/img/oferta6.jpg" class="card-img-top" alt="Dune">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Dune</h5>
                            <span class="category-badge mb-2 d-inline-block">Sci-Fi</span>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-badge">$29.99</span>
                                <span class="badge bg-primary text-white">Clásico</span>
                            </div>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic w-100">
                                <i class="bi bi-eye me-2"></i>Explorar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card-epic card-epic h-100 scroll-reveal">
                        <img src="public/img/libros/oferta7.jpg" class="card-img-top" alt="El Código Da Vinci">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">El Código Da Vinci</h5>
                            <span class="category-badge mb-2 d-inline-block">Thriller</span>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-badge">$24.99</span>
                                <span class="badge bg-warning text-dark">Trending</span>
                            </div>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic w-100">
                                <i class="bi bi-eye me-2"></i>Explorar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card-epic card-epic h-100 scroll-reveal">
                        <img src="public/img/4.jpg" class="card-img-top" alt="The many lives of cats">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">The Many Lives of Cats</h5>
                            <span class="category-badge mb-2 d-inline-block">Aventura</span>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-badge">$16.50</span>
                                <span class="badge bg-info text-white">Juvenil</span>
                            </div>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic w-100">
                                <i class="bi bi-eye me-2"></i>Explorar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card-epic card-epic h-100 scroll-reveal">
                        <img src="public/img/4.jpg" class="card-img-top" alt="Título especial">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Universos Paralelos</h5>
                            <span class="category-badge mb-2 d-inline-block">Ciencia</span>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-badge">$31.99</span>
                                <span class="badge bg-secondary text-white">Exclusivo</span>
                            </div>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic w-100">
                                <i class="bi bi-eye me-2"></i>Explorar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-epic categories-epic" id="categorias">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">📚 Universos Literarios</h2>
            <div class="row g-5 justify-content-center">
                <div class="col-lg-6 col-xl-3">
                    <div class="card genre-card-epic h-100 scroll-reveal">
                        <img src="public/img/categoria1.jpg" class="card-img-top"
                            alt="Fantasía y Ciencia Ficción">
                        <div class="card-body text-center">
                            <div class="icon-epic mb-3">🧙‍♂️</div>
                            <h5 class="card-title">Fantasía & Sci-Fi</h5>
                            <p class="card-text">Universos épicos, magia ancestral, tecnología futurista y mundos que
                                desafían la realidad conocida.</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn">
                                <i class="bi bi-arrow-right me-2"></i>Explorar Mundos
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="card genre-card-epic h-100 scroll-reveal">
                        <img src="public/img/categoria2.jpg" class="card-img-top" alt="Thriller y Misterio">
                        <div class="card-body text-center">
                            <div class="icon-epic mb-3">🕵️‍♀️</div>
                            <h5 class="card-title">Thriller & Misterio</h5>
                            <p class="card-text">Suspenso que acelera el pulso, investigaciones fascinantes y giros que
                                te mantendrán despierto.</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn">
                                <i class="bi bi-arrow-right me-2"></i>Resolver Misterios
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="card genre-card-epic h-100 scroll-reveal">
                        <img src="public/img/categoria3.jpg" class="card-img-top" alt="Romance">
                        <div class="card-body text-center">
                            <div class="icon-epic mb-3">💖</div>
                            <h5 class="card-title">Romance</h5>
                            <p class="card-text">Historias de amor que trascienden el tiempo, emociones intensas y
                                conexiones que transforman vidas.</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn">
                                <i class="bi bi-arrow-right me-2"></i>Vivir el Amor
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="card genre-card-epic h-100 scroll-reveal">
                        <img src="public/img/categoria4.jpg" class="card-img-top" alt="Literatura Clásica">
                        <div class="card-body text-center">
                            <div class="icon-epic mb-3">📜</div>
                            <h5 class="card-title">Literatura Clásica</h5>
                            <p class="card-text">Obras inmortales que definieron épocas, sabiduría atemporal que sigue
                                inspirando generaciones.</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn">
                                <i class="bi bi-arrow-right me-2"></i>Descubrir Clásicos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-epic">
        <div class="container">
            <div class="exclusive-epic scroll-reveal">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <img src="public/img/6.jpg" class="img-fluid rounded-4 shadow-lg"
                            alt="Lanzamiento Exclusivo">
                    </div>
                    <div class="col-lg-6">
                        <div class="badge bg-warning text-dark mb-3 px-4 py-2 fs-6">
                            <i class="bi bi-star-fill me-2"></i>LANZAMIENTO EXCLUSIVO
                        </div>
                        <h1 class="display-5 fw-bold mb-4"
                            style="background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                            LA REVOLUCIÓN LITERARIA DEL AÑO</h1>
                        <h2 class="h4 text-secondary mb-4">Una experiencia inmersiva que redefine el concepto de lectura
                            y conexión humana</h2>
                        <p class="lead text-muted mb-4">En los confines digitales de un mundo hiperconectado, una nueva
                            forma de literatura emerge. Esta es la crónica de una generación que documentó sus
                            experiencias en fragmentos de código y realidad virtual. Un libro que deconstruye la
                            narrativa tradicional y reconstruye el futuro de contar historias.</p>
                        <div class="d-flex gap-3">
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic btn-lg">
                                <i class="bi bi-rocket-takeoff me-2"></i>Pre-ordenar ahora
                            </a>
                            <a href="#" class="btn btn-outline-futuristic btn-lg">
                                <i class="bi bi-play-circle me-2"></i>Vista previa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-epic" id="seleccion">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">🌟 Colección Exclusiva</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card card-epic h-100 scroll-reveal">
                        <img src="public/img/intercambia1.jpg" class="card-img-top" alt="El Principito">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">El Principito</h5>
                            <p class="text-muted mb-3">Edición Pop-Up Limitada</p>
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <span class="badge bg-success">Disponible</span>
                                <span class="badge bg-info">Edición Especial</span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic">
                                    <i class="bi bi-arrow-left-right me-2"></i>Intercambiar
                                </a>
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-futuristic">
                                    <i class="bi bi-cart me-2"></i>Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-epic h-100 scroll-reveal">
                        <img src="public/img/intercambia2.jpg" class="card-img-top" alt="Alice's Adventures">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Alice's Adventures in Wonderland</h5>
                            <p class="text-muted mb-3">Edición Taschen de Lujo</p>
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <span class="badge bg-warning text-dark">Premium</span>
                                <span class="badge bg-danger">Limitado</span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic">
                                    <i class="bi bi-arrow-left-right me-2"></i>Intercambiar
                                </a>
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-futuristic">
                                    <i class="bi bi-cart me-2"></i>Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-epic h-100 scroll-reveal">
                        <img src="public/img/intercambia3.jpg" class="card-img-top" alt="The Raven">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">The Raven</h5>
                            <p class="text-muted mb-3">Ilustrada por Édouard Manet</p>
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <span class="badge bg-dark text-white">Clásico</span>
                                <span class="badge bg-secondary">Arte</span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic">
                                    <i class="bi bi-arrow-left-right me-2"></i>Intercambiar
                                </a>
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-futuristic">
                                    <i class="bi bi-cart me-2"></i>Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-epic h-100 scroll-reveal">
                        <img src="public/img/intercambia4.jpg" class="card-img-top" alt="Moby Dick">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Moby Dick</h5>
                            <p class="text-muted mb-3">Edición Rockwell Kent</p>
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <span class="badge bg-primary">Aventura</span>
                                <span class="badge bg-success">Disponible</span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic">
                                    <i class="bi bi-arrow-left-right me-2"></i>Intercambiar
                                </a>
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-futuristic">
                                    <i class="bi bi-cart me-2"></i>Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-epic h-100 scroll-reveal">
                        <img src="public/img/intercambia5.jpg" class="card-img-top" alt="The Hobbit">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">The Hobbit</h5>
                            <p class="text-muted mb-3">Edición Aniversario con ilustraciones de Tolkien</p>
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <span class="badge bg-warning text-dark">Aniversario</span>
                                <span class="badge bg-success">Ilustrado</span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic">
                                    <i class="bi bi-arrow-left-right me-2"></i>Intercambiar
                                </a>
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-futuristic">
                                    <i class="bi bi-cart me-2"></i>Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-epic h-100 scroll-reveal">
                        <img src="public/img/intercambia6.jpg" class="card-img-top"
                            alt="Where the Wild Things Are">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Where the Wild Things Are</h5>
                            <p class="text-muted mb-3">Edición Pop-Up de Robert Sabuda</p>
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <span class="badge bg-info">Infantil</span>
                                <span class="badge bg-danger">Pop-Up</span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-futuristic">
                                    <i class="bi bi-arrow-left-right me-2"></i>Intercambiar
                                </a>
                                <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-futuristic">
                                    <i class="bi bi-cart me-2"></i>Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-epic" style="background: var(--gradient-dark); color: white;" id="comunidad">
        <div class="container">
            <h2 class="section-title-epic text-white scroll-reveal">🧠 Universo Stephen King</h2>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="card card-epic h-100 scroll-reveal"
                        style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); color: white;">
                        <img src="public/img/seccionk2.jpg" class="card-img-top" alt="Obras de Stephen King">
                        <div class="card-body">
                            <h5 class="card-title text-white fw-bold mb-4">
                                <i class="bi bi-book-fill me-2"></i>Obras Maestras del Terror
                            </h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 rounded"
                                        style="background: rgba(255, 255, 255, 0.1);">
                                        <span class="fs-4 me-3">📘</span>
                                        <div>
                                            <strong class="text-white">It</strong>
                                            <p class="text-light mb-0 small">El terror ancestral de Derry y Pennywise
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 rounded"
                                        style="background: rgba(255, 255, 255, 0.1);">
                                        <span class="fs-4 me-3">🏨</span>
                                        <div>
                                            <strong class="text-white">El Resplandor</strong>
                                            <p class="text-light mb-0 small">Horror psicológico en el Hotel Overlook</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 rounded"
                                        style="background: rgba(255, 255, 255, 0.1);">
                                        <span class="fs-4 me-3">🖋️</span>
                                        <div>
                                            <strong class="text-white">Misery</strong>
                                            <p class="text-light mb-0 small">Obsesión y encierro con Annie Wilkes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 rounded"
                                        style="background: rgba(255, 255, 255, 0.1);">
                                        <span class="fs-4 me-3">🧙</span>
                                        <div>
                                            <strong class="text-white">La Torre Oscura</strong>
                                            <p class="text-light mb-0 small">Saga épica que conecta todo su universo</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-epic h-100 scroll-reveal"
                        style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); color: white;">
                        <img src="public/img/seccionk1.jpg" class="card-img-top" alt="Noticias Stephen King">
                        <div class="card-body">
                            <h5 class="card-title text-white fw-bold mb-4">
                                <i class="bi bi-lightning me-2"></i>Últimas Noticias
                            </h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="border-start border-4 border-primary ps-3 py-2">
                                        <strong class="text-white d-block">📖 Nueva novela disponible</strong>
                                        <p class="text-light mb-0 small">
                                            <em>No tengas miedo</em>, protagonizada por Holly Gibney
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="border-start border-4 border-warning ps-3 py-2">
                                        <strong class="text-white d-block">🎬 Próxima película</strong>
                                        <p class="text-light mb-0 small">
                                            <em>The Life of Chuck</em> con Tom Hiddleston
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="border-start border-4 border-success ps-3 py-2">
                                        <strong class="text-white d-block">📺 Serie precuela de <em>It</em></strong>
                                        <p class="text-light mb-0 small">
                                            <strong>Welcome to Derry</strong> en HBO Max
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="border-start border-4 border-danger ps-3 py-2">
                                        <strong class="text-white d-block">🎧 Audiolibro especial</strong>
                                        <p class="text-light mb-0 small">
                                            <em>Hansel and Gretel</em> narrado por King
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-epic">
        <div class="container">
            <h2 class="section-title-epic scroll-reveal">💬 Voces de Nuestra Comunidad</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card card-epic mx-auto scroll-reveal" style="max-width: 800px;">
                            <div class="card-body text-center">
                                <img src="public/img/client1.jpg" class="rounded-circle mb-4 shadow-lg"
                                    width="120" alt="María Gómez">
                                <h5 class="fw-bold"
                                    style="background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                    María Gómez</h5>
                                <p class="text-muted mb-3">Lectora apasionada • Barcelona</p>
                                <blockquote class="blockquote">
                                    <p class="fs-5 text-dark">"LibrosWap revolucionó mi experiencia lectora. He
                                        descubierto autores increíbles y la comunidad es extraordinaria. El sistema de
                                        intercambio es perfecto."</p>
                                </blockquote>
                                <div class="text-warning fs-4">★★★★★</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card card-epic mx-auto scroll-reveal" style="max-width: 800px;">
                            <div class="card-body text-center">
                                <img src="public/img/client2.jpg" class="rounded-circle mb-4 shadow-lg"
                                    width="120" alt="Carlos Ruiz">
                                <h5 class="fw-bold"
                                    style="background: var(--gradient-secondary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                    Carlos Ruiz</h5>
                                <p class="text-muted mb-3">Profesor Universitario • Madrid</p>
                                <blockquote class="blockquote">
                                    <p class="fs-5 text-dark">"Como educador, valoro enormemente esta plataforma. Mis
                                        estudiantes han encontrado recursos increíbles y el intercambio cultural es
                                        invaluable."</p>
                                </blockquote>
                                <div class="text-warning fs-4">★★★★★</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card card-epic mx-auto scroll-reveal" style="max-width: 800px;">
                            <div class="card-body text-center">
                                <img src="public/img/client3.jpg" class="rounded-circle mb-4 shadow-lg"
                                    width="120" alt="Laura Méndez">
                                <h5 class="fw-bold"
                                    style="background: var(--gradient-tertiary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                    Laura Méndez</h5>
                                <p class="text-muted mb-3">Estudiante de Literatura • Valencia</p>
                                <blockquote class="blockquote">
                                    <p class="fs-5 text-dark">"La interfaz es intuitiva y hermosa. He ahorrado tanto
                                        dinero y conocido lectores con gustos similares. Es mi plataforma favorita."</p>
                                </blockquote>
                                <div class="text-warning fs-4">★★★★★</div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <div style="background: var(--gradient-primary); border-radius: 50%; padding: 15px;">
                        <i class="bi bi-chevron-left text-white fs-4"></i>
                    </div>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <div style="background: var(--gradient-primary); border-radius: 50%; padding: 15px;">
                        <i class="bi bi-chevron-right text-white fs-4"></i>
                    </div>
                </button>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"
                        style="background: var(--gradient-primary); border-radius: 50%; width: 15px; height: 15px;"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"
                        style="background: var(--gradient-secondary); border-radius: 50%; width: 15px; height: 15px;"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"
                        style="background: var(--gradient-tertiary); border-radius: 50%; width: 15px; height: 15px;"></button>
                </div>
            </div>
        </div>
    </section>
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
                            <form method="POST" action="../../procesar_contacto.php">
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
                                <div id="respuestaContacto" class="mt-4 text-center"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer
        style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); color: white; padding: 60px 0 30px; margin-top: 0;">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="mb-4">
                        <img src="public/img/logow.png" alt="LibrosWap" style="height: 60px;" class="mb-3">
                        <h4 class="fw-bold">LibrosWap</h4>
                        <p class="mb-3">Plataforma web para comprar, vender e intercambiar libros entre usuarios.
                            Fomentamos la lectura, conectamos personas y promovemos el conocimiento compartido.</p>
                    </div>
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
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3">Enlaces Útiles</h6>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="inicio"
                                        class="text-white text-decoration-none">Regresar al Inicio</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#productos"
                                        class="text-white text-decoration-none">Revisar los productos</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#categorias"
                                        class="text-white text-decoration-none">Generos a tu alcance</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#comunidad"
                                        class="text-white text-decoration-none">Comunidad</a>
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
            <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentSlideIndexEpic = 0;
        const slidesEpic = document.querySelectorAll('.book-slide-epic');
        const indicatorsEpic = document.querySelectorAll('.indicator-epic');
        const totalSlidesEpic = slidesEpic.length;
        function updateSlidesEpic() {
            slidesEpic.forEach((slide, index) => {
                slide.className = 'book-slide-epic';
                if (index === currentSlideIndexEpic) {
                    slide.classList.add('active');
                } else if (index === (currentSlideIndexEpic - 1 + totalSlidesEpic) % totalSlidesEpic) {
                    slide.classList.add('prev');
                } else if (index === (currentSlideIndexEpic + 1) % totalSlidesEpic) {
                    slide.classList.add('next');
                } else {
                    slide.classList.add('hidden');
                }
            });
            indicatorsEpic.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlideIndexEpic);
            });
        }
        function nextSlideEpic() {
            currentSlideIndexEpic = (currentSlideIndexEpic + 1) % totalSlidesEpic;
            updateSlidesEpic();
        }
        function previousSlideEpic() {
            currentSlideIndexEpic = (currentSlideIndexEpic - 1 + totalSlidesEpic) % totalSlidesEpic;
            updateSlidesEpic();
        }
        function currentSlideEpic(index) {
            currentSlideIndexEpic = index;
            updateSlidesEpic();
        }
        setInterval(nextSlideEpic, 5000);
        slidesEpic.forEach((slide, index) => {
            slide.addEventListener('click', () => {
                if (index !== currentSlideIndexEpic) {
                    currentSlideIndexEpic = index;
                    updateSlidesEpic();
                }
            });
        });
        updateSlidesEpic();
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
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
        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const background = document.querySelector('.hero-background');
            if (background) {
                const rate = scrolled * -0.2;
                background.style.transform = `translateY(${rate}px)`;
            }
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
    </script>
    <script>
document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault(); 
    const form = e.target;
    const datos = new FormData(form);
    const respuesta = document.getElementById("respuestaContacto");
    fetch("../../procesar_contacto.php", {
        method: "POST",
        body: datos
    })
    .then(res => res.text())
    .then(mensaje => {
        respuesta.innerHTML = `
            <div style="background: #e6ffed; border: 1px solid #b2f5ea; padding: 15px; border-radius: 10px; color: #2f855a; font-weight: 500;">
                ${mensaje}
            </div>
        `;
        form.reset(); 
    })
    .catch(error => {
        respuesta.innerHTML = `
            <div style="background: #ffe6e6; border: 1px solid #feb2b2; padding: 15px; border-radius: 10px; color: #c53030; font-weight: 500;">
                ❌ Error al enviar el mensaje. Intenta nuevamente.
            </div>
        `;
        console.error("Error:", error);
    });
});
</script>
</body>
</html>
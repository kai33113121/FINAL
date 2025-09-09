<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LibrosWap - Bienvenido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #ede7f6, #f3e5f5);
            font-family: 'Segoe UI', sans-serif;
        }

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

        .btn-purple {
            background-color: #8e24aa;
            color: white;
        }

        .btn-purple:hover {
            background-color: #6a1b9a;
        }

        .section {
            padding: 60px 0;
        }

        .bg-purple-light {
            background-color: #f3e5f5;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        footer {
            background-color: #4a148c;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-purple shadow-sm sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <img src="/FINAL/public/img/logow.png" alt="Logo" style="height:40px;" class="me-2">
                <span class="text-white text-shadow">LibrosWap</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-4">
                    <li class="nav-item"><a class="nav-link text-shadow" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#productos">Productos y Ofertas</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#categorias">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#seleccion">Nuestra Selección</a></li>
                    <li class="nav-item"><a class="nav-link text-shadow" href="#contacto">Contáctanos</a></li>
                </ul>
            </div>
            <div class="d-flex">
                <a class="btn btn-outline-light me-2" href="index.php?c=UsuarioController&a=login">Ingresar</a>
                <a class="btn btn-light text-purple fw-bold"
                    href="index.php?c=UsuarioController&a=register">Registrarse</a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero-section position-relative text-center text-white"
        style="position: relative; overflow: hidden; min-height: 100vh; display: flex; align-items: center; justify-content: center;">

        <!-- Fondo con imagen traslúcida -->
        <div style="
    position: absolute;
    inset: 0;
    background-image: url('/FINAL/public/img/adminside.png'); /* tu imagen */
    background-size: cover;
    background-position: center;
    opacity: 0.7; /* controla la transparencia */
    z-index: 0;
  "></div>

        <!-- Overlay opcional para oscurecer más -->
        <div style="
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4); /* más contraste para el texto */
    z-index: 1;
  "></div>

        <!-- Contenido principal -->
        <div class="container position-relative py-5" style="z-index: 2;">
            <h1 class="display-4 fw-bold" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.6);">Intercambia, compra y
                comparte libros</h1>
            <p class="lead" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.6);">Explora miles de títulos y conecta con
                lectores apasionados.</p>
            <a href="index.php?c=UsuarioController&a=register"
                class="btn btn-light text-purple fw-bold btn-lg mt-3">Comienza ahora</a>

            <div class="row mt-5">
                <div class="col-md-4">
                    <img src="/FINAL/public/img/loco.jpg" class="img-fluid rounded shadow-sm" alt="Libros 1">
                </div>
                <div class="col-md-4">
                    <img src="/FINAL/public/img/orgullo.jpg" class="img-fluid rounded shadow-sm" alt="Libros 2">
                </div>
                <div class="col-md-4">
                    <img src="/FINAL/public/img/seccionk5.jpg" class="img-fluid rounded shadow-sm" alt="Libros 3">
                </div>
            </div>
        </div>
    </section>

    <!-- Recomendaciones y Populares -->
    <section class="section bg-white py-5">
        <div class="container">
            <div class="row">

                <!-- Recomendaciones -->
                <div class="col-md-6 mb-4">
                    <h3 class="text-center text-purple">⭐ Recomendaciones</h3>
                    <div id="sliderRecomendaciones" class="carousel slide" data-bs-ride="carousel"
                        data-bs-interval="5000">
                        <div class="carousel-inner">

                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/recomendado1.jpg" class="card-img-top"
                                                alt="Recomendación 1">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Recomendación 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/recomendado2.jpg" class="card-img-top"
                                                alt="Recomendación 2">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Recomendación 2</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/recomendado3.jpg" class="card-img-top"
                                                alt="Recomendación 3">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Recomendación 3</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/recomendado4.jpg" class="card-img-top"
                                                alt="Recomendación 4">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Recomendación 4</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->
                            <div class="carousel-item">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/recomendado5.jpg" class="card-img-top"
                                                alt="Recomendación 5">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Recomendación 5</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/recomendado6.jpg" class="card-img-top"
                                                alt="Recomendación 6">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Recomendación 6</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#sliderRecomendaciones"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#sliderRecomendaciones"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>

                <!-- Populares -->
                <div class="col-md-6 mb-4">
                    <h3 class="text-center text-purple">🔥 Populares 2025</h3>
                    <div id="sliderPopulares" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-inner">

                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/20251.jpg" class="card-img-top" alt="Popular 1">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Popular 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/20252.jpg" class="card-img-top" alt="Popular 2">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Popular 2</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/20254.jpg" class="card-img-top" alt="Popular 3">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Popular 3</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card h-100 shadow-sm">
                                            <img src="/FINAL/public/img/20253.jpg" class="card-img-top" alt="Popular 4">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Popular 4</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#sliderPopulares"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#sliderPopulares"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Productos y Ofertas -->
    <section class="section bg-white" id="productos">
        <div class="container">
            <h2 class="text-center mb-5 text-purple">🎁 Productos y Ofertas</h2>
            <div class="row g-4">
                <!-- Aquí puedes cargar libros por género -->
                <!-- Ejemplo -->
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/oferta1.jpg" class="card-img-top" alt="Libro">
                        <div class="card-body">
                            <h5 class="card-title">Harry Potter</h5>
                            <p class="text-muted">Fantasía</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/oferta2.jpg" class="card-img-top" alt="Libro">
                        <div class="card-body">
                            <h5 class="card-title">Atomic Habits</h5>
                            <p class="text-muted">Autoayuda</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/oferta4.jpg" class="card-img-top" alt="Libro">
                        <div class="card-body">
                            <h5 class="card-title">El Alquimista" (Paulo Coelho)</h5>
                            <p class="text-muted">Ficción inspiracional</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/oferta5.jpg" class="card-img-top" alt="Libro">
                        <div class="card-body">
                            <h5 class="card-title">Los Juegos del Hambre</h5>
                            <p class="text-muted">Distopía</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/oferta6.jpg" class="card-img-top" alt="Libro">
                        <div class="card-body">
                            <h5 class="card-title">Dune" (Frank Herbert)</h5>
                            <p class="text-muted">Ciencia Ficción</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/libros/oferta7.jpg" class="card-img-top" alt="Libro">
                        <div class="card-body">
                            <h5 class="card-title">El Código Da Vinci" (Dan Brown)</h5>
                            <p class="text-muted">Thriller,Comics</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/4.jpg" class="card-img-top" alt="Libro">
                        <div class="card-body">
                            <h5 class="card-title">The many lives of cats</h5>
                            <p class="text-muted">action</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/4.jpg" class="card-img-top" alt="Libro">
                        <div class="card-body">
                            <h5 class="card-title">Título</h5>
                            <p class="text-muted">Género</p>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categorías -->
    <section class="py-5" id="categorias" style="
  background: linear-gradient(135deg, #6a0dad, #c084fc);
  color: white;
">
        <div class="container">
            <h2 class="text-center fw-bold mb-5 text-white">📚 Explora por Categorías</h2>
            <div class="row g-4 justify-content-center">

                <!-- Fantasía -->
                <div class="col-md-6 col-lg-4">
                    <div class="card genre-card h-100 shadow-sm border-0">
                        <img src="/FINAL/public/img/categoria1.jpg" class="card-img-top"
                            alt="Fantasía y Ciencia Ficción">
                        <div class="card-body text-center">
                            <div class="icon mb-2">🧙‍♂️</div>
                            <h5 class="card-title text-purple">Fantasía y Ciencia Ficción</h5>
                            <p class="card-text">Universos épicos, magia, tecnología futurista y mundos imposibles.</p>
                            <a href="/genero/fantasia" class="btn btn-light btn-sm fw-bold">Ver más del género</a>
                        </div>
                    </div>
                </div>

                <!-- Thriller -->
                <div class="col-md-6 col-lg-4">
                    <div class="card genre-card h-100 shadow-sm border-0">
                        <img src="/FINAL/public/img/categoria2.jpg" class="card-img-top" alt="Thriller y Misterio">
                        <div class="card-body text-center">
                            <div class="icon mb-2">🕵️‍♀️</div>
                            <h5 class="card-title text-purple">Thriller y Misterio</h5>
                            <p class="card-text">Suspenso, investigaciones, giros inesperados y tensión constante.</p>
                            <a href="/genero/thriller" class="btn btn-light btn-sm fw-bold">Ver más del género</a>
                        </div>
                    </div>
                </div>

                <!-- Romance -->
                <div class="col-md-6 col-lg-4">
                    <div class="card genre-card h-100 shadow-sm border-0">
                        <img src="/FINAL/public/img/categoria3.jpg" class="card-img-top" alt="Romance">
                        <div class="card-body text-center">
                            <div class="icon mb-2">💖</div>
                            <h5 class="card-title text-purple">Romance</h5>
                            <p class="card-text">Historias de amor, emociones intensas y conexiones inolvidables.</p>
                            <a href="/genero/romance" class="btn btn-light btn-sm fw-bold">Ver más del género</a>
                        </div>
                    </div>
                </div>

                <!-- Clásicos -->
                <div class="col-md-6 col-lg-4">
                    <div class="card genre-card h-100 shadow-sm border-0">
                        <img src="/FINAL/public/img/categoria4.jpg" class="card-img-top" alt="Literatura Clásica">
                        <div class="card-body text-center">
                            <div class="icon mb-2">📜</div>
                            <h5 class="card-title text-purple">Literatura Clásica</h5>
                            <p class="card-text">Obras atemporales que marcaron la historia de la literatura.</p>
                            <a href="/genero/clasicos" class="btn btn-light btn-sm fw-bold">Ver más del género</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Foro / Noticia destacada -->
    <section class="section bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/FINAL/public/img/6.jpg" class="img-fluid rounded" alt="Foro">
                </div>
                <div class="col-md-6">
                    <h1>LANZAMIENTO EXCLUSIVO: LA JOYA LITERARIA DEL AÑO</h1>
                    <h1>Una memoria cruda y poética sobre viajes, identidad y los encuentros que nos marcan para siempre
                    </h1>

                    <p>En las paredes desconchadas de un hostel perdido en Marruecos, cada huésped esconde una historia.
                        Esta es la crónica de Alina K., quien documentó 3 años de viajes en cuadernos manchados de té y
                        polvo del desierto. Un libro que desarma el alma y rearma el significado de 'pertenecer</p>
                    <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple">comprar ahora</a>
                </div>


            </div>
        </div>
        </div>
    </section>

    <!-- Nuestra Selección -->
    <section class="section bg-purple-light" id="seleccion">
        <div class="container">
            <h2 class="text-center mb-5">🌟 Nuestra Selección</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/intercambia1.jpg" class="card-img-top" alt="Libro destacado">
                        <div class="card-body text-center">
                            <h5 class="card-title">"El Principito" (Edición Pop-Up)</h5>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple me-2">Intercambiar</a>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-dark">Comprar</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/intercambia2.jpg" class="card-img-top" alt="Libro destacado">
                        <div class="card-body text-center">
                            <h5 class="card-title">"Alice’s Adventures in Wonderland" (Ed. Taschen)</h5>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple me-2">Intercambiar</a>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-dark">Comprar</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/intercambia3.jpg" class="card-img-top" alt="Libro destacado">
                        <div class="card-body text-center">
                            <h5 class="card-title">"The Raven" (Ed. Ilustrada por Édouard Manet)</h5>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple me-2">Intercambiar</a>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-dark">Comprar</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/intercambia4.jpg" class="card-img-top" alt="Libro destacado">
                        <div class="card-body text-center">
                            <h5 class="card-title">"Moby Dick" (Ed. Rockwell Kent)</h5>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple me-2">Intercambiar</a>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-dark">Comprar</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/intercambia5.jpg" class="card-img-top" alt="Libro destacado">
                        <div class="card-body text-center">
                            <h5 class="card-title">"The Hobbit" (Ed. Aniversario con ilustraciones de Tolkien</h5>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple me-2">Intercambiar</a>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-dark">Comprar</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/intercambia6.jpg" class="card-img-top" alt="Libro destacado">
                        <div class="card-body text-center">
                            <h5 class="card-title">"Where the Wild Things Are" (Ed. Pop-Up de Robert Sabuda)</h5>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-purple me-2">Intercambiar</a>
                            <a href="index.php?c=UsuarioController&a=login" class="btn btn-outline-dark">Comprar</a>
                        </div>

                    </div>
                </div>
            </div>


        </div>


    </section>

    <section class="section bg-light py-5">
        <div class="container">
            <h2 class="text-center text-purple mb-4">🧠 Universo Stephen King</h2>
            <div class="row g-4">

                <!-- Obra destacada -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/seccionk2.jpg" class="card-img-top" alt="Obras de Stephen King">
                        <div class="card-body">
                            <h5 class="card-title text-purple">Obras más importantes</h5>
                            <ul class="list-unstyled">
                                <li>📘 <strong>It</strong> – El terror de Derry y el payaso Pennywise</li>
                                <li>🏨 <strong>El Resplandor</strong> – Horror psicológico en el Hotel Overlook</li>
                                <li>🖋️ <strong>Misery</strong> – Obsesión y encierro con Annie Wilkes</li>
                                <li>⚰️ <strong>Cementerio de animales</strong> – El precio de desafiar la muerte</li>
                                <li>🕰️ <strong>22/11/63</strong> – Viaje en el tiempo para salvar a Kennedy</li>
                                <li>🧙 <strong>La Torre Oscura</strong> – Saga épica que conecta todo su universo</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Noticias recientes -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/seccionk1.jpg" class="card-img-top" alt="Noticias Stephen King">
                        <div class="card-body">
                            <h5 class="card-title text-purple">📰 Noticias recientes</h5>
                            <ul class="list-unstyled">
                                <li>📖 Nueva novela: <em>No tengas miedo</em>, protagonizada por Holly Gibney</li>
                                <li>🎬 Próxima película: <em>The Life of Chuck</em> con Tom Hiddleston</li>
                                <li>📺 Serie precuela de <em>It</em>: <strong>Welcome to Derry</strong> en HBO Max</li>
                                <li>📚 <em>The Talisman 3</em> casi listo para publicación</li>
                                <li>🎧 Audiolibro narrado por King: <em>Hansel and Gretel</em></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Testimonios -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-4 text-purple">Testimonios de lectores</h2>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">

                    <!-- Testimonio 1 -->
                    <div class="carousel-item active">
                        <div class="card mx-auto" style="max-width: 600px;">
                            <div class="card-body text-center">
                                <img src="/FINAL/public/img/client1.jpg" class="rounded-circle mb-3" width="80"
                                    alt="Usuario 1">
                                <h5 class="card-title fw-bold">María Gómez</h5>
                                <p class="text-muted">"Encontré libros que llevaba años buscando. ¡La comunidad es
                                    increíble!"</p>
                                <div class="text-warning">★★★★★</div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonio 2 -->
                    <div class="carousel-item">
                        <div class="card mx-auto" style="max-width: 600px;">
                            <div class="card-body text-center">
                                <img src="/FINAL/public/img/client2.jpg" class="rounded-circle mb-3" width="80"
                                    alt="Usuario 2">
                                <h5 class="card-title fw-bold">Carlos Ruiz</h5>
                                <p class="text-muted">"Intercambié libros con personas de todo el país. ¡Muy
                                    recomendado!"</p>
                                <div class="text-warning">★★★★☆</div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonio 3 -->
                    <div class="carousel-item">
                        <div class="card mx-auto" style="max-width: 600px;">
                            <div class="card-body text-center">
                                <img src="/FINAL/public/img/client3.jpg" class="rounded-circle mb-3" width="80"
                                    alt="Usuario 3">
                                <h5 class="card-title fw-bold">Laura Méndez</h5>
                                <p class="text-muted">"Me encanta cómo se ve la plataforma y lo fácil que es usarla."
                                </p>
                                <div class="text-warning">★★★★★</div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Controles dentro del carrusel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>
    <section class="section bg-white py-5">
        <div class="container">
            <h2 class="text-center text-purple mb-4">📝 Blogs y Noticias Literarias</h2>
            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/noticia1.jpg" class="card-img-top" alt="Blog 1">
                        <div class="card-body">
                            <h6 class="card-title text-purple">¿Por qué leemos terror?</h6>
                            <p class="card-text">Exploramos cómo el miedo puede ser terapéutico y por qué Stephen King
                                sigue
                                siendo el maestro del género.</p>
                            <a href="#" class="btn btn-outline-purple btn-sm">Leer más</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/noticia2.jpg" class="card-img-top" alt="Blog 2">
                        <div class="card-body">
                            <h6 class="card-title text-purple">Libros que inspiran series</h6>
                            <p class="card-text">De <em>La Torre Oscura</em> a <em>From</em>, cómo las novelas de King
                                se
                                transforman en éxitos televisivos.</p>
                            <a href="#" class="btn btn-outline-purple btn-sm">Leer más</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/FINAL/public/img/noticia3.jpg" class="card-img-top" alt="Blog 3">
                        <div class="card-body">
                            <h6 class="card-title text-purple">Recomendaciones para lectores nuevos</h6>
                            <p class="card-text">¿Nunca has leído a Stephen King? Aquí te decimos por dónde empezar
                                según tu
                                estilo.</p>
                            <a href="#" class="btn btn-outline-purple btn-sm">Leer más</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-1">📚 LibrosWap — Compartiendo conocimiento desde 2025</p>
            <p class="mb-1">Diseñado con 💜 por Ángel </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#" class="text-white text-decoration-none">Inicio</a>
                <a href="#" class="text-white text-decoration-none">Libros</a>
                <a href="#" class="text-white text-decoration-none">Blog</a>
                <a href="#" class="text-white text-decoration-none">Contacto</a>
            </div>
            <p class="mt-3 small">© 2025 LibrosWap. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/fontawesome.min.js"
        integrity="sha512-j12pXc2gXZL/JZw5Mhi6LC7lkiXL0e2h+9ZWpqhniz0DkDrO01VNlBrG3LkPBn6DgG2b8CDjzJT+lxfocsS1Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
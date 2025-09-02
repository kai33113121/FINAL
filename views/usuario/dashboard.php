<?php
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/FINAL/public/css/dashboardu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <section class="dashboard-hero position-relative text-white"
        style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(to right, #6a11cb, #333a45ff); overflow: hidden;">

        <!-- Collage decorativo disperso -->
        <div class="collage-container position-absolute w-100 h-100" style="z-index: 0;">
            <img src="/FINAL/public/img/1.jpg" class="collage-img" style="top: 4%; left: 6%;">
            <img src="/FINAL/public/img/2.jpg" class="collage-img" style="top: 12%; right: 8%;">
            <img src="/FINAL/public/img/3.png" class="collage-img" style="top: 22%; left: 18%;">
            <img src="/FINAL/public/img/4.jpg" class="collage-img" style="top: 30%; right: 20%;">
            <img src="/FINAL/public/img/5.jpg" class="collage-img" style="top: 42%; left: 10%;">
            <img src="/FINAL/public/img/6.jpg" class="collage-img" style="top: 50%; right: 12%;">
            <img src="/FINAL/public/img/1.jpg" class="collage-img" style="top: 60%; left: 25%;">
            <img src="/FINAL/public/img/2.jpg" class="collage-img" style="top: 70%; right: 18%;">
            <img src="/FINAL/public/img/3.png" class="collage-img" style="bottom: 28%; left: 15%;">
            <img src="/FINAL/public/img/4.jpg" class="collage-img" style="bottom: 20%; right: 10%;">
            <img src="/FINAL/public/img/5.jpg" class="collage-img" style="bottom: 12%; left: 30%;">
            <img src="/FINAL/public/img/6.jpg" class="collage-img" style="bottom: 5%; right: 25%;">
            <img src="/FINAL/public/img/1.jpg" class="collage-img" style="top: 35%; left: 60%;">
            <img src="/FINAL/public/img/2.jpg" class="collage-img" style="bottom: 40%; right: 40%;">
            <img src="/FINAL/public/img/3.png" class="collage-img" style="top: 15%; left: 75%;">
            <img src="/FINAL/public/img/4.jpg" class="collage-img" style="bottom: 55%; left: 50%;">
        </div>

        <!-- Contenido principal -->
        <div class="container position-relative text-center py-5">
            <h1 class="display-5 fw-bold mb-3 text-shadow">👋 Bienvenido a Libros Wap, señor@, <?= htmlspecialchars($usuario['nombre']) ?>
            </h1>
            <p class="lead text-shadow">Gestiona tus libros, intercambios y conecta con otros lectores.</p>
            <p class="lead text-shadow">Todo lo que necesitas en un solo lugar</p>

            <div class="row justify-content-center mt-5 g-4">
                <!-- Card de Explorar libros -->
        <div class="col-md-5">
    <div class="card h-100 border-0 shadow-lg card-hover bg-white text-purple position-relative overflow-hidden">
        <div class="card-body">
            <h4 class="card-title fw-bold">📖 Tu viaje literario comienza aquí</h4>
            <p class="card-text">
                Sumérgete en una biblioteca viva donde cada libro tiene una historia que espera ser descubierta. 
                Compra, intercambia o simplemente explora lo que otros lectores han compartido.
            </p>
    
        </div>
    </div>
</div>

                <div class="col-md-5">
    <div class="card h-100 border-0 shadow-lg card-hover bg-white text-purple position-relative overflow-hidden">
        <div class="card-body">
            <h4 class="card-title fw-bold">📚 Comparte tu biblioteca con el mundo</h4>
            <p class="card-text">
                Cada libro que subes puede inspirar, enseñar o transformar a otro lector. 
                Sé parte de una comunidad que valora el conocimiento, la imaginación y el intercambio justo.
                Tu colección puede ser el inicio de nuevas historias.
            </p>
        </div>
        
    </div>
</div>
            </div>
        </div>

        <!-- Fondo base -->
        <div
            style="position: absolute; inset: 0; background-image: url('/FINAL/public/img/adminside.png'); background-size: cover; background-position: center; opacity: 0.2; z-index: 0;">
        </div>
    </section>




    <!-- Sección de accesos rápidos -->
    <section class="container py-5">
        <h2 class="text-center fw-bold mb-5 text-purple text-shadow">🚀 Accesos rápidos</h2>
        <div class="row g-4 justify-content-center">

            <!-- Libros en venta -->
<div class="col-md-4">
    <a href="index.php?c=VentaController&a=crearVista" class="text-decoration-none">
        <div class="card card-flip h-100 shadow-lg border-0 text-center bg-white text-purple">
            <div class="card-body">
                <i class="bi bi-cash-coin fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Publicar libro en venta</h5>
                <p class="card-text">Ofrece libros nuevos o de segunda mano para que otros usuarios los compren.</p>
            </div>
        </div>
    </a>
</div>

<!-- Mis publicaciones -->
<div class="col-md-4">
    <a href="index.php?c=VentaController&a=misVentas" class="text-decoration-none">
        <div class="card card-flip h-100 shadow-lg border-0 text-center bg-white text-purple">
            <div class="card-body">
                <i class="bi bi-journal-text fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Mis publicaciones</h5>
                <p class="card-text">Administra los libros que has puesto en venta en la plataforma.</p>
            </div>
        </div>
    </a>
</div>

            <!-- Ver carrito -->
            <div class="col-md-4">
                <a href="index.php?c=CarritoController&a=ver" class="text-decoration-none">
                    <div class="card card-flip h-100 shadow-lg border-0 text-center bg-white text-purple">
                        <div class="card-body">
                            <i class="bi bi-cart3 fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold">Ver carrito</h5>
                            <p class="card-text">Consulta los libros que has agregado para comprar o intercambiar.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Explorar libros -->
            <div class="col-md-4">
                <a href="index.php?c=LibroController&a=explorar" class="text-decoration-none">
                    <div class="card card-flip h-100 shadow-lg border-0 text-center bg-white text-purple">
                        <div class="card-body">
                            <i class="bi bi-search fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold">Explorar libros</h5>
                            <p class="card-text">Descubre títulos nuevos, populares y recomendados por la comunidad.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Intercambios -->
            <div class="col-md-4">
                <a href="index.php?c=IntercambioController&a=misIntercambios" class="text-decoration-none">
                    <div class="card card-flip h-100 shadow-lg border-0 text-center bg-white text-purple">
                        <div class="card-body">
                            <i class="bi bi-arrow-left-right fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold">Mis intercambios</h5>
                            <p class="card-text">Revisa tus solicitudes, ofertas y el estado de tus intercambios
                                activos.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Perfil -->
            <div class="col-md-4">
                <a href="index.php?c=UsuarioController&a=perfil" class="text-decoration-none">
                    <div class="card card-flip h-100 shadow-lg border-0 text-center bg-white text-purple">
                        <div class="card-body">
                            <i class="bi bi-person-circle fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold">Mi perfil</h5>
                            <p class="card-text">Edita tu información personal, preferencias y foto de perfil.</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <!-- seccion de edicion perfil -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-4 text-purple">Tu Perfil</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-3">
                    <a href="index.php?c=UsuarioController&a=perfil" class="btn btn-purple w-100 py-3 shadow">✏️ Editar perfil</a>
                </div>
                <div class="col-md-3">
                    <a href="index.php?c=UsuarioController&a=configuracion" class="btn btn-purple w-100 py-3 shadow">🎨 Preferencias visuales</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Recomendaciones y Populares -->
    <section class="section bg-purple-light py-5">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-8 text-center">
                    <h2 id="libros" class="fw-bold text-purple text-shadow">📚 Libros destacados para ti</h2>
                    <p class="text-muted">Explora títulos recomendados y los más populares del momento.</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Recomendaciones -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 text-center">
                            <h4 class="text-purple fw-bold">⭐ Recomendaciones</h4>
                        </div>
                        <div class="card-body">
                            <div id="sliderRecomendaciones" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="5000">
                                <div class="carousel-inner rounded-3 overflow-hidden">

                                    <!-- Slide 1 -->
                                    <div class="carousel-item active">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/recomendado1.jpg" class="card-img-top"
                                                        alt="Recomendación 1">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title">Recomendación 1</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
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
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/recomendado3.jpg" class="card-img-top"
                                                        alt="Recomendación 3">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title">Recomendación 3</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/recomendado4.jpg" class="card-img-top"
                                                        alt="Recomendación 4">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title">Recomendación 4</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#sliderRecomendaciones" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#sliderRecomendaciones" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Populares -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 text-center">
                            <h4 class="text-purple fw-bold">🔥 Populares 2025</h4>
                        </div>
                        <div class="card-body">
                            <div id="sliderPopulares" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="5000">
                                <div class="carousel-inner rounded-3 overflow-hidden">

                                    <!-- Slide 1 -->
                                    <div class="carousel-item active">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/20251.jpg" class="card-img-top"
                                                        alt="Popular 1">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title">Popular 1</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/20252.jpg" class="card-img-top"
                                                        alt="Popular 2">
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
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/20254.jpg" class="card-img-top"
                                                        alt="Popular 3">
                                                    <div class="card-body text-center">
                                                        <h6 class="card-title">Popular 3</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <img src="/FINAL/public/img/20253.jpg" class="card-img-top"
                                                        alt="Popular 4">
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
            </div>
        </div>
    </section>
    <!-- Productos y Ofertas -->
    <section class="section bg-white py-5" id="productos">
        <div class="container">
            <h2 class="text-center mb-5 text-purple text-shadow">🎁 Productos y Ofertas</h2>
            <div class="overflow-auto pb-3">
                <div class="d-flex flex-nowrap gap-4 px-2" style="scroll-snap-type: x mandatory;">
                    <?php if (!empty($libros)): ?>
                        <?php foreach ($libros as $libro): ?>
                            <div class="card shadow-sm border-0" style="min-width: 220px; scroll-snap-align: start;">
                                <img src="public/img/libros/<?= htmlspecialchars($libro['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($libro['titulo']) ?>">
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold"><?= htmlspecialchars($libro['titulo']) ?></h6>
                                    <p class="text-muted small"><?= htmlspecialchars($libro['genero'] ?? '') ?></p>
                                    <p class="text-muted small">Estado: <?= htmlspecialchars($libro['estado'] ?? 'N/A') ?></p>
                                    <a href="index.php?c=DetalleLibroController&a=verDetalle&id=<?= $libro['id'] ?>" class="btn btn-purple btn-sm">Ver más</a>
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

    <!-- Categorías -->
    <section class="py-5" id="categorias" style="background-image: url('/FINAL/public/img/adminside.png'); color: white;">
        <div id="categorias" class="container">
            <h2 class="text-center fw-bold mb-5 text-white text-shadow">📚 Explora por Categorías</h2>

            <!-- Cubos horizontales -->
            <div class="d-flex flex-column gap-4 align-items-center">

                <!-- Cubo 1 -->
                <div class="cube-card d-flex flex-row align-items-center shadow-lg rounded-4 overflow-hidden"
                    style="background: white; color: #6a0dad; max-width: 900px;">
                    <img src="/FINAL/public/img/categoria1.jpg" alt="Fantasía" class="img-fluid"
                        style="width: 200px; height: 100%; object-fit: cover;">
                    <div class="p-4 flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="fs-3 me-2">🧙‍♂️</div>
                            <h5 class="fw-bold mb-0">Fantasía y Ciencia Ficción</h5>
                        </div>
                        <p class="mb-3">Universos épicos, magia, tecnología futurista y mundos imposibles.</p>
                        <a href="index.php?c=LibroController&a=porGenero&genero=<?= urlencode($cat['nombre']) ?>"
                            class="btn btn-purple btn-sm fw-bold">Ver más del género</a>
                    </div>
                </div>

                <!-- Cubo 2 -->
                <div class="cube-card d-flex flex-row align-items-center shadow-lg rounded-4 overflow-hidden"
                    style="background: white; color: #6a0dad; max-width: 900px;">
                    <img src="/FINAL/public/img/categoria2.jpg" alt="Thriller" class="img-fluid"
                        style="width: 200px; height: 100%; object-fit: cover;">
                    <div class="p-4 flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="fs-3 me-2">🕵️‍♀️</div>
                            <h5 class="fw-bold mb-0">Thriller y Misterio</h5>
                        </div>
                        <p class="mb-3">Suspenso, investigaciones, giros inesperados y tensión constante.</p>
                        <a href="index.php?c=LibroController&a=porGenero&genero=<?= urlencode($cat['nombre']) ?>"
                            class="btn btn-purple btn-sm fw-bold">Ver más del género</a>
                    </div>
                </div>

                <!-- Cubo 3 -->
                <div class="cube-card d-flex flex-row align-items-center shadow-lg rounded-4 overflow-hidden"
                    style="background: white; color: #6a0dad; max-width: 900px;">
                    <img src="/FINAL/public/img/categoria3.jpg" alt="Romance" class="img-fluid"
                        style="width: 200px; height: 100%; object-fit: cover;">
                    <div class="p-4 flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="fs-3 me-2">💖</div>
                            <h5 class="fw-bold mb-0">Romance</h5>
                        </div>
                        <p class="mb-3">Historias de amor, emociones intensas y conexiones inolvidables.</p>
                        <a href="/genero/romance" class="btn btn-purple btn-sm fw-bold">Ver más del género</a>
                    </div>
                </div>

                <!-- Cubo 4 -->
                <div class="cube-card d-flex flex-row align-items-center shadow-lg rounded-4 overflow-hidden"
                    style="background: white; color: #6a0dad; max-width: 900px;">
                    <img src="/FINAL/public/img/categoria4.jpg" alt="Clásicos" class="img-fluid"
                        style="width: 200px; height: 100%; object-fit: cover;">
                    <div class="p-4 flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="fs-3 me-2">📜</div>
                            <h5 class="fw-bold mb-0">Literatura Clásica</h5>
                        </div>
                        <p class="mb-3">Obras atemporales que marcaron la historia de la literatura.</p>
                        <a href="/genero/clasicos" class="btn btn-purple btn-sm fw-bold">Ver más del género</a>
                    </div>
                </div>

            </div>
        </div>
        
        
    </section>

    <!-- 
seccion de actividades recientes -->
    <section class="py-5 bg-light position-relative">
        <div class="container">
            <h2 class="text-center mb-4 text-purple">Actividad Reciente</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-lg border-0 bg-gradient-purple text-black">
                        <div class="card-body">
                            <h5 class="card-title">📚 Libro subido</h5>
                            <p class="card-text">"El nombre del viento"</p>
                            <small>Hace 2 horas</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-lg border-0 bg-gradient-purple text-black">
                        <div class="card-body">
                            <h5 class="card-title">🔄 Intercambio realizado</h5>
                            <p class="card-text">Con usuario: @lectora23</p>
                            <small>Hace 1 día</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- resumen de actividad seccion  -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-4 text-purple">Resumen de Actividad</h2>
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow bg-gradient-light-purple">
                        <div class="card-body">
                            <h5>🛒 Compras</h5>
                            <p class="fs-4 fw-bold">12 libros</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow bg-gradient-light-purple">
                        <div class="card-body">
                            <h5>🔁 Intercambios</h5>
                            <p class="fs-4 fw-bold">8 completados</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow bg-gradient-light-purple">
                        <div class="card-body">
                            <h5>📦 Pendientes</h5>
                            <p class="fs-4 fw-bold">2 en proceso</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- seccion de Novedades -->
    <section class="py-5 bg-gradient-light-purple position-relative">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Imagen destacada -->
                <div class="col-md-6">
                    <div class="position-relative">
                        <img src="/FINAL/public/img/6.jpg" class="img-fluid rounded-4 shadow-lg" alt="Libro destacado">
                        <div class="position-absolute top-0 start-0 bg-purple text-white px-3 py-1 rounded-end">📣
                            Novedad</div>
                    </div>
                </div>

                <!-- Texto y acción -->
                <div class="col-md-6">
                    <h2 id="lanzamientos" class="fw-bold text-purple mb-3">✨ Lanzamiento exclusivo</h2>
                    <h4 class="mb-3">La joya literaria del año</h4>
                    <p class="text-muted">Una memoria cruda y poética sobre viajes, identidad y los encuentros que nos
                        marcan para siempre.</p>
                    <p class="text-muted">Desde un hostel en Marruecos, Alina K. documenta 3 años de viajes en cuadernos
                        manchados de té y polvo del desierto. Un libro que desarma el alma y rearma el significado de
                        "pertenecer".</p>
                    <a href="#" class="btn btn-purple btn-lg mt-3 px-4">📖 Comprar ahora</a>
                </div>
            </div>
        </div>
    </section>


    <!-- nuestra seleccion seccion -->
    <section class="py-5 bg-gradient-light-purple" id="seleccion">
        <div class="container">
            <h2 class="text-center text-purple fw-bold mb-4 text-shadow">🌟 Nuestra Selección</h2>

            <!-- Galería horizontal -->
            <div class="overflow-auto pb-3">
                <div class="d-flex flex-nowrap gap-4 px-2" style="scroll-snap-type: x mandatory;">

                    <!-- Libro 1 -->
                    <div class="card book-card shadow-lg border-0" style="min-width: 200px; scroll-snap-align: start;">
                        <img src="/FINAL/public/img/intercambia1.jpg" class="card-img-top rounded-top"
                            alt="El Principito">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">El Principito (Pop-Up)</h6>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-purple btn-sm">Intercambiar</a>
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-outline-dark btn-sm">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Libro 2 -->
                    <div class="card book-card shadow-lg border-0" style="min-width: 200px; scroll-snap-align: start;">
                        <img src="/FINAL/public/img/intercambia2.jpg" class="card-img-top rounded-top" alt="Alice">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">Alice in Wonderland</h6>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-purple btn-sm">Intercambiar</a>
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-outline-dark btn-sm">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Libro 3 -->
                    <div class="card book-card shadow-lg border-0" style="min-width: 200px; scroll-snap-align: start;">
                        <img src="/FINAL/public/img/intercambia3.jpg" class="card-img-top rounded-top" alt="The Raven">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">The Raven (Ilustrado)</h6>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-purple btn-sm">Intercambiar</a>
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-outline-dark btn-sm">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <!-- Libro 1 -->
                    <div class="card book-card shadow-lg border-0" style="min-width: 200px; scroll-snap-align: start;">
                        <img src="/FINAL/public/img/intercambia1.jpg" class="card-img-top rounded-top"
                            alt="El Principito">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">El Principito (Pop-Up)</h6>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-purple btn-sm">Intercambiar</a>
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-outline-dark btn-sm">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Libro 2 -->
                    <div class="card book-card shadow-lg border-0" style="min-width: 200px; scroll-snap-align: start;">
                        <img src="/FINAL/public/img/intercambia2.jpg" class="card-img-top rounded-top" alt="Alice">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">Alice in Wonderland</h6>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-purple btn-sm">Intercambiar</a>
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-outline-dark btn-sm">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <!-- Libro 1 -->
                    <div class="card book-card shadow-lg border-0" style="min-width: 200px; scroll-snap-align: start;">
                        <img src="/FINAL/public/img/intercambia1.jpg" class="card-img-top rounded-top"
                            alt="El Principito">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">El Principito (Pop-Up)</h6>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-purple btn-sm">Intercambiar</a>
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-outline-dark btn-sm">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Libro 2 -->
                    <div class="card book-card shadow-lg border-0" style="min-width: 200px; scroll-snap-align: start;">
                        <img src="/FINAL/public/img/intercambia2.jpg" class="card-img-top rounded-top" alt="Alice">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">Alice in Wonderland</h6>
                            <div class="d-grid gap-2">
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-purple btn-sm">Intercambiar</a>
                                <a href="index.php?c=UsuarioController&a=login"
                                    class="btn btn-outline-dark btn-sm">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Agrega más libros aquí con el mismo formato -->

                </div>
            </div>
        </div>
    </section>

    <!-- 📝 Bloque de reseñas del usuario -->
    <div class="mt-5">
        <h4>📝 Mis últimas reseñas</h4>
        <?php if (!empty($mis_reseñas)): ?>
            <?php foreach ($mis_reseñas as $r): ?>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <strong><?= htmlspecialchars($r['titulo_libro']) ?></strong><br>
                        <span
                            class="text-warning"><?= str_repeat('★', $r['calificacion']) ?><?= str_repeat('☆', 5 - $r['calificacion']) ?></span>
                        <p class="mt-2"><?= nl2br(htmlspecialchars($r['comentario'])) ?></p>
                        <small class="text-muted"><?= date("d M Y", strtotime($r['fecha'])) ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Aún no has dejado reseñas.</p>
        <?php endif; ?>
    </div>
    </div>
    <!-- seccion de autores -->

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-purple fw-bold mb-5 text-shadow">🇨🇴 Autores Colombianos</h2>

            <!-- Autor 1: Gabriel García Márquez -->
            <div class="card mb-4 shadow-lg border-0 text-white"
                style="background-image: url('/FINAL/public/img/top1.png'); background-size: cover; background-position: center;">
                <div class="card-body bg-dark bg-opacity-50 rounded-4 p-4">
                    <h4 class="fw-bold">Gabriel García Márquez</h4>
                    <p class="mb-2">📘 Obras destacadas:</p>
                    <ul class="list-unstyled">
                        <li>🌪️ <strong>Cien años de soledad</strong> – Realismo mágico en Macondo</li>
                        <li>💔 <strong>El amor en los tiempos del cólera</strong> – Amor eterno y paciente</li>
                        <li>🕊️ <strong>Crónica de una muerte anunciada</strong> – Tragedia inevitable</li>
                    </ul>
                    <p class="mt-3">📰 Última novedad: reedición ilustrada de <em>El coronel no tiene quien le
                            escriba</em></p>
                </div>
            </div>

            <!-- Autor 2: Laura Restrepo -->
            <div class="card mb-4 shadow-lg border-0 text-white"
                style="background-image: url('/FINAL/public/img/top2.png'); background-size: cover; background-position: center;">
                <div class="card-body bg-dark bg-opacity-50 rounded-4 p-4">
                    <h4 class="fw-bold">Laura Restrepo</h4>
                    <p class="mb-2">📘 Obras destacadas:</p>
                    <ul class="list-unstyled">
                        <li>🧠 <strong>Delirio</strong> – Psicología, política y amor</li>
                        <li>🕊️ <strong>La multitud errante</strong> – Desplazamiento y memoria</li>
                        <li>🌎 <strong>Hot Sur</strong> – Migración y justicia</li>
                    </ul>
                    <p class="mt-3">📰 Última novedad: charla en la FIL Bogotá sobre literatura y resistencia</p>
                </div>
            </div>

            <!-- Autor 3: William Ospina -->
            <div class="card mb-4 shadow-lg border-0 text-white"
                style="background-image: url('/FINAL/public/img/top3.png'); background-size: cover; background-position: center;">
                <div class="card-body bg-dark bg-opacity-50 rounded-4 p-4">
                    <h4 class="fw-bold">William Ospina</h4>
                    <p class="mb-2">📘 Obras destacadas:</p>
                    <ul class="list-unstyled">
                        <li>🔥 <strong>Ursúa</strong> – Conquista y barbarie</li>
                        <li>🌿 <strong>El país de la canela</strong> – Viaje por el Amazonas</li>
                        <li>🧭 <strong>La serpiente sin ojos</strong> – Mito y exploración</li>
                    </ul>
                    <p class="mt-3">📰 Última novedad: ensayo sobre Colombia postconflicto en <em>El Espectador</em></p>
                </div>
            </div>

        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <h2 id="blog" class="text-center text-purple fw-bold mb-5 text-shadow">📝 Blogs y Noticias Literarias</h2>
            <div class="row g-4 justify-content-center">

                <!-- Blog 1 -->
                <div class="col-md-4">
                    <div class="card blog-card border-0 shadow-lg text-center">
                        <div class="circle-img mx-auto mt-3">
                            <img src="/FINAL/public/img/noticia1.jpg" class="img-fluid rounded-circle" alt="Blog 1">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-purple fw-bold">¿Por qué leemos terror?</h6>
                            <p class="card-text small">Exploramos cómo el miedo puede ser terapéutico y por qué Stephen
                                King sigue siendo el maestro del género.</p>
                            <a href="#" class="btn btn-outline-purple btn-sm">Leer más</a>
                        </div>
                    </div>
                </div>

                <!-- Blog 2 -->
                <div class="col-md-4">
                    <div class="card blog-card border-0 shadow-lg text-center">
                        <div class="circle-img mx-auto mt-3">
                            <img src="/FINAL/public/img/noticia2.jpg" class="img-fluid rounded-circle" alt="Blog 2">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-purple fw-bold">Libros que inspiran series</h6>
                            <p class="card-text small">De <em>La Torre Oscura</em> a <em>From</em>, cómo las novelas se
                                transforman en éxitos televisivos.</p>
                            <a href="#" class="btn btn-outline-purple btn-sm">Leer más</a>
                        </div>
                    </div>
                </div>

                <!-- Blog 3 -->
                <div class="col-md-4">
                    <div class="card blog-card border-0 shadow-lg text-center">
                        <div class="circle-img mx-auto mt-3">
                            <img src="/FINAL/public/img/noticia3.jpg" class="img-fluid rounded-circle" alt="Blog 3">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-purple fw-bold">Recomendaciones para lectores nuevos</h6>
                            <p class="card-text small">¿Nunca has leído a Stephen King? Aquí te decimos por dónde
                                empezar según tu estilo.</p>
                            <a href="#" class="btn btn-outline-purple btn-sm">Leer más</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- seccion footer final final -->

    <footer id="contacto" class="bg-dark text-white py-5">
        <div class="container text-center">
            <h5 class="mb-3">📚 LibrosWap — Compartiendo conocimiento desde 2025</h5>
            <p class="mb-3">Diseñado con 💜 LIBROS WAP</p>

            <div class="d-flex justify-content-center gap-4 mb-3">
                <a href="#" class="text-white text-decoration-none">Inicio</a>
                <a href="#" class="text-white text-decoration-none">Libros</a>
                <a href="#" class="text-white text-decoration-none">Blog</a>
                <a href="#" class="text-white text-decoration-none">Contacto</a>
            </div>

            <div class="d-flex justify-content-center gap-3 mt-3">
                <i class="bi bi-facebook fs-5"></i>
                <i class="bi bi-instagram fs-5"></i>
                <i class="bi bi-twitter fs-5"></i>
            </div>

            <p class="mt-4 small">© 2025 LibrosWap. Todos los derechos reservados.</p>
        </div>
    </footer>

 <!--  Bootstrap JS al final -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
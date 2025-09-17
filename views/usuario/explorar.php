<!-- Estilos para explorar libros -->
<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --purple: #6a11cb;
        --purple-light: #9c88ff;
    }

    .explorar-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 90vh;
        padding: 40px 0;
    }

    .hero-explorar {
        background: var(--gradient-primary);
        color: white;
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 40px;
    }

    .hero-explorar::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('/FINAL/public/img/adminside.png') center/cover;
        opacity: 0.1;
    }

    .hero-explorar * {
        position: relative;
        z-index: 2;
    }

    .section-title-epic {
        font-size: 3rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 1rem;
    }

    .stats-row {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .stat-item {
        text-align: center;
        margin-bottom: 20px;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--gradient-primary);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 5px;
    }

    .filters-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .filter-section {
        margin-bottom: 25px;
    }

    .filter-section label {
        font-weight: 600;
        color: var(--purple);
        margin-bottom: 10px;
        font-size: 1.1rem;
    }

    .form-control,
    .form-select {
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 12px 20px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--purple);
        box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        background: white;
        outline: none;
    }

    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }

    .filter-btn {
        background: rgba(106, 17, 203, 0.1);
        border: 2px solid var(--purple-light);
        color: var(--purple);
        border-radius: 25px;
        padding: 8px 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: var(--purple);
        color: white;
        transform: translateY(-2px);
    }

    .explorar-row {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .explorar-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        animation: slideInUp 0.6s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .explorar-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(106, 17, 203, 0.2);
    }

    .explorar-card.show {
        opacity: 1;
        transform: translateY(0);
    }

    .explorar-card .card-img-top {
        height: 250px;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .explorar-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .explorar-card .card-body {
        padding: 25px;
        display: flex;
        flex-direction: column;
        min-height: 280px;
    }

    .explorar-card .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--purple);
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .explorar-card .card-text {
        color: #666;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .price-badge {
        background: var(--gradient-secondary);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 1.1rem;
        display: inline-block;
        margin: 10px 0;
        box-shadow: 0 5px 15px rgba(240, 147, 251, 0.3);
    }

    .status-badge {
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-nuevo {
        background: #d4edda;
        color: #155724;
    }

    .status-usado {
        background: #fff3cd;
        color: #856404;
    }

    .btn-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: auto;
    }

    .btn-epic {
        border-radius: 15px;
        padding: 10px 15px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
    }

    .btn-primary-epic {
        background: var(--gradient-primary);
        color: white;
        border: none;
    }

    .btn-outline-epic {
        background: rgba(106, 17, 203, 0.1);
        color: var(--purple);
        border: 2px solid var(--purple-light);
    }

    .btn-epic:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(106, 17, 203, 0.3);
        color: white;
    }

    .btn-outline-epic:hover {
        background: var(--purple);
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--purple-light);
        margin-bottom: 20px;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .section-title-epic {
            font-size: 2rem;
        }

        .explorar-row {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .filter-buttons {
            justify-content: center;
        }
    }
</style>

<div class="explorar-container">
    <div class="container mt-4">

        <!-- Hero Section -->
        <div class="hero-explorar">
            <div class="text-center">
                <h1 class="section-title-epic">
                    🔍 Explorar Libros
                </h1>
                <p class="lead">Descubre tu próxima gran lectura en nuestra biblioteca</p>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="stats-row">
            <div class="row">
                <div class="col-md-3 stat-item">
                    <div class="stat-number"><?= count($libros) ?></div>
                    <div>Libros Disponibles</div>
                </div>
                <div class="col-md-3 stat-item">
                    <div class="stat-number">
                        <?php
                        $generos_unicos = [];
                        foreach ($libros as $libro) {
                            if (!empty($libro['genero'])) {
                                $generos_unicos[$libro['genero']] = true;
                            }
                        }
                        echo count($generos_unicos);
                        ?>
                    </div>
                    <div>Géneros</div>
                </div>
                <div class="col-md-3 stat-item">
                    <div class="stat-number">
                        <?php
                        $autores_unicos = [];
                        foreach ($libros as $libro) {
                            if (!empty($libro['autor'])) {
                                $autores_unicos[$libro['autor']] = true;
                            }
                        }
                        echo count($autores_unicos);
                        ?>
                    </div>
                    <div>Autores</div>
                </div>
                <div class="col-md-3 stat-item">
                    <div class="stat-number">
                        <?php
                        $nuevos = 0;
                        foreach ($libros as $libro) {
                            if (($libro['estado'] ?? '') === 'nuevo') {
                                $nuevos++;
                            }
                        }
                        echo $nuevos;
                        ?>
                    </div>
                    <div>Libros Nuevos</div>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="filters-container">
            <h4 class="text-center mb-4" style="color: var(--purple); font-weight: 700;">
                🎯 Filtrar tu búsqueda
            </h4>

            <div class="row">
                <div class="col-md-6">
                    <div class="filter-section">
                        <label>Buscar por título o autor</label>
                        <input type="text" id="search-input" class="form-control" placeholder="Escribe para buscar...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="filter-section">
                        <label>Filtrar por género</label>
                        <select id="genre-filter" class="form-select">
                            <option value="">Todos los géneros</option>
                            <?php
                            $generos = [];
                            foreach ($libros as $libro) {
                                if (!empty($libro['genero']) && !in_array($libro['genero'], $generos)) {
                                    $generos[] = $libro['genero'];
                                }
                            }
                            sort($generos);
                            foreach ($generos as $genero): ?>
                                <option value="<?= htmlspecialchars($genero) ?>">
                                    <?= htmlspecialchars($genero) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="filter-section">
                <label>Estado del libro</label>
                <div class="filter-buttons">
                    <button class="filter-btn active" onclick="filterByStatus('all')">Todos</button>
                    <button class="filter-btn" onclick="filterByStatus('nuevo')">Nuevos</button>
                    <button class="filter-btn" onclick="filterByStatus('usado')">Usados</button>
                </div>
            </div>
        </div>

        <!-- Libros -->
        <div class="explorar-row" id="books-container">
            <?php if (!empty($libros)): ?>
                <?php foreach ($libros as $index => $libro): ?>
                    <div class="explorar-card libro-item" data-title="<?= strtolower(htmlspecialchars($libro['titulo'])) ?>"
                        data-author="<?= strtolower(htmlspecialchars($libro['autor'])) ?>"
                        data-genre="<?= htmlspecialchars($libro['genero'] ?? '') ?>"
                        data-status="<?= htmlspecialchars($libro['estado'] ?? '') ?>"
                        style="animation-delay: <?= $index * 0.1 ?>s;">

                        <img src="public/img/libros/<?= $libro['imagen'] ?>" class="card-img-top" alt="Portada">

                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>

                            <p class="card-text">
                                <strong>📚 Autor:</strong> <?= htmlspecialchars($libro['autor']) ?>
                            </p>

                            <p class="card-text">
                                <strong>🎭 Género:</strong> <?= htmlspecialchars($libro['genero']) ?>
                            </p>

                            <p class="card-text">
                                <strong>👤 Publicado por:</strong> <?= htmlspecialchars($libro['nombre']) ?>
                            </p>

                            <?php if (!empty($libro['precio'])): ?>
                                <div class="price-badge">
                                    💰 $<?= number_format($libro['precio'], 2) ?>
                                </div>
                            <?php endif; ?>

                            <span class="status-badge status-<?= $libro['estado'] ?? 'usado' ?>">
                                <?= ucfirst($libro['estado'] ?? 'Sin estado') ?>
                            </span>

                            <div class="btn-group">
                                <a href="index.php?c=DetalleLibroController&a=verDetalle&id=<?= $libro['id'] ?>"
                                    class="btn-epic btn-primary-epic">
                                    📖 Ver detalle
                                </a>
                                <a href="index.php?c=IntercambioController&a=solicitar&id=<?= $libro['id'] ?>"
                                    class="btn-epic btn-outline-epic">
                                    🔄 Solicitar intercambio
                                </a>
                                <?php if (!empty($libro['precio'])): ?>
                                    <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?>"
                                        class="btn-epic btn-primary-epic">
                                        🛒 Agregar al carrito
                                    </a>
                                <?php endif; ?>
                                <a href="index.php?c=ResenaController&a=formulario&id=<?= $libro['id'] ?>&titulo=<?= urlencode($libro['titulo']) ?>"
                                    class="btn-epic btn-outline-epic">
                                    ✍️ Escribir reseña
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <i class="bi bi-book"></i>
                    <h3 style="color: var(--purple);">No hay libros disponibles</h3>
                    <p class="text-muted">Aún no se han publicado libros en la plataforma.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    // Animaciones de entrada
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.explorar-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('show');
            }, index * 100);
        });
    });

    // Búsqueda en tiempo real
    document.getElementById('search-input').addEventListener('input', function () {
        filterBooks();
    });

    document.getElementById('genre-filter').addEventListener('change', function () {
        filterBooks();
    });

    function filterByStatus(status) {
        // Actualizar botones activos
        document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // Aplicar filtro
        filterBooks();
    }

    function filterBooks() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        const selectedGenre = document.getElementById('genre-filter').value;
        const activeStatusBtn = document.querySelector('.filter-btn.active');
        const selectedStatus = activeStatusBtn ? activeStatusBtn.textContent.toLowerCase() : 'todos';

        const books = document.querySelectorAll('.libro-item');
        let visibleCount = 0;

        books.forEach(book => {
            const title = book.dataset.title;
            const author = book.dataset.author;
            const genre = book.dataset.genre;
            const status = book.dataset.status;

            let show = true;

            // Filtro de búsqueda
            if (searchTerm && !title.includes(searchTerm) && !author.includes(searchTerm)) {
                show = false;
            }

            // Filtro de género (solo aplicar si no hay género pre-filtrado por URL)
            const urlParams = new URLSearchParams(window.location.search);
            const generoURL = urlParams.get('genero');

            if (!generoURL && selectedGenre && genre !== selectedGenre) {
                show = false;
            }

            // Filtro de estado
            if (selectedStatus !== 'todos' && status !== selectedStatus) {
                show = false;
            }

            if (show) {
                book.style.display = 'block';
                visibleCount++;
            } else {
                book.style.display = 'none';
            }
        });

        // Mostrar mensaje si no hay resultados
        const container = document.getElementById('books-container');
        let noResults = container.querySelector('.no-results');

        if (visibleCount === 0 && books.length > 0) {
            if (!noResults) {
                noResults = document.createElement('div');
                noResults.className = 'no-results empty-state';
                noResults.innerHTML = `
                <i class="bi bi-search"></i>
                <h3 style="color: var(--purple);">No se encontraron resultados</h3>
                <p class="text-muted">Intenta ajustar tus filtros de búsqueda.</p>
            `;
                container.appendChild(noResults);
            }
            noResults.style.display = 'block';
        } else if (noResults) {
            noResults.style.display = 'none';
        }
    }
</script>
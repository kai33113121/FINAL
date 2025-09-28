<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Explorar Libros - LibrosWap</title>
   <link rel="stylesheet" href="public/css/explorar.css">
</head>
<body>
    <div class="explorar-container">
        <div class="container">
            <div class="hero-section">
                <h1 class="hero-title">
                    <i class="fas fa-compass"></i> Explora Libros
                </h1>
                <p class="hero-subtitle">Descubre mundos infinitos a través de nuestra colección de libros disponibles</p>
            </div>
            <div class="stats-bar">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number"><?= count($libros) ?></div>
                            <div class="stat-label">Libros Total</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">
                                <?php
                                $generos_disponibles = [];
                                foreach ($libros as $libro) {
                                    if (!empty($libro['genero'])) {
                                        $generos_disponibles[$libro['genero']] = true;
                                    }
                                }
                                echo count($generos_disponibles);
                                ?>
                            </div>
                            <div class="stat-label">Géneros</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
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
                            <div class="stat-label">Autores</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">
                                <?php
                                $disponibles = 0;
                                foreach ($libros as $libro) {
                                    if (($libro['estado'] ?? '') === 'nuevo') {
                                        $disponibles++;
                                    }
                                }
                                echo $disponibles;
                                ?>
                            </div>
                            <div class="stat-label">Nuevos</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-section">
                <h4 class="text-center mb-4" style="color: var(--purple); font-weight: 700;">
                    <i class="fas fa-search"></i> Encuentra tu próxima lectura
                </h4>
                <input type="text" id="libro-search" class="form-control search-input" 
                       placeholder="Buscar por título, autor o género...">
            </div>
            <div class="filter-section">
                <h5 style="color: var(--purple); font-weight: 700; margin-bottom: 15px;">
                    <i class="fas fa-filter"></i> Filtros rápidos
                </h5>
                <div class="filter-chips">
                    <button class="filter-chip" onclick="filtrarPor('todos')">Todos</button>
                    <button class="filter-chip" onclick="filtrarPor('nuevo')">Nuevos</button>
                    <button class="filter-chip" onclick="filtrarPor('usado')">Usados</button>
                    
                </div>
            </div>
            <div class="libros-grid" id="libros-container">
                <?php if (!empty($libros)): ?>
                    <?php foreach ($libros as $index => $libro): ?>
                        <div class="libro-card libro-item" 
                             data-titulo="<?= strtolower($libro['titulo']) ?>"
                             data-autor="<?= strtolower($libro['autor']) ?>"
                             data-genero="<?= strtolower($libro['genero'] ?? '') ?>"
                             data-estado="<?= strtolower($libro['estado'] ?? '') ?>"
                             data-origen="<?= strtolower($libro['origen'] ?? '') ?>"
                             style="animation-delay: <?= $index * 0.1 ?>s;">
                            <img src="public/img/libros/<?php 
                                if ($libro['tabla_origen'] === 'libros_venta') {
                                    echo htmlspecialchars($libro['imagen']);
                                } else {
                                    echo '' . htmlspecialchars($libro['imagen']);
                                }
                            ?>" class="libro-image" alt="<?= htmlspecialchars($libro['titulo']) ?>">
                            <div class="libro-content">
                                <h3 class="libro-title"><?= htmlspecialchars($libro['titulo']) ?></h3>
                                <p class="libro-author">
                                    <i class="fas fa-user"></i> <?= htmlspecialchars($libro['autor']) ?>
                                </p>
                                <div class="libro-meta">
                                    <?php if (!empty($libro['genero'])): ?>
                                        <span class="meta-badge badge-genero">
                                            <i class="fas fa-tag"></i> <?= htmlspecialchars($libro['genero']) ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($libro['estado'])): ?>
                                        <span class="meta-badge badge-estado">
                                            <i class="fas fa-star"></i> <?= ucfirst($libro['estado']) ?>
                                        </span>
                                    <?php endif; ?>
                                    <span class="meta-badge badge-usuario">
                                        <i class="fas fa-user-circle"></i> <?= htmlspecialchars($libro['nombre']) ?>
                                    </span>
                                    <span class="meta-badge badge-origen">
                                        <?php if ($libro['tabla_origen'] === 'libros_venta'): ?>
                                            <i class="fas fa-users"></i> Usuario
                                        <?php else: ?>
                                            <i class="fas fa-store"></i> LibrosWap
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <?php if (!empty($libro['descripcion'])): ?>
                                    <p class="libro-descripcion"><?= htmlspecialchars($libro['descripcion']) ?></p>
                                <?php endif; ?>
                                <?php if (!empty($libro['precio'])): ?>
                                    <div class="libro-precio">
                                        $<?= number_format($libro['precio'], 0, ',', '.') ?>
                                    </div>
                                <?php endif; ?>
                                <div class="libro-actions">
                                    <a href="index.php?c=DetalleLibroController&a=verDetalle&id=<?= $libro['id'] ?>&tabla=<?= $libro['tabla_origen'] ?>" 
                                       class="action-btn btn-primary-custom">
                                        <i class="fas fa-eye"></i> Ver Detalle
                                    </a>
                                    <?php if ($libro['tabla_origen'] === 'libros_venta'): ?>
                                        <a href="index.php?c=IntercambioController&a=solicitar&id=<?= $libro['id'] ?>&tabla=<?= $libro['tabla_origen'] ?>" 
                                           class="action-btn btn-secondary-custom">
                                            <i class="fas fa-exchange-alt"></i> Intercambio
                                        </a>
                                        <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?>&tabla=<?= $libro['tabla_origen'] ?>" 
                                           class="action-btn btn-success-custom">
                                            <i class="fas fa-shopping-cart"></i> Al Carrito
                                        </a>
                                    <?php else: ?>
                                        <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?>&tabla=<?= $libro['tabla_origen'] ?>" 
                                           class="action-btn btn-success-custom">
                                            <i class="fas fa-shopping-cart"></i> Al Carrito
                                        </a>
                                    <?php endif; ?>
                                    <a href="index.php?c=ResenaController&a=formulario&id=<?= $libro['id'] ?>&titulo=<?= urlencode($libro['titulo']) ?>&tabla=<?= $libro['tabla_origen'] ?>" 
                                       class="action-btn btn-info-custom">
                                        <i class="fas fa-star"></i> Reseña
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-book-open empty-icon"></i>
                        <h3 style="color: var(--purple);">No hay libros disponibles</h3>
                        <p class="text-muted">Aún no hay libros publicados para explorar.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="public/js/explorar.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Libros Adquiridos - LibrosWap</title>
    <link rel="stylesheet" href="public/css/libros_adquiridos.css">
</head>
<body>
    <div class="biblioteca-container">
        <div class="container">
            <div class="hero-biblioteca">
                <div class="text-center">
                    <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">📚 Mi Biblioteca</h1>
                    <p class="lead">Todos los libros que has adquirido a través de compras e intercambios</p>
                </div>
            </div>
            <div class="stats-section">
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="stat-number"><?= count($librosAdquiridos) ?></div>
                            <div class="stat-label">Total Libros</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="stat-number">
                                <?php
                                $comprados = 0;
                                foreach ($librosAdquiridos as $libro) {
                                    if ($libro['tipo_adquisicion'] === 'compra') {
                                        $comprados++;
                                    }
                                }
                                echo $comprados;
                                ?>
                            </div>
                            <div class="stat-label">Comprados</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="stat-number">
                                <?php
                                $intercambiados = count($librosAdquiridos) - $comprados;
                                echo $intercambiados;
                                ?>
                            </div>
                            <div class="stat-label">Intercambiados</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="stat-number">
                                $<?php
                                $totalGastado = 0;
                                foreach ($librosAdquiridos as $libro) {
                                    if ($libro['tipo_adquisicion'] === 'compra') {
                                        $totalGastado += floatval($libro['precio']) * intval($libro['cantidad']);
                                    }
                                }
                                echo number_format($totalGastado, 0, ',', '.');
                                ?>
                            </div>
                            <div class="stat-label">Total Invertido</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-section">
                <h5 class="text-center mb-3" style="color: var(--purple); font-weight: 700;">
                    Filtrar por tipo de adquisición
                </h5>
                <div class="filter-buttons">
                    <button class="filter-btn active" onclick="filtrarPor('todos')">Todos</button>
                    <button class="filter-btn" onclick="filtrarPor('compra')">💰 Comprados</button>
                    <button class="filter-btn" onclick="filtrarPor('intercambio')">🔄 Intercambiados</button>
                </div>
            </div>
            <?php if (!empty($librosAdquiridos)): ?>
                <div class="libros-grid">
                    <?php foreach ($librosAdquiridos as $index => $libro): ?>
                        <div class="libro-card libro-item" 
                             data-tipo="<?= $libro['tipo_adquisicion'] ?>"
                             style="animation-delay: <?= $index * 0.1 ?>s;">
                            <img src="public/img/libros/<?= htmlspecialchars($libro['imagen'] ?? 'default.jpg') ?>" 
                                 class="libro-imagen" 
                                 alt="<?= htmlspecialchars($libro['titulo']) ?>"
                                 onerror="this.src='https://via.placeholder.com/350x200/667eea/ffffff?text=📚'">
                            <div class="libro-content">
                                <h3 class="libro-titulo"><?= htmlspecialchars($libro['titulo']) ?></h3>
                                <p class="libro-autor">por <?= htmlspecialchars($libro['autor']) ?></p>
                                <div class="libro-meta">
                                    <span class="meta-badge badge-<?= $libro['tipo_adquisicion'] ?>">
                                        <?php if ($libro['tipo_adquisicion'] === 'compra'): ?>
                                            💰 Comprado
                                        <?php else: ?>
                                            🔄 Intercambiado
                                        <?php endif; ?>
                                    </span>
                                    <?php if (!empty($libro['genero'])): ?>
                                        <span class="meta-badge badge-genero">
                                            <?= htmlspecialchars($libro['genero']) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="acquisition-info">
                                    <div class="acquisition-details">
                                        <div>
                                            <strong>Adquirido:</strong><br>
                                            <span class="acquisition-date">
                                                <?= date('d M Y', strtotime($libro['fecha_adquisicion'])) ?>
                                            </span>
                                        </div>
                                        <div class="text-end">
                                            <?php if ($libro['tipo_adquisicion'] === 'compra'): ?>
                                                <strong>Precio:</strong><br>
                                                <span class="acquisition-price">
                                                    $<?= number_format($libro['precio'], 0, ',', '.') ?>
                                                </span>
                                            <?php else: ?>
                                                <strong>De:</strong><br>
                                                <span class="acquisition-price">
                                                    <?= htmlspecialchars($libro['vendedor']) ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="action-buttons">
                                    <a href="index.php?c=DetalleLibroController&a=verDetalle&id=<?= $libro['libro_id'] ?>&tabla=<?= $libro['tabla_origen'] ?>" 
                                       class="action-btn btn-detalle">
                                        👁️ Ver Detalle
                                    </a>
                                    <a href="index.php?c=ResenaController&a=formulario&id=<?= $libro['libro_id'] ?>&titulo=<?= urlencode($libro['titulo']) ?>&tabla=<?= $libro['tabla_origen'] ?>" 
                                       class="action-btn btn-resena">
                                        ⭐ Reseñar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-book-open"></i>
                    <h3 style="color: var(--purple);">Aún no tienes libros en tu biblioteca</h3>
                    <p>Comienza a adquirir libros a través de compras o intercambios</p>
                    <div class="mt-4">
                        <a href="index.php?c=LibroController&a=explorar" 
                           class="btn" 
                           style="background: var(--gradient-primary); color: white; border-radius: 25px; padding: 15px 30px; text-decoration: none; margin-right: 10px;">
                            🛒 Explorar Libros
                        </a>
                        <a href="index.php?c=IntercambioController&a=misIntercambios" 
                           class="btn" 
                           style="background: var(--gradient-tertiary); color: white; border-radius: 25px; padding: 15px 30px; text-decoration: none;">
                            🔄 Mis Intercambios
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script>
        function filtrarPor(tipo) {
            const libros = document.querySelectorAll('.libro-item');
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            libros.forEach(libro => {
                if (tipo === 'todos' || libro.dataset.tipo === tipo) {
                    libro.style.display = 'block';
                    libro.style.animation = 'slideInUp 0.3s ease';
                } else {
                    libro.style.display = 'none';
                }
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.libro-item');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                }, index * 100);
            });
        });
    </script>
</body>
</html>
<!-- Estilos para mis compras -->
<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --gradient-success: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
        --purple: #6a11cb;
        --purple-light: #9c88ff;
    }

    .compras-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 90vh;
        padding: 40px 0;
    }

    .hero-compras {
        background: var(--gradient-primary);
        color: white;
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 40px;
    }

    .hero-compras::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('/FINAL/public/img/adminside.png') center/cover;
        opacity: 0.1;
    }

    .hero-compras * {
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

    .compras-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 25px;
        margin-top: 30px;
    }

    .compra-card {
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

    .compra-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(106, 17, 203, 0.2);
    }

    .compra-card.show {
        opacity: 1;
        transform: translateY(0);
    }

    .compra-header {
        background: var(--gradient-tertiary);
        color: white;
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .compra-id {
        font-size: 1.2rem;
        font-weight: 700;
    }

    .compra-fecha {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .compra-body {
        padding: 25px;
    }

    .compra-resumen {
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 20px;
        align-items: center;
        margin-bottom: 20px;
    }

    .libros-info {
        display: flex;
        flex-direction: column;
    }

    .libros-titulos {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--purple);
        margin-bottom: 5px;
        line-height: 1.4;
    }

    .libros-cantidad {
        font-size: 0.9rem;
        color: #666;
    }

    .compra-total {
        text-align: right;
    }

    .total-amount {
        font-size: 1.8rem;
        font-weight: 700;
        background: var(--gradient-secondary);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 5px;
    }

    .estado-badge {
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .estado-completado {
        background: var(--gradient-success);
        color: white;
    }

    .estado-pendiente {
        background: #fff3cd;
        color: #856404;
    }

    .estado-cancelado {
        background: #f8d7da;
        color: #721c24;
    }

    .compra-acciones {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid rgba(106, 17, 203, 0.1);
    }

    .btn-epic {
        border-radius: 15px;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
        display: inline-flex;
        align-items: center;
        gap: 8px;
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
        text-decoration: none;
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

    .filters-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .filter-btn {
        background: rgba(106, 17, 203, 0.1);
        border: 2px solid var(--purple-light);
        color: var(--purple);
        border-radius: 25px;
        padding: 10px 25px;
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

        .compra-resumen {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .compra-acciones {
            flex-direction: column;
        }
    }
</style>

<div class="compras-container">
    <div class="container mt-4">

        <!-- Hero Section -->
        <div class="hero-compras">
            <div class="text-center">
                <h1 class="section-title-epic">
                    📦 Mis Compras
                </h1>
                <p class="lead">Historial completo de todas tus adquisiciones</p>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="stats-row">
            <div class="row">
                <div class="col-md-3 stat-item">
                    <div class="stat-number"><?= count($compras) ?></div>
                    <div>Total Compras</div>
                </div>
                <div class="col-md-3 stat-item">
                    <div class="stat-number">
                        <?php
                        $completadas = 0;
                        foreach ($compras as $compra) {
                            if (($compra['estado'] ?? '') === 'completado') {
                                $completadas++;
                            }
                        }
                        echo $completadas;
                        ?>
                    </div>
                    <div>Completadas</div>
                </div>
                <div class="col-md-3 stat-item">
                    <div class="stat-number">
                        <?php
                        $total_gastado = 0;
                        foreach ($compras as $compra) {
                            if (($compra['estado'] ?? '') === 'completado') {
                                $total_gastado += $compra['total'] ?? 0;
                            }
                        }
                        echo '$' . number_format($total_gastado, 0);
                        ?>
                    </div>
                    <div>Total Gastado</div>
                </div>
                <div class="col-md-3 stat-item">
                    <div class="stat-number">
                        <?php
                        $total_libros = 0;
                        foreach ($compras as $compra) {
                            $total_libros += $compra['total_libros'] ?? 0;
                        }
                        echo $total_libros;
                        ?>
                    </div>
                    <div>Libros Comprados</div>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="filters-container">
            <h4 class="text-center mb-4" style="color: var(--purple); font-weight: 700;">
                🎯 Filtrar compras
            </h4>

            <div class="filter-buttons">
                <button class="filter-btn active" onclick="filterByStatus('all')">Todas</button>
                <button class="filter-btn" onclick="filterByStatus('completado')">Completadas</button>
                <button class="filter-btn" onclick="filterByStatus('pendiente')">Pendientes</button>
                <button class="filter-btn" onclick="filterByStatus('cancelado')">Canceladas</button>
            </div>
        </div>

        <!-- Lista de compras -->
        <div class="compras-grid" id="compras-container">
            <?php if (!empty($compras)): ?>
                <?php foreach ($compras as $index => $compra): ?>
                    <div class="compra-card compra-item" data-status="<?= htmlspecialchars($compra['estado'] ?? 'pendiente') ?>"
                        style="animation-delay: <?= $index * 0.1 ?>s;">

                        <!-- Header de la compra -->
                        <div class="compra-header">
                            <div>
                                <div class="compra-id">Compra #<?= $compra['id'] ?></div>
                                <div class="compra-fecha">
                                    📅 <?= date('d M Y - H:i', strtotime($compra['fecha_compra'])) ?>
                                </div>
                            </div>
                            <div class="estado-badge estado-<?= $compra['estado'] ?? 'pendiente' ?>">
                                <?= ucfirst($compra['estado'] ?? 'Pendiente') ?>
                            </div>
                        </div>

                        <!-- Cuerpo de la compra -->
                        <div class="compra-body">
                            <div class="compra-resumen">
                                <div class="libros-info">
                                    <div class="libros-titulos">
                                        <?= htmlspecialchars($compra['libros_comprados'] ?? 'Productos varios') ?>
                                    </div>
                                    <div class="libros-cantidad">
                                        📚 <?= $compra['total_libros'] ?? 1 ?>
                                        <?= ($compra['total_libros'] ?? 1) == 1 ? 'libro' : 'libros' ?>
                                    </div>
                                </div>

                                <div class="compra-total">
                                    <div class="total-amount">
                                        $<?= number_format($compra['total'], 2) ?>
                                    </div>
                                    <small class="text-muted">Total pagado</small>
                                </div>
                            </div>

                            <!-- Información adicional -->
                            <?php if (!empty($compra['stripe_payment_intent_id'])): ?>
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="bi bi-credit-card me-1"></i>
                                        Stripe: <?= substr($compra['stripe_payment_intent_id'], -8) ?>
                                    </small>
                                </div>
                            <?php endif; ?>

                            <!-- Acciones -->
                            <div class="compra-acciones">
                                <a href="index.php?c=CompraController&a=detalle&id=<?= $compra['id'] ?>"

                                    class="btn-epic btn-primary-epic">
                                    <i class="bi bi-eye"></i>
                                    Ver detalles
                                </a>

                                <?php if (($compra['estado'] ?? '') === 'completado'): ?>
                                    <a href="index.php?c=LibroController&a=explorar" class="btn-epic btn-outline-epic">
                                        <i class="bi bi-arrow-repeat"></i>
                                        Comprar de nuevo
                                    </a>
                                <?php endif; ?>

                                <a href="mailto:soporte@libroswap.com?subject=Consulta sobre compra #<?= $compra['id'] ?>"
                                    class="btn-epic btn-outline-epic">
                                    <i class="bi bi-headset"></i>
                                    Soporte
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <i class="bi bi-bag-x"></i>
                    <h3 style="color: var(--purple);">No tienes compras aún</h3>
                    <p class="text-muted">Explora nuestro catálogo y encuentra tu próximo libro favorito.</p>
                    <div class="mt-4">
                        <a href="index.php?c=LibroController&a=explorar" class="btn-epic btn-primary-epic">
                            <i class="bi bi-book"></i>
                            Explorar libros
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    // Animaciones de entrada
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.compra-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('show');
            }, index * 100);
        });
    });

    // Filtros por estado
    function filterByStatus(status) {
        // Actualizar botones activos
        document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        const compras = document.querySelectorAll('.compra-item');
        let visibleCount = 0;

        compras.forEach(compra => {
            const compraStatus = compra.dataset.status;

            if (status === 'all' || compraStatus === status) {
                compra.style.display = 'block';
                visibleCount++;
            } else {
                compra.style.display = 'none';
            }
        });

        // Mostrar mensaje si no hay resultados
        const container = document.getElementById('compras-container');
        let noResults = container.querySelector('.no-results');

        if (visibleCount === 0 && compras.length > 0) {
            if (!noResults) {
                noResults = document.createElement('div');
                noResults.className = 'no-results empty-state';
                noResults.innerHTML = `
                <i class="bi bi-search"></i>
                <h3 style="color: var(--purple);">No se encontraron compras</h3>
                <p class="text-muted">No tienes compras con este estado.</p>
            `;
                container.appendChild(noResults);
            }
            noResults.style.display = 'block';
        } else if (noResults) {
            noResults.style.display = 'none';
        }
    }
</script>
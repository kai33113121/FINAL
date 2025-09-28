<link rel="stylesheet" href="public/css/mis_compras.css">
<div class="compras-container">
    <div class="container mt-4">
        <div class="hero-compras">
            <div class="text-center">
                <h1 class="section-title-epic">
                    📦 Mis Compras
                </h1>
                <p class="lead">Historial completo de todas tus adquisiciones</p>
            </div>
        </div>
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
        <div class="compras-grid" id="compras-container">
            <?php if (!empty($compras)): ?>
                <?php foreach ($compras as $index => $compra): ?>
                    <div class="compra-card compra-item" data-status="<?= htmlspecialchars($compra['estado'] ?? 'pendiente') ?>"
                        style="animation-delay: <?= $index * 0.1 ?>s;">
                        <div class="compra-header">
                            <div>
                                <div class="compra-id">Compra #<?= $compra['id'] ?></div>
                                <div class="compra-fecha">
                                    📅 <?= date('d M Y - H:i', strtotime($compra['fecha'])) ?>
                                </div>
                            </div>
                            <div class="estado-badge estado-<?= $compra['estado'] ?? 'pendiente' ?>">
                                <?= ucfirst($compra['estado'] ?? 'Pendiente') ?>
                            </div>
                        </div>
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
                            <?php if (!empty($compra['stripe_payment_intent_id'])): ?>
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="bi bi-credit-card me-1"></i>
                                        Stripe: <?= substr($compra['stripe_payment_intent_id'], -8) ?>
                                    </small>
                                </div>
                            <?php endif; ?>
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
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.compra-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('show');
            }, index * 100);
        });
    });
    function filterByStatus(status) {
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
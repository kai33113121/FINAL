<link rel="stylesheet" href="public/css/detalle_compra.css">
<div class="detalle-container">
    <div class="container mt-4">
        <div class="hero-detalle">
            <h1 class="fw-bold mb-3">📄 Detalle de Compra</h1>
            <p class="lead">Información completa de tu pedido #<?= htmlspecialchars($compra['id'] ?? '') ?></p>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card-epic">
                    <h3 class="fw-bold text-purple mb-4">📚 Productos comprados</h3>
                    <?php if (!empty($detalles)): ?>
                        <?php foreach ($detalles as $detalle): ?>
                            <div class="libro-item">
                                <img src="public/img/libros/<?= htmlspecialchars($detalle['imagen'] ?? 'default.jpg') ?>" 
                                     alt="<?= htmlspecialchars($detalle['titulo'] ?? 'Libro') ?>" 
                                     class="libro-imagen"
                                     onerror="this.src='https://via.placeholder.com/80x100/667eea/ffffff?text=📚'">
                                <div class="libro-info">
                                    <div class="libro-titulo"><?= htmlspecialchars($detalle['titulo'] ?? 'Título no disponible') ?></div>
                                    <div class="libro-autor">por <?= htmlspecialchars($detalle['autor'] ?? 'Autor desconocido') ?></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted">Cantidad: <?= intval($detalle['cantidad'] ?? 1) ?></span>
                                        <div class="libro-precio">$<?= number_format($detalle['precio'] ?? 0, 2) ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted mt-3">No se encontraron detalles de esta compra.</p>
                            <small class="text-muted">Es posible que los detalles no estén disponibles para compras anteriores.</small>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-epic">
                    <div class="total-section">
                        <h4 class="fw-bold mb-2">💰 Total Pagado</h4>
                        <div class="total-amount">
                            $<?= number_format($compra['total'] ?? 0, 2) ?>
                        </div>
                        <small>Incluye todos los impuestos</small>
                    </div>
                </div>
                <div class="card-epic">
                    <h5 class="fw-bold text-purple mb-3">📋 Información del pedido</h5>
                    <div class="mb-3">
                        <strong>🆔 ID de compra:</strong><br>
                        <code>#<?= htmlspecialchars($compra['id'] ?? 'N/A') ?></code>
                    </div>
                    <div class="mb-3">
                        <strong>📊 Estado:</strong><br>
                        <span class="estado-badge estado-<?= $compra['estado'] ?? 'pendiente' ?>">
                            <?= ucfirst($compra['estado'] ?? 'Pendiente') ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <strong>📅 Fecha de compra:</strong><br>
                        <?= date('d M Y - H:i', strtotime($compra['fecha'] ?? 'now')) ?>
                    </div>
                    <div class="mb-3">
                        <strong>💳 Método de pago:</strong><br>
                        <i class="bi bi-credit-card me-2"></i>Stripe
                    </div>
                    <?php if (!empty($compra['stripe_payment_intent_id'])): ?>
                    <div class="mb-3">
                        <strong>🔗 ID de transacción:</strong><br>
                        <small class="text-muted"><?= substr($compra['stripe_payment_intent_id'], -12) ?></small>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="card-epic">
                    <h5 class="fw-bold text-purple mb-3">⚡ Acciones</h5>
                    <div class="d-grid gap-2">
                        <button class="btn-epic" disabled style="opacity: 0.6;">
    <i class="bi bi-download"></i>
    Función en desarrollo
</button>
                        <a href="index.php?c=CompraController&a=index" class="btn-epic btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Volver a mis compras
                        </a>
                        <a href="index.php?c=LibroController&a=explorar" class="btn-epic btn-secondary">
                            <i class="bi bi-book"></i>
                            Seguir comprando
                        </a>
                        <a href="mailto:soporte@libroswap.com?subject=Consulta sobre compra #<?= htmlspecialchars($compra['id'] ?? '') ?>" 
                           class="btn-epic btn-secondary">
                            <i class="bi bi-headset"></i>
                            Contactar soporte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

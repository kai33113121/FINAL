<link rel="stylesheet" href="public/css/carrito.css">
<div class="carrito-container">
    <div class="container mt-4">
        <div class="hero-carrito">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="section-title-epic">🛒 Mi Carrito de Compras</h1>
                        <p class="lead">Revisa tus libros seleccionados y procede con tu compra</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stats-mini">
                    <div class="fw-bold fs-4 text-purple"><?= count($items) ?></div>
                    <div>Libros en carrito</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-mini">
                    <div class="fw-bold fs-4 text-purple">
                        <?php
                        $total = 0;
                        foreach ($items as $item) {
                            $total += $item['precio'];
                        }
                        echo '$' . number_format($total, 2);
                        ?>
                    </div>
                    <div>Total a pagar</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-mini">
                    <div class="fw-bold fs-4 text-purple">100%</div>
                    <div>Seguro y confiable</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card-epic">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-purple mb-4">
                            <i class="bi bi-bag-check me-2"></i>
                            Tus Libros Seleccionados
                        </h4>
                        <?php if (!empty($items)): ?>
                            <?php foreach ($items as $item): ?>
                                <div class="item-card p-4 cart-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <?php if (!empty($item['imagen'])): ?>
                                                <img src="public/img/libros/<?= htmlspecialchars($item['imagen']) ?>" alt="Portada"
                                                    class="book-image">
                                            <?php else: ?>
                                                <img src="public/img/libros/default.png" alt="Portada" class="book-image">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col">
                                            <div class="book-info">
                                                <h5 class="book-title"><?= htmlspecialchars($item['titulo']) ?></h5>
                                                <p class="book-author">
                                                    <i class="bi bi-person me-1"></i>
                                                    <?= htmlspecialchars($item['autor']) ?>
                                                </p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span class="price-tag">$<?= number_format($item['precio'], 2) ?></span>
                                                    <div class="item-actions">
                                                        <a href="index.php?c=CarritoController&a=eliminar&id=<?= $item['id'] ?>"
                                                            class="btn btn-eliminar">
                                                            <i class="bi bi-trash me-1"></i>Eliminar
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="empty-cart">
                                <i class="bi bi-cart-x"></i>
                                <h4 class="text-purple">Tu carrito está vacío</h4>
                                <p>Explora nuestro catálogo y agrega libros increíbles</p>
                                <a href="index.php?c=LibroController&a=explorar" class="btn btn-pagar mt-3">
                                    <i class="bi bi-search me-2"></i>Explorar Libros
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php if (!empty($items)): ?>
                    <div class="total-card">
                        <h4 class="fw-bold mb-3">Resumen de Compra</h4>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>$<?= number_format($total, 2) ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Envío:</span>
                            <span class="text-success">Gratis</span>
                        </div>
                        <hr class="my-3" style="border-color: rgba(255,255,255,0.3);">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold">Total:</h5>
                            <h5 class="fw-bold">$<?= number_format($total, 2) ?></h5>
                        </div>
                    </div>
                    <div class="card-epic">
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold text-purple mb-3">Proceder al Pago</h5>
                            <p class="text-muted mb-4">Pago seguro con MercadoPago</p>
                            <a href="index.php?c=StripeController&a=pagar" class="btn btn-pagar w-100">
                                <i class="bi bi-credit-card me-2"></i>
                                Pagar con Stripe
                            </a>
                            <div class="mt-3">
                                <small class="text-muted">
                                    <i class="bi bi-shield-check me-1"></i>
                                    Transacción 100% segura
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="card-epic mt-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold text-purple mb-3">¿Por qué comprar con nosotros?</h6>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-truck text-success me-2"></i>
                                <small>Envío gratis en compras superiores a $50</small>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-arrow-clockwise text-info me-2"></i>
                                <small>30 días para devoluciones</small>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-shield-check text-primary me-2"></i>
                                <small>Compra protegida</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-headset text-warning me-2"></i>
                                <small>Soporte 24/7</small>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty($items)): ?>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card-epic">
                        <div class="card-body p-4 text-center">
                            <h4 class="fw-bold text-purple mb-3">También te podría interesar</h4>
                            <p class="text-muted">Libros relacionados con tu selección</p>
                            <a href="index.php?c=LibroController&a=explorar" class="btn"
                                style="background: rgba(106, 17, 203, 0.1); color: var(--purple); border: 1px solid var(--purple); border-radius: 25px; padding: 10px 25px;">
                                <i class="bi bi-plus-circle me-2"></i>Ver más libros
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
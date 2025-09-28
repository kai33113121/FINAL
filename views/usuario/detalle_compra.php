<!-- Estilos para detalle de compra -->
<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-success: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
        --purple: #6a11cb;
    }

    .detalle-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 90vh;
        padding: 40px 0;
    }

    .hero-detalle {
        background: url('/FINAL/public/img/adminside.png') center/cover;
        color: white;
        padding: 50px 0;
        border-radius: 20px;
        margin-bottom: 40px;
        text-align: center;
    }

    .card-epic {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-bottom: 30px;
    }

    .libro-item {
        display: flex;
        align-items: center;
        padding: 20px;
        background: linear-gradient(135deg, #f8f4ff 0%, #e8d5ff 100%);
        border-radius: 15px;
        margin-bottom: 15px;
    }

    .libro-imagen {
        width: 80px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        margin-right: 20px;
    }

    .libro-info {
        flex: 1;
    }

    .libro-titulo {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--purple);
        margin-bottom: 5px;
    }

    .libro-autor {
        color: #666;
        margin-bottom: 10px;
    }

    .libro-precio {
        font-size: 1.1rem;
        font-weight: 600;
        color: #28a745;
    }

    .btn-epic {
        background: var(--gradient-primary);
        color: white;
        border: none;
        border-radius: 15px;
        padding: 12px 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin: 5px;
    }

    .btn-epic:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(106, 17, 203, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-secondary {
        background: rgba(106, 17, 203, 0.1);
        color: var(--purple);
        border: 2px solid var(--purple);
    }

    .btn-secondary:hover {
        background: var(--purple);
        color: white;
    }

    .total-section {
        background: var(--gradient-success);
        color: white;
        padding: 25px;
        border-radius: 15px;
        text-align: center;
    }

    .total-amount {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .estado-badge {
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .estado-completado {
        background: var(--gradient-success);
        color: white;
    }

    .estado-pendiente {
        background: #fff3cd;
        color: #856404;
    }
</style>

<div class="detalle-container">
    <div class="container mt-4">
        
        <!-- Hero Section -->
        <div class="hero-detalle">
            <h1 class="fw-bold mb-3">📄 Detalle de Compra</h1>
            <p class="lead">Información completa de tu pedido</p>
        </div>

        <div class="row">
            <!-- Información de la compra -->
            <div class="col-lg-8">
                <div class="card-epic">
                    <h3 class="fw-bold text-purple mb-4">Productos comprados</h3>
                    
                    <?php if (!empty($detalles)): ?>
                        <?php foreach ($detalles as $detalle): ?>
                            <div class="libro-item">
                                <img src="public/img/libros/<?= htmlspecialchars($detalle['imagen']) ?>" 
                                     alt="Portada" class="libro-imagen">
                                <div class="libro-info">
                                    <div class="libro-titulo"><?= htmlspecialchars($detalle['titulo']) ?></div>
                                    <div class="libro-autor">por <?= htmlspecialchars($detalle['autor']) ?></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted">Cantidad: <?= $detalle['cantidad'] ?></span>
                                        <div class="libro-precio">$<?= number_format($detalle['precio'], 2) ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted mt-3">No se encontraron detalles de esta compra.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Resumen y acciones -->
            <div class="col-lg-4">
                <!-- Total -->
                <div class="card-epic">
                    <div class="total-section">
                        <h4 class="fw-bold mb-2">Total Pagado</h4>
                        <div class="total-amount">
                            $<?php 
                            $total = 0;
                            foreach($detalles as $detalle) {
                                $total += $detalle['precio'] * $detalle['cantidad'];
                            }
                            echo number_format($total, 2);
                            ?>
                        </div>
                        <small>Incluye todos los impuestos</small>
                    </div>
                </div>

                <!-- Información de la compra -->
                <div class="card-epic">
                    <h5 class="fw-bold text-purple mb-3">Información del pedido</h5>
                    
                    <div class="mb-3">
                        <strong>ID de compra:</strong><br>
                        <code>#<?= $_GET['id'] ?? 'N/A' ?></code>
                    </div>
                    
                    <div class="mb-3">
                        <strong>Estado:</strong><br>
                        <span class="estado-badge estado-completado">Completado</span>
                    </div>
                    
                    <div class="mb-3">
                        <strong>Fecha de compra:</strong><br>
                        <?= date('d M Y - H:i') ?>
                    </div>
                    
                    <div class="mb-3">
                        <strong>Método de pago:</strong><br>
                        <i class="bi bi-credit-card me-2"></i>Stripe
                    </div>
                </div>

                <!-- Acciones -->
                <div class="card-epic">
                    <h5 class="fw-bold text-purple mb-3">Acciones</h5>
                    
                    <div class="d-grid gap-2">
                        <button onclick="descargarPDF()" class="btn-epic">
                            <i class="bi bi-download"></i>
                            Descargar recibo PDF
                        </button>
                        
                        <a href="index.php?c=CompraController&a=index" class="btn-epic btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Volver a mis compras
                        </a>
                        
                        <a href="index.php?c=LibroController&a=explorar" class="btn-epic btn-secondary">
                            <i class="bi bi-book"></i>
                            Seguir comprando
                        </a>
                        
                        <a href="mailto:soporte@libroswap.com?subject=Consulta sobre compra #<?= $_GET['id'] ?? '' ?>" 
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

<script>
function descargarPDF() {
    // Crear contenido del PDF
    const compraId = "<?= $_GET['id'] ?? 'N/A' ?>";
    const fecha = new Date().toLocaleDateString('es-ES');
    
    // Obtener detalles de los libros
    let librosHTML = '';
    <?php if (!empty($detalles)): ?>
        <?php foreach ($detalles as $detalle): ?>
            librosHTML += `
                <tr>
                    <td><?= htmlspecialchars($detalle['titulo']) ?></td>
                    <td><?= htmlspecialchars($detalle['autor']) ?></td>
                    <td><?= $detalle['cantidad'] ?></td>
                    <td>$<?= number_format($detalle['precio'], 2) ?></td>
                    <td>$<?= number_format($detalle['precio'] * $detalle['cantidad'], 2) ?></td>
                </tr>
            `;
        <?php endforeach; ?>
    <?php endif; ?>
    
    const total = "<?php 
        $total = 0;
        foreach($detalles as $detalle) {
            $total += $detalle['precio'] * $detalle['cantidad'];
        }
        echo number_format($total, 2);
    ?>";
    
    // Crear ventana nueva para el PDF
    const ventana = window.open('', '_blank');
    ventana.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Recibo de Compra - LibrosWap</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #6a11cb; padding-bottom: 20px; }
                .logo { color: #6a11cb; font-size: 24px; font-weight: bold; }
                table { width: 100%; border-collapse: collapse; margin: 20px 0; }
                th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
                th { background-color: #f8f4ff; color: #6a11cb; font-weight: bold; }
                .total { background-color: #e8d5ff; font-weight: bold; }
                .info { margin: 20px 0; }
                .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class="header">
                <div class="logo">📚 LibrosWap</div>
                <h2>Recibo de Compra</h2>
            </div>
            
            <div class="info">
                <p><strong>ID de Compra:</strong> #${compraId}</p>
                <p><strong>Fecha:</strong> ${fecha}</p>
                <p><strong>Estado:</strong> Completado</p>
                <p><strong>Método de pago:</strong> Stripe</p>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Libro</th>
                        <th>Autor</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    ${librosHTML}
                    <tr class="total">
                        <td colspan="4"><strong>TOTAL</strong></td>
                        <td><strong>$${total}</strong></td>
                    </tr>
                </tbody>
            </table>
            
            <div class="footer">
                <p>Gracias por tu compra en LibrosWap</p>
                <p>Para soporte: soporte@libroswap.com</p>
            </div>
        </body>
        </html>
    `);
    
    ventana.document.close();
    
    // Imprimir automáticamente (esto abre el diálogo de impresión/guardar como PDF)
    setTimeout(() => {
        ventana.print();
    }, 500);
}
</script>
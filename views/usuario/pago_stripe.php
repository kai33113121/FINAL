<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pagar con Stripe - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --purple: #6a11cb;
        }

        body {
            background: 
               
                url('https://i.pinimg.com/originals/12/2e/a0/122ea0ba2df7259c087ad75ca641118b.gif');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }

        .payment-container {
            padding: 40px 0;
            min-height: 100vh;
        }

        .hero-payment {
            background: var(--gradient-primary);
            color: white;
            padding: 50px 0;
            border-radius: 20px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .hero-payment::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('/FINAL/public/img/adminside.png') center/cover;
            opacity: 0.1;
        }

        .hero-payment * {
            position: relative;
            z-index: 2;
        }

        .card-epic {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card-epic:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(106, 17, 203, 0.15);
        }

        .security-card {
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            border: none;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            text-align: center;
        }

        .item-summary {
            background: linear-gradient(135deg, #f8f4ff 0%, #e8d5ff 100%);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(106, 17, 203, 0.1);
        }

        .item-row:last-child {
            border-bottom: none;
            font-weight: bold;
            background: rgba(106, 17, 203, 0.1);
            border-radius: 10px;
            margin-top: 10px;
            padding: 20px;
        }

        .btn-back {
            background: rgba(106, 17, 203, 0.1);
            border: 2px solid var(--purple);
            color: var(--purple);
            border-radius: 25px;
            padding: 12px 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: var(--purple);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .btn-stripe {
            background: var(--gradient-secondary);
            border: none;
            color: white;
            border-radius: 15px;
            padding: 15px 40px;
            font-weight: 700;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-stripe:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(240, 147, 251, 0.4);
            color: white;
        }

        .progress-steps {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
            gap: 20px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
        }

        .step-active {
            background: var(--gradient-primary);
        }

        .step-completed {
            background: #28a745;
        }

        .step-pending {
            background: #dee2e6;
            color: #6c757d;
        }

        .stripe-logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .stripe-logo {
            max-width: 150px;
            height: auto;
            filter: brightness(0) saturate(100%) invert(46%) sepia(99%) saturate(2097%) hue-rotate(223deg) brightness(98%) contrast(89%);
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }

        .payment-method {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            border-color: var(--purple);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(106, 17, 203, 0.2);
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #f8f4ff 0%, #e8d5ff 100%);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--purple);
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }

        .stripe-features {
            background: linear-gradient(135deg, #635bff 0%, #4f46e5 100%);
            color: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <div class="container">
            
            <!-- Hero Section -->
            <div class="hero-payment">
                <div class="text-center">
                    <h1 class="fw-bold mb-3">Finalizar Compra</h1>
                    <p class="lead mb-0">Pago seguro y confiable con Stripe</p>
                </div>
            </div>

            <!-- Pasos del proceso -->
            <div class="progress-steps">
                <div class="step">
                    <div class="step-circle step-completed">
                        <i class="bi bi-check"></i>
                    </div>
                    <span>Carrito</span>
                </div>
                <div style="width: 50px; height: 2px; background: #28a745;"></div>
                <div class="step">
                    <div class="step-circle step-active pulse">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <span>Pago</span>
                </div>
                <div style="width: 50px; height: 2px; background: #dee2e6;"></div>
                <div class="step">
                    <div class="step-circle step-pending">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <span>Confirmación</span>
                </div>
            </div>

            <!-- Estadísticas -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-number">
                        <?php 
                        $total_items = 0;
                        if (isset($_SESSION['carrito'])) {
                            foreach ($_SESSION['carrito'] as $item) {
                                $total_items += $item['cantidad'] ?? 1;
                            }
                        }
                        echo $total_items;
                        ?>
                    </div>
                    <div>Artículos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">100%</div>
                    <div>Seguridad</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">24/7</div>
                    <div>Soporte</div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Resumen de compra -->
                <div class="col-lg-6">
                    <div class="card-epic">
                        <div class="card-body p-4">
                            <h4 class="fw-bold text-purple mb-4">
                                <i class="bi bi-receipt me-2"></i>
                                Resumen de tu pedido
                            </h4>
                            
                            <div class="item-summary">
                                <?php if (isset($_SESSION['carrito'])): 
                                    $total = 0;
                                    foreach ($_SESSION['carrito'] as $item): 
                                        $total += ($item['precio'] ?? 1) * ($item['cantidad'] ?? 1);
                                ?>
                                    <div class="item-row">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold"><?= htmlspecialchars($item['nombre'] ?? 'Producto') ?></div>
                                            <small class="text-muted">Cantidad: <?= $item['cantidad'] ?? 1 ?></small>
                                        </div>
                                        <div class="text-end">
                                            <span class="fw-bold">$<?= number_format($item['precio'] ?? 1, 2) ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                
                                <div class="item-row">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0">Total a pagar</h5>
                                    </div>
                                    <div class="text-end">
                                        <h4 class="mb-0 text-success">$<?= number_format($total, 2) ?></h4>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Beneficios -->
                            <div class="mt-4">
                                <h6 class="fw-bold text-purple mb-3">Incluido en tu compra:</h6>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-truck text-success me-2"></i>
                                            <small>Envío gratuito</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-shield-check text-primary me-2"></i>
                                            <small>Compra protegida</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-arrow-clockwise text-info me-2"></i>
                                            <small>30 días devolución</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-headset text-warning me-2"></i>
                                            <small>Soporte 24/7</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Método de pago -->
                <div class="col-lg-6">
                    <div class="card-epic">
                        <div class="card-body p-4">
                            <div class="stripe-logo-container">
                                <svg class="stripe-logo" viewBox="0 0 60 25" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#635bff" d="M59.5 3.7h-3.1v17.8h3.1V3.7zm-7.7 12.3c0-1.6-1-2.6-2.8-2.6-1.2 0-2.1.4-2.7 1.2l-1.3-1.5c.9-1.1 2.3-1.8 4.2-1.8 2.8 0 4.8 1.7 4.8 4.6v6.6h-2.7v-1.2c-.7.9-1.8 1.4-3.2 1.4-1.9 0-3.4-1.1-3.4-2.9 0-1.9 1.5-2.9 3.4-2.9 1.3 0 2.4.4 3.2 1.1v-.8c0-.9-.6-1.5-1.8-1.5-1 0-1.7.3-2.3.8l-.9-1.6c.8-.7 2-1.1 3.5-1.1zm-.5 4.1c-.6-.5-1.4-.8-2.2-.8-1 0-1.6.5-1.6 1.2 0 .8.6 1.3 1.6 1.3.8 0 1.6-.3 2.2-.8v-.9zm-11.1-4.5h-2.3l-2.5 6.5-2.5-6.5h-2.5l3.7 8.9h2.2l3.9-8.9zm-11.1 0h-2.6v8.9h2.6v-8.9zm-1.3-3.1c-.9 0-1.5.6-1.5 1.4s.6 1.4 1.5 1.4 1.5-.6 1.5-1.4-.6-1.4-1.5-1.4zm-6.2 6.2c-1.3 0-2.2.9-2.2 2.3s.9 2.3 2.2 2.3c.7 0 1.3-.3 1.7-.8l1.4 1.4c-.7.8-1.7 1.3-3.1 1.3-2.3 0-4.1-1.8-4.1-4.2s1.8-4.2 4.1-4.2c1.4 0 2.4.5 3.1 1.3l-1.4 1.4c-.4-.5-1-.8-1.7-.8zm-9.7-3.1h-2.6v3.1h-1.6v1.8h1.6v4.5c0 1.8 1.1 2.8 2.8 2.8.6 0 1.2-.1 1.6-.3l-.4-1.7c-.3.1-.6.2-.9.2-.6 0-.9-.4-.9-1v-4.5h1.6v-1.8h-1.6V9.6h.4zm-8.5 6.2c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c0-1.5-1.2-2.7-2.7-2.7zm0 4.2c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5-.7 1.5-1.5 1.5zm-7.8-8.9c-2.3 0-4.1 1.8-4.1 4.2s1.8 4.2 4.1 4.2c1.4 0 2.4-.5 3.1-1.3l-1.4-1.4c-.4.5-1 .8-1.7.8-1.3 0-2.2-.9-2.2-2.3s.9-2.3 2.2-2.3c.7 0 1.3.3 1.7.8l1.4-1.4c-.7-.8-1.7-1.3-3.1-1.3z"/>
                                    <path fill="#00d4aa" d="M24.1 21.9c-.2.1-.5.2-.8.3-.6.2-1.3.3-2 .3-2.1 0-3.7-1.6-3.7-3.7 0-2.1 1.6-3.7 3.7-3.7.7 0 1.4.1 2 .3.3.1.6.2.8.3l-.3 1.5c-.3-.2-.7-.3-1.1-.4-.4-.1-.8-.1-1.2-.1-1.3 0-2.3 1-2.3 2.3s1 2.3 2.3 2.3c.4 0 .8 0 1.2-.1.4-.1.8-.2 1.1-.4l.3 1.5z"/>
                                </svg>
                            </div>
                            
                            <h4 class="fw-bold text-center text-purple mb-3">Método de Pago</h4>
                            <p class="text-center text-muted mb-4">Pago rápido y seguro con Stripe</p>
                            
                            <!-- Características de Stripe -->
                            <div class="stripe-features">
                                <h6 class="fw-bold mb-3">Por qué elegir Stripe:</h6>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="feature-icon">
                                        <i class="bi bi-lightning-charge"></i>
                                    </div>
                                    <span>Procesamiento instantáneo</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="feature-icon">
                                        <i class="bi bi-shield-check"></i>
                                    </div>
                                    <span>Máxima seguridad PCI DSS</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="feature-icon">
                                        <i class="bi bi-globe"></i>
                                    </div>
                                    <span>Aceptado mundialmente</span>
                                </div>
                            </div>
                            
                            <!-- Métodos de pago -->
                            <div class="payment-methods">
                                <div class="payment-method">
                                    <i class="bi bi-credit-card fs-2 text-primary mb-2"></i>
                                    <div class="small">Visa</div>
                                </div>
                                <div class="payment-method">
                                    <i class="bi bi-credit-card-2-front fs-2 text-danger mb-2"></i>
                                    <div class="small">Mastercard</div>
                                </div>
                                <div class="payment-method">
                                    <i class="bi bi-credit-card-2-back fs-2 text-info mb-2"></i>
                                    <div class="small">Amex</div>
                                </div>
                                <div class="payment-method">
                                    <i class="bi bi-paypal fs-2 text-primary mb-2"></i>
                                    <div class="small">PayPal</div>
                                </div>
                            </div>

                            <!-- Botón de pago -->
                            <div class="text-center mt-4">
                                <button id="checkout-button" class="btn-stripe">
                                    <i class="bi bi-lock-fill me-2"></i>
                                    Pagar con Stripe
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    <i class="bi bi-shield-fill me-1"></i>
                                    Transacción 100% segura y encriptada
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Seguridad -->
                    <div class="row g-3 mt-3">
                        <div class="col-6">
                            <div class="security-card">
                                <i class="bi bi-lock-fill text-success fs-2 mb-2"></i>
                                <h6 class="fw-bold">Compra Segura</h6>
                                <small class="text-muted">SSL Certificado</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="security-card">
                                <i class="bi bi-award-fill text-primary fs-2 mb-2"></i>
                                <h6 class="fw-bold">Garantía</h6>
                                <small class="text-muted">Reembolso total</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón volver -->
            <div class="text-center mt-4">
                <a href="/FINAL/index.php?c=CarritoController&a=ver" class="btn-back">
                    <i class="bi bi-arrow-left-circle me-2"></i>Volver al carrito
                </a>
            </div>
        </div>
    </div>
    
    <script>
        // Configuración de Stripe, va aqui, la clave pero, git me lo prohibe.
        
        document.getElementById('checkout-button').addEventListener('click', function () {
            // Agregar efecto de carga
            const button = this;
            button.innerHTML = '<i class="bi bi-arrow-repeat spin me-2"></i>Procesando...';
            button.disabled = true;
            
            stripe.redirectToCheckout({
                sessionId: "<?php echo $session->id; ?>"
            }).then(function (result) {
                if (result.error) {
                    // Restaurar botón si hay error
                    button.innerHTML = '<i class="bi bi-lock-fill me-2"></i>Pagar con Stripe';
                    button.disabled = false;
                    alert(result.error.message);
                }
            });
        });
    </script>

    <style>
        .spin {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</body>
</html>
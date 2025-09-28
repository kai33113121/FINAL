<!-- Estilos para confirmación -->
<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-success: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
        --purple: #6a11cb;
    }

    .confirmacion-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 90vh;
        padding: 40px 0;
    }

    .hero-success {
        background: var(--gradient-success);
        color: white;
        padding: 60px 0;
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

    .success-icon {
        font-size: 4rem;
        color: #28a745;
        margin-bottom: 20px;
    }

    .btn-epic {
        background: var(--gradient-primary);
        color: white;
        border: none;
        border-radius: 15px;
        padding: 15px 30px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        margin: 10px;
    }

    .btn-epic:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(106, 17, 203, 0.4);
        color: white;
        text-decoration: none;
    }
</style>

<div class="confirmacion-container">
    <div class="container mt-4">

        <!-- Hero Success -->
        <div class="hero-success">
            <i class="bi bi-check-circle success-icon"></i>
            <h1 class="fw-bold mb-3">¡Pago Exitoso!</h1>
            <p class="lead">Tu compra se ha procesado correctamente</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-epic text-center">
                    <h3 class="text-success mb-4">¡Gracias por tu compra!</h3>
                    <p class="mb-4">
                        Tu pedido ha sido confirmado y procesado exitosamente.
                        En breve recibirás un correo electrónico con todos los detalles de tu compra.
                    </p>

                    <div class="row g-3 mt-4">
                        <div class="col-md-4">
                            <div class="text-center p-3">
                                <i class="bi bi-email fs-2 text-primary mb-2"></i>
                                <h6>Confirmación enviada</h6>
                                <small class="text-muted">Revisa tu correo electrónico</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3">
                                <i class="bi bi-truck fs-2 text-success mb-2"></i>
                                <h6>Envío gratuito</h6>
                                <small class="text-muted">3-5 días hábiles</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3">
                                <i class="bi bi-headset fs-2 text-info mb-2"></i>
                                <h6>Soporte 24/7</h6>
                                <small class="text-muted">Estamos aquí para ayudarte</small>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="index.php?c=CompraController&a=index" class="nav-link">
                            <i class="bi bi-bag-check"></i> Mis Compras
                        </a>
                        <a href="index.php?c=LibroController&a=explorar" class="btn-epic">
                            <i class="bi bi-book me-2"></i>Seguir comprando
                        </a>
                        <a href="index.php?c=UsuarioController&a=dashboard" class="btn-epic">
                            <i class="bi bi-house me-2"></i>Ir al dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
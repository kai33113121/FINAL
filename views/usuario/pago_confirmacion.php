<link rel="stylesheet" href="public/css/pago_confirmacion.css">
<div class="confirmacion-container">
    <div class="container mt-4">
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
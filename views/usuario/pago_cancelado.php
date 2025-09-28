<link rel="stylesheet" href="public/css/pago_cancelado.css">
<div class="cancelado-container">
    <div class="container mt-4">
        <div class="hero-cancel">
            <i class="bi bi-x-circle cancel-icon"></i>
            <h1 class="fw-bold mb-3">Pago Cancelado</h1>
            <p class="lead">No se ha procesado ningún cargo</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-epic text-center">
                    <h3 class="text-warning mb-4">¡No hay problema!</h3>
                    <p class="mb-4">
                        El pago ha sido cancelado y no se ha realizado ningún cargo a tu tarjeta. 
                        Tus productos siguen disponibles en el carrito.
                    </p>
                    <div class="row g-3 mt-4">
                        <div class="col-md-4">
                            <div class="text-center p-3">
                                <i class="bi bi-shield-check fs-2 text-success mb-2"></i>
                                <h6>Sin cargos</h6>
                                <small class="text-muted">Tu tarjeta está segura</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3">
                                <i class="bi bi-cart-check fs-2 text-primary mb-2"></i>
                                <h6>Carrito guardado</h6>
                                <small class="text-muted">Tus productos te esperan</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3">
                                <i class="bi bi-arrow-clockwise fs-2 text-info mb-2"></i>
                                <h6>Intenta de nuevo</h6>
                                <small class="text-muted">Cuando estés listo</small>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="index.php?c=CarritoController&a=ver" class="btn-epic">
                            <i class="bi bi-cart me-2"></i>Volver al carrito
                        </a>
                        <a href="index.php?c=LibroController&a=explorar" class="btn-epic">
                            <i class="bi bi-book me-2"></i>Seguir explorando
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
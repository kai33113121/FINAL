<!-- Estilos para cancelación -->
<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-warning: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --purple: #6a11cb;
    }

    .cancelado-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 90vh;
        padding: 40px 0;
    }

    .hero-cancel {
        background: var(--gradient-warning);
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

    .cancel-icon {
        font-size: 4rem;
        color: #dc3545;
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

<div class="cancelado-container">
    <div class="container mt-4">
        
        <!-- Hero Cancel -->
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
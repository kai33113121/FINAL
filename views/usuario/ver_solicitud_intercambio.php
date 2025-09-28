<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Intercambio - LibrosWap</title>
    <link rel="stylesheet" href="public/css/ver_soli.css">
</head>
<body>
    <div class="solicitud-container">
        <div class="container">
            <div class="hero-solicitud">
                <div class="text-center">
                    <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 0.5rem;">📬 Solicitud de Intercambio</h1>
                    <p class="lead mb-0">Revisa los detalles y decide si aceptar o rechazar</p>
                </div>
            </div>
            <?php if (!empty($solicitud)): ?>
                <div class="solicitud-card">
                    <div class="card-header-custom">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="user-avatar">
                                    <?= strtoupper(substr($solicitud['nombre_solicitante'] ?? 'U', 0, 1)) ?>
                                </div>
                                <div>
                                    <h5 class="mb-1" style="color: var(--purple); font-weight: 700;">
                                        <?= htmlspecialchars($solicitud['nombre_solicitante'] ?? 'Usuario') ?>
                                    </h5>
                                    <small class="text-muted">Solicitante del intercambio</small>
                                </div>
                            </div>
                            <div class="fecha-badge">
                                <i class="bi bi-calendar3"></i>
                                <?= htmlspecialchars(isset($solicitud['fecha']) ? $solicitud['fecha'] : date('d/m/Y')) ?>
                            </div>
                        </div>
                    </div>
                    <div class="libro-info">
                        <?php if (!empty($solicitud['libro_imagen'])): ?>
                            <img src="public/img/libros/<?= htmlspecialchars($solicitud['libro_imagen']) ?>" 
                                 alt="Portada" 
                                 class="libro-portada"
                                 onerror="this.src='https://via.placeholder.com/120x160/667eea/ffffff?text=📚'">
                        <?php endif; ?>
                        <div class="libro-detalles">
                            <h3 class="libro-titulo">
                                <?= htmlspecialchars($solicitud['libro_titulo'] ?? 'Libro solicitado') ?>
                            </h3>
                            <div class="info-row">
                                <i class="bi bi-book"></i>
                                <span>Este usuario quiere intercambiar por este libro</span>
                            </div>
                            <div class="info-row">
                                <i class="bi bi-arrow-left-right"></i>
                                <span>Solicitud de intercambio</span>
                            </div>
                        </div>
                    </div>
                    <div class="mensaje-section">
                        <h6 style="color: var(--purple); font-weight: 700; margin-bottom: 15px;">
                            <i class="bi bi-chat-left-text me-2"></i>Mensaje
                        </h6>
                        <p class="mensaje-texto mb-0">
                            <?= htmlspecialchars(isset($solicitud['mensaje']) ? $solicitud['mensaje'] : 'Solicitud de intercambio de libro') ?>
                        </p>
                    </div>
                    <form method="post">
                        <input type="hidden" name="id_solicitud" value="<?= htmlspecialchars($solicitud['id']) ?>">
                        <div class="acciones-section">
                            <button type="submit" name="accion" value="aceptar" class="btn-action btn-aceptar">
                                <i class="bi bi-check-circle"></i>
                                Aceptar Intercambio
                            </button>
                            <button type="submit" name="accion" value="rechazar" class="btn-action btn-rechazar">
                                <i class="bi bi-x-circle"></i>
                                Rechazar Solicitud
                            </button>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <a href="index.php?c=UsuarioController&a=notificaciones" class="btn-volver">
                        <i class="bi bi-arrow-left"></i>
                        Volver a notificaciones
                    </a>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h3 style="color: var(--purple); margin-bottom: 15px;">No se encontró la solicitud</h3>
                    <p class="text-muted">Es posible que la solicitud haya sido eliminada o no exista</p>
                    <div class="mt-4">
                        <a href="index.php?c=UsuarioController&a=notificaciones" class="btn-volver">
                            <i class="bi bi-arrow-left"></i>
                            Volver a notificaciones
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
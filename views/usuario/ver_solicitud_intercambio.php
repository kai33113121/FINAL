<?php
// Vista para aceptar o rechazar una solicitud de intercambio
// Variables esperadas: $solicitud (array con info de la solicitud)
?>
<div class="container mt-5">
    <h2>Solicitud de Intercambio</h2>
    <?php if (!empty($solicitud)): ?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <?php if (!empty($solicitud['libro_imagen'])): ?>
                        <img src="public/img/libros/<?= htmlspecialchars($solicitud['libro_imagen']) ?>" alt="Portada" class="rounded me-3" style="width:70px;height:100px;object-fit:cover;">
                    <?php endif; ?>
                    <div>
                        <h5 class="card-title mb-0">Libro solicitado: <b><?= htmlspecialchars($solicitud['libro_titulo'] ?? '') ?></b></h5>
                    </div>
                </div>
                <p class="card-text">Solicitante: <?= htmlspecialchars($solicitud['nombre_solicitante'] ?? '') ?></p>
                <p class="card-text">Mensaje: <?= htmlspecialchars(isset($solicitud['mensaje']) ? $solicitud['mensaje'] : 'Solicitud de intercambio') ?></p>
                <p class="card-text"><small class="text-muted">Fecha: <?= htmlspecialchars(isset($solicitud['fecha']) ? $solicitud['fecha'] : '') ?></small></p>
                <form method="post">
                    <input type="hidden" name="id_solicitud" value="<?= htmlspecialchars($solicitud['id']) ?>">
                    <button type="submit" name="accion" value="aceptar" class="btn btn-success">Aceptar</button>
                    <button type="submit" name="accion" value="rechazar" class="btn btn-danger ms-2">Rechazar</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">No se encontró la solicitud.</div>
    <?php endif; ?>
    <a href="index.php?c=UsuarioController&a=notificaciones" class="btn btn-outline-secondary">Volver a notificaciones</a>
</div>

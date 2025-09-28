<div class="container mt-5">
    <h2>🔔 Notificaciones de intercambio</h2>
    <?php if (!empty($notificaciones) && is_array($notificaciones)): ?>
        <ul class="list-group">
            <?php foreach ($notificaciones as $notif): ?>
                <li class="list-group-item<?= !empty($notif['leida']) ? ' bg-light text-muted' : ' bg-purple-light' ?>">
                    <?= htmlspecialchars($notif['mensaje']) ?>
                    <br>
                    <span class="text-muted small"><?= htmlspecialchars($notif['fecha']) ?></span>
                    <?php if (!empty($notif['intercambio_id'])): ?>
                        <a href="index.php?c=IntercambioController&a=verSolicitud&id=<?= (int)$notif['intercambio_id'] ?>&noti=<?= (int)$notif['id'] ?>" class="btn btn-sm btn-outline-purple mt-1">Ver</a>
                    <?php elseif (!empty($notif['link'])): ?>
                        <a href="<?= htmlspecialchars($notif['link']) ?>" class="btn btn-sm btn-outline-purple mt-1">Ver</a>
                    <?php endif; ?>
                    <?php if (!empty($notif['leida'])): ?>
                        <span class="badge bg-secondary ms-2">Leída</span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <div class="alert alert-info">No tienes notificaciones pendientes.</div>
    <?php endif; ?>    
</div>

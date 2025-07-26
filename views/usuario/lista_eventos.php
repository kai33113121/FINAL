<div class="container mt-4">
    <h4 class="fw-bold mb-3 text-purple">Foros activos</h4>
    <?php if (!empty($eventos)): ?>
        <div class="list-group">
            <?php foreach ($eventos as $e): ?>
                <a href="index.php?c=EventoController&a=ver&id=<?= $e['id'] ?>" class="list-group-item list-group-item-action">
                    <strong><?= htmlspecialchars($e['titulo']) ?></strong><br>
                    <small class="text-muted"><?= htmlspecialchars($e['fecha_creacion']) ?></small>
                </a>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info">No hay eventos disponibles.</div>
    <?php endif; ?>
</div>
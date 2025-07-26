<div class="container mt-4">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-purple text-white fw-bold">
            <?= htmlspecialchars($datosEvento['titulo']) ?>
        </div>
        <div class="card-body">
            <p><?= nl2br(htmlspecialchars($datosEvento['descripcion'])) ?></p>
            <small class="text-muted">Publicado el <?= $datosEvento['fecha_creacion'] ?></small>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header fw-bold">Comentar</div>
        <div class="card-body">
            <form method="POST" action="index.php?c=EventoController&a=comentar">
                <input type="hidden" name="id_evento" value="<?= $datosEvento['id'] ?>">
                <textarea name="comentario" class="form-control" rows="3" required></textarea>
                <button type="submit" class="btn btn-outline-purple mt-2">Enviar comentario</button>
            </form>
        </div>
    </div>

    <h5 class="fw-bold mb-3">Comentarios</h5>
    <?php foreach ($comentarios as $c): ?>
        <div class="border rounded p-2 mb-2">
            <strong><?= htmlspecialchars($c['usuario']) ?></strong>
            <p><?= htmlspecialchars($c['comentario']) ?></p>
            <small class="text-muted"><?= $c['fecha'] ?></small>
        </div>
    <?php endforeach; ?>
</div>
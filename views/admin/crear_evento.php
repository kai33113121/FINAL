<div class="container mt-4">
    <h4 class="fw-bold mb-3 text-purple">Crear nuevo foro</h4>

    <form method="POST" action="index.php?c=EventoController&a=guardar">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título del foro</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-purple">Crear foro</button>
    </form>

    <hr class="my-4">

    <h5 class="fw-bold text-purple">Foros creados</h5>
    <?php if (!empty($eventos)): ?>
        <ul class="list-group">
            <?php foreach ($eventos as $e): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?= htmlspecialchars($e['titulo']) ?></strong><br>
                        <small class="text-muted"><?= htmlspecialchars($e['fecha_creacion']) ?></small>
                    </div>
                  <div class="btn-group">
    <a href="index.php?c=EventoController&a=editar&id=<?= $e['id'] ?>" class="btn btn-sm btn-outline-warning">📝 Editar</a>
    <a href="index.php?c=EventoController&a=eliminar&id=<?= $e['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este foro?')">🗑️ Eliminar</a>
</div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <div class="alert alert-info mt-3">Aún no has creado ningún foro.</div>
    <?php endif; ?>
</div>
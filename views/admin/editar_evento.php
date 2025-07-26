<div class="container mt-4">
    <h4 class="fw-bold mb-3 text-purple">Editar foro</h4>

    <form method="POST" action="index.php?c=EventoController&a=actualizar">
        <input type="hidden" name="id" value="<?= $foro['id'] ?>">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?= htmlspecialchars($foro['titulo']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required><?= htmlspecialchars($foro['descripcion']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-purple">Actualizar foro</button>
    </form>
</div>
<h2 class="mb-4 text-purple"><i class="bi bi-pencil-square"></i> Editar libro en venta</h2>
<form method="POST" action="index.php?c=VentaController&a=actualizar" enctype="multipart/form-data"
    class="card p-4 shadow-sm bg-light"> <input type="hidden" name="id" value="<?= $libro['id'] ?>">
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($libro['titulo']) ?>"
            required>
    </div>
    <div class="mb-3">
        <label>Autor</label>
        <input type="text" name="autor" class="form-control" value="<?= htmlspecialchars($libro['autor']) ?>">
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"
            rows="3"><?= htmlspecialchars($libro['descripcion']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control"
            value="<?= htmlspecialchars($libro['precio']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Imagen del libro (opcional)</label>
        <?php if (!empty($libro['imagen'])): ?>
            <div class="mb-3">
                <label>Imagen actual:</label><br>
                <img src="public/img/libros/<?= $libro['imagen'] ?>" alt="Portada actual" class="img-thumbnail" style="max-width: 150px;">
            </div>
        <?php endif; ?>
        <input type="hidden" name="imagen_actual" value="<?= htmlspecialchars($libro['imagen']) ?>">

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del libro</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
            <?php if (!empty($libro['imagen'])): ?>
                <p class="mt-2">Imagen actual:</p>
                <img src="public/img/libros/<?= htmlspecialchars($libro['imagen']) ?>" alt="Imagen actual" class="img-thumbnail"
                    style="max-width: 150px;">
            <?php endif; ?>
        </div>
       <div class="mb-3">
    <label for="estado" class="form-label">Estado del libro</label>
    <select name="estado" id="estado" class="form-select" required>
        <option value="nuevo" <?= $libro['estado'] === 'nuevo' ? 'selected' : '' ?>>Nuevo</option>
        <option value="usado" <?= $libro['estado'] === 'usado' ? 'selected' : '' ?>>Usado</option>
    </select>
</div>
        <button type="submit" class="btn btn-purple">Actualizar libro</button>
        <div class="mb-3">
        <a href="index.php?c=UsuarioController&a=dashboard" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle"></i> Volver al dashboard
        </a>
    </div>
</form>

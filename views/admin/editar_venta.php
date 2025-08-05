<h2 class="mb-4 text-purple"><i class="bi bi-pencil-square"></i> Editar libro en venta</h2>

<form method="POST" action="index.php?c=AdminController&a=actualizarVenta" enctype="multipart/form-data" class="row g-3">
    <input type="hidden" name="id" value="<?= $libro['id'] ?>">

    <div class="col-md-6">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($libro['titulo']) ?>" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Autor</label>
        <input type="text" name="autor" class="form-control" value="<?= htmlspecialchars($libro['autor']) ?>" required>
    </div>

    <div class="col-12">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3" required><?= htmlspecialchars($libro['descripcion']) ?></textarea>
    </div>

    <div class="col-md-4">
        <label class="form-label">Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control" value="<?= htmlspecialchars($libro['precio']) ?>" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select">
            <option value="nuevo" <?= $libro['estado'] === 'nuevo' ? 'selected' : '' ?>>Nuevo</option>
            <option value="usado" <?= $libro['estado'] === 'usado' ? 'selected' : '' ?>>Usado</option>
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Imagen actual</label><br>
        <img src="public/img/<?= htmlspecialchars($libro['imagen']) ?>" width="100" alt="Imagen actual">
    </div>

    <div class="col-12">
        <label class="form-label">Cambiar imagen</label>
        <input type="file" name="imagen" class="form-control">
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-purple"><i class="bi bi-save"></i> Guardar cambios</button>
    </div>
</form>
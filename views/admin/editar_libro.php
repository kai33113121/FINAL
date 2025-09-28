<h2 class="mb-4">✏️ Editar libro</h2>
<form method="POST" enctype="multipart/form-data" action="index.php?c=AdminController&a=guardarEdicionLibro">
    <input type="hidden" name="id" value="<?= $datos['id'] ?>">
    <input type="hidden" name="imagen_actual" value="<?= $datos['imagen'] ?>">
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($datos['titulo']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Autor</label>
        <input type="text" name="autor" class="form-control" value="<?= htmlspecialchars($datos['autor']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Género</label>
        <input type="text" name="genero" class="form-control" value="<?= htmlspecialchars($datos['genero']) ?>">
    </div>
    <div class="mb-3">
        <label>Estado</label>
        <select name="estado" class="form-control">
            <option value="nuevo" <?= $datos['estado'] === 'nuevo' ? 'selected' : '' ?>>Nuevo</option>
            <option value="usado" <?= $datos['estado'] === 'usado' ? 'selected' : '' ?>>Usado</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"><?= htmlspecialchars($datos['descripcion']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Modo de publicación</label>
        <select name="modo" class="form-control">
            <option value="intercambio" <?= $datos['modo'] === 'intercambio' ? 'selected' : '' ?>>Solo intercambio</option>
            <option value="venta" <?= $datos['modo'] === 'venta' ? 'selected' : '' ?>>Venta</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Precio (solo si es venta)</label>
        <input type="number" name="precio" class="form-control" step="0.01" min="0" value="<?= htmlspecialchars($datos['precio']) ?>">
    </div>
    <div class="mb-3">
        <label>Imagen actual</label><br>
        <img src="public/img/<?= $datos['imagen'] ?>" alt="Portada" style="max-width: 150px;"><br><br>
        <label>Subir nueva imagen (opcional)</label>
        <input type="file" name="imagen" class="form-control">
    </div>
    <button type="submit" class="btn btn-custom-purple">Guardar cambios</button>
</form>
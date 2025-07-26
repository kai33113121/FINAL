<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Libro - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>✏️ Editar libro</h2>
        <form method="POST" enctype="multipart/form-data" action="index.php?c=LibroController&a=editar">
            <input type="hidden" name="id" value="<?= $datos['id'] ?>">
            <div class="mb-3">
                <label>Título</label>
                <input type="text" name="titulo" class="form-control" value="<?= $datos['titulo'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Autor</label>
                <input type="text" name="autor" class="form-control" value="<?= $datos['autor'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Género</label>
                <input type="text" name="genero" class="form-control" value="<?= $datos['genero'] ?>" required>
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
                <textarea name="descripcion" class="form-control"><?= $datos['descripcion'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>Imagen actual</label><br>
                <img src="public/img/<?= $datos['imagen'] ?>" width="100">
            </div>
            <div class="mb-3">
                <label>Subir nueva imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</body>

</html>
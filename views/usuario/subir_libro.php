<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Subir Libro - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>📤 Subir nuevos libros</h2>
<form method="POST" enctype="multipart/form-data" action="index.php?c=UsuarioController&a=guardarLibro">
            <div class="mb-3">
                <label>Título</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Autor</label>
                <input type="text" name="autor" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Género</label>
                <input type="text" name="genero" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Estado</label>
                <select name="estado" class="form-control">
                    <option value="nuevo">Nuevo</option>
                    <option value="usado">Usado</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>Imagen del libro</label>
                <input type="file" name="imagen" class="form-control" required>
            </div>
            <div class="mb-3">
        <label>Vista previa:</label><br>
        <img id="preview" src="public/img/default.jpg" alt="Vista previa" style="max-width: 200px; border: 1px solid #ccc; padding: 5px;">
    </div>

            <!-- ✅ NUEVO: Modo de publicación -->
            <div class="mb-3">
                <label>Modo de publicación</label>
                <select name="modo" class="form-control">
                    <option value="intercambio">Solo intercambio</option>
                    <option value="venta">Venta</option>
                </select>
            </div>

            <!-- ✅ NUEVO: Precio (solo si es venta) -->
            <div class="mb-3">
                <label>Precio (solo si es venta)</label>
                <input type="number" name="precio" class="form-control" step="0.01" min="0">
            </div>
<input type="hidden" name="id_usuario" value="<?= $_SESSION['usuario']['id'] ?>">            <button type="submit" class="btn btn-primary">Subir libro</button>
        </form>
    </div>
</body>

</html>
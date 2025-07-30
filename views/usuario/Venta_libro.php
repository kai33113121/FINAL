<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Libro_venta - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>📤 Vender libros</h2>

    <!-- Adaptado para VentaController y método crear -->
    <form method="POST" enctype="multipart/form-data" action="../../controllers/Libro_ventaController.php">
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
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Stock disponible</label>
            <input type="number" name="stock" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" name="precio" class="form-control" step="0.01" min="0" required>
        </div>
        <div class="mb-3">
            <label>Imagen del libro</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Vista previa:</label><br>
            <img id="preview" src="public/img/default.jpg" alt="Vista previa" style="max-width: 200px; border: 1px solid #ccc; padding: 5px;">
        </div>

        <button type="submit" class="btn btn-primary">Subir libro</button>
    </form>
</div>

<script>
    // Vista previa de imagen
    document.querySelector('input[name="imagen"]').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview');
        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
</body>
</html>

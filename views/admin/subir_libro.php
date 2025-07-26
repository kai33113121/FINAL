<h2 class="mb-4">📤 Subir nuevo libro</h2>

<form method="POST" enctype="multipart/form-data" action="index.php?c=AdminController&a=guardarLibro">
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
        <input type="text" name="genero" class="form-control">
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

    <!-- ✅ Imagen del libro -->
    <div class="mb-3">
        <label>Imagen del libro</label>
        <input type="file" name="imagen" class="form-control" onchange="previewImage(event)">
    </div>

    <div class="mb-3">
        <label>Vista previa:</label><br>
        <img id="preview" src="public/img/default.jpg" alt="Vista previa" style="max-width: 200px; border: 1px solid #ccc; padding: 5px;">
    </div>

    <!-- ✅ Modo de publicación -->
    <div class="mb-3">
        <label>Modo de publicación</label>
        <select name="modo" class="form-control" id="modoSelect">
            <option value="intercambio">Solo intercambio</option>
            <option value="venta">Venta</option>
        </select>
    </div>

    <!-- ✅ Precio (solo si es venta) -->
    <div class="mb-3" id="precioGroup" style="display: none;">
        <label>Precio (solo si es venta)</label>
        <input type="number" name="precio" class="form-control" step="0.01" min="0">
    </div>

    <button type="submit" class="btn btn-custom-purple">Publicar libro</button>
</form>

<!-- ✅ Script para vista previa y mostrar precio -->
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            document.getElementById('preview').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    document.getElementById('modoSelect').addEventListener('change', function () {
        const precioGroup = document.getElementById('precioGroup');
        precioGroup.style.display = this.value === 'venta' ? 'block' : 'none';
    });
</script>

<!-- ✅ Estilo púrpura -->
<style>
    .btn-custom-purple {
        background: linear-gradient(to right, #6a1b9a, #8e24aa);
        color: white;
        border: none;
    }

    .btn-custom-purple:hover {
        background-color: #7b1fa2;
        color: white;
    }
</style>
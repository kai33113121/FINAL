<h2 class="mb-4 text-purple"><i class="bi bi-plus-circle"></i> Publicar libro en venta</h2>
<form method="POST" action="index.php?c=VentaController&a=crear" enctype="multipart/form-data" class="card p-4 shadow-sm bg-light">
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Autor</label>
        <input type="text" name="autor" class="form-control">
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Estado</label>
        <select name="estado" class="form-select">
            <option value="nuevo">Nuevo</option>
            <option value="segunda mano">Segunda mano</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Imagen</label>
        <input type="file" name="imagen" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-outline-purple">Publicar</button>
</form>
<div class="mb-3">
        <a href="index.php?c=UsuarioController&a=dashboard" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle"></i> Volver al dashboard
        </a>
    </div>
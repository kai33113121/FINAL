<link rel="stylesheet" href="public/css/editar_venta.css">
<div class="editar-container">
    <div class="container mt-4">
        <div class="hero-editar">
            <div class="text-center">
                <h1 class="section-title-epic">
                    <i class="bi bi-pencil-square me-3"></i>Editar Libro
                </h1>
                <p class="lead">Actualiza la información de tu libro publicado</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-epic">
                    <div class="card-body p-5">
                        <form method="POST" action="index.php?c=VentaController&a=actualizar"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $libro['id'] ?>">
                            <input type="hidden" name="imagen_actual" value="<?= htmlspecialchars($libro['imagen']) ?>">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control"
                                        value="<?= htmlspecialchars($libro['titulo']) ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Autor</label>
                                    <input type="text" name="autor" class="form-control"
                                        value="<?= htmlspecialchars($libro['autor']) ?>">
                                </div>
                                <div class="col-12">
                                    <label>Descripción</label>
                                    <textarea name="descripcion" class="form-control"
                                        rows="4"><?= htmlspecialchars($libro['descripcion']) ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Precio</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background: rgba(106, 17, 203, 0.1); border-color: #e9ecef;">$ COP</span>
                                        <input type="number" step="0.01" name="precio" class="form-control"
                                            value="<?= htmlspecialchars($libro['precio']) ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="estado">Estado del libro</label>
                                    <select name="estado" id="estado" class="form-select" required>
                                        <option value="nuevo" <?= $libro['estado'] === 'nuevo' ? 'selected' : '' ?>>Nuevo
                                        </option>
                                        <option value="usado" <?= $libro['estado'] === 'usado' ? 'selected' : '' ?>>Usado
                                        </option>
                                    </select>
                                </div>
                                <?php if (!empty($libro['imagen'])): ?>
                                    <div class="col-12">
                                        <div class="current-image-section">
                                            <h6 class="fw-bold text-purple mb-3">Imagen actual del libro</h6>
                                            <img src="public/img/libros/<?= $libro['imagen'] ?>" alt="Portada actual"
                                                class="imagen-actual">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-12">
                                    <label for="imagen">Cambiar imagen (opcional)</label>
                                    <div class="upload-area" onclick="document.getElementById('imagen').click()">
                                        <i class="bi bi-arrow-repeat text-purple fs-1 mb-3"></i>
                                        <h5 class="text-purple">Subir nueva imagen</h5>
                                        <p class="text-muted">Deja vacío para mantener la imagen actual</p>
                                    </div>
                                    <input type="file" name="imagen" id="imagen" class="form-control d-none"
                                        accept="image/*" onchange="previewNewImage(this)">
                                    <div id="new-preview-container" class="mt-3 text-center" style="display: none;">
                                        <h6 class="text-purple">Nueva imagen seleccionada:</h6>
                                        <img id="new-preview-img"
                                            style="max-width: 200px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn-actualizar me-3">
                                    <i class="bi bi-check-circle me-2"></i>Actualizar libro
                                </button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="index.php?c=UsuarioController&a=dashboard" class="btn-volver">
                                <i class="bi bi-arrow-left-circle me-2"></i>Volver al dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewNewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('new-preview-img').src = e.target.result;
                document.getElementById('new-preview-container').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
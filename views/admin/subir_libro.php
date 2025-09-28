<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Libro - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/subir_libro.css">
</head>
<body>
    <div class="container-fluid upload-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card upload-card bg-overlay">
                    <div class="upload-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-store upload-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">📚 Agregar Libro Oficial</h2>
                                <p class="mb-0 opacity-75">Agrega un nuevo libro al catálogo de la tienda</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="info-badge">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle me-2"></i>
                                <div>
                                    <strong>Libro oficial para venta</strong>
                                    <br><small>Los libros del administrador se publican automáticamente para compra directa</small>
                                </div>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data"
                            action="index.php?c=AdminController&a=guardarLibro">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-book me-2 text-muted"></i>Título</label>
                                <input type="text" name="titulo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-user-edit me-2 text-muted"></i>Autor</label>
                                <input type="text" name="autor" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                    <label>Género literario</label>
                                    <select name="genero" class="form-select" required>
                                        <option value="">Selecciona un género</option>
                                        <option value="Fantasía">Fantasía</option>
                                        <option value="Ciencia Ficción">Ciencia Ficción</option>
                                        <option value="Romance">Romance</option>
                                        <option value="Thriller">Thriller</option>
                                        <option value="Misterio">Misterio</option>
                                        <option value="No Ficción">No Ficción</option>
                                        <option value="Clásicos">Clásicos</option>
                                        <option value="Juvenil">Juvenil</option>
                                        <option value="Aventura">Aventura</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-star me-2 text-muted"></i>Estado</label>
                                <select name="estado" class="form-control">
                                    <option value="nuevo">Nuevo</option>
                                    <option value="usado">Usado</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-align-left me-2 text-muted"></i>Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-image me-2 text-muted"></i>Imagen del libro</label>
                                <input type="file" name="imagen" class="form-control" onchange="previewImage(event)">
                            </div>
                            <div class="image-preview">
                                <img id="preview" src="public/img/default.jpg" alt="Vista previa">
                                <div class="image-label">Vista previa</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-dollar-sign me-2 text-muted"></i>Precio</label>
                                <input type="number" name="precio" class="form-control" step="0.01" min="0" value="25000" required>
                                <small class="text-muted">Precio de venta al público</small>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-custom-purple btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Agregar al Catálogo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                document.getElementById('preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
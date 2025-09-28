<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro en Venta</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/editar_ventaa.css">
</head>
<body>
    <div class="container-fluid venta-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card venta-card bg-overlay">
                    <div class="venta-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-book-open venta-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">✏️ Editar libro en venta</h2>
                                <p class="mb-0 opacity-75">Modifica la información del libro en venta</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <form method="POST" action="index.php?c=AdminController&a=actualizarVenta"
                            enctype="multipart/form-data" class="row g-3">
                            <input type="hidden" name="id" value="<?= $libro['id'] ?>">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-book me-2 text-muted"></i>Título</label>
                                <input type="text" name="titulo" class="form-control"
                                    value="<?= htmlspecialchars($libro['titulo']) ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-user-edit me-2 text-muted"></i>Autor</label>
                                <input type="text" name="autor" class="form-control"
                                    value="<?= htmlspecialchars($libro['autor']) ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label"><i
                                        class="fas fa-align-left me-2 text-muted"></i>Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="3"
                                    required><?= htmlspecialchars($libro['descripcion']) ?></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i
                                        class="fas fa-dollar-sign me-2 text-muted"></i>Precio</label>
                                <input type="number" step="0.01" name="precio" class="form-control"
                                    value="<?= htmlspecialchars($libro['precio']) ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i class="fas fa-star me-2 text-muted"></i>Estado</label>
                                <select name="estado" class="form-select">
                                    <option value="nuevo" <?= $libro['estado'] === 'nuevo' ? 'selected' : '' ?>>Nuevo
                                    </option>
                                    <option value="usado" <?= $libro['estado'] === 'usado' ? 'selected' : '' ?>>Usado
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i class="fas fa-image me-2 text-muted"></i>Imagen
                                    actual</label>
                                <div class="image-preview">
                                    <img src="public/img/<?= htmlspecialchars($libro['imagen']) ?>" alt="Imagen actual">
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label"><i class="fas fa-upload me-2 text-muted"></i>Cambiar
                                    imagen</label>
                                <input type="file" name="imagen" class="form-control">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-custom-purple btn-lg">
                                    <i class="fas fa-save me-2"></i>Guardar cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
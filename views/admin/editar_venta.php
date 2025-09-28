<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro en Venta</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image:
                linear-gradient(135deg, rgba(87, 87, 87, 0.65) 0%, rgba(120, 107, 132, 0.85) 100%),
                url('/FINAL/public/img/sideadmin.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .bg-overlay {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .venta-container {
            padding: 2rem 0;
        }

        .venta-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .venta-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .venta-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .form-section {
            background: rgba(255, 255, 255, 0.98);
            padding: 2rem;
            border-radius: 15px;
            margin: 1rem;
            border: 1px solid rgba(78, 6, 97, 0.1);
        }

        .btn-custom-purple {
            background: linear-gradient(135deg, #4e0661ff 0%, #00a085 100%);
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
        }

        .btn-custom-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 6, 97, 0.3);
            color: white;
        }

        .form-control,
        .form-select {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4e0661ff;
            box-shadow: 0 0 0 0.2rem rgba(78, 6, 97, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: #2f012eff;
            margin-bottom: 0.8rem;
        }

        .image-preview {
            border: 3px solid #e9ecef;
            border-radius: 15px;
            padding: 0.5rem;
            background: #f8f9fa;
            text-align: center;
            margin-bottom: 1rem;
        }

        .image-preview img {
            border-radius: 10px;
            max-width: 150px;
            height: auto;
        }

        @media (max-width: 768px) {
            .venta-container {
                padding: 1rem 0;
            }

            .venta-header {
                padding: 1.5rem;
            }

            .form-section {
                padding: 1.5rem;
                margin: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid venta-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card venta-card bg-overlay">
                    <!-- Header -->
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

                    <!-- Formulario -->
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
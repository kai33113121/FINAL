<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Libro - Admin</title>
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

        .upload-container {
            padding: 2rem 0;
        }

        .upload-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .upload-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .upload-icon {
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

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
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
            .upload-container {
                padding: 1rem 0;
            }

            .upload-header {
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
    <div class="container-fluid upload-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card upload-card bg-overlay">
                    <!-- Header -->
                    <div class="upload-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-upload upload-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">📤 Subir Nuevo Libro</h2>
                                <p class="mb-0 opacity-75">Agrega un nuevo libro a la plataforma</p>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario -->
                    <div class="form-section">
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

                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-tags me-2 text-muted"></i>Género</label>
                                <input type="text" name="genero" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-star me-2 text-muted"></i>Estado</label>
                                <select name="estado" class="form-control">
                                    <option value="nuevo">Nuevo</option>
                                    <option value="usado">Usado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><i
                                        class="fas fa-align-left me-2 text-muted"></i>Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="4"></textarea>
                            </div>

                            <!-- Imagen del libro -->
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-image me-2 text-muted"></i>Imagen del
                                    libro</label>
                                <input type="file" name="imagen" class="form-control" onchange="previewImage(event)">
                            </div>

                            <div class="image-preview">
                                <img id="preview" src="public/img/default.jpg" alt="Vista previa">
                                <div class="image-label">Vista previa</div>
                            </div>

                            <!-- Modo de publicación -->
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-exchange-alt me-2 text-muted"></i>Modo de
                                    publicación</label>
                                <select name="modo" class="form-control" id="modoSelect">
                                    <option value="intercambio">Solo intercambio</option>
                                    <option value="venta">Venta</option>
                                </select>
                            </div>

                            <!-- Precio -->
                            <div class="mb-3" id="precioGroup" style="display: none;">
                                <label class="form-label"><i class="fas fa-dollar-sign me-2 text-muted"></i>Precio (solo
                                    si es venta)</label>
                                <input type="number" name="precio" class="form-control" step="0.01" min="0">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-custom-purple btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Publicar libro
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

        document.getElementById('modoSelect').addEventListener('change', function () {
            const precioGroup = document.getElementById('precioGroup');
            precioGroup.style.display = this.value === 'venta' ? 'block' : 'none';
        });
    </script>
</body>

</html>
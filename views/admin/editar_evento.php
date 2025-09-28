<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Foro - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/editar_evento.css">
</head>
<body>
    <div class="container-fluid forum-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="card forum-card bg-overlay">
                    <div class="forum-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-comments forum-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">📝 Editar Foro</h2>
                                <p class="mb-0 opacity-75">Actualiza el contenido de tu foro</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <form method="POST" action="index.php?c=EventoController&a=actualizar">
                            <input type="hidden" name="id" value="<?= $foro['id'] ?>">
                            <div class="mb-3">
                                <label for="titulo" class="form-label"><i class="fas fa-heading me-2 text-muted"></i>Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control"
                                    value="<?= htmlspecialchars($foro['titulo']) ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="descripcion" class="form-label"><i class="fas fa-align-left me-2 text-muted"></i>Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="4"
                                    required><?= htmlspecialchars($foro['descripcion']) ?></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-custom-purple btn-lg">
                                    <i class="fas fa-save me-2"></i>Actualizar Foro
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

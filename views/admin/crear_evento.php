<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Foros - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="public/css/crear_evento.css">
</head>
<body>
    <div class="container-fluid forum-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card forum-card bg-overlay">
                    <div class="forum-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-comments forum-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">💬 Gestión de Foros</h2>
                                <p class="mb-0 opacity-75">Crea y administra foros de discusión para la comunidad</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="form-section">
                            <h4 class="fw-bold mb-4 text-purple">
                                <i class="fas fa-plus-circle me-2"></i>Crear nuevo foro
                            </h4>
                            <form method="POST" action="index.php?c=EventoController&a=guardar">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="titulo" class="form-label">
                                            <i class="fas fa-heading me-2 text-muted"></i>Título del foro
                                        </label>
                                        <input type="text" name="titulo" id="titulo" class="form-control"
                                            placeholder="Ingresa un título descriptivo para el foro" required>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="descripcion" class="form-label">
                                            <i class="fas fa-align-left me-2 text-muted"></i>Descripción
                                        </label>
                                        <textarea name="descripcion" id="descripcion" class="form-control" rows="4"
                                            placeholder="Describe el tema del foro y las reglas de participación..."
                                            required></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-purple btn-lg">
                                            <i class="fas fa-save me-2"></i>Crear foro
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="divider">
                        <h5 class="section-title">
                            <i class="fas fa-list me-2"></i>Foros creados
                        </h5>
                        <?php if (!empty($eventos)): ?>
                            <div class="list-group">
                                <?php foreach ($eventos as $e): ?>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-start">
                                                <div class="me-3">
                                                    <i class="fas fa-comments text-muted"
                                                        style="font-size: 1.5rem; margin-top: 0.25rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="forum-title mb-1"><?= htmlspecialchars($e['titulo']) ?></h6>
                                                    <small class="forum-date">
                                                        <i class="fas fa-calendar-alt me-1"></i>
                                                        Creado: <?= htmlspecialchars($e['fecha_creacion']) ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <a href="index.php?c=EventoController&a=editar&id=<?= $e['id'] ?>"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit me-1"></i>Editar
                                            </a>
                                            <a href="index.php?c=EventoController&a=eliminar&id=<?= $e['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('¿Estás seguro de eliminar este foro?')">
                                                <i class="fas fa-trash me-1"></i>Eliminar
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info mt-3 text-center">
                                <i class="fas fa-info-circle me-2"></i>
                                Aún no has creado ningún foro. ¡Crea el primero usando el formulario de arriba!
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>
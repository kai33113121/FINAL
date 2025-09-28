<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/reseñas.css">
</head>
<body>
    <div class="container-fluid reviews-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card reviews-card bg-overlay">
                    <div class="reviews-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-star reviews-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">🛠️ Panel de Reseñas</h2>
                                <p class="mb-0 opacity-75">Gestiona y modera las reseñas de los usuarios</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-number"><?= $total ?></div>
                                    <div class="stats-label">
                                        <i class="fas fa-comments me-2"></i>Total de Reseñas
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-custom table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-user me-2"></i>Usuario</th>
                                        <th><i class="fas fa-book me-2"></i>Libro</th>
                                        <th><i class="fas fa-star me-2"></i>Calificación</th>
                                        <th><i class="fas fa-comment me-2"></i>Comentario</th>
                                        <th><i class="fas fa-calendar me-2"></i>Fecha</th>
                                        <th><i class="fas fa-cog me-2"></i>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($resenas)): ?>
                                        <?php foreach ($resenas as $r): ?>
                                            <tr>
                                                <td class="user-name">
                                                    <i class="fas fa-user-circle me-2 text-muted"></i>
                                                    <?= htmlspecialchars($r['nombre_usuario']) ?>
                                                </td>
                                                <td class="book-title">
                                                    <i class="fas fa-book-open me-2 text-muted"></i>
                                                    <?= htmlspecialchars($r['titulo_libro']) ?>
                                                </td>
                                                <td class="rating">
                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                        <i
                                                            class="fas fa-star <?= $i <= $r['calificacion'] ? 'text-warning' : 'text-muted' ?>"></i>
                                                    <?php endfor; ?>
                                                    <span class="ms-1">(<?= $r['calificacion'] ?>/5)</span>
                                                </td>
                                                <td>
                                                    <div class="comment-text" title="<?= htmlspecialchars($r['comentario']) ?>">
                                                        <?= htmlspecialchars($r['comentario']) ?>
                                                    </div>
                                                </td>
                                                <td class="review-date">
                                                    <i class="fas fa-calendar-alt me-1"></i>
                                                    <?= date('d M Y', strtotime($r['fecha'])) ?>
                                                    <br>
                                                    <small class="text-muted"><?= date('H:i', strtotime($r['fecha'])) ?></small>
                                                </td>
                                                <td>
                                                    <a href="index.php?c=ResenaController&a=eliminar&id=<?= $r['id'] ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Eliminar esta reseña?')">
                                                        <i class="fas fa-trash me-1"></i>Eliminar
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center py-5">
                                                <i class="fas fa-star text-muted mb-3"
                                                    style="font-size: 3rem; opacity: 0.3;"></i>
                                                <h5 class="text-muted">No hay reseñas disponibles</h5>
                                                <p class="text-muted">Las reseñas de los usuarios aparecerán aquí</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

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
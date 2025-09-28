<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas - Admin</title>
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

        .reviews-container {
            padding: 2rem 0;
        }

        .reviews-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .reviews-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .reviews-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .stats-card {
            background: linear-gradient(135deg, #4e0661ff 0%, #2f012eff 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 2rem;
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stats-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table-custom thead th {
            background: linear-gradient(135deg, #2f012eff 0%, #4e0661ff 100%);
            color: white;
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1rem;
        }

        .table-striped tbody tr {
            transition: all 0.3s ease;
        }

        .table-striped tbody tr:hover {
            background: rgba(78, 6, 97, 0.05) !important;
            transform: translateY(-1px);
        }

        .user-name {
            font-weight: 600;
            color: #2f012eff;
        }

        .book-title {
            font-weight: 500;
            color: #495057;
        }

        .rating {
            font-weight: 700;
            color: #fdcb6e;
        }

        .comment-text {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .review-date {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .btn-danger {
            background: linear-gradient(135deg, #e84393 0%, #fd79a8 100%);
            border: none;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(232, 67, 147, 0.3);
        }

        @media (max-width: 768px) {
            .reviews-container {
                padding: 1rem 0;
            }

            .reviews-header {
                padding: 1.5rem;
            }

            .comment-text {
                max-width: 200px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid reviews-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card reviews-card bg-overlay">
                    <!-- Header -->
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

                    <!-- Contenido -->
                    <div class="card-body p-4">

                        <!-- Estadística -->
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

                        <!-- Tabla de reseñas -->
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
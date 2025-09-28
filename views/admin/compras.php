<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="FINAL/public/css/compras_a.css">
</head>
<body>
    <div class="container-fluid purchases-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card purchases-card bg-overlay">
                    <div class="purchases-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-shopping-cart purchases-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">🛒 Historial de Compras</h2>
                                <p class="mb-0 opacity-75">Gestiona y visualiza todas las compras realizadas</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-custom table-bordered table-hover align-middle">
                                <thead class="table-purple text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Libro</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($compras)): ?>
                                        <?php foreach ($compras as $compra): ?>
                                            <tr>
                                                <td><span class="purchase-id"><?= $compra['id'] ?></span></td>
                                                <td class="user-name"><?= htmlspecialchars($compra['usuario']) ?></td>
                                                <td class="book-title"><?= htmlspecialchars($compra['libro']) ?></td>
                                                <td>
                                                    <span class="badge badge-custom badge-<?= $compra['estado'] ?? 'pendiente' ?>">
                                                        <?= ucfirst($compra['estado'] ?? 'Pendiente') ?>
                                                    </span>
                                                </td>
                                                <td class="purchase-date">
                                                    <i class="fas fa-calendar-alt me-2 text-muted"></i>
                                                    <?= date('d M Y H:i', strtotime($compra['fecha'])) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="empty-state">
                                                <i class="fas fa-shopping-basket"></i>
                                                <h5 class="mt-3 mb-2">No se han registrado compras aún</h5>
                                                <p class="text-muted">Las compras aparecerán aquí cuando los usuarios
                                                    realicen transacciones</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if (!empty($compras)): ?>
                            <div class="mt-4 p-3 bg-light rounded">
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <h5 class="text-primary mb-1"><?= count($compras) ?></h5>
                                        <small class="text-muted">Total de Compras</small>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-success mb-1">
                                            <?= count(array_unique(array_column($compras, 'usuario'))) ?>
                                        </h5>
                                        <small class="text-muted">Usuarios Únicos</small>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-info mb-1">
                                            <?= count(array_unique(array_column($compras, 'libro'))) ?>
                                        </h5>
                                        <small class="text-muted">Libros Vendidos</small>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-warning mb-1">
                                            <?= count(array_filter($compras, function($c) { return $c['estado'] === 'completado'; })) ?>
                                        </h5>
                                        <small class="text-muted">Completadas</small>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
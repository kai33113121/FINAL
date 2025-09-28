<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Intercambios - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="public/css/intercambiosa.css">
</head>
<body>
    <div class="container-fluid exchanges-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card exchanges-card bg-overlay">
                    <div class="exchanges-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-exchange-alt exchanges-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">🔄 Gestión de Intercambios</h2>
                                <p class="mb-0 opacity-75">Supervisa y administra todos los intercambios entre usuarios
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-custom table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Ofrecido por</th>
                                        <th>Libro ofrecido</th>
                                        <th>Solicitado a</th>
                                        <th>Libro solicitado</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($intercambios)): ?>
                                        <?php foreach ($intercambios as $i): ?>
                                            <tr>
                                                <td><span class="exchange-id"><?= $i['id'] ?></span></td>
                                                <td class="user-name"><?= htmlspecialchars($i['nombre_ofrece']) ?></td>
                                                <td class="book-title">
                                                    <i class="fas fa-book me-1 text-muted"></i>
                                                    <?= htmlspecialchars($i['libro_ofrecido']) ?>
                                                </td>
                                                <td class="user-name"><?= htmlspecialchars($i['nombre_recibe']) ?></td>
                                                <td class="book-title">
                                                    <i class="fas fa-book me-1 text-muted"></i>
                                                    <?= htmlspecialchars($i['libro_solicitado']) ?>
                                                </td>
                                                <td>
                                                    <span class="status-badge status-<?= $i['estado'] ?>">
                                                        <?php
                                                        $iconos = [
                                                            'pendiente' => 'fas fa-clock',
                                                            'aceptado' => 'fas fa-check',
                                                            'rechazado' => 'fas fa-times'
                                                        ];
                                                        ?>
                                                        <i class="<?= $iconos[$i['estado']] ?? 'fas fa-question' ?> me-1"></i>
                                                        <?= ucfirst($i['estado']) ?>
                                                    </span>
                                                </td>
                                                <td class="exchange-date">
                                                    <i class="fas fa-calendar-alt me-2 text-muted"></i>
                                                    <?= date('d M Y', strtotime($i['fecha'])) ?>
                                                    <br>
                                                    <small class="text-muted"><?= date('H:i', strtotime($i['fecha'])) ?></small>
                                                </td>
                                                <td>
                                                    <a href="index.php?c=AdminController&a=eliminarIntercambio&id=<?= $i['id'] ?>"
                                                        class="btn btn-outline-danger btn-sm"
                                                        onclick="return confirm('¿Estás seguro de eliminar este intercambio?')">
                                                        <i class="fas fa-trash me-1"></i>Eliminar
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="empty-state">
                                                <i class="fas fa-exchange-alt"></i>
                                                <h5 class="mt-3 mb-2">No hay intercambios registrados</h5>
                                                <p class="text-muted">Las solicitudes de intercambio aparecerán aquí cuando
                                                    los usuarios las realicen</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if (!empty($intercambios)): ?>
                            <div class="mt-4 p-3 bg-light rounded">
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <h5 class="text-primary mb-1"><?= count($intercambios) ?></h5>
                                        <small class="text-muted">Total Intercambios</small>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-warning mb-1">
                                            <?= count(array_filter($intercambios, function ($i) {
                                                return $i['estado'] === 'pendiente'; })) ?>
                                        </h5>
                                        <small class="text-muted">Pendientes</small>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-success mb-1">
                                            <?= count(array_filter($intercambios, function ($i) {
                                                return $i['estado'] === 'aceptado'; })) ?>
                                        </h5>
                                        <small class="text-muted">Aceptados</small>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-danger mb-1">
                                            <?= count(array_filter($intercambios, function ($i) {
                                                return $i['estado'] === 'rechazado'; })) ?>
                                        </h5>
                                        <small class="text-muted">Rechazados</small>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>
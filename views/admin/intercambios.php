<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Intercambios - Admin</title>
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

        .exchanges-container {
            padding: 2rem 0;
        }

        .exchanges-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .exchanges-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .exchanges-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table-light {
            background: linear-gradient(135deg, #2f012eff 0%, #4e0661ff 100%) !important;
            color: white !important;
        }

        .table-light th {
            color: white !important;
            border: none !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1rem;
        }

        .table-hover tbody tr {
            transition: all 0.3s ease;
        }

        .table-hover tbody tr:hover {
            background: rgba(78, 6, 97, 0.05) !important;
            transform: translateY(-1px);
        }

        .exchange-id {
            background: linear-gradient(135deg, #4e0661ff 0%, #2f012eff 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .user-name {
            font-weight: 600;
            color: #2f012eff;
        }

        .book-title {
            font-weight: 500;
            color: #495057;
            font-style: italic;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
        }

        .status-pendiente {
            background: #ffeaa7;
            color: #e17055;
        }

        .status-aceptado {
            background: #55efc4;
            color: #00b894;
        }

        .status-rechazado {
            background: #fd79a8;
            color: #e84393;
        }

        .exchange-date {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 500;
        }

        .exchange-arrow {
            color: #a29bfe;
            font-size: 1.2rem;
            margin: 0 0.5rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .exchanges-container {
                padding: 1rem 0;
            }

            .exchanges-header {
                padding: 1.5rem;
            }

            .table-responsive {
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid exchanges-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card exchanges-card bg-overlay">
                    <!-- Header -->
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

                    <!-- Tabla -->
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
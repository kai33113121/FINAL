<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras - Admin</title>
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

        .purchases-container {
            padding: 2rem 0;
        }

        .purchases-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .purchases-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .purchases-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table-purple {
            background: linear-gradient(135deg, #2f012eff 0%, #4e0661ff 100%) !important;
            color: white !important;
        }

        .table-purple th {
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

        .badge-custom {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
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

        .purchase-id {
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
        }

        .purchase-date {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .purchases-container {
                padding: 1rem 0;
            }

            .purchases-header {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid purchases-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card purchases-card bg-overlay">
                    <!-- Header -->
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

                    <!-- Tabla -->
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-custom table-bordered table-hover align-middle">
                                <thead class="table-purple text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Libro</th>
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
                                                <td class="purchase-date">
                                                    <i class="fas fa-calendar-alt me-2 text-muted"></i>
                                                    <?= date('d M Y H:i', strtotime($compra['fecha'])) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="empty-state">
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
                                    <div class="col-md-4">
                                        <h5 class="text-primary mb-1"><?= count($compras) ?></h5>
                                        <small class="text-muted">Total de Compras</small>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="text-success mb-1">
                                            <?= count(array_unique(array_column($compras, 'usuario'))) ?>
                                        </h5>
                                        <small class="text-muted">Usuarios Únicos</small>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="text-info mb-1">
                                            <?= count(array_unique(array_column($compras, 'libro'))) ?>
                                        </h5>
                                        <small class="text-muted">Libros Vendidos</small>
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
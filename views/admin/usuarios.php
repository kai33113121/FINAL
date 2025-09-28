<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - Admin</title>
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

        .users-container {
            padding: 2rem 0;
        }

        .users-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .users-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .users-icon {
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

        .btn-outline-purple {
            border: 2px solid #4e0661ff;
            color: #4e0661ff;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-purple:hover {
            background: #4e0661ff;
            color: white;
            transform: translateY(-1px);
        }

        .user-id {
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

        .user-email {
            color: #495057;
            font-size: 0.95rem;
        }

        .role-admin {
            background: linear-gradient(135deg, #e17055 0%, #fdcb6e 100%);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
        }

        .role-usuario {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            color: white;
            padding: 0.4rem 1rem;
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

        @media (max-width: 768px) {
            .users-container {
                padding: 1rem 0;
            }

            .users-header {
                padding: 1.5rem;
            }

            .table-responsive {
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid users-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card users-card bg-overlay">
                    <!-- Header -->
                    <div class="users-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-users users-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">👥 Gestión de Usuarios</h2>
                                <p class="mb-0 opacity-75">Administra y controla todos los usuarios del sistema</p>
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
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($usuarios)): ?>
                                        <?php foreach ($usuarios as $u): ?>
                                            <tr>
                                                <td><span class="user-id"><?= $u['id'] ?></span></td>
                                                <td class="user-name">
                                                    <i class="fas fa-user me-2 text-muted"></i>
                                                    <?= htmlspecialchars($u['nombre']) ?>
                                                </td>
                                                <td class="user-email">
                                                    <i class="fas fa-envelope me-2 text-muted"></i>
                                                    <?= htmlspecialchars($u['email']) ?>
                                                </td>
                                                <td>
                                                    <span class="role-<?= $u['rol'] ?>">
                                                        <?php if ($u['rol'] === 'admin'): ?>
                                                            <i class="fas fa-crown me-1"></i>Administrador
                                                        <?php else: ?>
                                                            <i class="fas fa-user me-1"></i>Usuario
                                                        <?php endif; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="index.php?c=AdminController&a=editarUsuario&id=<?= $u['id'] ?>"
                                                        class="btn btn-outline-purple btn-sm me-2">
                                                        <i class="fas fa-edit me-1"></i>Editar
                                                    </a>
                                                    <a href="index.php?c=AdminController&a=eliminarUsuario&id=<?= $u['id'] ?>"
                                                        class="btn btn-outline-danger btn-sm"
                                                        onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                                        <i class="fas fa-trash me-1"></i>Eliminar
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="empty-state">
                                                <i class="fas fa-users-slash"></i>
                                                <h5 class="mt-3 mb-2">No hay usuarios registrados</h5>
                                                <p class="text-muted">Los usuarios registrados aparecerán aquí</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php if (!empty($usuarios)): ?>
                            <div class="mt-4 p-3 bg-light rounded">
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <h5 class="text-primary mb-1"><?= count($usuarios) ?></h5>
                                        <small class="text-muted">Total de Usuarios</small>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="text-warning mb-1">
                                            <?= count(array_filter($usuarios, function ($u) {
                                                return $u['rol'] === 'admin'; })) ?>
                                        </h5>
                                        <small class="text-muted">Administradores</small>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="text-info mb-1">
                                            <?= count(array_filter($usuarios, function ($u) {
                                                return $u['rol'] === 'usuario'; })) ?>
                                        </h5>
                                        <small class="text-muted">Usuarios Regulares</small>
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
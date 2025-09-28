<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="public/css/usuarios.css">
</head>
<body>
    <div class="container-fluid users-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card users-card bg-overlay">
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
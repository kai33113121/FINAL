<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/libros.css">
</head>
<body>
    <div class="container-fluid books-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card books-card bg-overlay">
                    <div class="books-header position-relative">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-book books-icon"></i>
                            </div>
                            <div class="col-md-8 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">📚 Gestión de Libros</h2>
                                <p class="mb-0 opacity-75">Administra todos los libros del sistema</p>
                            </div>
                            <div class="col-md-2 text-center d-none d-md-block">
                                <a href="index.php?c=AdminController&a=subirLibro" class="btn btn-custom">
                                    <i class="fas fa-plus me-2"></i>Subir Libro
                                </a>
                            </div>
                        </div>
                        <div class="d-md-none text-center mt-3">
                            <a href="index.php?c=AdminController&a=subirLibro" class="btn btn-custom">
                                <i class="fas fa-plus me-2"></i>Subir Libro
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-custom table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Usuario</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($libros as $libro): ?>
                                        <tr>
                                            <td><span class="badge bg-secondary badge-custom"><?= $libro['id'] ?></span>
                                            </td>
                                            <td class="fw-semibold"><?= htmlspecialchars($libro['titulo']) ?></td>
                                            <td><?= htmlspecialchars($libro['autor']) ?></td>
                                           <td>
    <?php if (!empty($libro['nombre_usuario'])): ?>
        <?= htmlspecialchars($libro['nombre_usuario']) ?>
    <?php else: ?>
        <span class="badge bg-warning">Libro Oficial</span>
    <?php endif; ?>
</td>
                                            <td>
                                                <span class="badge badge-custom bg-info">
                                                    <?= htmlspecialchars($libro['estado']) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="index.php?c=AdminController&a=editarLibro&id=<?= $libro['id'] ?>"
                                                    class="btn btn-outline-purple btn-sm me-2">
                                                    <i class="fas fa-edit me-1"></i>Editar
                                                </a>
                                                <a href="index.php?c=AdminController&a=eliminarLibro&id=<?= $libro['id'] ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Estás seguro de eliminar este libro?')">
                                                    <i class="fas fa-trash me-1"></i>Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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